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
		<label>
			<span>Draft</span><br />
			<input type="hidden" name="draft" value="0" />
			<input type="checkbox" name="draft" value="1" />
		</label>
		<br />
		<label>
			<span>Set</span><br />
			<input type="number" name="setnr" placeholder="2" />
		</label>
		<br />
		<label>
			<span>Week</span><br />
			<input type="number" name="week" placeholder="2" />
		</label>
		<br />
		<label>
			<span>Species</span><br />
			<input type="text" name="species" value="" />
		</label>
		<br />
		<label>
			<span>Background</span><br />
			<input type="text" name="background" value="" />
		</label>
		<br />
		<label>
			<span>God(s)</span><br />
			<input type="text" name="gods" value="" />
		</label>
		<br />
		<label>
			<span>Reddit thread</span><br />
			<input type="text" name="reddit" placeholder="https://www.reddit.com/r/dcss/comments/b19trd/crawl_cosplay_challenge_set_4_week_1_psyche_the/" />
		</label>
		<br />
		<label>
			<span>Character icon image</span><br />
			<input type="text" name="icon" placeholder="https://i.imgur.com/kjsdasd.png" />
		</label>
		<br />
		<input type="submit" name="Save">
	</fieldset>
</form>