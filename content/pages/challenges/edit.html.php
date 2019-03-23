<?php

use app\models\Challenge;

if (!$this->request->session('admin')) {
	$this->request->redirect('/');
}


$id = $_GET['id'] ?? false;

if ($id == false) {
	return $this->request->redirect('/');
}

$cha = Challenge::get($id);
if (!$cha) {
	return $this->request->redirect('/');
}


if ($data = $this->request->getPostData()) {
	$cha->save($data);
	return $this->request->redirect('/');
}
	
?>
<h2>Adding new Challenge</h2>
<form method="POST">
	<fieldset>
		<label>
			<span>Name</span><br />
			<input type="text" name="name" value="<?=$cha->name?>" />
		</label>
		<br />
		<label>
			<span>Set</span><br />
			<input type="number" name="setnr"  value="<?=$cha->setnr?>"/>
		</label>
		<br />
		<label>
			<span>Week</span><br />
			<input type="number" name="week"  value="<?=$cha->week?>" />
		</label>
		<br />
		<label>
			<span>Species</span><br />
			<input type="text" name="species"  value="<?=$cha->species?>" />
		</label>
		<br />
		<label>
			<span>Background</span><br />
			<input type="text" name="background"  value="<?=$cha->background?>" />
		</label>
		<br />
		<label>
			<span>God(s)</span><br />
			<input type="text" name="gods"  value="<?=$cha->gods?>" />
		</label>
		<br />
		<label>
			<span>Reddit thread</span><br />
			<input type="text" name="reddit" value="<?=$cha->reddit?>" />
		</label>
		<br />
		<label>
			<span>Character icon image</span><br />
			<input type="text" name="icon"  value="<?=$cha->icon?>" />
		</label>
		<br />
		<input type="submit" name="Save">
	</fieldset>
</form>