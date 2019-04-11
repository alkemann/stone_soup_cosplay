<?php

function e()
{
	$args = func_get_args();
	$ff = function($v) {
		return htmlspecialchars($v);
	};
	return join('|||', array_map($ff, $args));
}
