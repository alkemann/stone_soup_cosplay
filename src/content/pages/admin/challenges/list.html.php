<?php
use app\models\Challenge;

?>
<h2>Challenges</h2>
<table class="challenges_list bordered">
	<thead>
		<tr>
			<th>S.W</th>
			<th>Icon</th>
			<th>Name</th>
			<th>#</th>
			<th>Actions</th>

		</tr>
	</thead>
	<tbody>
	<?php
		// Supports limit and offset as first and second params for pagination, first param includes drafts
		$challenges = Challenge::findBySets(true, 100);
		$r = 0;
		foreach ($challenges as $c) :
	?>

		<tr class="<?=$r++%2==0?'odd':'even'?> <?=($c->active)?'active':''?>">
			<td><?=$c->setnr?>.<?=$c->week?></td>
			<td><a href="/challenges/details?id=<?=$c->id?>"><img src="<?=$c->icon?>" /></a></td>
			<td class="actions-td">
				<a href="/challenges/details?id=<?=$c->id?>"><?=$c->name?></a>
				<br />(<?=$c->shortform()?>)
			</td>
			<td><?=$c->subs?></td>
			<td class="actions-td"><a href="/admin/challenges/scores?id=<?=$c->id?>">Scores</a> | <a href="/admin/challenges/edit?id=<?=$c->id?>">Edit</a> | <a href="<?=$c->reddit?>">Reddit</a></td>
		</tr>

	<?php
		endforeach;
	?>
	</tbody>
</table>
