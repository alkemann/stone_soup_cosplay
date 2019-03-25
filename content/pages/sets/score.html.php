<?php
use app\models\{Challenge, Submission, Player};

	$set = $_GET['set'] ?? 1;
	$scores = Player::scoreboardForSet($set);
	$challenges_in_set = Challenge::findAsArray(['setnr' => $set, 'draft' => 0], ['order' => '`week` ASC']);
	$weeks = sizeof($challenges_in_set);
?>
<h2>Set <?=$set?> scoreboard</h2>
<ol>
	<?php foreach ($challenges_in_set as $cha) : ?>
	<li value="<?=$cha->week?>"><b><?=$cha->name?></b> <span style="font-size: smaller">(<?=$cha->species?> <?=$cha->background?> <?=$cha->gods?>)</span></li>
	<?php endforeach; ?>
</ol>

<table>
	<thead>
		<tr>
			<!-- <th>id</th> -->
			<th>Player</th>
			<th>Total</th>
			<?php 
			foreach ($challenges_in_set as $c) {
				echo "<th>Week #{$c->week}</th>";
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