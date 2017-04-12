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
	</head>
	<body id="applicants">
  		<?php 
  			if(isset($_SESSION['username']))
			{
				include "includes/header.php";
				include 'includes/functions.php';
				$conn = connect();
			  	if(!$conn)
			  		die("Connection to DB failed. Please try again after some time");
			  	// Iterating through the rows and genrating the table with applicants details
			  	$sql_applicants = "SELECT `id`, `fname`, `lname`, `pemail`, `resume` FROM `applicants`";
			  	if($result = mysqli_query($conn, $sql_applicants))
			  	{
			  		
			  	?>
			  		<div class="container">
			  			<div class="page-header">	
				  			<h3 style="width: 50%; float: left">Applicants Details</h1>
				  			<div style="float: right">
				  				<button onclick="downloadResumes();" class="btn btn-primary">Download Resumes</button>
				  				<button onclick="downloadApplications();" class="btn btn-primary">Download Applications</button>
				  			</div>
				  			<div style="clear: both"></div>
				  		</div>
					  	<div class="table-responsive">
					  		<table class="table table-bordered">
					  			<thead>
					  				<tr>
					  					<th>Application ID</th>
					  					<th>First Name</th>
					  					<th>Last Name</th>
					  					<th>Preferred Email</th>
					  					<th>Resume</th>
					  				</tr>
					  			</thead>
					  			<tbody>
					  				<?php 
					  				while($row = mysqli_fetch_assoc($result))
					  				{
					  					echo "<tr>";
					  					echo "<td>" . $row['id'] . "</td>";
					  					echo "<td>" . $row['fname'] . "</td>";
					  					echo "<td>" . $row['lname'] . "</td>";
					  					echo "<td><a target='_blank' href='mailto:" . $row['pemail'] . "'>" . $row['pemail'] . "</a></td>";
					  					echo "<td><a target='_blank' href='uploads/" . $row['resume'] . "'>" . $row['resume'] . "</a></td>";
										echo "</tr>";
					  				}		
					  				?>
					  			</tbody>
					  		</table>
					  	</div>
				  	</div>
			<?php 
			  	}
			  	else
			  		die("Sorry, there was an error in fetching applicants details. Please try again after some time."); 
			} ?>
	</body>
</html>