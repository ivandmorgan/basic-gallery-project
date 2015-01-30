<?php
	session_start();
	session_destroy();
	unset($_SESSION);
	header('Location: http://localhost/gallery/index.php');
?>
