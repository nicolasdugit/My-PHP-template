<div class="modal fade" id="modalConnexion">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Login</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form action="index.php?action=login" method="POST">
					<input id="modalFormPageName2" type="hidden" name="pageName" value="">
					<div class="form-group">
						<label for="username">Username / Email</label>
						<input class="form-control fetched-data" type="text" name="username" placeholder="Enter your Username" value="">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input class="form-control" type="password" name="password" placeholder="Enter your password" aria-describedby="forgetPassword" value="">
						<small id="forgetPassword" class="form-text text-muted"><a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modalNewPassword">(Cannot remember my password)</a></small>
					</div>
					<div class="form-group modal-footer">
						<button class="btn btn-primary w-100" type="submit" name="login">Login</button>
						<!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
					</div>
					<div class="float-right">New Member ? <button type="button" class="btn btn-outline-success" data-dismiss="modal" data-toggle="modal" data-target="#modalInscription">Create an account</button></div>
				</form>
			</div>
		</div>
	</div>
 </div>

 <div class="modal fade" id="modalInscription">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title">Sign Up</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form id="form_register" action="index.php?action=signup" method="POST">
					<input id="modalFormPageName1" type="hidden" name="pageName" value="">
					<div class="form-group">
						<label for="username">UserName</label>
						<input class="form-control fetched-data" type="text" name="username" placeholder="Username" value="" >
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input class="form-control" type="email" name="email" placeholder="Email address" aria-describedby="emailHelp" value="" >
						<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input class="form-control" type="password" name="password" placeholder="Password" value="" >
					</div>
					<div class="form-group">
						<label for="password">Confirm Password</label>
						<input class="form-control" type="password" name="password_confirm" placeholder="Confirm Password" value="" >
					</div>
					<div class="form-group modal-footer">
						<button class="btn btn-primary w-100" type="submit" name="signup">Sign Up</button>
						<!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
					</div>
				</form>
			</div>
		</div>
	</div>
 </div>

<div class="modal fade" id="modalNewPassword">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Cannot remember my password</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form action="index.php?action=rememberPassword" method="POST">
					<input id="modalFormPageName3" type="hidden" name="pageName" value="">
					<div class="form-group">
						<label for="email">Email</label>
						<input class="form-control fetched-data" type="email" name="email" placeholder="Enter your Email" value="">
					</div>
					<button type="submit" class="btn btn-outline-success w-100">Send New Password</button>
				</form>
			</div>
		</div>
	</div>
 </div>