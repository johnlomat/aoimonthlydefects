<?php
	session_name('aoi_monthly_defects');
	$errors_upload = array();
	$target_dir = "upload/images/";
	$model_id = isset($_POST['model_id']) ? $_POST['model_id'] : '';
	$form_image_style = "";
	$modal_style_2 = "";
	$body_style = "";
	
	if(isset($_POST['add_image'])) {
		try {
			$image_name = basename($_FILES["file_upload"]["name"]);
			$target_file = $target_dir . basename($_FILES['file_upload']['name']);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			if ($_FILES["file_upload"]["size"] > 8388608) {
				array_push($errors_upload, "File is too large (Maximum 8 MB)");
				$form_image_style = "top:100px;margin: 0 auto";
				$modal_style_2 = "display:block;position:fixed;z-index:1;width:100%;height:100%;top:0;left:0;overflow:hidden;background-color:rgba(0,0,0,0.4);opacity:1";
				$body_style = "overflow:hidden";
			}
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
				array_push($errors_upload, "File is not an image");
				$form_image_style = "top:100px;margin: 0 auto";
				$modal_style_2 = "display:block;position:fixed;z-index:1;width:100%;height:100%;top:0;left:0;overflow:hidden;background-color:rgba(0,0,0,0.4);opacity:1";
				$body_style = "overflow:hidden";
			}
			if (count($errors_upload) == 0) {
				if (move_uploaded_file($_FILES["file_upload"]["tmp_name"], $target_file)) {
					$query = "UPDATE line_defects SET image_name='$image_name' WHERE id = :id";
					$statement = $connect->prepare($query);
					$statement->bindValue(':id', $model_id);
					$statement->execute();
					$url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
				
					header("Location: $url");
				}
			}
		}
		catch(PDOException $e) {
			echo $query . "<br>" . $e->getMessage();
		}
	}
?>