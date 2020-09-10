<?php
	session_name('aoi_monthly_defects');
	session_start();
	unset($_SESSION['email']);
	session_destroy();

	header('Location: /signin');
	exit;
?>
