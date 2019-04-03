<?php
use app\models\{Player, Challenge, Submission};

if (!$this->request->session('admin')) {
    $this->request->redirect('/');
}

$id = $_GET['id'] ?? false;

if ($id == false) {
	return $this->request->redirect('/');
}

$sub = Submission::get($id)->with('challenge')->with('player');
if (!$sub) {
	return $this->request->redirect('/');
}


if ($data = $this->request->getPostData()) {
    $data['score'] = (int) $data['score'];
    $data['stars'] = (int) $data['stars'];
    if ($sub->save($data)) {
        return $this->request->redirect('/submissions/list');
    }
    dd($sub);
}

?>
<h2>Edit Submission for <?=$sub->challenge()->name?> : <?=$sub->player()->name?></h2>
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
        <br />

        <label>
            <span>Score</span><br />
            <input type="number" name="score" value="<?=$sub->score?>" min="0" max="50" />
        </label>
        <br />
        <br />
        <span>Stars</span>
        <label><input type="radio" name="stars" value="0" <?=($sub->stars == 0)?'checked="checked"':''?> /> None</label> &nbsp; 
        <label><input type="radio" name="stars" value="1" <?=($sub->stars == 1)?'checked="checked"':''?> /> One<span class="star">&#9733;</span></label> &nbsp; 
        <label><input type="radio" name="stars" value="2" <?=($sub->stars == 2)?'checked="checked"':''?> /> Two<span class="star">&#9733;&#9733;</span></label> 
        <br />
        <br />
        <label>
            <span>Morgue URL</span><br />
            <input type="text" name="morgue_url" value="<?=$sub->morgue_url?>" /> <br />
            <?php if ($sub->morgue_url) : ?>
                <a href="<?=$sub->morgue_url?>" target="_blank">View Morgue</a> 
            <?php endif; ?>

        </label>
        <br />
        <br />
        <label>
            <input type="hidden" name="hs" value="0" />
            <input type="checkbox" name="hs" value="1" <?=$sub->hs?'checked="checked"':''?> />
            <span>Highscore (use for multiple submissions)</span>
        </label>
        <br />
        <br />
        <label>
            <input type="hidden" name="accepted" value="0" />
            <input type="checkbox" name="accepted" value="1" <?=$sub->accepted?'checked="checked"':''?> />
            <span>Accepted (use for moderation)</span>
        </label>
        <br />
        <br />
        <label>
            <input type="hidden" name="online" value="0" />
            <input type="checkbox" name="online" value="1" <?=$sub->online?'checked="checked"':''?> />
            <span>Played online</span>
        </label>
        <br />
        <br />
        <label>
            <span>Comment</span><br />
            <textarea name="comment" rows="5" cols="100" ><?=$sub->comment?></textarea>
        </label>
        <br />
        <input type="submit" name="Save">
    </fieldset>
</form>