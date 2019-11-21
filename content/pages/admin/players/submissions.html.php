<?php

use app\models\{Player, Submission};

if (!$this->request->session('admin')) {
    $this->request->redirect('/');
}

$id = $_GET['id'] ?? false;

if ($id == false) {
    return $this->request->redirect('/');
}

$p = Player::get($id);
if (!$p) {
    return $this->request->redirect('/');
}
$submissions = $p->submissions();
$r = usort($submissions, function(Submission $a, Submission $b) : int {
	$ac = $a->challenge();
	$bc = $b->challenge();
	$as = (int) $ac->setnr;
	$bs = (int) $bc->setnr;
	$aw = (int) $ac->week;
	$bw = (int) $bc->week;
	if ($as == $bs) {
		return $bw <=> $aw;
	}
	return $bs <=> $as;
});

?>
<h2>Submissions by <?=$p->name?></h2>

<table class="bordered">
	<thead>
		<tr>
			<th>Challenge</th>
			<th>Score **</th>
			<th>Flags</th>
			<th>Morgue</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$r = 0;
		foreach ($submissions as $s) :
	?>

		<tr class="<?=$r++%2==0?'odd':'even'?>">
			<?php $cha = $s->challenge()?>
			<td><?=$cha->setnr?>.<?=$cha->week?> <?=$cha->name?></td>
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
			<td><?=$s->online==1?'ON':'OF'?> <?=$s->hs==1?'HS':'---'?> <?=$s->accepted==1?'AC':'---'?> <?=$s->comment?'CO':'---'?></td>
			<td>
				<?php if ($s->morgue_url) : ?>
				<a href="<?=$s->morgue_url?>" target="_blank">View Morgue</a>
				<?php endif; ?>
			</td>
			<td class="actions-td"><a href="/admin/submissions/edit?id=<?=$s->id?>">Edit</a></td>
		</tr>

	<?php
		endforeach;
	?>
	</tbody>
</table>
<span style="font-size: 10px;">Shows 50 latest approved submissions. Flags: <br />
HS:Current highscore for this challenge. <br />
AC: Accepted as official scored submission <br />
ON/OF: Played Online or Offline<br />
CO: Submission has comments
</span>