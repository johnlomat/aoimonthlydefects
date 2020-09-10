<?php
	$row_location_id = array();
	$row_location = array();
	$row_defect = array();
	$row_january = array();
	$row_february = array();
	$row_march = array();
	$row_april = array();
	$row_may = array();
	$row_june = array();
	$row_july = array();
	$row_august = array();
	$row_september = array();
	$row_october = array();
	$row_november = array();
	$row_december = array();
	
	$query = "SELECT * FROM model_defects WHERE line = :line AND model = :model ORDER BY id DESC";
	$statement = $connect->prepare($query);
	$statement->bindValue(':line', $line);
	$statement->bindValue(':model', $model);
	$statement->execute();
	
	for ($i=0; $row = $statement->fetch(); $i++) {
		array_push($row_location_id,$row['id']);
		array_push($row_location,$row['location']);
		array_push($row_defect,$row['defect']);
		array_push($row_january,$row['january']);
		array_push($row_february,$row['february']);
		array_push($row_march,$row['march']);
		array_push($row_april,$row['april']);
		array_push($row_may,$row['may']);
		array_push($row_june,$row['june']);
		array_push($row_july,$row['july']);
		array_push($row_august,$row['august']);
		array_push($row_september,$row['september']);
		array_push($row_october,$row['october']);
		array_push($row_november,$row['november']);
		array_push($row_december,$row['december']);
	}
?>