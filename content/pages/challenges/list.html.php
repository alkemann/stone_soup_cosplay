<?php
use app\models\Challenge;

if (!$this->request->session('admin')) {
	$this->request->redirect('/');
}

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
		$challenges = Challenge::findBySets(true); 
		$r = 0;
		foreach ($challenges as $c) :
	?>
		
		<tr class="<?=$r++%2==0?'odd':'even'?> <?=($c->active)?'active':''?>">
			<td><?=$c->setnr?>.<?=$c->week?></td>
			<td><a href="/challenges/details?id=<?=$c->id?>"><img src="<?=$c->icon?>" /></a></td>
			<td class="actions-td">
				<a href="<?=$c->reddit?>"><?=$c->name?></a>
				<br />(<?=$c->shortform()?>)
				<?php if ($c->special_rule): ?><br /><i>(<?=$c->special_rule?>)</i><?php endif; ?>
			</td>
			<td><?=$c->subs?></td>
			<td class="actions-td"><a href="/challenges/scores?id=<?=$c->id?>">Scores</a> | <a href="/challenges/edit?id=<?=$c->id?>">Edit</a> | <a href="/challenges/details?id=<?=$c->id?>">Details</a></td>
		</tr>

	<?php
		endforeach;
	?>
	</tbody>
</table>
