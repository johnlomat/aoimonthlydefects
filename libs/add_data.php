<?php
	require_once('../libs/server.php');
	session_name('aoi_monthly_defects');
	$line = isset($_POST['line']) ? $_POST['line'] : '';
	$model = isset($_POST['model']) ? $_POST['model'] : '';
	$location = isset($_POST['location']) ? $_POST['location'] : '';
	$defect= isset($_POST['defect']) ? $_POST['defect'] : '';
	$january = isset($_POST['january']) ? $_POST['january'] : '';
	$february = isset($_POST['february']) ? $_POST['february'] : '';
	$march = isset($_POST['march']) ? $_POST['march'] : '';
	$april = isset($_POST['april']) ? $_POST['april'] : '';
	$may = isset($_POST['may']) ? $_POST['may'] : '';
	$june = isset($_POST['june']) ? $_POST['june'] : '';
	$july = isset($_POST['july']) ? $_POST['july'] : '';
	$august = isset($_POST['august']) ? $_POST['august'] : '';
	$september = isset($_POST['september']) ? $_POST['september'] : '';
	$october = isset($_POST['october']) ? $_POST['october'] : '';
	$november = isset($_POST['november']) ? $_POST['november'] : '';
	$december = isset($_POST['december']) ? $_POST['december'] : '';
	
	try {
		$query = "UPDATE model_defects SET january='$january',february='$february',march='$march',april='$april',may='$may',june='$june',july='$july',august='$august',september='$september',october='$october',november='$november',december='$december' WHERE line = :line AND model = :model AND location = :location AND defect = :defect";
		$statement = $connect->prepare($query);
		$statement->bindValue(':line', $line);	
		$statement->bindValue(':model', $model);
		$statement->bindValue(':location', $location);			
		$statement->bindValue(':defect', $defect);
		$statement->execute();
		
		die();
	}
	catch(PDOException $e) {
		echo $query . "<br>" . $e->getMessage();
	}
?>