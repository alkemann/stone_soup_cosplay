<?php $this->layout = 'cca';
use app\models\{Challenge, Submission, Player};

 	$set = 0;  //set #0 is reserver for the CCA's 12 challenges
	$scores = Player::scoreboardForSet($set);
	$challenges_in_set = Challenge::findAsArray(['setnr' => $set, 'draft' => 0], ['order' => '`week` ASC']);
	$weeks = sizeof($challenges_in_set);
?>
<h2 style="color:rgb(69, 136, 5);">Welcome green Crawler!</h2>

<div class="score-sidebar-cca">
<h3>Crawl Cosplay Academy Scoreboard</h3>
<br />
<table class="bordered">
	<tr>
		<th>Player</th>
		<th style="white-space:nowrap">Total <span class="star">&#9733;</span></th>
		<?php
		$made_seperator = false;
		foreach ($challenges_in_set as $c) {

			if ($c->bonus && !$made_seperator) {
				echo '<th rowspan="' . (sizeof($scores) + 1) . '">&nbsp;</th>';
				$made_seperator = true; // only make one seperator if multiple bonuses
			}
			echo '<th>' // . $e($c->week) . '. ';
			if ($c->icon) echo '<img src="'.$e($c->icon).'" style="height: 2.5em" /></a>';
			echo "</th>";
		}
		?>
	</tr>
	<?php
	foreach ($scores as $i => $row) : ?>
		<tr class="<?=$i%2==0?'odd':'even'?>">
			<td><a href="/player?id=<?=$e($row['pid'])?>"><?=$e($row['player'])?></a></td>
			<td><?=$e($row['total'])?> <?=$e($row['stars'])?><span class="star">&#9733;</span></td>
			<?php

			foreach ($challenges_in_set as $c) {
				$week = $row['week'][$c->id];
				if ($week == null) {
					echo "<td>&nbsp;</td>";
					continue;
				}
				$out = '<td>';
				if (!empty($week['morgue'])) $out .= '<a href="'. $e($week['morgue']) .'" target="_blank">';
				$out .= $week['score'];
				for ($i=0; $i < (int) $week['stars'] ; $i++) {
					$out .= '<span class="star">&#9733;</span>';
				}
				if (!empty($week['morgue'])) $out .= '</a>';
				echo $out . "</td>";
			}
			for ($i=0; $i < $weeks - sizeof($row['week']); $i++) {
				echo "<td>&nbsp;</td>";
			}
			?>
		</tr>
	<?php endforeach; ?>
</table>
</div>

<h3>Ready?</h3>
Want to know more before jumping in? Read the <a href="/academy/about_cca">About CCA</a> webpage.
<h3>Set...</h3>
If you have never won a game, your first Academy goal is to play one of the <b>"Melee Brutes"</b> listed below since they are considered to be the
<b><i>easier</i></b> combos of the easiest category.
<br>
Just click on one of the Uniques for the challenge's details listing the suggested 3 conducts and 2 bonuses.
<h4><b>Melee Brutes</b></h4>
  <p>Focus primarily on the Strength attribute, prefer to wear heavy armor, and typically spend most of their time in melee combat. Skills to focus on are your primary weapon, fighting, armour, shields, throwing, evocations, and invocations (if applicable).</p>
  <p> <a href="/academy/achallengedetails?id=926" title="Snorg, the Troll Berzerker (TrBe)"><img src="/img/Snorg.png" width="48" height="48"></a> 
      <a href="/academy/achallengedetails?id=927" title="Asterion, the Minotaur Fighter (MiFi)"><img src="/img/Asterion.png" width="48" height="48"></a> 
      <a href="/academy/achallengedetails?id=928" title="Wiglaf, the Mountain Dwarf Gladiator (MDGl)"><img src="/img/Wiglaf.png" width="48" height="48"></a></p>
<h4><b>Ranged Weapons</b></h4>
  <p>Focus primarily on the Dexterity attribute, prefer to wear medium armor, and can fight up close or at range. Skills to focus on are your primary weapon, fighting, dodging, stealth, hexes, evocations, and invocations (if applicable).</p>
  <p> <a href="/academy/achallengedetails?id=929" title="Joseph, the Halfling Hunter (HaHu)"><img src="/img/Joseph.png" width="48" height="48"></a>
      <a href="/academy/achallengedetails?id=930" title="Sonja, the Kobole Brigan (KoBr)"><img src="/img/Sonja.png" width="48" height="48"></a>
      <a href="/academy/achallengedetails?id=931" title="Vashnia, the Naga Hunter (NaHu)"><img src="/img/Vashnia.png" width="48" height="48"></a> </p>
<h4><b>Hybrid: Melee with some Magic</b></h4>
  <p>An assortment of less straightforward builds including shapeshifter and summoner/necromancer.</p>
  <p> <a href="/academy/achallengedetails?id=932" title="Grum, the Gnoll Summoner (GnSu)"><img src="/img/Grum.png" width="48" height="48"></a> 
      <a href="/academy/achallengedetails?id=933" title="Ilsuiw, the Merfolk Warper (MfWr)"><img src="/img/Ilsuiw_water.png" width="48" height="48"></a> 
      <a href="/academy/achallengedetails?id=934" title="Jory, the Vampire Enchanter (VpEn)"><img src="/img/Jory.png" width="48" height="48"></a></p>
<h4><b>Mages: Mostly Magic</b></h4>
  <p>Focus primarily on the Intelligence attribute, prefer to wear light armor (robes in particular), and often but not always fight at long range. Skills to focus on are roughly two magic school(s), spellcasting, fighting, stealth, evocations, and invocations (if applicable).</p>
  <p> <a href="/academy/achallengedetails?id=935" title="Tiamat, the Draconian Hedge Wizard (DrHW)"><img src="/img/Tiamat.gif" width="36" height="48"></a>
      <a href="/academy/achallengedetails?id=936" title="Fannar, the Deep Elf Ice Elementalist (DEIE)"><img src="/img/Fannar.png" width="48" height="48"></a> 
      <a href="/academy/achallengedetails?id=937" title="Jorgrun, the Mountain Dwarf Earth Elementalist (MDEE)"><img src="/img/Jorgrun.png" width="48" height="48"></a></p>
<h3>GO!</h3>
Play a game of your favourite DCSS Uniques and once you have completed one of your better games, <b>Submit your Morgue</b> on the challenge's detail page and a moderator will approve it.
Your best 2 runs for each challenge will be kept in the website's database...so submit as often as you like.
<br>
<h3>Need more help?...or have some questions</h3>
<p>Come chat with us on our <a href="https://discord.gg/ZQ4kk6n" target="_blank">Crawl Cosplay Discord server</a> in the <b>#academy_cca</b> text channel.
<br>
