<?php
use app\models\{Player, Challenge, Submission};

$id = $_GET['id'] ?? false;
$is_admin = $this->request->session('admin');

if ($id == false) {
	return $this->request->redirect('/');
}

$challenge = Challenge::get($id);
if (!$challenge) {
	return $this->request->redirect('/');
}

?>
<h2>Scores for <?=$challenge->name?></h2>
<table class="bordered">
	<thead>
		<tr>
			<th>Player</th>
			<th>Score **</th>
			<th>Morgue</th>
			<?php if ($is_admin): ?>
			<th>Actions</th>
			<?php endif; ?>
		</tr>
	</thead>
	<tbody>
	<?php
		$subs = Submission::scoreboard($challenge->id);
		$r = 0;
		foreach ($subs as $s) :
	?>

		<tr class="<?=$r++%2==0?'odd':'even'?>">
			<td><?=$s->player()->name?></td>
			<td>
			<?php
			echo $s->score . ' ';
			for ($i=0; $i < (int) $s->stars ; $i++) {
				echo '*';
			}
			for ($i=0; $i < 2 - (int) $s->stars ; $i++) {
				echo '&nbsp;';
			}
			?>
			</td>
			<td><a href="<?=$s->morgue_url?>"><?=$s->morgue_url?></a></td>
			<?php if ($is_admin): ?>
			<td><a href="/submissions/edit?id=<?=$s->id?>">Edit</a></td>
			<?php endif; ?>

		</tr>

	<?php
		endforeach;
	?>
	</tbody>
</table>
