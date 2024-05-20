<div class="page information">
    <div class="toplinks">
        <a href="/">Home</a>
        | <a href="/about">About</a>
        | <a href="/tournament/home">Tournament</a>
        | <a href="/history">All Challenges</a>
        | <a href="/recent">Submissions</a>
        (to be moderated: <?php echo app\models\Submission::getNumberOfUnscoredSubmissions() ?>)
    <?php if ($this->request->session('admin')) : ?>
        | Subs <a href="/admin/submissions/list">Official</a> <a href="/admin/submissions/moderate">Moderate</a> <a href="/admin/submissions/add">New</a>
        | Players <a href="/admin/players/list">List</a> <a href="/admin/players/add">New</a>
    	| Challenges <a href="/admin/challenges/list">List</a> <a href="/admin/challenges/add">New</a>
        | <a href="/logout">Logout</a>

	<?php else : ?>
	   | <a href="/backoffice">Admin</a>
	<?php endif; ?>
    </div>
    <div class="page_content">
        <div class="heading">
            <h1><a href="/">Crawl Cosplay Challenge</a></h1>
            <div class="fineprint">Come chat with us on the <a href="https://discord.gg/ZQ4kk6n" target="_blank">official CCC Discord server</a></div>
        </div>
        <br />
        <img src="/img/HR-right.png"><br />
        <div class="content" onclick="window.location = '/dismiss';">
        <?php if ($msg = $this->request->session()->get('message')) : ?>
            <div class="message"><?=$msg?> <br /><br /><a href="/dismiss">--more--</a></div>
        <?php endif; ?>
        </div>
