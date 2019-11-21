<?php

use alkemann\h2l\{ Environment, Log };

if ($data = $this->request->getPostData()) {
	$key = Environment::get('admin_phrase');
	if (empty($key)) {
		Log::error("No Admin phrase configured");
		$this->request->redirect('/');
		return;
	}

	if ($data['passphrase'] === $key) {
		session_start();
		$_SESSION['admin'] = true;
		$this->request->redirect('/admin/submissions/moderate');
		return;
	} else {
		Log::warning("Admin phrase failed : [{$data['passphrase']}] != [{$key}]");
	}

}

?>
<h2>Admin Authentication</h2>

<form method="POST">
	<label><span>Passphrase</span><br />
		<input type="text" name="passphrase" placeholder="Do you remenber?" />
	</label>
	<br />
	<input type="submit" name="Submit" />
</form>