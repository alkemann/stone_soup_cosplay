<?php
define('FIRST_APP_CONSTANT', 'FIRST_APP_CONSTANT'); // For debug purposes
// ************
$DS = DIRECTORY_SEPARATOR;
$ROOT = realpath(dirname(dirname(__FILE__)));
$VENDOR_PATH = $ROOT . $DS . 'vendor' . $DS;
$CONFIG_PATH = $ROOT . $DS . 'resources' . $DS . 'configs' . $DS;
require_once($VENDOR_PATH . 'autoload.php');

// Default error handling
require_once($CONFIG_PATH . 'error_handlers.php');
set_exception_handler('app\handleError');
set_error_handler('app\handleWarning', E_WARNING);

// Include configuration files
require_once($CONFIG_PATH . 'environments.php');
require_once($CONFIG_PATH . 'routes.php');
require_once($CONFIG_PATH . 'helpers.php');
// ***********

use alkemann\h2l\{
    Dispatch, Environment, Log, util\Http
};

$dispatch = new Dispatch($_REQUEST, $_SERVER, $_GET, $_POST);
$dispatch->setRouteFromRouter();

foreach (Environment::middlewares() as $middle) {
	$dispatch->registerMiddle($middle);
}

$response = $dispatch->response();
if ($response) {
    echo $response->render();
    $code = $response->code();
    $msg = Http::httpCodeToMessage($code);
    Log::info("== RESPONSE: {$code} {$msg} : {$response->contentType()} ==");
} else {
    Log::error("== NULL RESPONSE ==");
}
