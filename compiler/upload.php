<?php
	session_start();
	
	//Check for valid upload
	if($_FILES['file']['error'] != UPLOAD_ERR_OK) {
		echo 'Upload file error: ' . $_FILES['file']['error'];
		return;
	}
	if(!is_uploaded_file($_FILES['file']['tmp_name'])) {
		echo 'Invalid request!';
		return;
	}
	
	//Make sure it conforms to the format/size requirements
	/*
	$valid = false;
	$accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
	$type = $_FILES['file']['type'];
	foreach($accepted_types as $mime_type) {
		if($mime_type == $type) {
			$valid = true;
			break;
		} 
	}
	if ( (!$valid) || ($_FILES["file"]["size"]>20000) ) {
		echo "File is either of wrong type or is too large! </br> Please try again. </br>";
		echo "Type: " . $type;
		return;
	}
	*/
	
	//Sanitize the filename
	$remove_these = array(' ','`','"','\'','\\','/');
	$newname = str_replace($remove_these,'',$_FILES['file']['name']);
	//Make the filename unique
	$subfolder = time().'-'.$newname;
	//Save the uploaded the file to another location
	$upload_path = "./uploads/$subfolder";
	//Create the subfolder and move the download into it
	if(!mkdir($upload_path , 0777)) 
	{ 
		echo "Failed to create unique directory...";
		return;
	} 
	move_uploaded_file($_FILES['file']['tmp_name'], $upload_path."/$newname");
	
	//Write some stuff about this file
	echo "Sanitary Filename: " . $newname . "</br>";
	echo "Unique Subfolder: " . $subfolder . "</br>";
	
	//Get info about the zip file's contents
	//chdir($upload_path);
	//shell_exec("gzip -l " . $newname);
	
	//Set the current upload path in the user session
	$_SESSION['uploadName'] = $newname;
	$_SESSION['uploadPath'] = $subfolder;
	?>