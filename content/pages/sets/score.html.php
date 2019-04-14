<?php
use app\models\{Challenge, Submission, Player};

	$set = $_GET['set'] ?? 1;
	$scores = Player::scoreboardForSet($set);
	$challenges_in_set = Challenge::findAsArray(['setnr' => $set, 'draft' => 0], ['order' => '`week` ASC']);
	$weeks = sizeof($challenges_in_set);
?>
<h2>Set <?=$set?> scoreboard</h2>
<table class="set-list">
<?php foreach ($challenges_in_set as $cha) : ?>
	<tr>
		<td>Week <?=$e($cha->week)?>.</td>
		<td><?php if ($cha->icon):?><img src="<?=$e($cha->icon)?>" style="height: 1em" /><?php endif; ?> <b><a href="/challenges/details?id=<?=$e($cha->id)?>"><?=$e($cha->name)?></a></b></td>
		<td><span style="font-size: smaller"><?=$e($cha->shortform())?></span></td>
	</tr>	
<?php endforeach; ?>
</table>

<table class="bordered">
	<thead>
		<tr>
			<th>Player</th>
			<th>Total<span class="star">&#9733;</span></th>
			<?php
			foreach ($challenges_in_set as $c) {
				echo "<th>{$c->week}.";
				if ($cha->icon) echo '<img src="'.$c->icon.'" style="height: 1.5em" /> ';
				echo "</th>";
			}
			?>
		</tr>
	</thead>
	<tbody><?php $r = 0;
	foreach ($scores as $row) : ?>
		<tr class="<?=$r++%2==0?'odd':'even'?>">
			<td><a href="/player?id=<?=$row['pid']?>"><?=$row['player']?></a></td>
			<td><?=$row['total']?> <?=$row['stars']?><span class="star">&#9733;</span></td>
			<?php 
			foreach ($row['week'] as $week) {
				if ($week == null) {
					echo "<td>&nbsp;</td>";
					continue;
				}
				$out = '<td>';
				if (!empty($week['morgue'])) $out .= '<a href="'.$week['morgue'].'" target="_blank">';
				$out .= $week['score'];
				for ($i=0; $i < (int) $week['stars'] ; $i++) {
					$out .= '<span class="star">&#9733;</span>';
				}
				if (!empty($week['morgue'])) $out .= '</a>';
				echo $out . "</td>";
			}
			for ($i=0; $i < $weeks - sizeof($row['week']); $i++) { 
				echo "<td>&nbsp;</td>";
			}
			?>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
