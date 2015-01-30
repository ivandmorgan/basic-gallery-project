<?php
	session_start();	
	if (isset($_SESSION['username'])) {
		$_SESSION['retrieve'] = $_SESSION['username'];
	} else if (isset($_SESSION['userid'])) {
		$_SESSION['retrieve'] = $_SESSION['userid'];
	}	
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Untitled Document</title>
	<link href="../css/gallery.css" rel="stylesheet" type="text/css" />
	<script>
		
	</script>
</head>

<body>

	<h1>Welcome <?php echo $_SESSION['retrieve']; ?>!!!</h1>

	<form action="imageUpload.php" method="post" enctype="multipart/form-data">
		<input type="text" name="createFolder" value="" placeholder="enter album name" />
		<input type="file" name="files[]" multiple />
		<input type="submit" value="Upload" />
		<button type="submit" formaction="logOut.php">Log Out!</button>
	</form>
	
	<div>
		<?php		
			$albums = array_slice(scandir('uploads/' . $_SESSION['retrieve'] . '/'), 2);
			foreach ($albums as $album) {
				
				
			$files = glob('uploads/' . $_SESSION['retrieve'] . '/' . $album . '/*.*');
	
/*			for ($i = 0; $i < count($files); $i++) {
				$image = $files[$i];
				
				print $image . '<br />';
				echo '<img src="' . $image . '" /><br />';	
				if ($i == (count($files)) - 1) {
					 echo $i + 1;	
					 if ($i) {
						$i = 0; 
						break;
					 }
				}
			}	
*/				
				
				
				
				echo '<button type="button">' . '<img src="' . $files['0'] . '" />' . '</button>';	
			}
		?>
	</div>
	
</body>
</html>
