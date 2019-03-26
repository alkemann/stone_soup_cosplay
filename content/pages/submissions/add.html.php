<?php
if (!$this->request->session('admin')) {
    $this->request->redirect('/');
}

if ($data = $this->request->getPostData()) {
    
    
    if (0 <= $data['stars'] && $data['stars'] <= 2) {
        $data['stars'] = (int) $data['stars'];
    } else {
        $errors['stars'] = "Stars must be 0, 1 or 2";
    }
    if (0 <= $data['score'] && $data['score'] <= 50) {
        $data['score'] = (int) $data['score'];
    } else {
        $errors['score'] = "Score must be between 0 and 50";
    }
    // $pid = $data['player_id'];
    // $player = app\models\Plauer::get($pid);
    // if (!$player) {
    //    $errors['player_id'] = "Player doesn't exist";
    // }
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
            <textarea name="comment" rows="5" cols="100" ></textarea>
        </label>
        <!-- 
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