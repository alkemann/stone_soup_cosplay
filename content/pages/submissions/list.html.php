<?php
use app\models\Submission;

if (!$this->request->session('admin')) {
	$this->request->redirect('/');
}

?>
<h2>Submissions</h2>
<table>
	<thead>
		<tr>
			<th>Challenge</th>
			<th>Player</th>
			<th>Score **</th>
			<th>Flags</th>
			<th>Morgue</th>
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
			<td><?=$s->online==1?'ON':'OF'?> <?=$s->accepted==1?'AC':'---'?> <?=$s->accepted==1?'AC':'---'?></td>
			<td>
				<a href="/submissions/edit?id=<?=$s->id?>">Edit</a>
				<?php if ($s->morgue_url) : ?>
				<a href="<?=$s->morgue_url?>">View Morgue</a> 
				<?php elseif ($s->morgue_text) : ?>
				<a href="/submissions/morgue?id=<?=$s->id?>">View Morgue</a>
				<?php endif; ?>
			</td> 
		</tr>

	<?php
		endforeach;
	?>
	</tbody>
</table>
<span style="font-size: 10px;">Flags: <br />
HS:Current highscore for this challenge. <br />
AC: Accepted as official scored submission <br />
ON/OF: Played Online or Offline
</span>