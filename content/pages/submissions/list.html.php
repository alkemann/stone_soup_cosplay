<?php
use app\models\Submission;
?>
<h1>Submissions</h1>
<table>
	<thead>
		<tr>
			<th>id</th>
			<th>player</th>
			<th>score</th>
			<th>stars</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$submissions = Submission::find();
		foreach ($submissions as $s) :
	?>
		
		<tr>
			<td><?=$s->id?></td>
			<td><?=$s->player_id?></td>
			<td><?=$s->score?></td>
			<td><?=$s->stars?></td>
		</tr>

	<?php
		endforeach;
	?>
	</tbody>
</table>
