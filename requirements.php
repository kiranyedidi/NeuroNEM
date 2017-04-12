<?php 
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta content="width=device-width, initial-scale=1.0" name="viewport" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>REM</title>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script type="text/javascript" src="resources/js/script.js"></script>
		<link href="resources/css/default.css" rel="stylesheet" type="text/css" media="all" />
		<style type="text/css">
		 #requirements_list li:before
		{
		   content: '✔';   
		   margin-right: 10px;
		}
		#requirements_list {
			margin-top: 20px;
			font-family: 
		}
		#requirements_list li{
			list-style: none;
			font-size: 18px;
			line-height: 32px;
			/*font-family: "Comic Sans MS", cursive, sans-serif;*/
		}
		</style>
	</head>
	<body id="requirements">
  		<?php 
  			include "includes/header.php";
  		?>
  		<div class="container setminheight">
	  		<h1>Requirements</h1>
	  		<ul id="requirements_list">
	  			<li>Undergraduate students from all US institutions who have at least completed their freshman year and will not be graduating 
	  			before the start of the program.</li>
	  			<li>GPA of 3.25 or better.</li>
	  			<li>Must be a U.S. citizen or permanent resident.</li>
	  			<li>Underrepresented students in science and engineering are strongly enouraged to apply.</li>
	  		</ul>
  		</div>
  		<?php include 'includes/footer.php'; ?>