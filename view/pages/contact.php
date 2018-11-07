<?php $title = 'My Awesome Title' ?>
<?php $description = 'My awesome description' ?>
<?php $keywords = 'My awesomes Keywords' ?>
<?php $url = 'My awesome URL' ?>

<?php  ob_start(); ?>
<div class="container">
	<div role="navigation" aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Contact</li>
		</ol>
	</div>
	<form action="index.php?page=contact" method="POST">
		<div class="row">
			<div class="form-col col-md-6">
				<div class="">
					<label for="inputName"></label>
<?php if (isset($_SESSION['auth'])): ?>
					<input name="name" type="text" class="form-control" id="inputName" placeholder="Name"  value="<?= strtoupper(htmlspecialchars($_SESSION['auth']['username'])) ?>" required>
<?php else: ?>
					<input name="name" type="text" class="form-control" id="inputName" placeholder="Name" required>
<?php endif; ?>
				</div>
				<div class="">
					<label for="inputEmail"></label>
<?php if (isset($_SESSION['auth'])): ?>
					<input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email" value="<?= (htmlspecialchars($_SESSION['auth']['email'])) ?>" required>
<?php else: ?>
					<input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email" required>
<?php endif ?>
				</div>
				<div class="">
					<label for="inputSubject"></label>
					<input name="subject" type="text" class="form-control" id="inputSubject" placeholder="Subject" required>
				</div>
			</div>
			<div class="form-col col-md-6">
				<div class="form-group">
					<label for="inputText"></label>
					<textarea class="form-control" name="content" id="inputText" rows="4" placeholder="Message" required></textarea>
				</div>
				<button type="submit" name="sendMail" style="width: 100%;" class="btn btn-default">Send Message</button>
			</div>
		</div>
	</form>
	<br>
	<hr>
	<div class="row">
		<div class=" col-md-6">
			<h3>Stop By For A Visit</h3>
			<address>
				
			</address>
		</div>
		<div class="col-md-6">
			<h3>Find Us On Map</h3>
			<div style="height: 300px;" id="map"><!-- Ici s'affichera la carte --></div>
		</div>
	</div>
	<br>
</div>

<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
	crossorigin=""></script>
<script type="text/javascript" src="https://unpkg.com/leaflet.markercluster@1.3.0/dist/leaflet.markercluster.js" ></script>
<script type="text/javascript" src="public/js/map.js"></script>
<?php 
	$content = ob_get_clean();
	require 'view/templates/default.php';
?>