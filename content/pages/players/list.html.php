<?php
use app\models\Player;

if (!$this->request->session('admin')) {
	$this->request->redirect('/');
}

?>
<h2>Players</h2>
<table class="bordered">
	<thead>
		<tr>
			<!-- <th>id</th> -->
			<th>Name</th>
			<th>Challenges</th>
			<th>Score</th>
			<th>Stars</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$players = Player::scoreboard();
		$r = 0;
		foreach ($players as $player) :
	?>
		<tr class="<?=$r++%2==0?'odd':'even'?>">
			<!-- <td><?=$player->id?></td> -->
			<td><?=$player->name?> (<?=$player->reddit?>) </td>
			<td><?=$player->subs?></td>
			<td><?=$player->score?></td>
			<td><?=$player->stars?></td>
			<td><a href="/players/edit?id=<?=$player->id?>">Edit</a> <a href="/players/submissions?id=<?=$player->id?>">Submissions</a></td>
		</tr>

	<?php
		endforeach;
	?>
	</tbody>
</table>
