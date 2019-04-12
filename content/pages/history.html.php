<?php
use app\models\{Challenge, Submission, Player};
?>
<h2>Challenge History</h2>
<table class="challenges_list bordered">
	<tbody>
	<?php
		$challenges = Challenge::findBySets(false);
		$i = 0; $set = 0; //$challenges[0]->setnr;
		foreach ($challenges as $c) :
			if ($c->setnr != $set) {
				$set = $c->setnr; ?>
				
				<tr class="set-split"><th rowspan="2">&nbsp;</th><th colspan="6"><a href="/sets/score?set=<?=$e($set)?>">Set <?=$e($set)?></a></th></tr>
				<tr><th>Name</th><th>#</th><th>Species</th><th>Background</th><th>Gods</th></tr>
				<?php
				continue;
			}
	?>
		<tr class="<?=$i++%2==0?'odd':'even'?>">
			<td><a href="/challenges/details?id=<?=$e($c->id)?>"><img src="<?=$e($c->icon)?>" /></a></td>
			<td><?=$e($c->setnr)?>.<?=$e($c->week)?> <a href="<?=$e($c->reddit)?>"><?=$e($c->name)?></a></td>
			<td><b><?=$e($c->subs)?></b></td>
			<td><?=$e($c->species)?></td>
			<td><?=$e($c->background)?></td>
			<td><?=$e($c->gods)?></td>
		</tr>
	<?php
		endforeach;
	?>
	</tbody>
</table>
