<?php $this->layout = 'ccc'; ?>
<?php

use \app\models\{Challenge, Player, Submission};
use \app\Scorer;

$id = $_GET['id'] ?? false;

if ($id) {
    $cha = Challenge::get($id);
} else {
    $cha = Challenge::active();
}
if (!$cha) {
    $cha = Challenge::tournamentActive();
}

if ($cha && $cha->setnr > 30) {
    if ($cha->active) {
        $this->layout = 'tournament';
    } else {
        return $this->request->redirect('/');
    }
}

if (!$cha || $cha->draft) {
    $this->request->session()->set('message', 'No active challenge found.');
    return $this->request->redirect('/');
}

if ($data = $this->request->getPostData()) {
    $int = function($v) { return (int) $v; };
    $milestones = array_map($int, $data['milestones']??[]);
    $optionals = array_map($int, $data['optionals']??[]);
    $score = Scorer::score($milestones, $optionals);
    $stars = max(0, min(2, sizeof(array_map($int, $data['stars']??[]))));
    $data['stars'] = $stars;
    $data['score'] = $score;
    if (empty($data['player_id'])) unset($data['player_id']);
    $data['challenge_id'] = $cha->id;
    $data['accepted'] = $data['hs'] = 0;
    $data['late'] = $cha->active == 1 ? 0 : 1;
    $sub = new app\models\Submission($data);
    if ($sub->save()) {
        Submission::sendToModeration(['challenge_id' => $cha->id, 'player_id' => $data['player_id']]);
        $this->request->session()->set('message', 'Run submitted for scoring and moderation. Thank you!');
        return $this->request->redirect('/');
    }
}

?>
<h2>Adding new Submission for Set <?=$e($cha->setnr)?> Week <?=$e($cha->week)?> : <?=$e($cha->name)?></h2>
<form method="POST">
    <input type="hidden" name="challenge_id" value="<?=$cha->id?>">
    <fieldset>
        <label>
            <span>Player</span><select name="player_id">
                <option value="">NEW PLAYER</option>
                <?php $players = Player::list();
                foreach ($players as $id => $name) : ?>
                <option value="<?=$e($id)?>"><?=$e($name)?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <br />
        <br />
        <label>
            <span>Morgue URL</span><br />
            <input type="text" name="morgue_url" placeholder="http://example.com" required="required" />
        </label>
        <br />
        <br />
        <label>
            <input type="hidden" name="online" value="0" />
            <input type="checkbox" name="online" value="1" checked="checked" />
            <span>Played online</span><br />
        </label>
        <br />
        <label>
            <span>Comment</span><br />
            <textarea name="comment" placeholder="Estimate of points and stars? Username (for new offline players)?" rows="5" cols="100" ></textarea>
        </label>
        <br />
        <input type="submit" value="Submit Run" />
    </fieldset>
    <br />
    <fieldset><legend>Milestones (+5 each)</legend>
    <div class="try-hard"><input type="button" id="try-click" onclick="javascript:tryhard();" title="Enable all conducts and milestones" value="Try Hard" /></div>
    <script type="text/javascript">
        function tryhard() {
            checkboxes = document.getElementsByClassName('tryhard');
            for (var i = checkboxes.length - 1; i >= 0; i--) {
                checkboxes[i]
                checkboxes[i].checked = !checkboxes[i].checked;
            }
        }
    </script>
    <?php for ($m=0; $m < 7; $m++) : ?>
    <label>
        <input class="milestone tryhard" type="checkbox" name="milestones[]" value="<?=$e($m)?>" />
        <span><?=Scorer::$milestones[$m]?></span><br />
    </label>
    <?php endfor; ?>
    <p style="font-size: 0.75em; color: #999;">The main way to score points. +5 points each, and can be done in any order. (You don't need to tell me which milestones you achieve.)</p>
    </fieldset>
    <br />
    <fieldset><legend>Conducts (+5 each<sup>*</sup>)</legend>
    <label>
        <input class="conduct tryhard" type="checkbox" name="optionals[]" value="7" />
        <span><?=$e($cha->conduct_name_1)?></span>
    </label>
    <i style="font-size: 0.75em;"><?=$e($cha->conduct_1)?></i>
    <br />
    <br />
    <label>
        <input class="conduct tryhard" type="checkbox" name="optionals[]" value="8" />
        <span><?=$e($cha->conduct_name_2)?></span>
    </label>
    <i style="font-size: 0.75em;"><?=$e($cha->conduct_2)?></i>
    <br />
    <br />
    <label>
        <input class="conduct tryhard" type="checkbox" name="optionals[]" value="9" />
        <span><?=$e($cha->conduct_name_3)?></span>
    </label>
    <i style="font-size: 0.75em;"><?=$e($cha->conduct_3)?></i>
    <br />
    <p style="font-size: 0.75em; color: #999;"><sup>*</sup> Conducts are worth +5 points each, to a maximum of half your score from milestones, rounded down. (So if you achieve 4 milestones (20 points) you can earn up to 10 points from conduct bonuses.) Please indicate which conducts you qualify for when you post your morgue.</p>
    </fieldset>
    <br />
    <fieldset><legend>Bonus <span class="star">&#9733;</span></legend>
    <label>
        <input class="stars tryhard" type="checkbox" name="stars[]" value="10" />
        <span><?=$e($cha->bonus_name_1)?></span>
    </label>
    <i style="font-size: 0.75em;"><?=$e($cha->bonus_1)?></i>
    <br />
    <br />
    <label>
        <input class="stars tryhard" type="checkbox" name="stars[]" value="11" />
        <span><?=$e($cha->bonus_name_2)?></span>
    </label>
    <i style="font-size: 0.75em;"><?=$e($cha->bonus_2)?></i>
    <br />
    <p style="font-size: 0.75em; color: #999;">Bonus challenges are worth one star each, similar to banners in Crawl tournaments. Please indicate challenges that you qualify for.</p>
    </fieldset>
    <br />
    <input type="submit" value="Submit Run" />
    <p>Submissions will not be displayed until approved by an admin.</p>
    <br />
</form>
