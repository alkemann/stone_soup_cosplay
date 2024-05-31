<div class="page information">
    <div class="toplinks">
        <a href="/">Home</a>
        | <a href="/about_ccc">About CCC</a>
        | <a href="/history">All CCC Challenges</a>
	<br>
          <a href="/tournament/about">About CCTT</a>
	| <a href="/tournament/home">Tournament (CCTT)</a>
	<br>
          <a href="/recent">All Submissions</a>
          (to be moderated: <?php echo app\models\Submission::getNumberOfUnscoredSubmissions() ?>)
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
            <div class="fineprint">Come chat with us on the <a href="https://discord.gg/ZQ4kk6n" target="_blank">official CCC Discord server<img src="/img/discord.png"></a></div>
        </div>
        <br />
        <img src="/img/HR-right.png"><br />
        <div class="content" onclick="window.location = '/dismiss';">
        <?php if ($msg = $this->request->session()->get('message')) : ?>
            <div class="message"><?=$msg?> <br /><br /><a href="/dismiss">--more--</a></div>
        <?php endif; ?>
        </div>
