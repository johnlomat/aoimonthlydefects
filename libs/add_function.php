<?php
	session_name('aoi_monthly_defects');
	$errors = array();
	$form_style = "";
	$modal_style = "";
	$body_style= "";
	$name = isset($_POST['name']) ? $_POST['name'] : '';
	$date = isset($_POST['date']) ? $_POST['date'] : '';
	$time = isset($_POST['time']) ? $_POST['time'] : '';
	$image_name = isset($_POST['image_name']) ? $_POST['image_name'] : '';
	$line = isset($_POST['line']) ? $_POST['line'] : '';
	$model = isset($_POST['model']) ? $_POST['model'] : '';
	$assy = isset($_POST['assy']) ? $_POST['assy'] : '';
	$side = isset($_POST['side']) ? $_POST['side'] : '';
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
	$year = isset($_POST['year']) ? $_POST['year'] : '';
	$partnumber = isset($_POST['partnumber']) ? $_POST['partnumber'] : '';
	$project = isset($_POST['project']) ? $_POST['project'] : '';
	$customer = isset($_POST['customer']) ? $_POST['customer'] : '';
	$status = isset($_POST['status']) ? $_POST['status'] : '';
	
	//	Add model function
	if(isset($_POST['add_model'])) {
		try {
			$connect = new PDO("mysql:host=localhost;dbname=aoi_monthly_defects","root","root");
			$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			$query = "SELECT model, assy, side FROM line_defects WHERE line = :line AND model = :model AND assy = :assy AND side = :side";
			$statement = $connect->prepare($query);
			$statement->bindValue(':line', $line);
			$statement->bindValue(':model', $model);
			$statement->bindValue(':assy', $assy);
			$statement->bindValue(':side', $side);
			$statement->execute();
			$row = $statement->fetch(PDO::FETCH_ASSOC);
			
			if ($row > 0) {
				array_push($errors, "Model is already exists");
				$form_style = "top:100px;margin: 0 auto";
				$modal_style = "display:block;position:fixed;z-index:5;width:100%;height:100%;top:0;left:0;overflow:hidden;background-color:rgba(0,0,0,0.4);opacity:1";
				$body_style = "overflow:hidden";
			}
			if (empty($side)) {
				array_push($errors, "Please select a side");
				$form_style = "top:100px;margin: 0 auto";
				$modal_style = "display:block;position:fixed;z-index:5;width:100%;height:100%;top:0;left:0;overflow:hidden;background-color:rgba(0,0,0,0.4);opacity:1";
				$body_style = "overflow:hidden";
			}
			if (count($errors) == 0) {
				$query = "INSERT INTO line_defects (line, model, assy, side, added_by, date_added, time_stamp, image_name) VALUES ('$line',UPPER('$model'),UPPER('$assy'),'$side','$name','$date','$time','$image_name')";		
				$statement = $connect->prepare($query);
				$statement->execute();
				$url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
				
				header("Location: $url");
			}
		}
		catch(PDOException $e) {
			echo $query . "<br>" . $e->getMessage();
		}
	}
	
	//	Add location function
	if(isset($_POST['add_location'])) {
		try {
			$connect = new PDO("mysql:host=localhost;dbname=aoi_monthly_defects","root","root");
			$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query = "SELECT location, defect FROM model_defects WHERE line = :line AND model = :model AND location = :location AND defect = :defect";
			$statement = $connect->prepare($query);
			$statement->bindValue(':line', $line);	
			$statement->bindValue(':model', $model);	
			$statement->bindValue(':location', $location);			
			$statement->bindValue(':defect', $defect);
			$statement->execute();
			$row = $statement->fetch(PDO::FETCH_ASSOC);
			
			if ($row > 0) {
				array_push($errors, "Duplicate model and location");
				$form_style = "top:100px;margin: 0 auto";
				$modal_style = "display:block;position:fixed;z-index:5;width:100%;height:100%;top:0;left:0;overflow:hidden;background-color: rgba(0,0,0,0.4);opacity:1";
				$body_style = "overflow:hidden";
			}
			if (empty($defect)) {
				array_push($errors, "Please choose defect code");
				$form_style = "top:100px;margin: 0 auto";
				$modal_style = "display:block;position:fixed;z-index:5;width:100%;height:100%;top:0;left:0;overflow:hidden;background-color:rgba(0,0,0,0.4);opacity:1";
				$body_style = "overflow:hidden";
			}
			if (count($errors) == 0) {
				$query = "INSERT INTO model_defects (line, model, location, defect, january, february, march, april, may, june, july, august, september, october, november, december, year) VALUES ('$line','$model',UPPER('$location'),UPPER('$defect'),'$january','$february','$march','$april','$may','$june','$july','$august','$september','$october','$november','$december','$year')";
				$statement = $connect->prepare($query);
				$statement->execute();
				$url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

				header("Location: $url");
			}
		}
		catch(PDOException $e) {
			echo $query . "<br>" . $e->getMessage();
		}
	}

	//	Add inspection template function
	if(isset($_POST['add_inspection_template'])) {
		try {
			$connect = new PDO("mysql:host=localhost;dbname=aoi_monthly_defects","root","root");
			$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			$query = "SELECT model, partnumber FROM inspection_template WHERE model = :model";
			$statement = $connect->prepare($query);
			$statement->bindValue(':model', $model);				
			$statement->execute();
			$row = $statement->fetch(PDO::FETCH_ASSOC);
			
			if ($row > 0) {
				array_push($errors, "Model is already exists");
				$form_style = "top:100px;margin: 0 auto";
				$modal_style = "display:block;position:fixed;z-index:5;width:100%;height:100%;top:0;left:0;overflow:hidden;background-color:rgba(0,0,0,0.4);opacity:1";
				$body_style = "overflow:hidden";
			}

			if (count($errors) == 0) {
				$query = "INSERT INTO inspection_template (model, partnumber, project, customer, status) VALUES (UPPER('$model'),'$partnumber','$project','$customer','$status')";		
				$statement = $connect->prepare($query);
				$statement->execute();
				$url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
				
				header("Location: $url");
			}
		}
		catch(PDOException $e) {
			echo $query . "<br>" . $e->getMessage();
		}
	}	
?>