<div class="page information">
    <div class="toplinks">
    <?php if ($this->request->session('admin')) : ?>
        <a href="/">Home</a>
        <a href="/challenges/list">Challenges</a>(<a href="/challenges/add">add</a>)
    	<a href="/submissions/list">Approved Subs</a> <a href="/submissions/moderate">Moderate Subs</a> (<a href="/submissions/add">add</a>)
        <a href="/players/list">Players</a>(<a href="/players/add">add</a>)
    	<a href="/logout">Logout</a>
    
	<?php else : ?>
	   <a href="/admin">Admin</a>
	<?php endif; ?>		
    </div>
    <div class="page_content">
        <div class="heading">
            <h1><a href="/">Crawl Cosplay Challenge</a></h1>
            <div class="fineprint">CCC Discord server: <a href="https://discord.gg/ZQ4kk6n" target="_blank">https://discord.gg/ZQ4kk6n</a></div>
        </div>
        <hr />
        <div class="content">

