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
	<nav class="nav nav-pills nav-fill shadow p-3 mb-5 bg-white rounded">
		<a class="nav-item nav-link active" href="index.php">Home</a>
		<a class="nav-item nav-link" href="index.php?page=data">Data</a>
		<a class="nav-item nav-link" href="index.php?page=contact">Contact</a>
	</nav>
<hr>
<div style="height: 400px;" id="map">
	<!-- Ici s'affichera la carte -->
</div>
</div>
		
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
	crossorigin=""></script>
<script type="text/javascript" src="https://unpkg.com/leaflet.markercluster@1.3.0/dist/leaflet.markercluster.js" ></script>
<script type="text/javascript" src="public/js/map.js"></script>
<?php $content = ob_get_clean(); ?>

<?php require('view/templates/template.php'); ?>