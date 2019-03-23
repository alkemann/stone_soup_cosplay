<?php
if (!$this->request->session('admin')) {
	$this->request->redirect('/');
}

if ($data = $this->request->getPostData()) {
	$challenge = new app\models\Challenge($this->request->getPostData());
	$challenge->save();
}
	
?>
<form method="POST">
	<fieldset>
		<label>
			<span>Name</span><br />
			<input type="text" name="name" value="Bai Suzhen, Madame White Snake" />
		</label>
		<br />
		<label>
			<span>Set</span><br />
			<input type="number" name="setnr" value="2" />
		</label>
		<br />
		<label>
			<span>Week</span><br />
			<input type="number" name="week" value="1" />
		</label>
		<br />
		<label>
			<span>Species</span><br />
			<input type="text" name="species" value="Draconian" />
		</label>
		<br />
		<label>
			<span>Background</span><br />
			<input type="text" name="background" value="Gladiator" />
		</label>
		<br />
		<label>
			<span>God(s)</span><br />
			<input type="text" name="gods" value="Qaz or Fedhas" />
		</label>
		<br />
		<input type="submit" name="Save">
	</fieldset>
</form>