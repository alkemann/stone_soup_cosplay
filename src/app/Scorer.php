<?php

namespace app;

class Scorer
{
	const M1 = 0;
	const M2 = 1;
	const M3 = 2;
	const M4 = 3;
	const M5 = 4;
	const M6 = 5;
	const M7 = 6;

	const C1 = 7;
	const C2 = 8;
	const C3 = 9;

	static $milestones = [
		'Reach XL3.',
		'Enter Lair, Orc, or Depths.',
		'Reach the bottom of D, Lair, or Orc.',
		'Collect your first rune.',
		'Find the entrance to Zot. (Just using magic mapping doesn\'t count.)',
		'Collect your third rune.',
		'Win the game.',
	];

	public static function score(array $milestones, array $optionals): int
	{
		$score = sizeof($milestones) * 5;
		$cap = (int) floor($score * 0.5);
		$conducts = sizeof($optionals) * 5;
		$score += min($cap, $conducts);
		return $score;
	}

}
