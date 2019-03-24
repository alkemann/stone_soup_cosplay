<?php
use app\models\{Challenge, Submission, Player};

	$set = $_GET['set'] ?? 1;
	$scores = Player::scoreboardForSet($set);
	$challenges_in_set = Challenge::findAsArray(['setnr' => $set]);
	$weeks = sizeof($challenges_in_set);
?>
<h2>Set <?=$set?> scoreboard</h2>

<table>
	<thead>
		<tr>
			<!-- <th>id</th> -->
			<th>Player</th>
			<th>Total</th>
			<?php 
			for ($w=1; $w <= $weeks; $w++) { 
				echo "<th>Week #{$w}</th>";
			}
			?>
		</tr>
	</thead>
	<tbody><?php 
	foreach ($scores as $row) : ?>
		<tr>
			<td><?=$row['player']?></td>
			<td><?=$row['total']?> <?=$row['stars']?>*</td>
			<?php 
			foreach ($row['week'] as $week) {
				if ($week == null) {
					echo "<td>&nbsp;</td>";
					continue;
				}
				$sc = $week['score']; $st = "";
				for ($i=0; $i < (int) $week['stars'] ; $i++) { 
					$st .= '*';
				} 
				for ($i=0; $i < 2 - (int) $week['stars'] ; $i++) { 
					$st .= '_';
				}
				echo "<td>{$sc} {$st}</td>";
			}
			for ($i=0; $i < $weeks - sizeof($row['week']); $i++) { 
				echo "<td>&nbsp;</td>";
			}
			?>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>