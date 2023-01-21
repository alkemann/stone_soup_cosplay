<?php

$this->request->session()->unset('message');
$this->request->redirect($_SERVER['HTTP_REFERER'] ?? '/');
