<?php
	session_name('aoi_monthly_defects');
	session_start();
	$errors = array();
	$success = "";
	$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
	$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
	$birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : '';
	$gender = isset($_POST['gender']) && !empty($_POST['gender']) ? $_POST['gender'] : '';
	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$password_1 = isset($_POST['password_1']) ? $_POST['password_1'] : '';
	$password_2 = isset($_POST['password_2']) ? $_POST['password_2'] : '';
	
	if(isset($_POST['reg_user'])) {
		try {
			$connect = new PDO("mysql:host=localhost;dbname=aoi_monthly_defects","root","root");
			$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$password = $password_1;
			
			$query = "SELECT COUNT(email) AS total FROM user WHERE email = :email";
			$statement = $connect->prepare($query);			
			$statement->bindValue(':email', $email);		
			$statement->execute();
			$row = $statement->fetch(PDO::FETCH_ASSOC);
			
			if ($row['total'] > 0) {
				array_push($errors, "Email is already exists");
			}		
			if (empty($firstname) || empty($lastname) || empty($birthdate) || empty($gender) || empty($email) || empty($password_1)) { 
				array_push($errors, "Please fill out all the required fields");
			}			
			if ($password_1 != $password_2) {
				array_push($errors, "Your password does not match");
			}		
			if (count($errors) == 0) {
				$query = "INSERT INTO user (firstname, lastname, birthdate, gender, email, password) VALUES ('$firstname','$lastname','$birthdate','$gender','$email','$password')";
				$statement = $connect->prepare($query);
				$statement->execute();
				$success = "New created account is successfully, wait till I redirect you to home page";
				
				$_SESSION['email'] = $_POST['email'];
				header('refresh:5;' .HOST_URL );
				exit(include('../libs/success.php'));
			}
		}
		catch(PDOException $e) {
			echo $query . "<br>" . $e->getMessage();
		}
	}
?>