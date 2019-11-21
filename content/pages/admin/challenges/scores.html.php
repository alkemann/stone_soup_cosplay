<?php
use app\models\{Player, Challenge, Submission};

if (!$this->request->session('admin')) {
	$this->request->redirect('/');
}

$id = $_GET['id'] ?? false;

if ($id == false) {
	return $this->request->redirect('/');
}

$challenge = Challenge::get($id);
if (!$challenge) {
	return $this->request->redirect('/');
}

?>
<h2><a href="/admin/challenges/details?id=<?=$challenge->id?>"><img style="height: 1.5em;" src="<?=$challenge->icon?>" /></a> Scores for <a href="<?=$challenge->reddit?>"><?=$challenge->name?></a></h2>
<table class="bordered">
	<thead>
		<tr>
			<th>Player</th>
			<th>Score<span class="star">&#9733;&#9733;</span></th>
			<th>Actions</th>
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
			if (!empty($s->morgue_url)) echo '<a href="'.$s->morgue_url.'" target="_blank">';
			echo $s->score;
			for ($i=0; $i < (int) $s->stars ; $i++) {
				echo '<span class="star">&#9733;</span>';
			}
			if (!empty($s->morgue_url)) echo '</a>';
			?>
			</td>
			<td class="actions-td"><a href="/admin/submissions/edit?id=<?=$s->id?>">Edit</a></td>
		</tr>

	<?php
		endforeach;
	?>
	</tbody>
</table>
