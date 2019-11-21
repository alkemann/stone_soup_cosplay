<?php

use app\models\Submission;
use app\Scorer;

if (!$this->request->session('admin')) {
    $this->request->redirect('/');
}

if ($data = $this->request->getPostData()) {

    if (!isset($data['score']) || $data['score'] == '') {
        $int = function($v) { return (int) $v; };
        $milestones = array_map($int, $data['milestones']);
        $optionals = array_map($int, $data['optionals']);
        $score = Scorer::score($milestones, $optionals);
        $data['score'] = $score;
    }

    $sub = new Submission($data);

    $existing = Submission::findAsArray(['challenge_id' => $sub->challenge_id, 'player_id' => $sub->player_id]);
    if ($existing) {
        foreach ($existing as $eid => $ex) {
            $exd = ['accepted' => '0'];
            if ($ex->score <= $sub->score && $ex->hs == 1) {
                $exd['hs'] = 0;
            }
            if ($ex->score > $sub->score) {
                $sub->hs = 0;
                $sub->accepted = 0;
            }
            $ex->save($exd);
        }
    }
    if ($sub->save()) {
        return $this->request->redirect('/admin/submissions/list');
    }
}

?>
<h2>Adding new Submission</h2>
<form method="POST">
    <fieldset>
        <label>
            <span>Challenge</span><br />
            <select name="challenge_id">
                <?php $challenges = \app\models\Challenge::list();
                foreach ($challenges as $id => $name) : ?>
                <option value="<?=$id?>"><?=$name?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <br />
        <br />
        <label>
            <span>Player</span><br />
            <select name="player_id">
                <?php $players = \app\models\Player::list();
                foreach ($players as $id => $name) : ?>
                <option value="<?=$id?>"><?=$name?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <br />
        <br />
        <label>
            <span>Score</span><br />
            <input type="number" name="score" placeholder="50" min="0" max="50" />
        </label>
        <br />
        <br />
        <span>Stars</span>
        <label><input type="radio" name="stars" value="0" checked="checked" /> None</label> &nbsp; 
        <label><input type="radio" name="stars" value="1" /> One<span class="star">&#9733;</span></label> &nbsp; 
        <label><input type="radio" name="stars" value="2" /> Two<span class="star">&#9733;&#9733;</span></label> 
        <br />
        <br />
        <label>
            <span>Morgue URL <sup style="color:red">*</sup></span><br />
            <input type="text" name="morgue_url" placeholder="http://example.com" required="required"  />
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
            <textarea name="comment" rows="5" cols="100" ></textarea>
        </label>
        <br />
        <br />
        <input type="submit" name="Save">
    </fieldset>
    <br />
    <br />
    <fieldset>
        <legend>Milestones (+5 each)</legend>
        <?php for ($m=0; $m < 7; $m++) : ?>
        <label>
            <input type="checkbox" name="milestones[]" value="<?=$m?>" />
            <span><?=Scorer::$milestones[$m]?></span><br />
        </label>
        <?php endfor; ?>
    </fieldset>
    <br />
    <fieldset>
        <legend>Conducts (+5 each<sup>*</sup>)</legend>
        <label>
            <input type="checkbox" name="optionals[]" value="7" />
            <span>Conduct 1</span>
        </label>
        <br />
        <label>
            <input type="checkbox" name="optionals[]" value="8" />
            <span>Conduct 2</span>
        </label>
        <br />
        <label>
            <input type="checkbox" name="optionals[]" value="9" />
            <span>Conduct 3</span>
        </label>
        <br />
    </fieldset>
    <br />
    <br />
    <input type="submit" name="Save">
</form>