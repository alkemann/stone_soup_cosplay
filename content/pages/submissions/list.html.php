<?php
use app\models\Submission;
?>
<h2>Submissions</h2>
<table>
	<thead>
		<tr>
			<th>Challenge</th>
			<th>Player</th>
			<th>Score **</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$submissions = Submission::find(['hs' => 1],['order' => '`id` DESC', 'with' => ['player', 'challenge']]);
		foreach ($submissions as $s) :
	?>
		
		<tr>
			<td><?=$s->challenge()->name?></td>
			<td><?=$s->player()->name?></td>
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
