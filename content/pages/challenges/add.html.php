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
			<span>Character icon image</span><br />
			<input type="text" name="icon" placeholder="https://i.imgur.com/kjsdasd.png" />
		</label>
		<br />
		<input type="submit" name="Save">
	</fieldset>
</form>