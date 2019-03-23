<?php
use app\models\Submission;
?>
<h1>Submissions</h1>
<table>
	<thead>
		<tr>
			<!-- <th>id</th> -->
			<th>player</th>
			<th>score **</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$submissions = Submission::find();
		foreach ($submissions as $s) :
	?>
		
		<tr>
			<!-- <td><?=$s->id?></td> -->
			<td><?=$s->player_id?></td>
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
