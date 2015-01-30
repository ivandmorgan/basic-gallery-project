<?php 
	session_start();
	
	require "connect.php";
	
	if ($_POST) {
		if (isset($_POST['userid']) && isset($_POST['passwordid'])) {
			$userid = $_POST['userid'];
			$passwordid = $_POST['passwordid'];
			
			$query = $conn->query("SELECT password FROM users WHERE username = '$userid'");
			$dbpassword = $query->fetch_object();
			
			if (!empty($dbpassword->password) && $passwordid == $dbpassword->password) { 
				$_SESSION['userid'] = $userid;
				
				if (isset($_SESSION['userid'])) {
					header('Location: http://localhost/gallery/php/home.php');
				}
			} else {
				echo "<br />Please make sure that your password and username are correct!";	
			}
		} else {
			echo "<br />Please make sure your password and username are correct or fill in the membership form!<br />";
			session_destroy();
		}
	} else {
		echo "<br />Please make sure your password and username are correct or fill in the membership form!<br />";
		session_destroy();	
	}
	
	echo '<br /><a href="http://localhost/gallery/index.php">Home Page</a>';
	
?>
