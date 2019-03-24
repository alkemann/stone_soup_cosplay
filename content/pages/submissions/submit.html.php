<?php

if ($data = $this->request->getPostData()) {
    $data['accepted'] = $data['hs'] = 0;
    $sub = new app\models\Submission($data);
    if ($sub->save()) {
        return $this->request->redirect('/submissions/list');
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