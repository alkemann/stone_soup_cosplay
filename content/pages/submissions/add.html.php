<?php
if ($data = $this->request->getPostData()) {
    $data['score'] = (int) $data['score'];
    $data['stars'] = (int) $data['stars'];
    $sub = new app\models\Submission($data);
    if ($sub->save()) {
        $_SESSION['message'] = "Submission created";
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
            <span>Score</span><br />
            <input type="text" name="score" value="50" />
        </label>
        <br />
        <label>
            <span>Stars</span><br />
            <input type="text" name="stars" value="2" />
        </label>
        <br /><!-- 
        <label>
            <span>Morgue URL (online)</span><br />
            <input type="text" name="morgue_url" placeholder="http://example.com" />
        </label>
        <br />
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