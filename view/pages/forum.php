<?php $title = 'My Awesome Title' ?>
<?php $description = 'My awesome description' ?>
<?php $keywords = 'My awesomes Keywords' ?>
<?php $url = 'My awesome URL' ?>

<?php ob_start(); ?>

<?php if (isset($_SESSION['message'])): ?>
	<div id="alert_msg" class="alert alert-<?= $_SESSION['msg_type'] ?>">
	<?php 
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	?>
	</div>
<?php endif ?>

<div class="container">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Forum</li>
		</ol>
	</nav>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/templates/template.php'); ?>
