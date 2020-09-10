<?php
	session_name('aoi_monthly_defects');
	$model_id = isset($_POST['model_id']) ? $_POST['model_id'] : '';
	$line = isset($_POST['line']) ? $_POST['line'] : '';
	$model = isset($_POST['model']) ? $_POST['model'] : '';
	$location_id = isset($_POST['location_id']) ? $_POST['location_id'] : '';
	$inspection_template_id = isset($_POST['inspection_template_id']) ? $_POST['inspection_template_id'] : '';
	
	//	Delete model function
	if(isset($_POST['delete_model'])) {
		try {
			$connect = new PDO("mysql:host=localhost;dbname=aoi_monthly_defects","root","root");
			$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query1 = "DELETE FROM line_defects WHERE id = :id";
			$query2 = "DELETE FROM model_defects WHERE line = :line AND model = :model";
			$statement1 = $connect->prepare($query1);
			$statement2 = $connect->prepare($query2);
			$statement1->bindValue(':id', $model_id);	
			$statement2->bindValue(':line', $line);
			$statement2->bindValue(':model', $model);
			$statement1->execute();
			$statement2->execute();
			$url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

			header("Location: $url");
		}
		catch(PDOException $e) {
			echo $query . "<br>" . $e->getMessage();
		}
	}
	
	//	Delete location function
	if(isset($_POST['delete_location'])) {
		try {		
			$connect = new PDO("mysql:host=localhost;dbname=aoi_monthly_defects","root","root");
			$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query = "DELETE FROM model_defects WHERE id = :id";
			$statement = $connect->prepare($query);
			$statement->bindValue(':id', $location_id);	
			$statement->execute();
			$url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

			header("Location: $url");
		}
		catch(PDOException $e) {
			echo $query . "<br>" . $e->getMessage();
		}
	}

	// Delete inspection template function
	if(isset($_POST['inspection_template_id'])) {
		try {		
			$connect = new PDO("mysql:host=localhost;dbname=aoi_monthly_defects","root","root");
			$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query = "DELETE FROM inspection_template WHERE id = :id";
			$statement = $connect->prepare($query);
			$statement->bindValue(':id', $inspection_template_id);	
			$statement->execute();
			$url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

			header("Location: $url");
		}
		catch(PDOException $e) {
			echo $query . "<br>" . $e->getMessage();
		}
	}
?>