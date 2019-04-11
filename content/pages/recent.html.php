<?php
use app\models\Submission;

?>
<h2>Recent Submissions</h2>
<table class="bordered">
	<thead>
		<tr>
			<th>Challenge</th>
			<th>Player</th>
			<th>Score<span class="star">&#9733;&#9733;</span></th>
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
			<td><a href="/challenges/details?id=<?=e($s->challenge_id)?>"><?=e($cha->setnr)?>.<?=e($cha->week)?> <?=e($cha->name)?></td>
			<td><a href="/player?id=<?=e($s->player_id)?>"><?=e($s->player()->name)?></a></td>
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
		</tr>

	<?php
		endforeach;
	?>
	</tbody>
</table>
<span style="font-size: 10px;">Shows 50 latest approved submissions.</span>
<p>
<?php if ($page > 1) : ?><a href="/recent?page=<?=($page-1)?>">Previous Page</a> <?php endif; ?>
<?php if (sizeof($submissions) == $page_size) : ?><a href="/recent?page=<?=($page+1)?>">Next Page</a> <?php endif; ?>
</p>
