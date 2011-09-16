<html>

<head>
	
	<?php session_start(); ?>
	
	<title>Compile.me - Online Project Compilation </title>
	
	<!-- jQuery Includes -->
	<link type="text/css" href="./assets/css/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet"/>
	<script src="./assets/js/jquery-1.6.2.min.js"></script>
	<script src="./assets/js/jquery-ui-1.8.16.custom.min.js"></script>
	<script src="./assets/js/jquery.form.js"></script>
	
	<!-- Page-Specific Includes -->
	<link rel="stylesheet" type="text/css" href="./assets/baseStyles.css">
	<script src="./index.js"></script>
</head>

<body>
	
	<!-- HEADER -->
	<div id="header">
		<!-- TODO: Put a picture here and float the <h1> right -->
		<img id="headLogo" src="#"/>
		<h1>Compile.me</h1>
		
		<ul id="navContainer">
				<li><a href="./index.php"/>Home</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">Support</a></li>
				<li><a href="#">Contact</a></li>
		</ul>
	</div>
	
	
	<!-- CONTENT -->
	<div id="content">
		
		
		<div id="fileUpload">
			<h2> Upload a Zip File: </h2>
			<!-- File upload form -->
			<form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
				<input name="file" type="file" id="file"> </br>
				<input type="submit" name="Submit" value="Upload ZIP" id="upload_btn">
			</form>
		</div>
		
		<div id="fileContent">
			<h2> Zip Summary: </h2>
			<!-- This list will be populated by the server response -->
			<div id="uploadResponse" class="log"></div>
			<button id="content_btn">Compile and Download</button>
		</div>
		
		<div id="fileDownload">
			<h2> Download Compiled Project: </h2>
			<!-- TODO: Display link to output zip -->
			<div id="compilerLog" class="log"></div>
			<a id="downloadLink" href="#"> Download Compiled Output </a>
		</div>
		
		
	</div>
	
	
	<!-- FOOTER -->
	<!-- I don't think we need this...
	<div id="footer">
		<a href="#">Link 1</a> | <a href="#">Link 2</a> | <a href="#">Link 3</a>
	</div>
	-->
	
</body>

</html>