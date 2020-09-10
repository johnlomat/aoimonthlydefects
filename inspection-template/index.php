<?php
	define("ROOT",$_SERVER['DOCUMENT_ROOT']."/");
	define("HOST_URL",(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST']);
	require(ROOT.'libs/server.php');
	require_once(ROOT.'libs/add_function.php');
	require_once(ROOT.'libs/delete_function.php');	
	require_once(ROOT.'libs/class_handler.php');
	$title = new headerConfig('AI Inspection Template');
	$style = new headerConfig('assets/css/inspection-template.css','');
	include(ROOT.'header_mdl.php');
?>
<body style="<?= $body_style ?>">
	<div class="site-main">
		<div class="content-wrapper">
			<div class="content">
				<div class="table-title">
					<img src="<?= $title_icon ?>" width="50">
					<h2>AI Inspection Template</h2>
				</div>
				<div class="data-table">
					<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
						<thead>
							<tr>
								<th>Model</th>
								<th>PCB Partnumber</th>
								<th>Project</th>
                                <th>Customer</th>
                                <th>Progress</th>
                                <th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if(isset($_GET['pagenum'])) {
									$pagenum = $_GET['pagenum'];
								}else {
									$pagenum = 1;
								}

								$result_per_page = 15;
								$offset = ($pagenum - 1) * $result_per_page;

								$query = "SELECT COUNT(*) FROM inspection_template";
								$statement1 = $connect->prepare($query);
								$statement1->execute();
								$total_rows = $statement1->fetchColumn();
								$total_pages = ceil($total_rows / $result_per_page);

								$query = "SELECT * FROM inspection_template ORDER BY id ASC LIMIT $offset, $result_per_page";
								$statement2 = $connect->prepare($query);
								$statement2->execute();

								switch($pagenum) {
									case $pagenum == $total_pages:
										$result_per_page = $total_rows;
									break;
									case $pagenum <= $total_pages:
										$result_per_page = $result_per_page * $pagenum;
									break;
									case $pagenum >= $total_pages:
										$result_per_page = '0';
									break;																		
								}

								for ($i=0; $row = $statement2->fetch(); $i++) {
							?>							
							<tr>
								<td id="model-<?= $i?>" data-model="<?= $row['model']?>" data-id="<?= $row['id']?>">
										<button id="option-button-<?= $i ?>" class="button-icon">
											<i class="material-icons">more_vert</i>
										</button>
										<ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu mdl-js-ripple-effect" for="option-button-<?= $i ?>">
											<li class="mdl-menu__item">Update</li>
											<li id="delete-button-<?= $i ?>" class="mdl-menu__item" onclick="deleteFunction('#model-<?= $i ?>')">Delete</li>
										</ul>
										<span><?= $row['model']?></span>
								</td>
                                <td><?= $row['partnumber']?></td>
                                <td><?= $row['project']?></td>
                                <td><?= $row['customer']?></td>
                                <td><p class="percentage"><?= ($row['status'] == 'Done' ? '100%' : ($row['status'] == 'MkFF Fabrication' ? '50%' : '0%'))?></p><div id="p1" class="mdl-progress mdl-js-progress"><div class="progressbar bar bar1" style="width:<?= $percent = ($row['status'] == 'Done' ? '100%' : ($row['status'] == 'MkFF Fabrication' ? '50%' : '0%'))?>"></div></div></td>
                                <td><span style="border-radius:4px;color:white;padding:3px 5px;background:<?= ($row['status'] == 'Done' ? '#4CAF50' : ($row['status'] == 'MkFF Fabrication' ? '#FF9800' : '#F44235'))?>"><?= $row['status']?></span></td>
							</tr>
							<?php } ?>
							<tr class="pagination">							
								<td>
									<div>
										<p>Rows per page:&nbsp;</p>
										<p><?= $pagenum > $total_pages ? '0' : $offset + 1 ?> - <?= $result_per_page ?> of <?= $pagenum > $total_pages ? '0' : $total_rows?></p>
										<button class="mdl-button mdl-js-button mdl-button--icon" onclick="window.location.href='<?= HOST_URL . '/inspection-template' . '/?pagenum=' ?><?= $pagenum - 1 ?>'" <?= $pagenum <= 1 || $pagenum > $total_pages ? 'disabled' : '' ?>>
											<i class="material-icons">keyboard_arrow_left</i>
										</button>
										<button class="mdl-button mdl-js-button mdl-button--icon" onclick="window.location.href='<?= HOST_URL . '/inspection-template' . '/?pagenum=' ?><?= $pagenum + 1 ?>'" <?= $pagenum >= $total_pages ? 'disabled' : '' ?>>
											<i class="material-icons">keyboard_arrow_right</i>
										</button>
									</div>
								</td>								
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>                                                                                                                               
						</tbody>
					</table>
				</div>
			</div>
        </div>


		<!-- 
			Add Function Form 
		-->
		<div class="form-wrapper">
			<div id="form-add" class="form" style="<?= $form_style ?>">
				<div class="row">
					<h5>Add Model</h5>
					<button id="close" onclick="closeButton()"><i class="material-icons">close</i></button>
					<div class="mdl-tooltip" data-mdl-for="close">
						Press <strong>ESC</strong> to close
					</div>
				</div>
				<form method="post">
				<?php include(ROOT.'libs/errors.php') ?>					
					<div class="row">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-name mdl-textfield__input" type="text" id="textfield_1" maxlength="25" style="text-transform:uppercase" name="model" pattern="^[a-zA-Z0-9\d-]+$">
							<label class="mdl-name mdl-textfield__label">Model</label>
							<span class="mdl-textfield__error">Letters and numbers only!</span>
						</div>
					</div>
					<div class="row-2">
						<div class="textfield-partno mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-name mdl-textfield__input" type="text" id="textfield_2" maxlength="15" name="partnumber" pattern="[0-9\-]+">
							<label class="mdl-name mdl-textfield__label">PCB Partnumber</label>
							<span class="mdl-textfield__error">Numbers and dash only!</span>
						</div>
						<select class="select project" name="project" required>
							<option class="option" disabled selected value="">Project</option>
							<option>SeleTech Controls</option>
							<option>SeleTech Gen lll</option>
							<option>SeleTech Gen 3 Dual-Voltage</option>
							<option>EcoTech 1800RPM Controls</option>
							<option>EcoTech Motorcontrols</option>
							<option>EcoTech Gen lll</option>
							<option>PerfectSpeed Controls</option>
							<option>PerfectSpeed Gen lll</option>
							<option>PerfectSpeed Gen 3 for Modular Connectors</option>
							<option>750W 12G PLATINUM</option>
							<option>DS750PED-3</option>
							<option>DS750PED-3 Series for Arista</option>					
						</select>
					</div>
					<div class="row-2">
						<select class="select status" name="status" required>
							<option class="option" disabled selected value="">Status</option>
							<option>Ongoing request</option>
							<option>MkFF Fabrication</option>
							<option>Done</option>
						</select>							
						<select class="select customer" name="customer" required>
							<option class="option" disabled selected value="">Customer</option>
							<option>Artesyn Embedded Technologies</option>
							<option>Nidec Motor Corporation</option>
							<option>Ciena Corporation</option>
							<option>NEC</option>
						</select>									
					</div>					
					<div class="row">
						<button type="submit" name="add_inspection_template" id="add_confirm" class="button-blue mdl-button mdl-js-button mdl-button--raised mdl-button--accent">Confirm</button>
					</div>
				</form>
			</div>
		</div>


		<!--
			Delete Function Form
		-->
		<div class="delete-form-wrapper">
			<div id="form-delete" class="form">
			<h5>Are you sure you want to delete "<span class="model-form-title"></span>"?</h5>
				<form method="post">
					<input class="inspection-template-id" type="hidden" name="inspection_template_id">
					<div class="row-right">
						<button type="submit" name="delete_inspection_template" class="button-blue mdl-button mdl-js-button mdl-button--raised mdl-button--accent">Delete</button>
						<button type="button" class="button-red mdl-button mdl-js-button mdl-button--raised mdl-button--accent" onclick="closeButton()">Cancel</button>
					</div>
				</form>
			</div>
		</div>

		
		<!--
			Modal
		-->
		<div id="modal" class="modal" style="<?= $modal_style ?>"></div>
		<div id="modal-delete" class="modal"></div>


		<!--
			Buttons	
		-->
        <button class="add-btn button-blue mdl-button mdl-js-button mdl-button--fab mdl-button--colored" onclick="addButton()">
			<i class="material-icons">add</i>
        </button>	
		<div class="search-btn mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right" style="padding:0">
        	<label class="button-purple mdl-button mdl-js-button mdl-button--icon" for="fixed-header-drawer-exp" style="margin-top:-16px;color:white;width:56px;height:56px">
          		<i class="material-icons">search</i>
        	</label>
			<div class="mdl-textfield__expandable-holder" style="background:#683BB7;margin-left:55px">
				<form action="/inspection-template/search/" method="GET" style="margin:0;padding:0">
					<input class="mdl-textfield__input" type="text" name="q" id="fixed-header-drawer-exp" style="color:white;height:56px;padding: 0 10px 0 5px">
					<input type="submit" style="display:none">
				</form>
        	</div>
      	</div>
	</div>
	<script src="<?= HOST_URL.'/assets/script/main-script.js' ?>"></script>
</body>
</html>