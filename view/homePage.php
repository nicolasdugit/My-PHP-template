<?php $title = 'My Awesome Title' ?>
<?php $description = 'My awesome description' ?>
<?php $keywords = 'My awesomes Keywords' ?>
<?php $url = 'My awesome URL' ?>

<?php  ob_start(); ?>
<div class="container-fluid">
	<div class="row">

	<div class="col-3 m-0 pt-2 pl-3 shadow">
		<h5>Projects</h5>

	<ul class="list-inline">
	  <li><i class="far fa-folder"></i> <a href="http://www.nicolasduquesne.com">Curabitur metus nisl</a></li>
	  <li><i class="far fa-folder"></i> <a href="http://www.nicolasduquesne.com">Nulla eget laoreet quam</a> </li>
	  <li><i class="far fa-folder"></i> <a href="http://www.nicolasduquesne.com">Aenean turpis mi</a> </li>
		<li><i class="far fa-folder"></i> <a href="http://www.nicolasduquesne.com">Etiam pellentesque facilisis</a> </li>
	</ul>
	</div>
<div class="col-6">
	<nav class="nav nav-pills nav-fill p-3 mb-5 bg-white rounded">
		<a class="nav-item nav-link active bg-success" href="index.php">Home</a>
		<a class="nav-item nav-link text-secondary" href="index.php?page=data">Data</a>
		<a class="nav-item nav-link text-secondary" href="index.php?page=contact">Contact</a>
		<a class="nav-item nav-link text-secondary" href="index.php?page=forum">Forum</a>
		<a class="nav-item nav-link text-secondary" href="index.php?page=blog">Blog</a>
	</nav>
	<hr>
	<p><h1>I feel like a jigsaw puzzle missing a piece. And I'm not even sure what the picture should be.</h1>
<p>I'm doing mental jumping jacks. Cops, another community I'm not part of. I'm really more an apartment person. God created pudding, and then he rested. I feel like a jigsaw puzzle missing a piece. And I'm not even sure what the picture should be.</p>
<p>I'm not the monster he wants me to be. So I'm neither man nor beast. I'm something new entirely. With my own set of rules. I'm Dexter. Boo. <strong> Tonight's the night.</strong> <em> And it's going to happen again and again.</em> It has to happen.</p>
<h2>I feel like a jigsaw puzzle missing a piece. And I'm not even sure what the picture should be.</h2>
<p>Watching ice melt. This is fun. I'm a sociopath; there's not much he can do for me. Tonight's the night. And it's going to happen again and again. It has to happen. This man is a knight in shining armor.</p>
<ol>
<li>Makes me a … scientist.</li><li>I will not kill my sister. I will not kill my sister. I will not kill my sister.</li><li>You look…perfect.</li>
</ol>

<h3>I'm real proud of you for coming, bro. I know you hate funerals.</h3>
<p>Tell him time is of the essence. I'm real proud of you for coming, bro. I know you hate funerals. Makes me a … scientist. Finding a needle in a haystack isn't hard when every straw is computerized.</p>
<ul>
<li>He taught me a code. To survive.</li><li>Keep your mind limber.</li><li>Hello, Dexter Morgan.</li>
</ul>

<p>Pretend. You pretend the feelings are there, for the world, for the people around you. Who knows? Maybe one day they will be. Tonight's the night. And it's going to happen again and again. It has to happen.</p>
<p>Hello, Dexter Morgan. He taught me a code. To survive. Like a sloth. I can do that. I'm really more an apartment person.</p>
<p>Tell him time is of the essence. This man is a knight in shining armor. Watching ice melt. This is fun. Under normal circumstances, I'd take that as a compliment.</p>
<p>Oh I beg to differ, I think we have a lot to discuss. After all, you are a client. Under normal circumstances, I'd take that as a compliment. God created pudding, and then he rested. I'm partial to air conditioning.</p>
<p>You look…perfect. Under normal circumstances, I'd take that as a compliment. Like a sloth. I can do that. Finding a needle in a haystack isn't hard when every straw is computerized. Tonight's the night. And it's going to happen again and again. It has to happen.</p>
<p>Finding a needle in a haystack isn't hard when every straw is computerized. I have a dark side, too. I'm doing mental jumping jacks. You look…perfect. Makes me a … scientist.</p>
<p>Hello, Dexter Morgan. I'm not the monster he wants me to be. So I'm neither man nor beast. I'm something new entirely. With my own set of rules. I'm Dexter. Boo. Cops, another community I'm not part of.</p>
<p>Tell him time is of the essence. Under normal circumstances, I'd take that as a compliment. I'm going to tell you something that I've never told anyone before. Hello, Dexter Morgan. I'm partial to air conditioning.</p>
<p>I've lived in darkness a long time. Over the years my eyes adjusted until the dark became my world and I could see. I'm real proud of you for coming, bro. I know you hate funerals. I'm generally confused most of the time.</p>
<p>I'm Dexter, and I'm not sure what I am. Cops, another community I'm not part of. I'm Dexter, and I'm not sure what I am. Somehow, I doubt that. You have a good heart, Dexter. I'm thinking two circus clowns dancing. You?</p>
<p>I like seafood. God created pudding, and then he rested. Hello, Dexter Morgan. Tell him time is of the essence. I have a dark side, too.</p></p>
</div>
	<div class="col-3 pr-3 pt-2	 bg-white ">
		<h5>What's new</h5>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
		<div class="alert alert-info" role="alert">
		  <strong>Heads up!</strong> This <a href="#" class="alert-link">alert needs your attention</a>, but it's not super important.
		</div>
			<div class="alert alert-success" role="alert">
			  <strong>Well done!</strong> You successfully read <a href="#" class="alert-link">this important alert message</a>.
			</div>
	</div>
</div>
</div>
<?php
    $content = ob_get_clean();
    require 'view/templates/default.php';
?>
