<?php
	session_start();
	
	require "connect.php";
	
	if (!empty($_POST['firstName']) || !empty($_POST['lastName']) || !empty($_POST['username']) || !empty($_POST['password'])) {
		if ($_POST) {
			$fName = $_POST['firstName'];
			$sName = $_POST['lastName'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$passwordCheck = $_POST['passwordCheck'];
		
		
			if ($password === $passwordCheck) {
				$query = $conn->prepare("INSERT INTO users (firstName, lastName, username, password) VALUES (?, ?, ?, ?)");
				$query->bind_param("ssss", $fName, $sName, $username, $password);
				$query->execute();
		
				$_SESSION['username'] = $username;
				$dir = mkdir('uploads/'. $_SESSION['username'], 0777);
				header('Location: http://localhost/gallery/php/home.php');
			}
		}	
	} else {
		echo "Please fill in all the fields";
		
		session_destroy();	
	}
?>
