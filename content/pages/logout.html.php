<?php
session_start();
session_destroy();
$this->request->redirect('/backoffice');
