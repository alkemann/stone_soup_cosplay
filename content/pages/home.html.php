<?php
use app\models\{Challenge, Submission, Player};

$active = Challenge::active();
if ($active) :
	$set = $active->setnr;
	$scores = Player::scoreboardForSet($set);
	$challenges_in_set = Challenge::findAsArray(['setnr' => $set, 'draft' => 0], ['order' => '`week` ASC']);
	$weeks = sizeof($challenges_in_set);
?>
<h2><?php if ($active->icon): ?><img src="<?=$active->icon?>" class="head-icon" height="24px" /> <?php endif; ?><a href="<?=$cha->reddit?>">Set <?=$active->setnr?> Week <?=$active->week?> : <?=$active->name?></a></h2>
<p style="font-style: italic; color: #777;"><?=$active->description?></p>
<table class="table_for_layout">
	<tr><th>Species</th><th>Background<th>Gods</th></tr>
	<tr><td><?=$active->species?></td><td><?=$active->background?><td><?=$active->gods?></td></tr>
</table>
<p>See current <a href="/challenges/details?id=<?=$active->id?>">challenge details here</a> or <a href="/submissions/submit">Submit a run</a> or <a href="<?=$active->reddit?>">discuss it on reddit</a>.</p>
<hr />
<h2>Set <?=$active->setnr?> Scoreboard</h2>
<ol>
	<?php foreach ($challenges_in_set as $cha) : ?>
	<li value="<?=$cha->week?>"><?php if ($cha->icon):?><img src="<?=$cha->icon?>" style="height: 1em" /><?php endif; ?> <b><a href="/challenges/details?id=<?=$cha->id?>"><?=$cha->name?></a></b> <span style="font-size: smaller">(<?=$cha->species?> <?=$cha->background?> <?=$cha->gods?>)</span></li>
	<?php endforeach; ?>
</ol>
<table class="bordered">
	<thead>
		<tr>
			<!-- <th>id</th> -->
			<th>Player</th>
			<th>Total</th>
			<?php
			foreach ($challenges_in_set as $c) {
				echo '<th>';
				if ($cha->icon) echo '<img src="'.$c->icon.'" style="height: 1.5em" /> ';
				echo "#{$c->week}</th>";
			}
			?>
		</tr>
	</thead>
	<tbody><?php
	foreach ($scores as $i => $row) : ?>
		<tr class="<?=$i%2==0?'odd':'even'?>">
			<td><?=$row['player']?></td>
			<td><?=$row['total']?> <?=$row['stars']?>*</td>
			<?php

			foreach ($challenges_in_set as $c) {
				$week = $row['week'][$c->id];
				if ($week == null) {
					echo "<td>&nbsp;</td>";
					continue;
				}
				$out = '<td>';
				if (!empty($week['morgue'])) $out .= '<a href="'.$week['morgue'].'" target="_blank">';
				$out .= $week['score'];
				for ($i=0; $i < (int) $week['stars'] ; $i++) {
					$out .= '*';
				}
				for ($i=0; $i < 2 - (int) $week['stars'] ; $i++) {
					$out .= '&nbsp;';
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
<?php else : // no active challengs ?>
<h3>No currently active challenges</h3>
<p>Maybe take a look at the <a href="/history">Challenge History</a>?</p>
<?php endif; // if active ?>
