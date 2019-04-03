<?php

use app\models\Submission;

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
            <span>Score <sup style="color:red">*</sup></span><br />
            <input type="number" name="score" placeholder="50" min="0" max="50" required="required" />
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
        <input type="submit" name="Save">
    </fieldset>
</form>