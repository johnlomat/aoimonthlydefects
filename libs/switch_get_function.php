<?php
	switch ($_GET['line']) {
		case "line1":
			$_SESSION['line'] = "Line 1";
			$_SESSION['current_line'] = "line1";
			$line = $_SESSION['line'];
			$current_line = $_SESSION['current_line'];
		break;
		case "line2":
			$_SESSION['line'] = "Line 2";
			$_SESSION['current_line'] = "line2";
			$line = $_SESSION['line'];
			$current_line = $_SESSION['current_line'];
		break;
		case "line3":
			$_SESSION['line'] = "Line 3";
			$_SESSION['current_line'] = "line3";
			$line = $_SESSION['line'];
			$current_line = $_SESSION['current_line'];
		break;
		case "line5":
			$_SESSION['line'] = "Line 5";
			$_SESSION['current_line'] = "line5";
			$line = $_SESSION['line'];
			$current_line = $_SESSION['current_line'];
		break;
		case "line6":
			$_SESSION['line'] = "Line 6";
			$_SESSION['current_line'] = "line6";
			$line = $_SESSION['line'];
			$current_line = $_SESSION['current_line'];
		break;
		case "offline":
			$_SESSION['line'] = "Offline";
			$_SESSION['current_line'] = "offline";
			$line = $_SESSION['line'];
			$current_line = $_SESSION['current_line'];
		break;
		default:
			$background_image1 = "display:none";
			$background_image2 = "display:flex";
			$line = "Error 404 Not Found!";
			$add_btnStyle = "display:none";
		break;
	}
?>