<?php

namespace app\helpers;

class Escaper
{
	public static function export(): array
	{
		return ['e' => 'app\helpers\Escaper::escape', 'em' => 'app\helpers\Escaper::escapeWithMarkdown'];
	}


	public static function escape(?string $s): string
	{
		return is_string($s) ? htmlspecialchars($s) : '';
	}

	public static function escapeWithMarkdown(string $s): string
	{
		$Parsedown = new \Parsedown();
		$Parsedown->setMarkupEscaped(true);
		$Parsedown->setSafeMode(true);
		return $Parsedown->text($s);
	}
}
