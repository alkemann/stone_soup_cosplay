<?php $this->layout = 'ccc'; ?>
<?php 
    $dir_path = "img/uniques";
    $files = scandir($dir_path);
    $count = count($files);
    $index1 = rand(2, ($count-1));
    $index2 = rand(2, ($count-1));
    $index3 = rand(2, ($count-1));
    $index4 = rand(2, ($count-1));
    $filename1 = $files[$index1];
    $filename2 = $files[$index2];
    $filename3 = $files[$index3];
    $filename4 = $files[$index4];

    echo '<h2>About weekly Crawl Cosplay Challenges (CCC) series</h2>';
    echo '<img src="/'.$dir_path."/".$filename1.'" alt="'.$filename1.'" width="72" height="72" style="float:right">';
?>

<p>The Crawl Cosplay Challenge is a weekly series for <a href="http://crawl.develz.org/" target="_blank">Dungeon Crawl Stone Soup</a>, using crawl's uniques as the basis for challenges. The goal is not to emulate the unique's behaviour exactly, but to get a good starting point on playing games with interesting requirements. Challenges are run in five-week 'sets' with the occasional bonus round, and are suitable for players of all skill levels — the Challenge is about personal achievement rather than competition.</p>

<p>Each week will feature a character for you to play, with one or more options for starting species and background, as well as which god(s) you must worship. These choices are all mandatory. Unless otherwise specified, you must worship one of the options for gods before entering any multi-level branch besides the dungeon (e.g. Lair, Orc, Depths), and you can't do anything to lose your religion, including abandoning your god.</p>
<?php
    echo '<img src="/'.$dir_path."/".$filename2.'" alt="'.$filename2.'" width="72" height="72" style="float:right">'; 
?>
<p>New challenges are posted Mondays. Challenges will not run when official DCSS tournaments or other large tournaments/challenges (e.g <a href="http://csclub.uwaterloo.ca/~ebering/crawl/csdc/index.html" target="_blank">CSDC</a>) are going on. 

<p>Challenges can be played in whatever version including trunk and forks. You can play online or offline, and can make as many attempts as you want. If you'd like to change the player doll to the Unique's tile, add the following to your RC file: tile_player_tile = tile:MONS_WIGLAF</p>

<h3>How to Enter</h3>

<p>The page for each challenge has a "Submit a run" link, where you can paste a link to a morgue, and enter your score. Online, finished games can use the direct link to the morgue in the submission; offline and/or in-progress games should be uploaded to a site like <a href="https://pastebin.com/">pastebin</a>, <a href="https://www.dropbox.com/">dropbox</a>, or any other similar site. Submissions will be approved by a site administrator, who will verify your score.</p>

<h3>Rules and Scoring</h3>

<h4>Milestones</h4> 
<p>These remain the same from one week to the next, and are the main way of scoring points. Each milestone earns you 5 points, for a total of 35 if you win the game, and can be done in any order. You can only earn points from each milestone once per game (entering Lair and then Orc doesn't get you 10 points).</p>
<?php
    echo '<img src="/'.$dir_path."/".$filename3.'" alt="'.$filename3.'" width="72" height="72" style="float:right">'; 
?>
<ul><li>Reach XL3.</li>
<li>Enter Lair, Orc, or Depths.</li>
<li>Reach the last floor of Lair, Orc, or the Dungeon.</li>
<li>Collect your first rune.</li>
<li>Find the entrance to Zot. (Just using magic mapping doesn't count; you must actually have the entrance in LOS.)</li>
<li>Collect three runes.</li>
<li>Win the game.</li></ul>

<h4>Cosplay Conducts</h4>
<p>Each week will have three <em>optional</em> conducts for you to follow, that vary with every challenge. Following or completing each conduct is worth 5 points, to a maximum of half your score from milestones, rounded down. (So if you achieve 3 milestones (15 points) you can earn up to 7 points from conduct bonuses, for a total of 22 points.) Small mistakes in following the conducts will usually be forgiven, but make sure you ask.</p>

<h4>Bonus Challenges:</h4> 
<?php
    echo '<img src="/'.$dir_path."/".$filename4.'" alt="'.$filename4.'" width="72" height="72" style="float:right">'; 
?>
<p>Each week will also have two <em>optional</em> bonus challenges, that are usually difficult or unconventional. Completing a bonus challenge doesn't affect your score, but gets you a <strong>star</strong>, a small trophy to recognize your skill. Each week has one star that requires you to win the game, and another that doesn't. You don't need to follow any of the cosplay conducts to earn stars. Small mistakes in following the bonus challenges will usually be forgiven.</p>

<p>It is possible, and even likely, that several players will end up with a perfect score. This is not considered a problem, and there is no tie-breaker.</p>

<h3>Credits</h3>

<p>The Crawl Cosplay Challenges were created mostly by <a href="https://www.reddit.com/user/kitchen_ace/" target="_blank">kitchen_ace</a> and are currently run by <a href="https://www.reddit.com/user/RoGGa_69/" target="_blank">RoGGa</a>.</p>

<p>This website was developed by <a href="https://github.com/alkemann" target="_blank">Alkemann</a>, with assistance from RoGGa and kitchen_ace. CSS by kitchen_ace and Alkemann, loosely based on the one from the <a href="https://github.com/zxc23/dcss-scoreboard" target="_blank">DCSS Scoreboard</a>, with images from DCSS.</p>

<p>A big thank you to Floraline for hosting CCC on the CKO server.

<h4>Inspiration and influences:</h4>

<ul><li>Casual League challenges by <a href="http://crawl.akrasiac.org/scoring/players/miek.html" target="_blank">triorph aka miek</a></li>
<li>Scrub League and other challenges by <a href="http://crawl.akrasiac.org/scoring/players/vajrapani.html" target="_blank">VajRapani</a></li>
<li>konebred's <a href="https://www.reddit.com/r/dcss/comments/8e7mi2/weekly_challenge_reboot_attempt_1/" target="_blank">attempt</a> at a similar challenge series</li></ul>

<p>Special thanks to all CCC participants, and the DCSS devs!</p>
