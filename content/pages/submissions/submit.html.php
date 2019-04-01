<?php

use \app\models\{Challenge, Player, Submission};

$active = Challenge::active();
if (!$active) {
    echo '<h2>No active challenge at this time</h2>';
    return;
}

if ($data = $this->request->getPostData()) {
    $data['challenge_id'] = $active->id;
    $data['accepted'] = $data['hs'] = 0;
    $sub = new app\models\Submission($data);
    if ($sub->save()) {
        Submission::sendToModeration(['challenge_id' => $active->id, 'player_id' => $data['player_id']]);
        return $this->request->redirect('/submissions/list');
    }
}

?>
<h2>Adding new Submission for Set <?=$active->setnr?> Week <?=$active->week?> : <?=$active->name?></h2>
<form method="POST">
    <fieldset>
        <label>
            <span>Player</span><br />
            <select name="player_id">
                <?php $players = Player::list();
                foreach ($players as $id => $name) : ?>
                <option value="<?=$id?>"><?=$name?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <br />
        <label>
            <span>Morgue URL</span><br />
            <input type="text" name="morgue_url" placeholder="http://example.com" required="required" />
        </label>
        <br />
        <label>
            <span>Played online</span><br />
            <input type="hidden" name="online" value="0" />
            <input type="checkbox" name="online" value="1" checked="checked" />
        </label>
        <br />
        <label>
            <span>Comment</span><br />
            <textarea name="comment" placeholder="Estimate of points and stars?" rows="5" cols="100" ></textarea>
        </label>
        <br />
        <input type="submit" name="Save">
    </fieldset>
</form>