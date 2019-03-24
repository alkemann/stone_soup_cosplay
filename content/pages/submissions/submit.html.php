<?php

use \app\models\{Challenge, Player};

if ($data = $this->request->getPostData()) {
    $data['accepted'] = $data['hs'] = 0;
    $sub = new app\models\Submission($data);
    if ($sub->save()) {
        return $this->request->redirect('/submissions/list');
    }
}

$active = Challenge::active();
if (!$active) {
    echo '<h2>No active challenge at this time</h2>';
    return;
}

?>
<h2>Adding new Submission for Set <?=$active->setnr?> Week <?=$active->week?> : <?=$active->name?></h2>
<form method="POST">
    <input type="hidden" name="challenge_id" value="<?=$active->id?>" />
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
            <input type="text" name="morgue_url" placeholder="http://example.com" />
        </label>
        <br />
        <label>
            <span>Played online</span><br />
            <input type="hidden" name="accepted" value="0" />
            <input type="checkbox" name="accepted" value="1" checked="checked" />
        </label>
        <br />
        <label>
            <span>Comment</span><br />
            <input type="text" name="comment" placeholder="Estimate of points and stars?" />
        </label>
        <br />
        <!-- 
        <span style="font-size: smaller; color: red;">Only URL or dump</span>
        <br />
        <label>
            <span>Morgue Dump (offline)</span><br />
            <textarea name="morgue_text" placeholder="Blah blah"></textarea>
        </label> -->
        <br />
        <input type="submit" name="Save">
    </fieldset>
</form>