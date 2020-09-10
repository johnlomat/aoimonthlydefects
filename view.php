<?php
	define("ROOT",$_SERVER['DOCUMENT_ROOT']."/");
	define("HOST_URL",(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST']);
	session_name('aoi_monthly_defects');
	session_start();
	require(ROOT.'libs/server.php');
	require_once(ROOT.'libs/add_function.php');
	require_once(ROOT.'libs/delete_function.php');
	require_once(ROOT.'libs/upload.php');
	require_once(ROOT.'libs/class_handler.php');
	require_once(ROOT.'libs/redirect.php');
	$_SESSION['url'] = HOST_URL . $_SERVER['REQUEST_URI'];
	$style = new HeaderConfig('assets/css/view-card.css','assets/css/navbar.css');
	$background_alias = "";
	$content_style = "";
	$add_btnStyle = "";
	$background_image1 = "";
	$background_image2 = "display:none";
	$image_style = "";
	$image_style_2 = "";
	$image_style_3 = "";
	$image_style_4 = "";
	$image_style_5 = "";

	require_once(ROOT.'libs/switch_get_function.php');
	$title = new headerConfig('TRI AOI | ' . $line);
	
	$query = "SELECT * FROM line_defects WHERE line = :line";
	$statement = $connect->prepare($query);
	$statement->bindValue(':line', $line);
	$statement->execute();
	$row = $statement->fetch(PDO::FETCH_ASSOC);
	
	if ($row > 0) {
		$background_alias = "display:none";
		$content_style = "display:block;margin:0";
		$edit_style = "display:block";
	}else {
		$edit_style = "display:none";
	}
	include(ROOT.'header_mdl.php');
?>
<body style="<?= $body_style ?>">
	<div class="site-main">
		<?php include(ROOT.'libs/navbar.php') ?>
		<div class="background-alias" style="<?= $background_alias ?>">
			<div class="column" style="<?= $background_image1 ?>">
				<div class="background-image">
					<img src="assets/images/background-alias.png" width="350" alt="background">
				</div>
				<p>No model yet</p>
				<span>Press or Tap </span><img src="assets/images/addButton.png" width="25"><span> to add a model.</span>
			</div>
			<div class="column" style="<?= $background_image2 ?>">
				<div class="background-image">
					<img src="assets/images/background-alias2.png" width="350" alt="background">
				</div>
				<p>Oops!</p>
				<span>No data found.</span>
			</div>			
		</div>
		<div class="content" style="<?= $content_style ?>">
			<div class="mdl-grid">
				<?php 
					$query = "SELECT * FROM line_defects WHERE line = :line ORDER BY id DESC";
					$statement = $connect->prepare($query);
					$statement->bindValue(':line', $line);
					$statement->execute();
				
					for ($i=0; $row = $statement->fetch(); $i++) {
						if ($row['image_name'] == "") {
							$image_style = "";
							$image_style_2 = "display:block";
							$image_style_3 = "display:block";
							$image_style_5 = "display:none";
						}else {
							$image_style = "<img src='upload/images/" . $row['image_name'] . "' alt='model image' width='260' height='186'style='object-fit:contain;color:black'>";
							$image_style_2 = "display:none;position:absolute;top:4px;right:4px;font-size:0.4em;padding:1px;color:white;background-color: rgba(0,0,0,0.8);border-radius:4px";						
							$image_style_3 = "display:none";
							$image_style_4 = "padding:0";
							$image_style_5 = "display:block";
						}					
				?>
				<div id="model-<?= $i ?>" class="model-card demo-card-square mdl-card mdl-shadow--2dp mdl-cell mdl-cell--3-col-desktop mdl-cell--12-col-phone" data-id="<?= $row['id'] ?>"  data-model="<?= $row['model'] . " " . $row['assy'] . " " . $row['side'] ?>">
					<div class="mdl-card__title mdl-card--expand" style="<?= $image_style_4 ?>">
						<?= $image_style?>
						<button id="addImage-<?= $i ?>" style="<?= $image_style_2 ?>" onclick="addImage('#model-<?= $i ?>')">
							<i class="material-icons" style="<?= $image_style_2 ?>">add_a_photo</i>
							<i class="material-icons" style="<?= $image_style_5 ?>">photo_camera</i>
						</button>
						<span style="<?= $image_style_3 ?>">Press or Tap the icon to add image</span>
						<div class="mdl-tooltip" data-mdl-for="addImage-<?= $i ?>" style="<?= $image_style_5 ?>">
							Update Image
						</div>
					</div>
					<div class="mdl-card__supporting-text">
						<?= $row['model'] . " " . $row['assy'] . " " . $row['side'] ?>
					</div>
					<div class="added-by">
						<p>Added by: <?= $row['added_by'] ?></p>
						<p>
							<i style="margin-right:5px;vertical-align:text-bottom;font-size:1.2em;color:#616770" class="material-icons">date_range</i><span style="margin-right:25px"><?= $row['date_added'] ?></span>
							<i style="margin-right:5px;vertical-align:text-bottom;font-size:1.2em;color:#616770" class="material-icons">access_time</i><?= $row['time_stamp'] ?>
						</p>
					</div>
					<div class="mdl-card__actions mdl-card--border">
						<a class="no-color-button mdl-button mdl-js-button mdl-js-ripple-effect" href="line/view.php?line=<?= $current_line?>&modelID=<?= $row['id'] ?>">View</a>
						<a class="red-color-button mdl-button" onclick="deleteFunction('#model-<?= $i ?>')">Delete</a>
					</div>
				</div>
				<?php }?>
			</div>
		</div>
		<div class="form-wrapper">
			<div id="form-add" class="form" style="<?= $form_style ?>">
				<div class="row">
					<h5>Add Model</h5>
					<button id="close" onclick="closeButton()"><i class="material-icons">close</i></button>
					<div class="mdl-tooltip" data-mdl-for="close">
						Press <strong>ESC</strong> to close
					</div>
				</div>
				<form method="post" action="view.php?line=<?= $current_line?>">
					<?php include(ROOT.'libs/errors.php') ?>
					<input type="hidden" name="line" value="<?= $line ?>">
					<input type="hidden" name="name" value="<?= $user->User() ?>">
					<input id="date" type="hidden" name="date">
					<input id="time" type="hidden" name="time">
					<input type="hidden" name="image_name" value="">
					<div class="row">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-name mdl-textfield__input" type="text" id="textfield_1" maxlength="25" style="text-transform:uppercase" name="model" pattern="^[a-zA-Z0-9\d-]+$">
							<label class="mdl-name mdl-textfield__label">Model</label>
							<span class="mdl-textfield__error">Letters and numbers only!</span>
						</div>
					</div>
					<div class="row-2">
						<div class="textfield-assy mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-name mdl-textfield__input" type="text" id="textfield_2" maxlength="20" style="text-transform:uppercase" name="assy" pattern="^[a-zA-Z0-9]*$">
							<label class="mdl-name mdl-textfield__label">Assy</label>
							<span class="mdl-textfield__error">Letters and numbers only!</span>
						</div>
						<select class="select" id="side" name="side" required><option class="option" disabled selected value="">Side</option><option>CS</option><option>SS</option><option>DUAL</option></></select>
					</div>
					<div class="row">
						<button type="submit" name="add_model" id="add_confirm" class="button-blue mdl-button mdl-js-button mdl-button--raised mdl-button--accent">Confirm</button>
					</div>
				</form>
			</div>
		</div>
		<div class="image-form-wrapper">
			<div id="form-image" class="form" style="<?= $form_image_style ?>">
				<div class="row">
					<h5>Upload Image</h5>
					<button id="close-image-form" onclick="closeButton()"><i class="material-icons">close</i></button>
					<div class="mdl-tooltip" data-mdl-for="close-image-form">
						Press <strong>ESC</strong> to close
					</div>
				</div>
				<form method="post" action="view.php?line=<?= $current_line?>" enctype="multipart/form-data">
					<?php include(ROOT.'libs/errors_upload.php') ?>
					<input class="model" type="hidden" name="model_id">
					<input class="upload" type="file" name="file_upload">
					<div class="row">
						<button type="submit" name="add_image" class="button-blue mdl-button mdl-js-button mdl-button--raised mdl-button--accent">Upload</button>
					</div>
				</form>
			</div>
		</div>
		<div class="delete-form-wrapper">
			<div id="form-delete" class="form">
			<h5>Are you sure you want to delete "<span class="model-form-title"></span>"?</h5>
				<form method="post" action="view.php?line=<?= $current_line ?>">
					<input class="model-id" type="hidden" name="model_id">
					<input class="line" type="hidden" name="line" value="<?= $line ?>">
					<input class="model" type="hidden" name="model">
					<div class="row-right">
						<button type="submit" name="delete_model" class="button-blue mdl-button mdl-js-button mdl-button--raised mdl-button--accent">Delete</button>
						<button type="button" class="button-red mdl-button mdl-js-button mdl-button--raised mdl-button--accent" onclick="closeButton()">Cancel</button>
					</div>
				</form>
			</div>
		</div>
		<div id="modal" class="modal" style="<?= $modal_style . $modal_style_2 ?>"></div>
		<div id="modal-delete" class="modal"></div>
		<button class="add-btn button-blue mdl-button mdl-js-button mdl-button--fab mdl-button--colored" onclick="addButton()" style="<?= $add_btnStyle ?>">
			<i class="material-icons">add</i>
		</button>
		<button class="edit-btn button-green mdl-button mdl-js-button mdl-button--fab mdl-button--colored" onclick="editButton()" style="<?= $edit_style ?>">
			<i class="create material-icons">create</i>
		</button>
		<div class="close-edit" onclick="closeEdit()">
			<button class="close-edit button-red mdl-button mdl-js-button mdl-button--fab mdl-button--colored" onclick="closeEdit()">
				<i class="clear material-icons">clear</i>
			</button>
		</div>
	</div>
	<script src="<?= HOST_URL.'/assets/script/main-script.js' ?>"></script>
</body>
</html>