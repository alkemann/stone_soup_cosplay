<?php
use app\models\{Challenge, Submission, Player};

$active = Challenge::active();
if ($active) :
	$set = $active->setnr;
	$scores = Player::scoreboardForSet($set);
	$challenges_in_set = Challenge::findAsArray(['setnr' => $set, 'draft' => 0], ['order' => '`week` ASC']);
	$weeks = sizeof($challenges_in_set);
?>
<h2><?php if ($active->icon): ?><img src="<?=e($active->icon)?>" class="head-icon" height="24px" /> <?php endif; ?><a href="<?=e($active->reddit)?>">Set <?=e($active->setnr)?> Week <?=e($active->week)?> : <?=e($active->name)?></a></h2>
<p style="font-style: italic; color: #777;"><?=e($active->description)?></p>
<table class="table_for_layout">
	<tr><th>Species</th><th>Background<th>Gods</th></tr>
	<tr><td><?=e($active->species)?></td><td><?=e($active->background)?><td><?=e($active->gods)?></td></tr>
</table>
<?php if ($active->special_rule) : ?>
<div class="special_rule"><p><?=e($active->special_rule)?></p></div>
<?php endif; ?>
<p>See current <a href="/challenges/details?id=<?=e($active->id)?>">challenge details here</a> or <a href="/submit">submit a run</a> or <a href="<?=e($active->reddit)?>">discuss it on reddit</a>.</p>
<hr />
<h2>Set <?=e($active->setnr)?> Scoreboard</h2>
<ol>
	<?php foreach ($challenges_in_set as $cha) : ?>
	<li value="<?=e($cha->week)?>"><?php if ($cha->icon):?><img src="<?=e($cha->icon)?>" style="height: 1em" /><?php endif; ?> <b><a href="/challenges/details?id=<?=e($cha->id)?>"><?=e($cha->name)?></a></b> <span style="font-size: smaller">(<?=e($cha->shortform())?>)</span></li>
	<?php endforeach; ?>
</ol>
<table class="bordered">
	<thead>
		<tr>
			<th>Player</th>
			<th>Total <span class="star">&#9733;</span></th>
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
			<td><a href="/player?id=<?=e($row['pid'])?>"><?=e($row['player'])?></a></td>
			<td><?=e($row['total'])?> <?=e($row['stars'])?><span class="star">&#9733;</span></td>
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
<?php else : // no active challengs ?>
<h3>No currently active challenges</h3>
<p>Maybe take a look at the <a href="/history">Challenge History</a>?</p>
<?php endif; // if active ?>
