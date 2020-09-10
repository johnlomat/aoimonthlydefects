<?php
	define("ROOT",$_SERVER['DOCUMENT_ROOT']."/");
	define("HOST_URL",(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST']);
	session_name('aoi_monthly_defects');
	require(ROOT.'libs/server.php');
	require_once(ROOT.'libs/db_registration.php');
	require_once(ROOT.'libs/class_handler.php');
	$title = new headerConfig('TRI AOI | Create Account');
	$style = new headerConfig('assets/css/signup.css','');
	include(ROOT.'header_mdl.php')
?>
<body>
	<div class="site-main">
		<div class="demo-card-wide mdl-card mdl-shadow--2dp">
			<img src="../assets/images/logo/tri-logo.png" class="logo" alt="logo" width="70" height="50">
			<?php include(ROOT.'libs/errors.php') ?>
			<form method="post">
				<div class="row">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-name mdl-textfield__input" type="text" id="fname" maxlength="20" style="text-transform:capitalize" name="firstname" pattern="[A-Z,a-z, ]*" value="<?= $firstname ?>">
						<label class="mdl-name mdl-textfield__label" for="fname">First Name</label>
						<span class="mdl-textfield__error">Letters and spaces only!</span>
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-name mdl-textfield__input" type="text" id="lname" maxlength="20" style="text-transform:capitalize" name="lastname" pattern="[A-Z,a-z, ]*" value="<?= $lastname ?>">
						<label class="mdl-name mdl-textfield__label" for="lname">Last Name</label>
						<span class="mdl-textfield__error">Letters and spaces only!</span>
					</div>
				</div>
				<div class="row">
					<div class="mdl-datepicker mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input id="datepicker" type="text" width="0">
						<input class="datepicker mdl-textfield__input" type="text" name="birthdate" value="<?= $birthdate ?>">
						<label class="mdl-textfield__label" for="birthdate">Birthdate</label>
					</div>					
					<div class="toggle-gender">
						<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
							<input type="radio" id="option-1" class="mdl-radio__button" value="Male" name="gender" <?php if($gender == "Male") { echo 'checked="checked"';} ?> >
							<span class="mdl-radio__label">Male</span>
						</label>
						<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
							<input type="radio" id="option-2" class="mdl-radio__button" value="Female" name="gender" <?php if($gender == "Female") { echo 'checked="checked"';} ?> >
							<span class="mdl-radio__label">Female</span>
						</label>
					</div>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input class="mdl-email mdl-textfield__input" type="email" id="email" name="email" value="<?= $email ?>">
					<label class="mdl-email mdl-textfield__label" for="email">Email</label>
					<span class="mdl-textfield__error">Input an email address!</span>
				</div>
				<div class="row">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-name mdl-textfield__input" type="password" id="pass" name="password_1">
						<label class="mdl-name mdl-textfield__label" for="fname">Password</label>
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-name mdl-textfield__input" type="password" id="confirm_pass" name="password_2">
						<label class="mdl-name mdl-textfield__label" for="lname">Confirm</label>
					</div>
				</div>
				<div class="row-last">
					<button type="submit" name="reg_user" class="mdl-confirm mdl-button mdl-js-button mdl-button--raised mdl-button--accent">Confirm</button>
					<button type="button" onclick="window.location.href='<?= HOST_URL . '/signin' ?>'" class="mdl-signin mdl-button mdl-js-button mdl-js-ripple-effect">Sign in instead</button>
				</div>
			</form>
		</div>
	</div>
	<script src="<?= HOST_URL.'/assets/script/main-script.js' ?>"></script>
</body>
</html>