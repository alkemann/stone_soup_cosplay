<?php
use app\models\Submission;

?>
<h2>Submissions needing moderation</h2>
<?php
	$page_size = 20;
	$page = $_GET['page'] ?? 1;
	$offset = (int) ($page - 1) * $page_size;

	$submissions = Submission::findAsArray(
		['accepted' => 0],
		['order' => '`id` DESC', 'with' => ['player', 'challenge'], 'limit' => $page_size, 'offset' => $offset]);

	if (sizeof($submissions) == 0) {
		echo '<p>Nothing to moderate</p>';
		return;
	}
?>
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
	$r = 0;
	foreach ($submissions as $s) :
		$c = $s->challenge();
	?>
		<tr class="<?=$r++%2==0?'odd':'even'?>">
			<td><?=$c->setnr?>.<?=$c->week?> <?=$c->name?></td>
			<td><?=$s->player_id ? $s->player()->name : 'NEW PLAYER'?></td>
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
			<td><?=$s->online==1?'ON':'OF'?> <?=$s->accepted==1?'AC':'---'?> <?=$s->comment?'CO':'---'?></td>
			<td class="actions-td">
				<a href="/admin/submissions/edit?id=<?=$s->id?>">Edit</a> | <a href="/admin/submissions/delete?id=<?=$s->id?>">Remove</a>
			</td>
		</tr>

	<?php
		endforeach;
	?>
	</tbody>
</table>
<span style="font-size: 10px;">Flags: <br />
ON/OF: Played Online or Offline<br />
AC: Accepted as official scored submission <br />
CO: Submission has comments
</span>
<p>
<?php if ($page > 1) : ?><a href="/admin/submissions/list?page=<?=($page-1)?>">Previous Page</a> <?php endif; ?>
<?php if (sizeof($submissions) == $page_size) : ?><a href="/admin/submissions/list?page=<?=($page+1)?>">Next Page</a> <?php endif; ?>
</p>
