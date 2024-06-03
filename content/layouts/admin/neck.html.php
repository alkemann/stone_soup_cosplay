
<div class="dropdown" style="float:left;">
  <button class="dropbtn">About</button>
  <div class="dropdown-content" style="left:0;">
    <a href="/academy/about_cca">Crawl Cosplay Academy</a>
    <a href="/about_ccc">Crawl Cosplay Challenge</a>
    <a href="/tournament/about">Crawl Cosplay Trunk Tournament</a>
  </div>
</div>

<div class="dropdown" style="float:right;">
  <button class="dropbtn">Crawl Cosplay</button>
  <div class="dropdown-content">
    <a href="/">Crawl Cosplay Home</a>
    <a href="/academy">Crawl Cosplay Academy - NEW!</a>
    <a href="/ccc_home">Crawl Cosplay Challenge</a>
    <a href="/tournament/home">Crawl Cosplay Trunk Tournament - NEW!</a>
  </div>
</div>

<div class="page information">
    <div class="toplinks">
	     <a href="/history">All CCC Challenges</a>
	   | <a href="/recent">All Submissions</a>
	   - to be moderated: <?php echo app\models\Submission::getNumberOfUnscoredSubmissions() ?>&nbsp&nbsp&nbsp&nbsp
	<br>
	<?php if ($this->request->session('admin')) : ?>
	          Subs <a href="/admin/submissions/list">Official</a> <a href="/admin/submissions/moderate">Moderate</a> <a href="/admin/submissions/add">New</a>
        	| Players <a href="/admin/players/list">List</a> <a href="/admin/players/add">New</a>
	    	| Challenges <a href="/admin/challenges/list">List</a> <a href="/admin/challenges/add">New</a>
        	| <a href="/logout">Logout</a>
	<?php else : ?>
	          <div class="fineprint"><a href="/backoffice">Admin</a></div>
	<?php endif; ?>
    </div>
    <div class="page_content">
        <div class="heading">
            <h1><img src="/img/cc_stone_soup_icon-512x512.png" width="48" height="48" />Crawl Cosplay /admin/<img src="/img/cc_stone_soup_icon-512x512.png" width="48" height="48" /></h1>
        </div>
        <br />
        <img src="/img/HR-right.png"><br />
        <div class="content" onclick="window.location = '/dismiss';">
        <?php if ($msg = $this->request->session()->get('message')) : ?>
            <div class="message"><?=$msg?> <br /><br /><a href="/dismiss">--more--</a></div>
        <?php endif; ?>
        </div>
