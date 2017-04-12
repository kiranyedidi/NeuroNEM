<?php 
error_reporting(0);
// Reference letter upload
if(isset($_GET['token']) && !empty(trim($_GET['token'])))
{
	$error_message = "";
	$encoded_token = $_GET['token'];
	$decoded_token = base64_decode($_GET['token']);
	$ref = explode("||", $decoded_token)[0];
	$token = explode("||", $decoded_token)[1];
	
	include 'includes/functions.php';
	$conn = connect();
	if(!$conn)
		die("Connection to DB failed. Please try again after some time");
	// Iterating through the rows and genrating the table with applicants details
	
	// Getting reference contact details
	$sql_reference_details = "SELECT `id`, `" . $ref . "_title`, `" . $ref . "_fname`, `" . $ref . "_lname`, `" . $ref . "_email`, `" . $ref . "_letter` FROM `applicants` WHERE `token`='$token'";
	$result = mysqli_query($conn, $sql_reference_details);
	if(mysqli_num_fields($result)>0)
	{
	$row = mysqli_fetch_assoc($result);
	$id = $row['id'];
	$ref_title = $row[$ref . '_title'];
	$ref_fname = $row[$ref . '_fname'];
	$ref_lname = $row[$ref . '_lname'];
	$ref_email = $row[$ref . '_email'];
	$ref_letter = $row[$ref . '_letter'];
	// Checking if the reference letter has already been uploaded
	if($ref_letter=='')
	{
	// uploading the reference letter
	if(isset($_POST['submit']))
	{
		$file_type = pathinfo($_FILES['ref_letter']['name'],PATHINFO_EXTENSION);
		if(strtolower($file_type) != "pdf")
		{
			$error_message = "<font color='red'>Please upload a file in PDF format.</font>";
		}
		else
		{
		 	$filename = $ref . "_" . $id . "." . $file_type;
			$temp_file_name = $_FILES['ref_letter']['tmp_name'];
			$upload_path = "uploads/Reference_Letters/" . $filename;
			if(move_uploaded_file($temp_file_name, $upload_path))
			{
				// Saving the file path in DB
				$sql_update_ref_path = "UPDATE `applicants` SET `" . $ref . "_letter`= '$filename' WHERE token='$token'";
				if(!mysqli_query($conn, $sql_update_ref_path))
				{
					$error_message = "<font color='red'>Sorry, there is an error in updating the database. Please try again.</font>";
					// Removing the file as the database update is failed.
					unlink($upload_path);
				}
				else
					$error_message = "uploaded";
			}
			else
			{
				$error_message = "<font color='red'>Sorry, there is an error in uploading the file. Please try again.</font>";
			}
		}
	}

?>

<!-- UI to upload reference letters -->
<html>
	<head>
		<meta content="width=device-width, initial-scale=1.0" name="viewport" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Upload reference letters - REM Program</title>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script type="text/javascript" src="resources/js/script.js"></script>
		<style type="text/css">
			.border{
				border: 2px solid green;
			}
			form{
				padding: 10px;
				padding-left: 30px;
			}
			p{
				font-size: 20px;
			}
			textarea {
				width: 100%;
			}
		</style>
	</head>
	<body class="well">
		<div class="container">
			<div class="border col-sm-offset-3 col-sm-6">
				<?php 
				if($error_message!="uploaded"){
				?>
				<form class="form-horizontal" method="post" enctype="multipart/form-data" action="reference_letter_upload.php<?php echo '?token=' . $encoded_token ;?>">
					<div class="form-group">
						<p class="page-header">Please upload the reference letter in the PDF format.</p>
						<div class="form-group">
							<label class="col-sm-3" for="ref1_title">Title</label>
							<div class="col-sm-8"><input class="form-control" type="text" id="ref_title" name="ref_title" value="<?php echo $ref_title;?>" disabled></div>
						</div>
						<div class="form-group">
							<label class="col-sm-3" for="ref1_fname">First Name</label>
							<div class="col-sm-8"><input class="form-control" type="text" id="ref_fname" name="ref_fname" value="<?php echo $ref_fname;?>" disabled></div>
						</div>
						<div class="form-group">
							<label class="col-sm-3" for="ref1_lname">Last Name</label>
							<div class="col-sm-8"><input class="form-control" type="text" id="ref_lname" name="ref_lname" value="<?php echo $ref_lname;?>" disabled></div>
						</div>
						<div class="form-group">
							<label class="col-sm-3" for="ref1_email">Email Address</label>
							<div class="col-sm-8"><input class="form-control" type="email" id="ref_email" name="ref_email" value="<?php echo $ref_email;?>" disabled></div>
						</div>
						<div class="form-group">
						 	<div class="col-sm-12 col-xs-11"><input type="file" class="form-control-file" id="ref_letter" name="ref_letter" aria-describedby="fileHelp" required></div>
						</div>
						<p><?php echo $error_message;?></p>
						<div class="form-group">
							<div class="col-sm-offset-5 col-sm-5"><input type="submit" class="btn btn-success btn-md" name="submit" value="Submit"></div>
						</div>
					</div>
				</form>
				<?php }else{?>
					<p style="color: green;">Your reference letter has been submitted. Thank you.</p>
				<?php }?>
			</div>
		</div>
	</body>
</html>
<?php
	}else
		echo "Your reference letter has already been submitted.";
}
else
	echo "Sorry, No Application found.";
}
else
	echo "Please check your URL.";
?>