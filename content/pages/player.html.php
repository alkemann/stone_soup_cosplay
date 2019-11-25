<?php

use app\models\{Player, Submission};
use alkemann\h2l\Log;

$id = $_GET['id'] ?? false;

if ($id == false) {
    Log::warning("Player page visited without ID parameter");
    return $this->request->redirect('/');
}

$p = Player::get($id);
if (!$p) {
    Log::warning("Player [$id] does not exist!");
    return $this->request->redirect('/');
}

$submissions = $p->submissions();
// usort($submissions, function(Submission $a, Submission $b) : int {
//     $ac = $a->challenge();
//     $bc = $b->challenge();
//     $as = (int) $ac->setnr;
//     $bs = (int) $bc->setnr;
//     $aw = (int) $ac->week;
//     $bw = (int) $bc->week;
//     if ($as == $bs) {
//         return $bw <=> $aw;
//     }
//     return $bs <=> $as;
// });

// @TODO if no subs

$has_non_scoring = false;
$board = [];
$first_set = 999;
$last_set = 0;
foreach ($submissions as $sub) {
    $cha = $sub->challenge();
    $set = (int) $cha->setnr;
    $week = (int) $cha->week;
    if ($sub->hs === false || $week > 5) {
        $has_non_scoring = true;
        continue;
    }
    $first_set = $first_set < $set ? $first_set : $set;
    $last_set = $last_set > $set ? $last_set : $set;
    $board[$set][$week] = $sub;
    if (!isset($board[$set]['total'])) $board[$set]['total'] = 0;
    if (!isset($board[$set]['stars'])) $board[$set]['stars'] = 0;
    $board[$set]['total'] += $sub->score;
    $board[$set]['stars'] += $sub->stars;
}
for ($set_key=$last_set; $set_key >= $first_set; $set_key--) {
    if (isset($board[$set_key]) == false) {
        $board[$set_key]['total'] = 0;
        $board[$set_key]['stars'] = 0;
    }
}

?>
<h2>Submissions by <?=$e($p->name)?></h2>


<table class="bordered player-list">
    <thead>
        <tr>
            <th>&nbsp;</th>
            <th>Total</th>
            <th>Wk 1</th>
            <th>Wk 2</th>
            <th>Wk 3</th>
            <th>Wk 4</th>
            <th>Wk 5</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $r = 0;
        for ($set_key=$last_set; $set_key >= $first_set; $set_key--) : ?>
        <tr class="<?=$r++%2==0?'odd':'even'?>">
            <th>Set <?=$set_key?></th>
            <td><?=$board[$set_key]['total']?> <?=$board[$set_key]['stars']?><span class="star">&#9733;</span></td>
        <?php for ($i=1; $i <= 5; $i++) : ?>
            <?php
                $sub = $board[$set_key][$i] ?? false;
                if ($sub === false) {
                    echo '<td>&nbsp;</td>';
                    continue;
                }?>
            <td>
                <?php if ($sub->morgue_url) : ?><a href="<?=$e($sub->morgue_url)?>" target="_blank"><?php endif; ?>
                <?php
                echo $sub->score;
                for ($stars=0; $stars < (int) $sub->stars ; $stars++) {
                    echo '<span class="star">&#9733;</span>';
                }
                ?>
                <?php if ($sub->morgue_url) : ?></a><?php endif; ?>
            </td>
        <?php endfor; ?>
        </tr>
    <?php endfor; ?>
    </tbody>
</table>

<br/>

<?php if ($has_non_scoring) : ?>

<h3>Late or non-scoring entries</h3>
<table class="bordered player-list">
    <thead>
        <tr>
            <th>Challenge</th>
            <th>Score **</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $r = 0;
        foreach ($submissions as $s) :
            $cha = $s->challenge();
            if ($cha->week <= 5 && $s->hs) continue;
    ?>

        <tr class="<?=$r++%2==0?'odd':'even'?>">
            <td><a href="/challenges/details?id=<?=$e($cha->id)?>"><?=$e($cha->setnr)?>.<?=$e($cha->week)?> <?=$e($cha->name)?></a></td>
            <td><?php if ($s->morgue_url) : ?><a href="<?=$e($s->morgue_url)?>" target="_blank"><?php endif; ?>
            <?php

            echo $s->score;
            for ($i=0; $i < (int) $s->stars ; $i++) {
                echo '<span class="star">&#9733;</span>';

            }
            ?><?php if ($s->morgue_url) : ?></a><?php endif; ?>
            </td>
        </tr>

    <?php
        endforeach;
    ?>
    </tbody>
</table>
<?php endif; // has non scoring ?>
