<?php
use app\models\{Challenge, Submission};
?>
<h1>Challenges</h1>
<table>
	<thead>
		<tr>
			<!-- <th>id</th> -->
			<th>name</th>
			<th>Set</th>
			<th>Week</th>
			<th>Background</th>
			<th>Gods</th>
			<th>Species</th>
			<th>Submissions</th>
			<th>Scores</th>
			
		</tr>
	</thead>
	<tbody>
	<?php
		$challenges = Challenge::findBySets();
		foreach ($challenges as $c) :
	?>
		
		<tr>
			<!-- <td><?=$c->id?></td> -->
			<td><?=$c->name?></td>
			<td><?=$c->setnr?></td>
			<td><?=$c->week?></td>
			<td><?=$c->background?></td>
			<td><?=$c->gods?></td>
			<td><?=$c->species?></td>
			<td><?=$c->subs?></td>
			<td><a href="/challenges/scores?id=<?=$c->id?>">See scores</a></td>
		</tr>

	<?php
		endforeach;
	?>
	</tbody>
</table>
