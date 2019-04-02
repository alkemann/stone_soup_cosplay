<?php

use app\models\{Player, Submission};

$id = $_GET['id'] ?? false;

if ($id == false) {
    return $this->request->redirect('/');
}

$p = Player::get($id);
if (!$p) {
    return $this->request->redirect('/');
}

$submissions = $p->submissions();
$r = usort($submissions, function(Submission $a, Submission $b) : int {
    $ac = $a->challenge();
    $bc = $b->challenge();
    $as = (int) $ac->setnr;
    $bs = (int) $bc->setnr;
    $aw = (int) $ac->week;
    $bw = (int) $bc->week;
    if ($as == $bs) {
        return $bw <=> $aw;
    }
    return $bs <=> $as;
});

?>
<h2>Submissions by <?=$p->name?></h2>

<table class="bordered">
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
    ?>

        <tr class="<?=$r++%2==0?'odd':'even'?>">
            <?php $cha = $s->challenge()?>
            <td><a href="/challenges/details?id=<?=$cha->id?>"><?=$cha->setnr?>.<?=$cha->week?> <?=$cha->name?></a></td>
            <td><a href="<?=$s->morgue_url?>" target="_blank">
            <?php

            echo $s->score . ' ';
            for ($i=0; $i < (int) $s->stars ; $i++) {
                echo '*';
            }
            for ($i=0; $i < 2 - (int) $s->stars ; $i++) {
                echo '&nbsp;';
            }
            ?></a>
            </td>
        </tr>

    <?php
        endforeach;
    ?>
    </tbody>
</table>
