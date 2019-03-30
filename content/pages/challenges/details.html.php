<?php

use app\models\Challenge;

if (!$this->request->session('admin')) {
	$this->request->redirect('/');
}


$id = $_GET['id'] ?? false;

if ($id == false) {
	return $this->request->redirect('/');
}

$cha = Challenge::get($id);
if (!$cha) {
	return $this->request->redirect('/');
}
?>
<div class="challenge">

<h2>Set <?=$cha->setnr?> Week <?=$cha->week?> : <?=$cha->name?></h2>
<?php if ($cha->icon) : ?><img src="https://i.imgur.com/edVQdwC.png" class="detail" /><?php endif; ?>

<dl>
	<dt>Species</dt><dd><?=$cha->species?></dd>
	<dt>Background</dt><dd><?=$cha->background?></dd>
	<dt>Gods</dt><dd><?=$cha->gods?></dd>
</dl> 
 
<h3>Cosplay conduct points</h3>
<p>+5 points each, to a maximum of half your score from milestones, rounded down. (So if you achieve 4 milestones (20 points) you can earn up to 10 points from conduct bonuses.) Please indicate which conducts you qualify for when you post your morgue. Small mistakes in following conducts will usually be forgiven.</p>
<dl>
	<dt><?=$cha->conduct_name_1?></dt><dd><?=$cha->conduct_1?></dd>
	<dt><?=$cha->conduct_name_2?></dt><dd><?=$cha->conduct_2?></dd>
	<dt><?=$cha->conduct_name_3?></dt><dd><?=$cha->conduct_3?></dd>
</dl>

<h3>Bonus challenges</h3>
<p>Each worth one star, similar to banners in Crawl tournaments. Please indicate challenges that you qualify for. Small mistakes will usually be forgiven.</p>
<dl>
	<dt><?=$cha->bonus_name_1?></dt><dd><?=$cha->bonus_1?></dd>
	<dt><?=$cha->bonus_name_2?></dt><dd><?=$cha->bonus_2?></dd>
</dl>


<h3>Milestones</h3>
<p>The main way to score points. +5 points each, and can be done in any order. (You don't need to tell me which milestones you achieve.)</p>
<ul>
	<li>Reach XL3.
	<li>Enter Lair, Orc, or Depths.
	<li>Reach the bottom of D, Lair, or Orc.
	<li>Collect your first rune.
	<li>Find the entrance to Zot. (Just using magic mapping doesn't count.)
	<li>Collect your third rune.
	<li>Win the game.
</ul>

<p>The Species, Background, and God choices are all mandatory. You must be worshipping one of the gods listed above before entering Lair, Orc, or Depths, unless this isn't possible in which case you must worship them as soon as you can. Don't do anything to lose your religion, and don't use faded altars.</p>

</div>
