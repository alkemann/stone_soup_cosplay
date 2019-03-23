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
			<th>Morgue</th>
			<th>Flags</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$submissions = Submission::find([],['order' => '`id` DESC', 'with' => ['player', 'challenge']]);
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
			<td><a href="<?=$s->morgue_url?>"><?=$s->morgue_url?></a></td>
			<td><?=$s->hs==1?'HS':'---'?> <?=$s->accepted==1?'AC':'---'?></td>
			<td><a href="/submissions/edit?id=<?=$s->id?>">Edit</a></td>
		</tr>

	<?php
		endforeach;
	?>
	</tbody>
</table>
<span style="font-size: 10px;">Flags: HS:Current highscore for this challenge. AC: Accepted as official scored submission</span>