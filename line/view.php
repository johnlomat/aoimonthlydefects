<?php
	define("ROOT",$_SERVER['DOCUMENT_ROOT']."/");
	define("HOST_URL",(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST']);
	session_name('aoi_monthly_defects');
	session_start();
	require(ROOT.'libs/server.php');
	require_once(ROOT.'libs/add_function.php');
	require_once(ROOT.'libs/delete_function.php');
	require_once(ROOT.'libs/class_handler.php');
	require_once(ROOT.'libs/redirect.php');
	$_SESSION['url'] = HOST_URL . $_SERVER['REQUEST_URI'];
	$style = new HeaderConfig('assets/css/linedefects.css','assets/css/navbar.css');
	$model_id = $_GET['modelID'];
	$add_btnStyle = "";
	$background_image1 = "";
	$background_image2 = "display:none";

	require_once(ROOT.'libs/switch_get_function.php');
	
	$query = "SELECT * FROM line_defects WHERE id = :id";
	$statement = $connect->prepare($query);
	$statement->bindValue(':id', $model_id);
	$statement->execute();
	$row = $statement->fetch(PDO::FETCH_ASSOC);
	
	$_SESSION['title'] = $row['model'] . " " . $row['assy'] . " " . $row['side'];
	$title = new headerConfig($_SESSION['title']);
	$model = $title->Title();

	$query = "SELECT * FROM model_defects WHERE line = :line AND model = :model";
	$statement = $connect->prepare($query);
	$statement->bindValue(':line', $line);
	$statement->bindValue(':model', $model);
	$statement->execute();
	$row = $statement->fetch(PDO::FETCH_ASSOC);
	
	if ($row > 0) {
		$table_style = "display:block";
		$edit_style = "display:block";
		$background_alias = "display:none";
		$title_style = "display:flex";
		$content_style = "display:block";
	}else {
		$table_style = "display:none";
		$edit_style = "display:none";
		$background_alias = "display:block";
		$title_style = "display:none";
		$content_style = "display:none";
	}
	
	include(ROOT.'header_mdl.php');
?>
<body style="<?= $body_style ?>">
	<div class="site-main">
		<?php include(ROOT.'libs/navbar.php') ?>
		<div class="background-alias" style="<?= $background_alias ?>">
			<div class="column" style="<?= $background_image1 ?>">
				<div class="background-image">
					<img src="../assets/images/background-alias.png" width="350" alt="background">
				</div>
				<p>No location and defect</p>
				<div class="column-text">
					<span>Press or Tap </span><img src="../assets/images/addButton.png" width="25"><span> to add a data.</span>
				</div>
			</div>
			<div class="column" style="<?= $background_image2 ?>">
				<div class="background-image">
					<img src="../assets/images/background-alias2.png" width="350" alt="background">
				</div>
				<p>Oops!</p>
				<div class="column-text">
					<span>No data found.</span>
				</div>
			</div>
		</div>
		<div class="content-wrapper" style="<?= $content_style ?>">
			<div class="table-title" style="<?= $title_style ?>">
				<img src="<?= $title_icon ?>" width="35">
				<h3><?= $line ?><span style="color:#2196F3"> | </span><?= $model ?></h3>
			</div>
			<?php require_once(ROOT.'libs/location_count.php') ?>
			<div class="content" style="<?= $table_style ?>">
				<div class="data-table">
					<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
						<tr>
						<?php $i=0; foreach ($row_location_id as $location_id) : $i++ ?>
							<div id="id-<?= $i ?>" data-id="<?= $location_id ?>"></div>
						<?php endforeach ?>
							<th>Location</th>
							<?php $i=0; foreach ($row_location as $location) : $i++ ?>
								<td id="location-<?= $i ?>" data-location="<?= $location ?>"><span><?= $location ?><button id="edit-button-<?= $i ?>" class="edit-button button-icon" onclick="editForm('#location-<?= $i?>');editForm2('#defect-<?= $i?>');editForm3('#january-<?= $i?>');editForm4('#february-<?= $i?>');editForm5('#march-<?= $i?>');editForm6('#april-<?= $i?>');editForm7('#may-<?= $i?>');editForm8('#june-<?= $i?>');editForm9('#july-<?= $i?>');editForm10('#august-<?= $i?>');editForm11('#september-<?= $i?>');editForm12('#october-<?= $i?>');editForm13('#november-<?= $i?>');editForm14('#december-<?= $i?>')"><i class="material-icons">create</i></button><button id="delete-button-<?= $i ?>" class="delete-button button-icon" onclick="deleteID('#id-<?= $i ?>');deleteFunction('#location-<?= $i?>');deleteFunction('#defect-<?= $i?>')"><i class="material-icons">delete</i></button></span></td>
								<div class="mdl-tooltip" data-mdl-for="edit-button-<?= $i ?>">
									Edit
								</div>
								<div class="mdl-tooltip" data-mdl-for="delete-button-<?= $i ?>">
									Delete
								</div>
							<?php endforeach ?>
						</tr>
						<tr>
							<th>Defect</th>
							<?php $i=0; foreach ($row_defect as $defect) : $i++ ?>
								<td id="defect-<?= $i ?>" class="defect-row" data-defect="<?= $defect ?>"><span><?= $defect ?></span></td>
							<?php endforeach ?>
						</tr>
						<tr>
							<th>January</th>
							<?php $i=0; foreach ($row_january as $january) : $i++ ?>
								<td id="january-<?= $i ?>" data-january="<?= $january ?>" data-inspection="<?= $january ?>"><?= $january ?></td>
							<?php endforeach ?>		
						</tr>
						<tr>
							<th>February</th>
							<?php $i=0; foreach ($row_february as $february) : $i++ ?>
								<td id="february-<?= $i ?>" data-february="<?= $february ?>" data-inspection="<?= $february ?>"><?= $february ?></td>
							<?php endforeach ?>
						</tr>
						<tr>
							<th>March</th>
							<?php $i=0; foreach ($row_march as $march) : $i++ ?>
								<td id="march-<?= $i ?>" data-march="<?= $march ?>" data-inspection="<?= $march ?>"><?= $march ?></td>
							<?php endforeach ?>
						</tr>
						<tr>
							<th>April</th>
							<?php $i=0; foreach ($row_april as $april) : $i++ ?>
								<td id="april-<?= $i ?>" data-april="<?= $april ?>" data-inspection="<?= $april ?>"><?= $april ?></td>
							<?php endforeach ?>
						</tr>
						<tr>
							<th>May</th>
							<?php $i=0; foreach ($row_may as $may) : $i++ ?>
								<td id="may-<?= $i ?>" data-may="<?= $may ?>" data-inspection="<?= $may ?>"><?= $may ?></td>
							<?php endforeach ?>	
						</tr>
						<tr>
							<th>June</th>
							<?php $i=0; foreach ($row_june as $june) : $i++ ?>
								<td id="june-<?= $i ?>" data-june="<?= $june ?>" data-inspection="<?= $june ?>"><?= $june ?></td>
							<?php endforeach ?>
						</tr>
						<tr>
							<th>July</th>
							<?php $i=0; foreach ($row_july as $july) : $i++ ?>
								<td id="july-<?= $i ?>" data-july="<?= $july ?>" data-inspection="<?= $july ?>"><?= $july ?></td>
							<?php endforeach ?>
						</tr>
						<tr>
							<th>August</th>
							<?php $i=0; foreach ($row_august as $august) : $i++ ?>
								<td id="august-<?= $i ?>" data-august="<?= $august ?>" data-inspection="<?= $august ?>"><?= $august ?></td>
							<?php endforeach ?>
						</tr>
						<tr>
							<th>September</th>
							<?php $i=0; foreach ($row_september as $september) : $i++ ?>
								<td id="september-<?= $i ?>" data-september="<?= $september ?>" data-inspection="<?= $september ?>"><?= $september ?></td>
							<?php endforeach ?>
						</tr>
						<tr>
							<th>October</th>
							<?php $i=0; foreach ($row_october as $october) : $i++ ?>
								<td id="october-<?= $i ?>" data-october="<?= $october ?>" data-inspection="<?= $october ?>"><?= $october ?></td>
							<?php endforeach ?>	
						</tr>
						<tr>
							<th>November</th>
							<?php $i=0; foreach ($row_november as $november) : $i++ ?>
								<td id="november-<?= $i ?>" data-november="<?= $november ?>" data-inspection="<?= $november ?>"><?= $november ?></td>
							<?php endforeach ?>
						</tr>
						<tr>
							<th>December</th>
							<?php $i=0; foreach ($row_december as $december) : $i++ ?>
								<td id="december-<?= $i ?>" data-december="<?= $december ?>" data-inspection="<?= $december ?>"><?= $december ?></td>
							<?php endforeach ?>
						</tr>	
					</table>
				</div>
			</div>
		</div>
		<div class="add-form-wrapper">
			<div id="form-add" class="form"  style="<?= $form_style?>">
				<div class="row-right">
					<h5>Add Location</h5>			
					<button id="close-form" onclick="closeButton()"><i class="material-icons">close</i></button>
					<div class="mdl-tooltip" data-mdl-for="close-form">
						Press <strong>ESC</strong> to close
					</div>
				</div>
				<form method="post" action="view.php?line=<?= $current_line ?>&modelID=<?= $model_id ?>">
					<?php include(ROOT.'libs/errors.php') ?>
					<input type="hidden" name="line" value="<?= $line?>">
					<input type="hidden" name="model" value="<?= $model ?>">
					<input type="hidden" name="location" value="">
					<input type="hidden" name="defect" value="">
					<input type="hidden" name="january" value="">
					<input type="hidden" name="february" value="">
					<input type="hidden" name="march" value="">
					<input type="hidden" name="april" value="">
					<input type="hidden" name="may" value="">
					<input type="hidden" name="june" value="">
					<input type="hidden" name="july" value="">
					<input type="hidden" name="august" value="">
					<input type="hidden" name="september" value="">
					<input type="hidden" name="october" value="">
					<input type="hidden" name="november" value="">
					<input type="hidden" name="december" value="">
					<input type="hidden" name="year" value="<?php print(gmdate('Y')) ?>">
					<div class="row-confirm">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-name mdl-textfield__input" type="text" id="textfield" maxlength="5" style="text-transform:uppercase" name="location" pattern="^[a-zA-Z0-9]*$">
							<label class="mdl-name mdl-textfield__label">Location</label>
							<span class="mdl-textfield__error">Letters and numbers only!</span>
						</div>
					</div>
					<div class="row-confirm">
						<select class="select" name="defect" required>
							<option disabled selected value="">Choose option</option>
							<option>BENT PIN</option>
							<option>BILLBOARD</option>
							<option>BLISTER COMPONENT</option>
							<option>COLD SOLDER</option>
							<option>CRACKED COMPONENT</option>
							<option>DAMAGED COMPONENT</option>
							<option>DAMAGED PAD</option>
							<option>DE-WETTING</option>
							<option>DELAMINATION</option>
							<option>DETACHED COMPONENT</option>
							<option>ERASED BODY MARKING</option>
							<option>FOREIGN MATERIAL</option>
							<option>GRAINY SOLDER</option>
							<option>INSUFFICIENT SOLDER</option>
							<option>INVERTED COMPONENT</option>
							<option>LIFTED COMPONENT</option>
							<option>LIFTED PIN</option>
							<option>MISALIGNED COMPONENT</option>
							<option>MISSING COMPONENT</option>
							<option>MISSING DOT</option>
							<option>NO SOLDER</option>
							<option>NON-WETTING</option>
							<option>OFFSET</option>
							<option>PAD CONTAMINATION</option>
							<option>SKEWED COMPONENT</option>
							<option>SOLDER BALL</option>
							<option>SOLDER SHORT</option>
							<option>SOLDER SPLASH</option>
							<option>TOMBSTONE</option>
							<option>UNMOUNTED PIN</option>
							<option>UNSOLDERED</option>
							<option>WRONG ANGLE</option>
							<option>WRONG COMPONENT</option>
							<option>WRONG ORIENTATION</option>
							<option>WRONG POLARITY</option>
							<option>WRONG TOLERANCE</option>
							<option>WRONG VALUE</option>
						</select>
					</div>
					<div class="row-right">
						<button type="submit" name="add_location" id="add_location" class="button-blue mdl-button mdl-js-button mdl-button--raised mdl-button--accent">Confirm</button>
					</div>
				</form>
			</div>
		</div>
		<div class="option-form-wrapper">
			<div id="form-option" class="form"  style="">
				<div class="row-title">
					<div class="row-title">
						<p><?= $line ?></p>
						<p><?= $model ?></p>
						<p class="location-form-title">
						<p class="defect-form-title">
					</div>
					<button id="close-option" class="mdl-button mdl-js-button mdl-button--icon" onclick="closeButton()"><i class="material-icons">close</i></button>
					<div class="mdl-tooltip" data-mdl-for="close-option">
						Press <strong>ESC</strong> to close
					</div>
				</div>
				<form id="addData" method="post" action="view.php?line=<?= $current_line ?>&modelID=<?= $model_id ?>">
					<input type="hidden" name="line" value="<?= $line ?>">
					<input type="hidden" name="model" value="<?= $model ?>">
					<input class="location" type="hidden" name="location">
					<input class="defect" type="hidden" name="defect">
					<div class="container">
						<div class="row left">
							<div class="row-even">
								<p>January</p>
								<select class="select" name="january"><option disabled selected value="">Select</option><option value="Detected">Detected</option><option value="Undetected">Undetected</option></select>
							</div>
							<div class="row-even">
								<p>February</p>
								<select class="select" name="february"><option disabled selected value="">Select</option><option value="Detected">Detected</option><option value="Undetected">Undetected</option></select>
							</div>
							<div class="row-even">
								<p>March</p>
								<select class="select" name="march"><option disabled selected value="">Select</option><option value="Detected">Detected</option><option value="Undetected">Undetected</option></select>
							</div>
							<div class="row-even">
								<p>April</p>
								<select class="select" name="april"><option disabled selected value="">Select</option><option value="Detected">Detected</option><option value="Undetected">Undetected</option></select>
							</div>
							<div class="row-even">
								<p>May</p>
								<select class="select" name="may"><option disabled selected value="">Select</option><option value="Detected">Detected</option><option value="Undetected">Undetected</option></select>
							</div>
							<div class="row-even">
								<p>June</p>
								<select class="select" name="june"><option disabled selected value="">Select</option><option value="Detected">Detected</option><option value="Undetected">Undetected</option></select>
							</div>
						</div>
						<div class="row right">
							<div class="row-even">
								<p>July</p>
								<select class="select" name="july"><option disabled selected value="">Select</option><option value="Detected">Detected</option><option value="Undetected">Undetected</option></select>
							</div>
							<div class="row-even">
								<p>August</p>
								<select class="select" name="august"><option disabled selected value="">Select</option><option value="Detected">Detected</option><option value="Undetected">Undetected</option></select>
							</div>
							<div class="row-even">
								<p>September</p>
								<select class="select" name="september"><option disabled selected value="">Select</option><option value="Detected">Detected</option><option value="Undetected">Undetected</option></select>
							</div>
							<div class="row-even">
								<p>October</p>
								<select class="select" name="october"><option disabled selected value="">Select</option><option value="Detected">Detected</option><option value="Undetected">Undetected</option></select>
							</div>
							<div class="row-even">
								<p>November</p>
								<select class="select" name="november"><option disabled selected value="">Select</option><option value="Detected">Detected</option><option value="Undetected">Undetected</option></select>
							</div>
							<div class="row-even">
								<p>December</p>
								<select class="select" name="december"><option disabled selected value="">Select</option><option value="Detected">Detected</option><option value="Undetected">Undetected</option></select>
							</div>
						</div>
						<div class="row-right">
							<button type="submit" name="location_option" class="button-blue mdl-button mdl-js-button mdl-button--raised mdl-button--accent">Confirm</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="delete-form-wrapper">
			<div id="form-delete" class="form">
			<h5>Are you sure you want to delete "<span class="location-form-title"></span> <span class="defect-form-title"></span>"?</h5>
				<form method="post" action="view.php?line=<?= $current_line ?>&modelID=<?= $model_id ?>">
					<input class="location-id" type="hidden" name="location_id">
					<div class="row-right">
						<button type="submit" name="delete_location" class="button-blue mdl-button mdl-js-button mdl-button--raised mdl-button--accent">Delete</button>
						<button type="button" class="button-red mdl-button mdl-js-button mdl-button--raised mdl-button--accent" onclick="closeButton()">Cancel</button>
					</div>
				</form>
			</div>
		</div>
		<div id="modal" class="modal" style="<?= $modal_style ?>"></div>
		<div id="modal-delete" class="modal"></div>
		<button class="add-btn button-blue mdl-button mdl-js-button mdl-button--fab mdl-button--colored"  onclick="addButton()" style="<?= $add_btnStyle ?>">
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