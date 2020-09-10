<?php
	define("ROOT",$_SERVER['DOCUMENT_ROOT']."/");
	define("HOST_URL",(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST']);
	require_once(ROOT.'libs/server.php');
	session_name('aoi_monthly_defects');
	session_start();		
	$title_icon = HOST_URL."/assets/images/table-title-icon.png";
	$logo = HOST_URL."/assets/images/logo/tri-logo.png";
	$line = $_SESSION['line'];
	$model = $_SESSION['title'];
	require_once(ROOT.'libs/location_count.php');
?>
			<div class="data-table">
				<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
					<tr>
					<?php $i=0; foreach ($row_location_id as $location_id) : $i++ ?>
						<div id="id-<?= $i ?>" data-id="<?= $location_id ?>"></div>
					<?php endforeach ?>
						<th>Location</th>
						<?php $i=0; foreach ($row_location as $location) : $i++ ?>
						<td id="location-<?= $i ?>" data-location="<?= $location ?>"><span><?= $location ?><button id="edit-button-<?= $i ?>" class="edit-button button-icon" style="opacity:1;display:inline-block" onclick="editForm('#location-<?= $i?>');editForm2('#defect-<?= $i?>');editForm3('#january-<?= $i?>');editForm4('#february-<?= $i?>');editForm5('#march-<?= $i?>');editForm6('#april-<?= $i?>');editForm7('#may-<?= $i?>');editForm8('#june-<?= $i?>');editForm9('#july-<?= $i?>');editForm10('#august-<?= $i?>');editForm11('#september-<?= $i?>');editForm12('#october-<?= $i?>');editForm13('#november-<?= $i?>');editForm14('#december-<?= $i?>')"><i class="material-icons">create</i></button><button id="delete-button-<?= $i ?>" class="delete-button button-icon" style="opacity:1;display:inline-block" onclick="deleteID('#id-<?= $i ?>');deleteFunction('#location-<?= $i?>');deleteFunction('#defect-<?= $i?>')"><i class="material-icons">delete</i></button></span></td>
							<div class="mdl-tooltip" data-mdl-for="edit-button-<?= $i ?>" data-upgraded=",MaterialTooltip">
								Edit
							</div>
							<div class="mdl-tooltip" data-mdl-for="delete-button-<?= $i ?>" data-upgraded=",MaterialTooltip">
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