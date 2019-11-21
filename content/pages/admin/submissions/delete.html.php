<?php
use app\models\{Player, Challenge, Submission};

$id = $_GET['id'] ?? false;

if ($id == false) {
	return $this->request->redirect('/');
}

$sub = Submission::get($id);
if (!$sub || $sub->delete() == false) {
	$this->request->session()->set('message', 'Something went wrong there. Sorry!');
	return $this->request->redirect('/admin/submissions/moderate');
}
$this->request->session()->set('message', 'Submission deleted!');
return $this->request->redirect('/admin/submissions/moderate');

