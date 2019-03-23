<header>
    <h1><a href="/">DCSS Cosplay</a></h1>
    <hr>
    <?php if ($this->request->session('admin')) : ?>
    <ul id="menu">
    	<li><a href="/challenges/list">Challenges</a> (<a href="/challenges/add">new</a>)
    	<li><a href="/submissions/list">Submissions</a> (<a href="/submissions/add">new</a>)
        <li><a href="/players/list">Players</a> (<a href="/players/add">new</a>)
    	<li><a href="/logout">Logout</a>
    </ul>
    <hr>
	<?php else : ?>
	<div id="login"><a href="/admin">Admin</a></div>
	<?php endif; ?>		
</header>
<article>
