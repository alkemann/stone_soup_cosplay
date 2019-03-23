<?php
use app\models\{Player, Challenge, Submission};

$id = $_GET['id'] ?? false;

if ($id == false) {
	return $this->request->redirect('/');
}

$sub = Submission::get($id);
if (!$sub) {
	return $this->request->redirect('/');
}


if ($data = $this->request->getPostData()) {
    $data['score'] = (int) $data['score'];
    $data['stars'] = (int) $data['stars'];
    if ($sub->save($data)) {
        $this->request->redirect('/submissions/list');
    }
    dd($sub);
}

?>
<h2>Adding new Submission</h2>
<form method="POST">
    <fieldset>
        <label>
            <span>Challenge</span><br />
            <select name="challenge_id">
                <?php $challenges = \app\models\Challenge::list();
                foreach ($challenges as $cid => $name) : ?>
                <option value="<?=$cid?>" <?php echo ($sub->challenge_id == $cid) ? 'selected="selected"':'';?> ><?=$name?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <br />
        <label>
            <span>Player</span><br />
            <select name="player_id">
                <?php $players = \app\models\Player::list();
                foreach ($players as $pid => $name) : ?>
                <option value="<?=$pid?>" <?php echo ($sub->player_id == $pid) ? 'selected="selected"':'';?> ><?=$name?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <br />

        <label>
            <span>Score</span><br />
            <input type="text" name="score" value="<?=$sub->score?>" />
        </label>
        <br />
        <label>
            <span>Stars</span><br />
            <input type="text" name="stars" value="<?=$sub->stars?>" />
        </label>
        <br />
        <label>
            <span>Morgue URL</span><br />
            <input type="text" name="morgue_url" value="<?=$sub->morgue_url?>" />
        </label>
        <br />
        <label>
            <span>Highscore (use for multiple submissions 0 or 1)</span><br />
            <input type="text" name="hs" value="<?=$sub->hs?>" />
        </label>
        <br />
        <label>
            <span>Accepted (use for moderation. Set to 0 to remove)</span><br />
            <input type="text" name="accepted" value="<?=$sub->accepted?>" />
        </label>
        <br />
        <input type="submit" name="Save">
    </fieldset>
</form>