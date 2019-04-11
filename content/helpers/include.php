<?php


function e()
{
	$args = func_get_args();
	$ff = function($v) {
		return htmlspecialchars($v);
	};
	return join('', array_map($ff, $args));
}

function em($s)
{
	$Parsedown = new Parsedown();
	$Parsedown->setMarkupEscaped(true);
	$Parsedown->setSafeMode(true);
	return $Parsedown->text($s);
}