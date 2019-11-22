<?php

namespace app\environments;

use alkemann\h2l\{ Environment, Connections, data\PDO, Log, Request, Response, util\Chain};

$base = dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR ;

Environment::add([
    'debug' => true,
    'logs_path' => $base . 'resources' . DIRECTORY_SEPARATOR . 'logs' . DIRECTORY_SEPARATOR,
    'content_path' => $base . 'content' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR,
    'layout_path'  => $base . 'content' . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR
], Environment::ALL);

$env = getenv('ENV');
Environment::setEnvironment($env ? $env : Environment::LOCAL); // Check for valid value?

Log::handler('standard', [Log::class, 'std']);

$mysql_url = getenv('CLEARDB_DATABASE_URL');
if ($mysql_url) {
    $options = parse_url($mysql_url);
    $options['db'] = ltrim($options['path'], '/');
    Connections::add('default', function() use ($options) { return new PDO($options); });
}


// Middleware to add a log response for request and what response handler is chosen
$log_request_middleware = function(Request $request, Chain $chain): ?Response {
    Log::debug("== REQUEST: {$request->method()} '{$request->url()}' ==");
    $response = $chain->next($request);
    if ($response) Log::debug("== Response Handler: " . get_class($response));
    else Log::debug("== Null Response");
    return $response;
};

Environment::addMiddle($log_request_middleware, Environment::ALL);
