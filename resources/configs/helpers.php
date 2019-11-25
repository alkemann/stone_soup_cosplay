<?php

use alkemann\h2l\{ Environment, Request, Response, util\Chain};
use app\helpers\Escaper;

$register_helpers = function(Request $request, Chain $chain): ?Response {
	return $chain->next($request->withPageVars($request->pageVars() + Escaper::export()));
};

Environment::addMiddle($register_helpers, Environment::ALL);
