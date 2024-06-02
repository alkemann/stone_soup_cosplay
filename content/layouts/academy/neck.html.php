<div class="page information">
    <div class="toplinks">
	<p>  <a href="/">Crawl Cosplay Home</a>
	   | <a href="/history">All CCC Challenges</a>
	   | <a href="/about_ccc">About CCC</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	   | <a href="/ccc_home">Weekly active CCC</a>&nbsp&nbsp&nbsp&nbsp&nbsp
    	</p>
	<p>| <a href="/tournament/about">About CCTT</a>&nbsp&nbsp&nbsp&nbsp&nbsp
	   | <a href="/tournament/home">Tournament (CCTT)</a> NEW!
    	</p>
	<p>| <a href="/academy/about_cca">About CCA</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	   | <a href="/academy">Academy (CCA)</a>&nbsp&nbsp&nbsp&nbsp&nbspNEW!
	</p>
	<p>| <a href="/recent">All Submissions</a>
	   - to be moderated: <?php echo app\models\Submission::getNumberOfUnscoredSubmissions() ?>&nbsp&nbsp&nbsp&nbsp
	</p>

	<?php if ($this->request->session('admin')) : ?>
	          Subs <a href="/admin/submissions/list">Official</a> <a href="/admin/submissions/moderate">Moderate</a> <a href="/admin/submissions/add">New</a>
        	| Players <a href="/admin/players/list">List</a> <a href="/admin/players/add">New</a>
	    	| Challenges <a href="/admin/challenges/list">List</a> <a href="/admin/challenges/add">New</a>
        	| <a href="/logout">Logout</a>
	<?php else : ?>
	          <div class="fineprint"><a href="/backoffice">Admin</a></div>
	<?php endif; ?>
    </div>
        <br />
        <img src="/img/HR-right.png"><br />
    <div class="page_content">
        <div class="heading">
            <h1><a href="/"><img src="/img/cca_stone_soup_icon-512x512.png" width="48" height="48" />Crawl Cosplay Academy<img src="/img/cca_stone_soup_icon-512x512.png" width="48" height="48" /></a></h1>
            <div class="fineprint">Come chat with us on our <a href="https://discord.gg/WdbyURBcYp" target="_blank">Discord server<img src="/img/discord_transparent_border.png" width="18" height="18" ></a></div>
        </div>
        <div class="content" onclick="window.location = '/dismiss';">
        <?php if ($msg = $this->request->session()->get('message')) : ?>
            <div class="message"><?=$msg?> <br /><br /><a href="/dismiss">--more--</a></div>
        <?php endif; ?>
        </div>
