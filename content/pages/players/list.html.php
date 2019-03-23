<?php
use app\models\Player;
?>
<h1>Players</h1>
<table>
	<thead>
		<tr>
			<th>id</th><th>name</th><th>score</th><th>stars</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$players = Player::scoreboard();
		foreach ($players as $player) :
	?>
		
		<tr>
			<td><?=$player->id?></td>
			<td><?=$player->name?></td>
			<td><?=$player->score?></td>
			<td><?=$player->stars?></td>
		</tr>

	<?php
		endforeach;
	?>
	</tbody>
</table>
