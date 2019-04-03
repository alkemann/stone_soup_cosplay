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
				
				<tr class="set-split"><th rowspan="2">&nbsp;</th><th colspan="6"><a href="/sets/score?set=<?=$set?>">Set <?=$set?></a></th></tr>
				<tr><th>Name</th><th>#</th><th>Background</th><th>Gods</th><th>Species</th></tr>
				<?php
				continue;
			}
	?>
		<tr class="<?=$i++%2==0?'odd':'even'?>">
			<td><a href="/challenges/details?id=<?=$c->id?>"><img src="<?=$c->icon?>" /></a></td>
			<td><?=$c->setnr?>.<?=$c->week?> <a href="<?=$c->reddit?>"><?=$c->name?></a></td>
			<td><b><?=$c->subs?></b></td>
			<td><?=$c->background?></td>
			<td><?=$c->gods?></td>
			<td><?=$c->species?></td>
		</tr>
	<?php
		endforeach;
	?>
	</tbody>
</table>
