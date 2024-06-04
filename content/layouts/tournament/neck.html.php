<div class="page information">
    <div class="toplinks">
	     <a href="/">Crawl Cosplay Home</a>
	   | <a href="/history">All CCC Challenges</a>
	   | <a href="/about_ccc">About CCC</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	   | <a href="/ccc_home">Weekly active CCC</a>&nbsp&nbsp&nbsp&nbsp&nbsp
    	<br>
	   | <a href="/tournament/about">About CCTT</a>&nbsp&nbsp&nbsp&nbsp&nbsp
	   | <a href="/tournament/home">Tournament (CCTT)</a> NEW!
    	<br>
	   | <a href="/recent">All Submissions</a>
	   - To be Moderated: <?php echo app\models\Submission::getNumberOfUnscoredSubmissions() ?>&nbsp&nbsp&nbsp
	 <br>
        <?php if ($this->request->session('admin')) : ?>
               	Subs <a href="/admin/submissions/list">Official</a> <a href="/admin/submissions/moderate">Moderate</a> <a href="/admin/submissions/add">New</a>
        	| Players <a href="/admin/players/list">List</a> <a href="/admin/players/add">New</a>
    		| Challenges <a href="/admin/challenges/list">List</a> <a href="/admin/challenges/add">New</a>
        	| <a href="/logout">Logout</a>
	<?php else : ?>
		<a href="/backoffice">Admin</a>
	<?php endif; ?>
    </div>
    <div class="page_content">
        <div class="heading">
            <h1><a href="/tournament/home"><img src="/img/stone_soup_icon-32x32.png">Crawl Cosplay Trunk Tournament<img src="/img/stone_soup_icon-32x32.png"></a></h1>
            <div class="fineprint">Come chat with us on our <a href="https://discord.gg/ZQ4kk6n" target="_blank">Discord server<img src="/img/discord_transparent_border.png" width="18" height="18" ></a></div>
        </div>
        <br />
        <img src="/img/HR-right.png"><br />
        <div class="content" onclick="window.location = '/dismiss';">
        <?php if ($msg = $this->request->session()->get('message')) : ?>
            <div class="message"><?=$msg?> <br /><br /><a href="/dismiss">--more--</a></div>
        <?php endif; ?>
        </div>
