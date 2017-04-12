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
				margin-top: 20px;
				font-size: 18px;
			}
		</style>
	</head>
	<body id="activities">
  		<?php 
  			include "includes/header.php"; ?>
  			<div class="container setminheight">
  				<p>A list of activities for the different REU sites is forthcoming; check back regularly for updates on this area.</p>
  			</div>
  		<?php 
  			include 'includes/footer.php'; ?>