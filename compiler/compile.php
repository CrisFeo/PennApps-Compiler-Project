<?php
	session_start();

	//Get the current upload path and name from the session data
	$uploadPath = "";
	$uploadName = "";
	if( isset($_SESSION['uploadPath']) && isset($_SESSION['uploadName']) ) {
		$uploadPath = $_SESSION['uploadPath'];
		$uploadName = $_SESSION['uploadName'];
	} else {
		echo "<log>No file uploaded, compilation cancelled...</log>";
		return;
	}
	
	//Do things here!
	/*
	//Things like this:
	chdir($upload_path);
	shell_exec("unzip " . $newname);
	shell_exec("javac *.java");
	shell_exec("zip . "out-" . $newname);
	//Or somesuch. This is more of an outline
	*/
	
	//Send the url to download the output zip
	echo "<url>" . "./download.php?download_file=". $uploadPath . "/" . $uploadName . "</url>";

?>