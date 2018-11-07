<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
	<a class="navbar-brand" href="index.php">PHP Template</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarToggler">
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item"><a class="nav-link" href="index.php">Home </a></li>
			<li class="nav-item"><a class="nav-link" href="index.php?page=data">Data</a></li>
			<li class="nav-item"><a class="nav-link" href="index.php?page=contact">Contact</a></li>
			<li class="nav-item"><a class="nav-link" href="index.php?page=forum">Forum</a></li>
			<li class="nav-item"><a class="nav-link" href="index.php?page=blog">Blog</a></li>
<?php if (isset($_SESSION['auth'])): ?>
			<li class="nav-item"><a class="nav-link" href="index.php?page=dragdrop">Drag & Drop</a></li>
<?php endif; ?>
		</ul>

<?php if (isset($_SESSION['auth'])): ?>
		<a href="index.php?page=account" class="btn btn-outline-success  my-2 my-sm-0">My Account</a>
		<a id="logoutLink" href="index.php?action=logout" class="btn btn-outline-success ml-2 my-2 my-sm-0">Logout</a>
<?php else : ?>		
		<button type="button" class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#modalConnexion">Login / Sign Up</button>
<?php endif; ?>
	</div>
</nav>