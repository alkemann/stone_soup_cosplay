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
			<!-- <th>id</th> -->
			<th>name</th>
			<th>score **</th>
			<!-- <th>stars</th> -->
		</tr>
	</thead>
	<tbody>
	<?php
		$subs = Submission::scoreboard($challenge->id);
		foreach ($subs as $s) :
	?>
		
		<tr>
			<!-- <td><?=$s->id?></td> -->
			<td><?=$s->name?></td>
			<td>
			<?php 
			echo $s->score . ' ';
			for ($i=0; $i < (int) $s->stars ; $i++) { 
				echo '*';
			} 
			for ($i=0; $i < 2 - (int) $s->stars ; $i++) { 
				echo '_';
			}
			?>
			</td>
		</tr>

	<?php
		endforeach;
	?>
	</tbody>
</table>
