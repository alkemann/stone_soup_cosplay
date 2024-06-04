<div class="page information">
	<div class="dropdown" style="float:left;">
		<button class="dropbtn">Menu</button>
		<div class="dropdown-content" style="left:0;">
			<a href="/">Crawl Cosplay Home</a>
			<a href="/academy">Crawl Cosplay Academy (CCA) - NEW!</a>
			<a href="/academy/about_cca"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&#8627; About CCA</a>
			<a href="/ccc_home">Crawl Cosplay Challenge (CCC)</a>
			<a href="/about_ccc"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&#8627; About CCC</a>
			<a href="/history"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&#8627; all CCC challenges</a>
			<a href="/tournament/home">Crawl Cosplay Trunk Tournament (CCTT) - NEW!</a>
			<a href="/tournament/about"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&#8627; About CCTT</a>
		</div>
	</div>

    <div class="toplinks"><br></div>
    <div class="page_content">
        <div class="heading">
            <h1><img src="/img/cca_stone_soup_icon-512x512.png" width="48" height="48" /> Crawl Cosplay Academy <img src="/img/cca_stone_soup_icon-512x512.png" width="48" height="48" /></h1>
            <div class="fineprint"><center>Come chat with us on our <a href="https://discord.gg/WdbyURBcYp" target="_blank">Discord server<img src="/img/discord_transparent_border.png" width="18" height="18"></a></center></div>
        </div>
	<div class="fineprint" align="right">
   		To be Moderated: <?php echo app\models\Submission::getNumberOfUnscoredSubmissions() ?>
		<?php if ($this->request->session('admin')) : ?>
        		| Subs <a href="/admin/submissions/list">Official</a> <a href="/admin/submissions/moderate">Moderate</a> <a href="/admin/submissions/add">New</a>
	        	| Players <a href="/admin/players/list">List</a> <a href="/admin/players/add">New</a>
    			| Challenges <a href="/admin/challenges/list">List</a> <a href="/admin/challenges/add">New</a>
	        	| <a href="/logout">Logout</a>
		<?php else : ?>
          		| <a href="/backoffice">Admin</a>
		<?php endif; ?>
	</div>
        <br><img src="/img/HR-right.png"><br>
        <div class="content" onclick="window.location = '/dismiss';">
        <?php if ($msg = $this->request->session()->get('message')) : ?>
            <div class="message"><?=$msg?> <br /><br /><a href="/dismiss">--more--</a></div>
        <?php endif; ?>
        </div>
