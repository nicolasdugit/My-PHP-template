<?php $title = 'My Awesome Title' ?>
<?php $description = 'My awesome description' ?>
<?php $keywords = 'My awesomes Keywords' ?>
<?php $url = 'My awesome URL' ?>

<?php if (!isset($_GET['id']) && !isset($_GET['reset_token'])): ?>
	<?php header('Location: ../../index.php'); ?>
	<?php exit(); ?>
<?php endif ?>


<?php  ob_start(); ?>
<div class="container">
	<form action="index.php?action=resetPassword" method="POST">
		<input type="hidden" name="id" value="<?=$_GET['id']?>">
		<input type="hidden" name="token" value="<?=$_GET['reset_token']?>">
		<div class="form-group">
			<label for="InputPassword1">New Password</label>
			<input type="password" class="form-control" id="InputPassword1" name="password" placeholder="New Password" required>
		</div>
		<div class="form-group">
			<label for="InputPassword2">Confirm New Password</label>
			<input type="password" class="form-control" id="InputPassword2" name="password_confirm" placeholder="Confirm New Password" required>
		</div>
		<button type="submit" class="btn btn-primary" name="resetPassword">Reset Password</button>
	</form>
<hr>
</div>
<?php 
	$content = ob_get_clean();
	require 'view/templates/default.php';
?>
