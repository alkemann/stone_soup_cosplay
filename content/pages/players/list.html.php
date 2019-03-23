<?php
use app\models\Player;
?>
<h2>Players</h2>
<table>
	<thead>
		<tr>
			<!-- <th>id</th> -->
			<th>Name</th>
			<th>Challenges</th>
			<th>Score</th>
			<th>Stars</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$players = Player::scoreboard();
		foreach ($players as $player) :
	?>
		
		<tr>
			<!-- <td><?=$player->id?></td> -->
			<td><?=$player->name?></td>
			<td><?=$player->subs?></td>
			<td><?=$player->score?></td>
			<td><?=$player->stars?></td>
		</tr>

	<?php
		endforeach;
	?>
	</tbody>
</table>
