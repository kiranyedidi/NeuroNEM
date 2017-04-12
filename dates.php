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
			p{
				margin-left: 30px;
			}
		</style>
	</head>
	<body id="dates">
  		<?php 
  			include "includes/header.php";
  		?>
  		<div class="container">
	  		<h3>Application Deadline</h3>
	  		<p>February 10, 2017. Any late material will not be considered. Any incomplete applications will 
	  		not be considered.</p>
	  		<h3>Reference Letter Deadline</h3>
	  		<p>February 17, 2017</p>
	  		<h3>Notification of Decision</h3>
	  		<p>March 10, 2017</p>
	  		<h3>Program Dates</h3>
	  		<p>May 29 - July 28, 2017 (Louisiana Tech)</p>
	  		<p>May 22 - July 28, 2017 (UAB, UAMS)</p>
  		</div>
  		<?php include 'includes/footer.php';?>
  	</body>
  </html>