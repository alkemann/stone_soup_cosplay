<div class="page information">
    <div class="toplinks">
	<table>
	    <tr><td>  <a href="/">Crawl Cosplay Home</a></td>
		<td>| <a href="/about_ccc">About CCC</a></td>
		<td>| <a href="/ccc_home">Weekly active CCC</a></td>
	        <td>| <a href="/history">All CCC Challenges</a></td>
	    </tr>	
     	    <tr><td></td><td></td>
		<td>  <a href="/tournament/about">About CCTT<</td>/a></td>
		<td>| <a href="/tournament/home">Tournament (CCTT)</a></td>
	    </tr>	
     	    <tr><td></td><td></td>
	        <td>  <a href="/academy/about_cca">About CCA</a>
		<td>| <a href="/academy">Academy (CCA)</a>
	    </tr>	
     	    <tr><td></td><td></td>
		<td>  <a href="/recent">All Submissions</a></tr>td>
	        <td>  (to be moderated: <?php echo app\models\Submission::getNumberOfUnscoredSubmissions() ?>)<td>
	    </tr>	
	</table>
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
            <h1><a href="/"><img src="/img/cca_stone_soup_icon-512x512.png" width="48" height="48" />Crawl Cosplay Academy<img src="/img/cca_stone_soup_icon-512x512.png" width="48" height="48" /></a></h1>
            <div class="fineprint">Come chat with us on our <a href="https://discord.gg/WdbyURBcYp" target="_blank">Discord server<img src="/img/discord_transparent_border.png" width="18" height="18" ></a></div>
        </div>
        <br />
        <img src="/img/HR-right.png"><br />
        <div class="content" onclick="window.location = '/dismiss';">
        <?php if ($msg = $this->request->session()->get('message')) : ?>
            <div class="message"><?=$msg?> <br /><br /><a href="/dismiss">--more--</a></div>
        <?php endif; ?>
        </div>
