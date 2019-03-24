<?php
use app\models\{Player, Challenge, Submission};

if (!$this->request->session('admin')) {
    $this->request->redirect('/');
}

$id = $_GET['id'] ?? false;

if ($id == false) {
	return $this->request->redirect('/');
}

$sub = Submission::get($id);
if (!$sub || $sub->delete() == false) {
	return $this->request->redirect('/');
}

return $this->request->redirect('/submissions/moderate');

