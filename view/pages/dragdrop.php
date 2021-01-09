<?php $title = 'My Awesome Title' ?>
<?php $description = 'My awesome description' ?>
<?php $keywords = 'My awesomes Keywords' ?>
<?php $url = 'My awesome URL' ?>
<?php $page_name = 'Drag & Drop' ?>

<?php if (!isset($_SESSION['auth'])): ?>
	<?php  $_SESSION['flash']['danger'] = 'Access Forbidden'; ?>
	<?php  header('location: index.php'); ?>
	<?php exit(); ?>
<?php endif; ?>

<?php  ob_start(); ?>
<div class="container">
	<?php include 'view/includes/breadcrumb.php'; ?>
    <!-- Page Content -->
    <form action="index.php?page=dragdrop" enctype="multipart/form-data" method="POST">
		<div class="row">
			<div class="form-col col-md-6">
				<input type="file" accept="gif" name="image" maxlength="256" value="Image du produit" required>
				<div class="">
					<label for="inputName"></label>
					<input name="name" type="text" class="form-control" id="inputName" placeholder="Nom du produit"  value="" required>
				</div>
				<div class="">
					<label for="inputEmail"></label>
					<input name="weight" type="text" class="form-control" id="inputWeight" placeholder="Poids du produit" value="" required>
				</div>
				<div class="">
					<label for="inputSubject"></label>
					<input name="price" type="text" class="form-control" id="inputPrice" placeholder="Prix du produit" required>
				</div>
			</div>
			<div class="form-col col-md-6">
				<div class="form-group">
					<label for="inputShortDescription"></label>
					<textarea class="form-control" name="description" id="inputShortDescription" rows="4" placeholder="Description courte du produit" required></textarea>
				</div>
				<div class="form-group">
					<label for="inputIngredient"></label>
					<textarea class="form-control" name="ingredients" id="inputIngredient" rows="4" placeholder="Ingédients" required></textarea>
				</div>
			</div>
		</div>
		<button type="submit" name="sendProduct" style="width: 100%;" class="btn btn-success">Valider le produit</button>
		<hr>
	</form>
	<div class="row">
<?php while ($row = $product->fetch()): ?>
	<div class="col-md-6">
		<div class="card mb-4">
			<img class="card-img-top" src=<?= htmlspecialchars($row['image']); ?> alt="Card image cap">
			<div class="card-body">
				<h2 class="card-title">Produit : <?= htmlspecialchars($row['name']); ?></h2>
				<p class="card-text">Description : <?= htmlspecialchars($row['description']); ?></p>
				<p class="card-text">Ingredients : <?= htmlspecialchars($row['ingredients']); ?></p>
				<p class="card-text">Prix : <?= htmlspecialchars($row['price']); ?></p>
				<p class="card-text">Poids : <?= htmlspecialchars($row['weigth']); ?></p>
				<a href="index.php?page=dragdrop&amp;delete=<?= $row['id'] ?>" class="btn btn-primary">Supprimer</a>
			</div>
		</div>
	</div>
<?php endwhile;?>
	</div>
</div>
<script type="text/javascript" src="public/js/dropzone.js"></script>
<?php
	$content = ob_get_clean();
	require 'view/templates/default.php';
?>
