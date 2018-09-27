<?php $title = 'My Awesome Title' ?>
<?php $description = 'My awesome description' ?>
<?php $keywords = 'My awesomes Keywords' ?>
<?php $url = 'My awesome URL' ?>

<?php ob_start(); ?>
<div class="jumbotron jumbotron-fluid ">
  <div class="container ">
	<h1 class="display-4">My PHP TEMPLATE</h1>
	<p>My template Bootstrap</p>
  </div>
</div>
<div class="container">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Contact</li>
		</ol>
	</nav>
		<?php if (isset($_SESSION['message'])): ?>
		<div id="alert_msg" class="alert alert-<?= $_SESSION['msg_type'] ?>">
			<?php 
				echo $_SESSION['message'];
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>
	<form action="index.php?page=contact" method="POST">
		<div class="form-row ">
			<div class="form-group col-md-6">
				<label for="inputName">Name</label>
				<input name="name" type="text" class="form-control" id="inputName" placeholder="Name" required>
			</div>
			<div class="form-group col-md-6">
				<label for="inputEmail">Email</label>
				<input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email" required>
			</div>
		</div>
		<div class="form-group">
			<label for="inputSubject">Subject</label>
			<input name="subject" type="text" class="form-control" id="inputSubject" placeholder="Subject" required>
		</div>
		<div class="form-group">
			<label for="inputText">Message</label>
			<textarea class="form-control" name="content" id="inputText" rows="10" required></textarea>
		</div>
		<button type="submit" name="sendMail" class="btn btn-primary">Send</button>
	</form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/templates/template.php'); ?>