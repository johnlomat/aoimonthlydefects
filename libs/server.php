<?php
	// Development Connection
	// $connect = new PDO("mysql:host=localhost;dbname=aoi_monthly_defects","root","root");

	// Remote SQL Connection
	$connect = new PDO("mysql:host=remotemysql.com;dbname=OuqhQAwYnh","OuqhQAwYnh","7DjFAmL7Ey");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>