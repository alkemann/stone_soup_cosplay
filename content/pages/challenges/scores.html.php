<?php
use app\models\{Player, Challenge, Submission};

$id = $_GET['id'] ?? false;

if ($id == false) {
	return $this->request->redirect('/');
}

$challenge = Challenge::get($id);
if (!$challenge) {
	return $this->request->redirect('/');
}

?>
<h1>Scores for <?=$challenge->name?></h1>
<table>
	<thead>
		<tr>
			<th>id</th><th>name</th><th>score</th><th>stars</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$subs = Submission::scoreboard($challenge->id);
		foreach ($subs as $s) :
	?>
		
		<tr>
			<td><?=$s->id?></td>
			<td><?=$s->name?></td>
			<td><?=$s->score?></td>
			<td><?=$s->stars?></td>
		</tr>

	<?php
		endforeach;
	?>
	</tbody>
</table>
