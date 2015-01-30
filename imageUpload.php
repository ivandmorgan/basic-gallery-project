<?php
	session_start();
	
	if (!empty($_POST['createFolder'])) {
		
		$createFolder = $_POST['createFolder'];
		mkdir('uploads/' . $_SESSION['retrieve'] . '/' . $createFolder, 0777);
		header ('Location: http://localhost/gallery/php/home.php');
		
		$_SESSION['folder'] = $createFolder;

		
		if (!empty($_FILES['files']['name'][0])) {
			$files = $_FILES['files'];
			
			$uploaded = array();
			$failed = array();
			
			$allowed = array('jpg', 'jpeg', 'png', 'gif');
		
			foreach($files['name'] as $position => $file_name) {
				$file_tmp = $files['tmp_name'][$position];	
				$file_size = $files['size'][$position];
				$file_error = $files['error'][$position];
				
				$file_ext = explode('.', $file_name);
				$file_ext = strtolower(end($file_ext));
			
				if(in_array($file_ext, $allowed)) {
					header('Location: http://localhost/gallery/php/home.php');
					if ($file_error === 0) {
						if ($file_size) {
							$file_name_new = uniqid('', true) . "." . $file_ext;
							$file_destination = 'uploads/' . $_SESSION['retrieve'] . '/'. $createFolder . '/' .  $file_name_new;
							
							if (move_uploaded_file($file_tmp, $file_destination)) {
								$uploaded[$position] = $file_destination;
							} else {
								$failed[$position] = "[{$file_name}]";
							}
						} else {
							echo "file too large";	
						}
					} else {
						$failed[$position] = "[file_name] errored with code {$file_error}";	
					}
				} else {
					$failed[$position] = "[{$file_name}] file extension is not allowed";	
				}
			}
		
			if (!empty($uploaded)) {
				echo "<pre>", print_r($uploaded), "</pre>";	
			}
			
			if (!empty($failed)) {
				echo "<pre>", print_r($failed), "</pre>";	
			}
			
		} 
	
	} else {
		echo "Please insert name for folder";
		echo '<br /><a href="home.php">Home Page</a>';	
	}
	
	
	
?>
