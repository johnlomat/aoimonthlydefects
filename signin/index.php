<?php
	define("ROOT",$_SERVER['DOCUMENT_ROOT']."/");
	define("HOST_URL",(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST']);
	session_name('aoi_monthly_defects');
	session_start();
	require(ROOT.'libs/server.php');
	require_once(ROOT.'libs/login.php');
	require_once(ROOT.'libs/class_handler.php');
	$title = new headerConfig('TRI AOI | Sign-in');
	$style = new headerConfig('assets/css/signin.css','');
	include(ROOT.'header_mdl.php');
?>
<body>
	<div class="site-main">
		<div class="demo-card-wide mdl-card mdl-shadow--2dp">
			<img src="../assets/images/logo/tri-logo.png" class="logo" alt="logo" width="70">
			<?php include(ROOT.'libs/errors.php') ?>
			<form method="post">
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input class="mdl-textfield__input" type="email" id="email" name="email" value="<?= $email ?>" autofocus>
					<label class="mdl-textfield__label" for="email">Email</label>
					<span class="mdl-textfield__error">Input an email address!</span>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input class="mdl-textfield__input" type="password" id="pass" name="password">
					<label class="mdl-textfield__label" for="pass">Password</label>
				</div>
				<div class="forgot"><a href="#">Forgot Password?</a></div>
				<div class="logbtn-container">
					<button type="submit" name="login_user" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Login</button>
					<button type="button" onclick="window.location.href='<?= HOST_URL . '/signup' ?>'" class="mdl-signin mdl-button mdl-js-button mdl-js-ripple-effect">Create Account</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>