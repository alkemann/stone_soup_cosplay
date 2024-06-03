<div class="page information">
	<div class="dropdown" style="float:left;">
		<button class="dropbtn">About</button>
		<div class="dropdown-content" style="left:0;">
			<a href="/academy/about_cca">Crawl Cosplay Academy (CCA) - NEW!</a>
			<a href="/about_ccc">Crawl Cosplay Challenge (CCC)</a>
			<a href="/tournament/about">Crawl Cosplay Trunk Tournament (CCTT) - NEW!</a>
		</div>
	</div>

	<div class="dropdown" style="float:right;">
		<button class="dropbtn">Crawl Cosplay</button>
		<div class="dropdown-content">
			<a href="/">Crawl Cosplay Home</a>
			<a href="/academy">Crawl Cosplay Academy (CCA) - NEW!</a>
			<a href="/ccc_home">Crawl Cosplay Challenge (CCC)</a>
			<a href="/history"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&#8627; all CCC challenges</a>
			<a href="/tournament/home">Crawl Cosplay Trunk Tournament (CCTT) - NEW!</a>
		</div>
	</div>

    <div class="toplinks"><br></div>
    <div class="page_content">
        <div class="heading">
            <h1><img src="/img/cca_stone_soup_icon-512x512.png" width="48" height="48" />Crawl Cosplay Academy<img src="/img/cca_stone_soup_icon-512x512.png" width="48" height="48" /></h1>
            <div class="fineprint"><center>Come chat with us on our <a href="https://discord.gg/WdbyURBcYp" target="_blank">Discord server<img src="/img/discord_transparent_border.png" width="18" height="18"></a></center></div>
        </div>
		<div class="fineprint" align="right">
			<a href="/recent">All Submissions</a>
			<br>
	   		to be moderated: <?php echo app\models\Submission::getNumberOfUnscoredSubmissions() ?>
			<br>
		</div>
		<?php if ($this->request->session('admin')) : ?>
	          Subs <a href="/admin/submissions/list">Official</a> <a href="/admin/submissions/moderate">Moderate</a> <a href="/admin/submissions/add">New</a>
        	| Players <a href="/admin/players/list">List</a> <a href="/admin/players/add">New</a>
	    	| Challenges <a href="/admin/challenges/list">List</a> <a href="/admin/challenges/add">New</a>
        	| <a href="/logout">Logout</a>
		<?php else : ?>
	          <div class="fineprint"><a href="/backoffice">Admin</a></div>
		<?php endif; ?>

        <br><img src="/img/HR-right.png"><br>
        <div class="content" onclick="window.location = '/dismiss';">
        <?php if ($msg = $this->request->session()->get('message')) : ?>
            <div class="message"><?=$msg?> <br /><br /><a href="/dismiss">--more--</a></div>
        <?php endif; ?>
        </div>
