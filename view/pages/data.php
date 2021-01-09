<?php $title = 'My Awesome Title' ?>
<?php $description = 'My awesome description' ?>
<?php $keywords = 'My awesomes Keywords' ?>
<?php $url = 'My awesome URL' ?>
<?php $page_name = 'Data' ?>

<?php  ob_start(); ?>
<div class="container">
	<?php include 'view/includes/breadcrumb.php'; ?>
	<div class="row">
			<div class="col-md-8 offset-md-2" >
				<h2>Formulaire CRUD</h2>
			</div>
			<div class="col-md-2 offset-md-10">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNewName" >New Name</button>
			<br><br>
			</div>
		</div>
		<div class="row justify-content-center">
			<table id="" class="table table-bordered" >
				<thead class="thead-light">
					<tr>
						<th>Name</th>
						<th>Location</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php while ($row = $data->fetch()): ?>
					<tr>
						<td><?= htmlspecialchars($row['name']); ?></td>
						<td><?= htmlspecialchars($row['location']); ?></td>
						<td>
							<button data-toggle="modal" data-target="#modalEditName"  data-id="<?= $row['id'] ?>" data-name="<?= htmlspecialchars($row['name']) ?>" data-location="<?= htmlspecialchars($row['location']) ?>" class="btn btn-info modalEditName_btn">EDIT</button>
							<a href="index.php?page=data&amp;delete=<?= $row['id'] ?>" class="btn btn-danger">DELETE</a>
						</td>
					</tr>
				<?php endwhile;?>
				</tbody>
			</table>
		</div>

		<div class="modal fade" id="modalNewName">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Modal New Name</h4>
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<form action="index.php?page=data" method="POST">
							<!-- probleme -->
							<!-- <input type="hidden" name="id" value="<?= $id; ?>"> -->
							<div class="form-group">
								<label for="name">Name</label>
								<input class="form-control fetched-data" type="text" name="name" placeholder="Enter your name" value="">
							</div>
							<div class="form-group">
								<label for="location">Location</label>
								<input class="form-control" type="text" name="location" placeholder="Enter your location" value="">
							</div>
							<div class="form-group modal-footer">
								<button class="btn btn-primary" type="submit" name="save">Save</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
						</form>
					</div>
				</div>
			</div>
	  	</div>

	  	<div class="modal fade" id="modalEditName">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Modal Edit Name</h4>
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<form action="index.php?page=data" method="POST">
							<input id="input_id" type="hidden" name="id" value="">
							<div class="form-group">
								<label for="name">Name</label>
								<input id="input_name" class="form-control fetched-data" type="text" name="name" placeholder="Enter your name" value="">
							</div>
							<div class="form-group">
								<label for="location">Location</label>
								<input id="input_location" class="form-control" type="text" name="location" placeholder="Enter your location" value="">
							</div>
							<div class="form-group modal-footer">
								<button class="btn btn-info" type="submit" name="update">Update</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
						</form>
					</div>
				</div>
			</div>
	  	</div>
  	</div>
<?php
    $content = ob_get_clean();
    require 'view/templates/default.php';
?>
