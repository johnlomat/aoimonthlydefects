<?php
	$errors = array();
	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';

	if(isset($_POST['login_user'])) {
		try {
			if (empty($email) || empty($password)) {  
                array_push($errors, "Please enter email and password");
			}else {  
                $query = "SELECT * FROM user WHERE email = :email AND password = :password";
                $statement = $connect->prepare($query);
				$statement->bindValue(':email',$email);
				$statement->bindValue(':password',$password);
                $statement->execute();
                $row = $statement->fetch(PDO::FETCH_ASSOC);
				
                if ($row > 0) {  
                    $_SESSION['email'] = $_POST['email'];

					if(isset($_SESSION['url'])) {
						header('Location: '.$_SESSION['url']);
					}else {
						header('Location: '.HOST_URL);
					}
                }else {  
                    array_push($errors, "Wrong email / password combination");  
                }  
           }  
		}
		catch(PDOException $e) {
			echo $query . "<br>" . $e->getMessage();
		}
	}
?>