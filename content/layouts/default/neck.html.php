<div class="page information">
    <div class="toplinks">
    <?php if ($this->request->session('admin')) : ?>
        <a href="/">Home</a>
        <a href="/challenges/list">Challenges</a>(<a href="/challenges/add">new</a>)
    	<a href="/submissions/list">Latest Subs</a> <a href="/submissions/moderate">Moderate New Subs</a> (<a href="/submissions/add">new</a>)
        <a href="/players/list">Players</a>(<a href="/players/add">new</a>)
    	<a href="/logout">Logout</a>
    
	<?php else : ?>
       <a href="/submissions/submit">Submit a run</a>
	   <a href="/admin">Admin</a>
	<?php endif; ?>		
    </div>
    <div class="page_content">
        <div class="heading">
            <h1><a href="/">Crawl Cosplay Challenge</a></h1>
            <div class="fineprint">Things can be here</div>
        </div>
        <hr />
        <div class="content">

