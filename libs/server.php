<?php
	$connect = new PDO("mysql:host=localhost;dbname=aoi_monthly_defects","root","root");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>