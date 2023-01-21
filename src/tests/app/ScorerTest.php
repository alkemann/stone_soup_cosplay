<?php

require '../../app/Scorer.php';

use app\Scorer;

function a($ex, $res, string $msg = null) {
	if ($ex === $res) {
		echo '.';
		return;
	}
	$msg = $msg ?? "! [$res] not equal to expected [$ex]";

	echo PHP_EOL . PHP_EOL;
	echo $msg;
	echo PHP_EOL . PHP_EOL;
}

echo PHP_EOL;

a(Scorer::score([], []), 0);
a(Scorer::score([0], []), 5);
a(Scorer::score([0], [1]), 7);
a(Scorer::score([0,1,2], []), 15);
a(Scorer::score([0,1], [7,8,9]), 15);
a(Scorer::score([0,1,2,3,4,5,6], [7,8,9]), 50);

echo PHP_EOL . PHP_EOL;
