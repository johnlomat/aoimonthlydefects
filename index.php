<?php
	define("ROOT",$_SERVER['DOCUMENT_ROOT']."/");
	define("HOST_URL",(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST']);
	session_name('aoi_monthly_defects');
	session_start();
	require_once(ROOT.'libs/class_handler.php');
	require_once(ROOT.'libs/redirect.php');
	$title = new headerConfig('TRI AOI | Monthly Defects');
	$style = new headerConfig('assets/css/stylesheets.css','assets/css/navbar.css');
	include(ROOT.'header_mdl.php');
?>
<body>
	<div class="site-main">
		<?php include(ROOT.'libs/navbar.php') ?>
		<div class="content-wrapper">
			<div class="content">
				<div class="table-title">
					<img src="<?= $title_icon ?>" width="50">
					<h2>AOI Monthly Defects</h2>
				</div>
				<div class="data-table">
					<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
						<thead>
							<tr>
								<th class="view"></th>
								<th>Machine Name</th>
								<th>Current Location</th>
								<th>Monthly Performed</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><a type="button" href="view.php?line=line1" target="_blank" class="no-color-button mdl-button mdl-js-button mdl-js-ripple-effect">View</a></td>
								<td>AOI</td>
								<td>Line 1</td>
								<td>SMT AOI Team</td>
							</tr>
							<tr>
								<td><a type="button" href="view.php?line=line2" target="_blank" class="no-color-button mdl-button mdl-js-button mdl-js-ripple-effect">View</a></td>
								<td>AOI</td>
								<td>Line 2</td>
								<td>SMT AOI Team</td>
							</tr>
							<tr>
								<td><a type="button" href="view.php?line=line3" target="_blank" class="no-color-button mdl-button mdl-js-button mdl-js-ripple-effect">View</a></td>
								<td>AOI</td>
								<td>Line 3</td>
								<td>SMT AOI Team</td>
							</tr>
							<tr>
								<td><a type="button" href="view.php?line=line5" target="_blank" class="no-color-button mdl-button mdl-js-button mdl-js-ripple-effect">View</a></td>
								<td>AOI</td>
								<td>Line 5</td>
								<td>SMT AOI Team</td>
							</tr>
							<tr>
								<td><a type="button" href="view.php?line=line6" target="_blank" class="no-color-button mdl-button mdl-js-button mdl-js-ripple-effect">View</a></td>
								<td>AOI</td>
								<td>Line 6</td>
								<td>SMT AOI Team</td>
							</tr>
							<tr>
								<td><a type="button" href="view.php?line=offline" target="_blank" class="no-color-button mdl-button mdl-js-button mdl-js-ripple-effect">View</a></td>
								<td>AOI</td>
								<td>Offline</td>
								<td>SMT AOI Team</td>
							</tr>				
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<script src="<?= HOST_URL.'/assets/script/main-script.js' ?>"></script>
</body>
</html>