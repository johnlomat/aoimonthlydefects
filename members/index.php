<?php
	define("ROOT",$_SERVER['DOCUMENT_ROOT']."/");
	define("HOST_URL",(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST']);
	session_name('aoi_monthly_defects');
	session_start();
	require(ROOT.'libs/server.php');
	require_once(ROOT.'libs/class_handler.php');
	require_once(ROOT.'libs/redirect.php');
	$_SESSION['url'] = HOST_URL . $_SERVER['REQUEST_URI'];
	$title = new headerConfig('TRI AOI | Members');
	$style = new HeaderConfig('assets/css/member.css','assets/css/navbar.css');
	include(ROOT.'header_mdl.php');
?>
<body>
	<div class="site-main">
		<?php include(ROOT.'libs/navbar.php') ?>
		<div class="content-wrapper">
			<div class="content">
				<div class="table-title">
					<img class="title-icon" src="<?= $title_icon ?>" width="50">
					<h2>AOI Members</h2>
				</div>
				<div class="data-table">
					<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
						<thead>
							<tr>
								<th>Name</th>
								<th>Birthdate</th>
								<th>Gender</th>
								<th>Email</th>
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

								$query = "SELECT COUNT(*) FROM user";
								$statement1 = $connect->prepare($query);
								$statement1->execute();
								$total_rows = $statement1->fetchColumn();
								$total_pages = ceil($total_rows / $result_per_page);

								$query = "SELECT * FROM user ORDER BY id ASC LIMIT $offset, $result_per_page";
								$statement = $connect->prepare($query);
								$statement->execute();

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

								for ($i=0; $row = $statement->fetch(); $i++) {
							?>
							<tr>
								<td style="text-transform:capitalize"><?= $row['firstname'] . " " . $row['lastname'] ?></td>
								<td><?= $row['birthdate'] ?></td>
								<td><?= $row['gender'] ?></td>
								<td><?= $row['email'] ?></td>
							</tr>
							<?php
								}
							?>
							<tr class="pagination">
								<td></td>
								<td></td>
								<td></td>
								<td>
									<div>
										<p>Rows per page:&nbsp;</p>
										<p><?= $pagenum > $total_pages ? '0' : $offset + 1 ?> - <?= $result_per_page ?> of <?= $pagenum > $total_pages ? '0' : $total_rows?></p>
										<button class="mdl-button mdl-js-button mdl-button--icon" onclick="window.location.href='<?= HOST_URL . '/members' . '/?pagenum=' ?><?= $pagenum - 1 ?>'" <?= $pagenum <= 1 || $pagenum > $total_pages ? 'disabled' : '' ?>>
											<i class="material-icons">keyboard_arrow_left</i>
										</button>
										<button class="mdl-button mdl-js-button mdl-button--icon" onclick="window.location.href='<?= HOST_URL . '/members' . '/?pagenum=' ?><?= $pagenum + 1 ?>'" <?= $pagenum >= $total_pages ? 'disabled' : '' ?>>
											<i class="material-icons">keyboard_arrow_right</i>
										</button>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<script src="<?=HOST_URL.'/assets/script/main-script.js' ?>"></script>
</body>
</html>