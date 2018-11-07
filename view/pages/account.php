<?php $title = 'My Awesome Title' ?>
<?php $description = 'My awesome description' ?>
<?php $keywords = 'My awesomes Keywords' ?>
<?php $url = 'My awesome URL' ?>

<?php if (!isset($_SESSION['auth'])): ?>
	<?php  $_SESSION['flash']['danger'] = 'Access Forbidden'; ?>
	<?php  header('location: index.php'); ?>
	<?php exit(); ?>
<?php endif; ?>

<?php  ob_start(); ?>
<div class="container">
	<form action="index.php?action=changePassword" method="POST">
		<div class="form-group">
			<label for="InputPassword1">New Password</label>
			<input type="password" class="form-control" id="InputPassword1" name="password" placeholder="New Password" required>
		</div>
		<div class="form-group">
			<label for="InputPassword2">Confirm New Password</label>
			<input type="password" class="form-control" id="InputPassword2" name="password_confirm" placeholder="Confirm New Password" required>
		</div>
		<button type="submit" class="btn btn-primary" name="changePassword">Change Password</button>
	</form>
<hr>
</div>
<?php 
	$content = ob_get_clean();
	require 'view/templates/default.php';
?>