<?php if (isset($_SESSION['flash'])): ?>
	<?php foreach ($_SESSION['flash'] as $type => $message) : ?>
	<div id="alert_msg" class="alert alert-<?= $type ?> m-0 p-3 align-middle text-center">
	<?= $message; ?>
	<button id="alert_msg_close" class="btn btn-outline-<?= $type ?>">Close</button>
	</div>
<?php endforeach; ?>
	<?php unset($_SESSION['flash']); ?>
<?php endif; ?>