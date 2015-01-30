<?php
	$server = "localhost";
	$username = "Ivan";
	$password = "Ivan100Morgan";
	$db = "imagecreative";
	
	$conn = new mysqli($server, $username, $password, $db);
	
	if ($conn->connect_error) {
		die ("Connection failed: " . $conn->connect_error);	
	}
?>
