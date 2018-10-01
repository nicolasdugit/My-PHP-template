<div class="jumbotron jumbotron-fluid ">
	<div class="container ">
		<h1 class="display-4">My PHP TEMPLATE</h1>
		<p>My template Bootstrap</p>
<?php if (isset($_SESSION['auth'])): ?>
		<h3>Hello <?= strtoupper(htmlspecialchars($_SESSION['auth'])) ?></h3>
<?php endif; ?>
	</div>
</div>