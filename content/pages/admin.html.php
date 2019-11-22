<?php

if ($data = $this->request->getPostData()) {

	if ($data['passphrase'] == 'think of the sun') {
		session_start();
		$_SESSION['admin'] = true;
		$this->request->redirect('/submissions/moderate');
	}

}

alkemann\h2l\Log::debug(getenv("ADMIN"));

?>
<h2>Admin Authentication</h2>

<form method="POST">
	<label><span>Passphrase</span><br />
		<input type="text" name="passphrase" placeholder="Do you remenber?" />
	</label>
	<br />
	<input type="submit" name="Submit" />
</form>