<?php

use app\models\Challenge;

$id = $_GET['id'] ?? false;
if ($id == false) {
	return $this->request->redirect('/');
}

$cha = Challenge::get($id);
if (!$cha) {
	return $this->request->redirect('/');
}

$is_admin = $this->request->session('admin');
if ($cha->draft && !$is_admin) {
	return $this->request->redirect('/');
}

$name = $e($cha->name);
$this->setData("page_title", "{$name} - Crawl Cosplay Challenge")

?>
<div class="challenge">

<h2><a href="<?=$e($cha->reddit)?>">Set <?=$e($cha->setnr)?> Week <?=$e($cha->week)?> : <?=$e($cha->name)?></a></h2>
<p style="font-style: italic; color: #777;"><?=$e($cha->description)?></p>
<p>
	<?php if ($cha->active) : ?>
	<a href="/submit">Submit a run</a> | 
	<?php else: ?>
	<a href="/submit?id=<?=$cha->id?>">Submit a late run</a> | 
	<?php endif;?>
	<a href="<?=$e($cha->reddit)?>">Reddit</a><?php if ($cha->wiki): ?> | 
	<a href="<?=$e($cha->wiki)?>">Wiki page</a><?php endif; ?>
</p>

<?php if ($cha->icon) : ?><img src="<?=$e($cha->icon)?>" class="detail" /><?php endif; ?>
<table class="table_for_layout">
	<tr><th>Species</th><th>Background<th>Gods</th></tr>
	<tr><td><?=$e($cha->species)?></td><td><?=$e($cha->background)?><td><?=$e($cha->gods)?></td></tr>
</table>
<p class="info">The Species, Background, and God choices are all mandatory. You must be worshipping one of the gods listed above before entering Lair, Orc, or Depths, unless this isn't possible in which case you must worship them as soon as you can. Don't use faded altars (except in challenges where you can choose any god), and don't do anything to lose your religion unless otherwise specified.</p>

<?php if ($cha->special_rule) : ?>
<h3>Special Rule</h3>
<div class="special_rule"><p><?=$em($cha->special_rule)?></p></div>
<?php endif; ?>

<h3>Cosplay conduct points</h3>
<dl>
	<dt><?=$e($cha->conduct_name_1)?></dt><dd><?=$em($cha->conduct_1)?></dd>
	<dt><?=$e($cha->conduct_name_2)?></dt><dd><?=$em($cha->conduct_2)?></dd>
	<dt><?=$e($cha->conduct_name_3)?></dt><dd><?=$em($cha->conduct_3)?></dd>
</dl>
<p class="info">Conducts are worth +5 points each, to a maximum of half your score from milestones, rounded down. (So if you achieve 4 milestones (20 points) you can earn up to 10 points from conduct bonuses.) Please indicate which conducts you qualify for when you post your morgue. Small mistakes in following conducts will usually be forgiven.</p>

<h3>Bonus challenges</h3>
<dl>
	<dt><?=$e($cha->bonus_name_1)?></dt><dd><?=$em($cha->bonus_1)?></dd>
	<dt><?=$e($cha->bonus_name_2)?></dt><dd><?=$em($cha->bonus_2)?></dd>
</dl>
<p class="info">Bonus challenges are worth one star each, similar to banners in Crawl tournaments. Please indicate challenges that you qualify for. Small mistakes will usually be forgiven.</p>

<h3>Milestones</h3>
<ul>
	<li>Reach XL3.
	<li>Enter Lair, Orc, or Depths.
	<li>Reach the bottom of D, Lair, or Orc.
	<li>Collect your first rune.
	<li>Find the entrance to Zot. (Just using magic mapping doesn't count.)
	<li>Collect your third rune.
	<li>Win the game.
</ul>
<p class="info">The main way to score points. +5 points each, and can be done in any order. (You don't need to tell me which milestones you achieve.)</p>


</div>
