<?php
if (!$this->request->session('admin')) {
	$this->request->redirect('/');
}

if ($data = $this->request->getPostData()) {
	$challenge = new app\models\Challenge($this->request->getPostData());
	$challenge->save();
	$this->request->redirect('/');
}
	
?>
<h2>Adding new Challenge</h2>
<form method="POST">
	<fieldset>
		<label>
			<span>Name</span><br />
			<input type="text" name="name" placeholder="Name of character to play" />
		</label>
		<br />
		<br />
		<label>
			<span>Shortform description (aka 'MiBe', 'MiFi^Mak' or 'Mino Fi/Skal Mak'</span><br />
			<input type="text" name="shortform" placeholder="MiBe" />
		</label>
		<br />
		<br />
		<label>
			<span>Description</span><br />
			<textarea name="description" placeholder="Description of the unique or details about the challenge"  cols="100" rows="3"></textarea>
		</label>
		<br />
		<br />
		<label>
			<input type="hidden" name="draft" value="0" />
			<input type="checkbox" name="draft" value="1" />
			<span>Draft</span>
		</label>
		<br />
		<br />
		<label>
			<span>Set</span><br />
			<input type="number" name="setnr" placeholder="2" required="required" />
		</label>
		<br />
		<label>
			<span>Week</span><br />
			<input type="number" name="week" placeholder="2" required="required" />
		</label>
		<br />
		<br />
		<label>
			<span>Species</span><br />
			<input type="text" name="species" value="" />
		</label>
		<br />
		<br />
		<label>
			<span>Background</span><br />
			<input type="text" name="background" value="" />
		</label>
		<br />
		<br />
		<label>
			<span>God(s)</span><br />
			<input type="text" name="gods" value="" />
		</label>
		<br />
		<br />
		<label>
			<span>Reddit thread</span><br />
			<input type="text" name="reddit" placeholder="https://www.reddit.com/r/dcss/comments/b19trd/crawl_cosplay_challenge_set_4_week_1_psyche_the/" />
		</label>
		<br />
		<br />
		<label>
			<span>Wiki URL</span><br />
			<input type="text" name="wiki" placeholder="http://crawl.chaosforge.org/Bai_Suzhen" />
		</label>
		<br />
		<br />
		<label>
			<span>Character icon image</span><br />
			<input type="text" name="icon" placeholder="https://i.imgur.com/kjsdasd.png" />
		</label>
		<br />
		<br />
		<label>
			<span>Conduct 1 Name</span><br />
			<input type="text" name="conduct_name_1" value="" />
		</label>
		<br />
		<label>
			<span>Conduct 1 Description</span><br />
			<textarea name="conduct_1" cols="100" rows="3"></textarea>
		</label>
		<br />
		<br />
		<label>
			<span>Conduct 2 Name</span><br />
			<input type="text" name="conduct_name_2" value="" />
		</label>
		<br />
		<br />
		<label>
			<span>Conduct 2 Description</span><br />
			<textarea name="conduct_2" cols="100" rows="3"></textarea>
		</label>
		<br />
		<br />
		<label>
			<span>Conduct 3 Name</span><br />
			<input type="text" name="conduct_name_3" value="" />
		</label>
		<br />
		<br />
		<label>
			<span>Conduct 3 Description</span><br />
			<textarea name="conduct_3" cols="100" rows="3"></textarea>
		</label>
		<br />
		<br />
		<label>
			<span>Bonus 1 Name</span><br />
			<input type="text" name="bonus_name_1" value="" />
		</label>
		<br />
		<br />
		<label>
			<span>Bonus 1 Description</span><br />
			<textarea name="bonus_1" cols="100" rows="3"></textarea>
		</label>
		<br />
		<br />
		<label>
			<span>Bonus 2 Name</span><br />
			<input type="text" name="bonus_name_2" value="" />
		</label>
		<br />
		<br />
		<label>
			<span>Bonus 2 Description</span><br />
			<textarea name="bonus_2" cols="100" rows="3"></textarea>
		</label>
		<br />
		<br />
		<label>
			<span>Special rule</span><br />
			<textarea name="special_rule" cols="100" rows="3"></textarea>
		</label>
		<br />
		<br />
		<input type="submit" name="Save">
	</fieldset>
</form>