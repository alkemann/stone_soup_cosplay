<?php
use app\models\{Challenge, Submission, Player};


?>
<h2>Challenge History</h2>
<div style="font-size: smaller">Hstioric scoreboards: <?php
$historic_sets = Challenge::historicSets();
foreach ($historic_sets as $s => $count) {
	echo '<a href="/sets/score?set='.$s.'" >Set '.$s. ' ('.$count.')</a> ';
}
?></div>
<br />
<table class="challenges_list bordered">
	<thead>
		<tr>
			<th>&nbsp;</th>
			<th>Name</th>
			<th>Set</th>
			<th>Week</th>
			<th>Background</th>
			<th>Gods</th>
			<th>Species</th>
			<th>Submissions</th>
			<th>Menu</th>
			
		</tr>
	</thead>
	<tbody>
	<?php
		$challenges = Challenge::findBySets(['draft' => 0]);
		$i = 0;
		foreach ($challenges as $c) :
	?>
		<tr class="<?=$i++%2==0?'odd':'even'?>">
			<td><?php if ($c->icon):?><img src="<?=$c->icon?>" /><?php endif; ?> </td>
			<td><?=$c->name?></td>
			<td><?=$c->setnr?></td>
			<td><?=$c->week?></td>
			<td><?=$c->background?></td>
			<td><?=$c->gods?></td>
			<td><?=$c->species?></td>
			<td><?=$c->subs?></td>
			<td><a href="/challenges/scores?id=<?=$c->id?>">Scores</a> <a href="<?=$c->reddit?>">Reddit</a> <a href="/challenges/details?id=<?=$c->id?>">Details</a></td>
		</tr>
	<?php
		endforeach;
	?>
	</tbody>
</table>
