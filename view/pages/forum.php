<?php $title = 'My Awesome Title' ?>
<?php $description = 'My awesome description' ?>
<?php $keywords = 'My awesomes Keywords' ?>
<?php $url = 'My awesome URL' ?>
<?php $page_name = 'Forum' ?>

<?php  ob_start(); ?>
<div class="container">
	<?php include 'view/includes/breadcrumb.php'; ?>
</div>
<?php
	$content = ob_get_clean();
	require 'view/templates/default.php';
?>
