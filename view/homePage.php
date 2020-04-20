<?php $title = 'My Awesome Title' ?>
<?php $description = 'My awesome description' ?>
<?php $keywords = 'My awesomes Keywords' ?>
<?php $url = 'My awesome URL' ?>

<?php  ob_start(); ?>
<div class="container">
	<nav class="nav nav-pills nav-fill shadow p-3 mb-5 bg-white rounded">
		<a class="nav-item nav-link active bg-success" href="index.php">Home</a>
		<a class="nav-item nav-link text-secondary" href="index.php?page=data">Data</a>
		<a class="nav-item nav-link text-secondary" href="index.php?page=contact">Contact</a>
		<a class="nav-item nav-link text-secondary" href="index.php?page=forum">Forum</a>
		<a class="nav-item nav-link text-secondary" href="index.php?page=blog">Blog</a>
	</nav>
	<hr>
</div>

<?php
	$content = ob_get_clean();
	require 'view/templates/default.php';
?>
