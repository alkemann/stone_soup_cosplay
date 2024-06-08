<?php $this->layout = 'ccc'; ?>
<?php
use app\models\{Challenge, Submission, Player};
?>
<h2>CCC Challenge History</h2>
<table class="challenges_list bordered">
	<tbody>
	<?php
		//$challenges = Challenge::findBySets(false, 150);
		$challenges = Challenge::findBySetsTEST(false, 150, 0, false, false, true);

		$i = 1; $set = 1; //$challenges[0]->setnr;
		foreach ($challenges as $c) :
			if ($c->setnr != $set) {
				$set = $c->setnr;
			?>
				<tr class="set-split"><th rowspan="2">&nbsp;</th><th colspan="6"><a href="/ccc/ccc_set_scoreboard?set=<?=$e($set)?>">Set <?=$e($set)?> <span style="font-size: 0.6em; color:#555;">(scoreboard)</span></a></th></tr>
				<tr><th>Name</th><th>#</th><th>Species</th><th>Background</th><th>Gods</th></tr>
			<?php
			}
	?>
		<tr class="<?=$i++%2==0?'odd':'even'?>">
			<td><a href="/ccc/challengedetails?id=<?=$e($c->id)?>"><img src="<?=$e($c->icon)?>" /></a></td>
			<td style="font-size: 1.25em;"><?=$e($c->setnr)?>.<?=$e($c->week)?> <a href="/ccc/challengedetails?id=<?=$e($c->id)?>"><?=$e($c->name)?></a></td>
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
