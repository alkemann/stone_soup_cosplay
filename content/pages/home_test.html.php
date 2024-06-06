<?php 
    $dir_path = "/var/www/html/img/titles/";
    $files = scandir($dir_path);
    $count = count($files);
    $index = rand(2, ($count-1));
    $filename = $files[$index];

    echo '<h2>Welcome to the <b>Crawl Cosplay</b> 3-in-1 website!</h2>';
    echo '<img src="'.$dir_path."/".$filename.'" alt="'.$filename.'" style="float:right">';
?>
// <img src="/img/titles/title_psiweapon_roxanne.png" style="float:right">
Select your pleasure among the following options:

<h3><a href="/cca/cca">Crawl Cosplay Academy</a> (CCA) ...in development.</h3>
<ul><li>For those new to DCSS or who haven't yet won a couple of time.</li>
    <li>Read <a href="https://cosplay.kelbi.org/cca/about_cca">About CCA</a></li></ul>

<h3><a href="/ccc/ccc">Crawl Cosplay Challenges</a> (CCC) ...on hold during CCTT#1</h3>
<ul><li>The original weekly challenge posted on Reddit since 2019!</li>
    <li>Read <a href="https://cosplay.kelbi.org/ccc/about_ccc">About CCC</a>.</li></ul>

<h3><a href="/tournament/home">Crawl Cosplay Trunk Tournament</a> (CCTT) ...new and active.</h3>
<ul><li>A tournament lasting about a month with each week highlighting some of the latest Trunk changes.</li>
    <li>Read <a href="https://cosplay.kelbi.org/tournament/about">About CCTT</a>.</li></ul>

<h3>Want to chat?</h3>
Come chat with us on our <a href="https://discord.gg/ZQ4kk6n" target="_blank">Discord server<img src="/img/discord_transparent_border.png" width="18" height="18" ></a> with over 200 members!
<br>
Happy Crawling,<br>
RoGGa, our webdev Alkemann, and the @VIPs_Crawl_Coplay members who help make this site what it is. :-D<br>
<br>
