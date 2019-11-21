<?php
use app\models\Submission;

if (!$this->request->session('admin')) {
	$this->request->redirect('/');
}

?>
<h2>Latest Submissions</h2>
<table class="bordered">
	<thead>
		<tr>
			<th>Challenge</th>
			<th>Player</th>
			<th>Score<span class="star">&#9733;&#9733;</span></th>
			<th>Flags</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$page_size = 20;
		$page = $_GET['page'] ?? 1;
		$offset = (int) ($page - 1) * $page_size;

		$submissions = Submission::findAsArray(
			['accepted' => 1],
			['order' => '`id` DESC', 'with' => ['player', 'challenge'], 'limit' => $page_size, 'offset' => $offset]
		);
		$r = 0;
		foreach ($submissions as $s) :
	?>

		<tr class="<?=$r++%2==0?'odd':'even'?>">
			<?php $cha = $s->challenge()?>
			<td><?=$cha->setnr?>.<?=$cha->week?> <?=$cha->name?></td>
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
			<td><?=$s->online==1?'ON':'OF'?> <?=$s->hs==1?'HS':'---'?> <?=$s->accepted==1?'AC':'---'?> <?=$s->comment?'CO':'---'?></td>
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
<p>
<?php if ($page > 1) : ?><a href="/admin/submissions/list?page=<?=($page-1)?>">Previous Page</a> <?php endif; ?>
<?php if (sizeof($submissions) == $page_size) : ?><a href="/admin/submissions/list?page=<?=($page+1)?>">Next Page</a> <?php endif; ?>
</p>
