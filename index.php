<?php
	session_start();
?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Image Creative - Log In/Sign Up</title>
</head>

<body>

	<h3>Log In</h3>
	
	<form name="signIn" action="php/signIn.php" method="post" enctype="multipart/form-data">
		Username: <input type="text" name="userid" /><br />
		Password: <input type="password" name="passwordid" /><br />
		<input type="submit" value="Login" name="Submit" />
	</form>
	
	<h3>Or Sign Up</h3>
	
	<form id="membersForm" action="php/membersForm.php" method="post" enctype="multipart/form-data">
		First Name: <input type="text" name="firstName" /><br />
		Last Name: <input type="text" name="lastName" /><br />
		Username: <input type="text" name="username" /><br />
		Password: <input type="password" name="password" /><br />
		Re-enter Password: <input type="password" name="passwordCheck" /><br />
		<input type="submit" value="Become A Member" name="Join" />
	</form>

</body>
</html>
