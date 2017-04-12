<?php
$type = "";
if(isset($_POST['submit']) && $_POST['submit'] == "Submit")
{
	$type = "submit";
	$status = "submitted";
}
else if(isset($_POST['save']) && $_POST['save'] == "Save and continue later")
{
	$type = "save";
	$status = "saved";
}
// Saving the form
if($type=="save" || ($type=="submit" && $_SESSION['submit_status']!="submitted"))
{
	$citizen = mysqli_real_escape_string($conn, $_POST['citizen']);
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$mname = mysqli_real_escape_string($conn, $_POST['mname']);
	$lname = mysqli_real_escape_string($conn, $_POST['lname']);
	$semail = mysqli_real_escape_string($conn, $_POST['semail']);
	$pemail = mysqli_real_escape_string($conn, $_POST['pemail']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$city = mysqli_real_escape_string($conn, $_POST['city']);
	$state = mysqli_real_escape_string($conn, $_POST['state']);
	$zip = mysqli_real_escape_string($conn, $_POST['zip']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$dob = mysqli_real_escape_string($conn, $_POST['dob']);
	$perm_local_addresses_same = mysqli_real_escape_string($conn, $_POST['perm_local_addresses_same']);
	$perm_address = mysqli_real_escape_string($conn, $_POST['perm_address']);
	$perm_city = mysqli_real_escape_string($conn, $_POST['perm_city']);
	$perm_state = mysqli_real_escape_string($conn, $_POST['perm_state']);
	$perm_zip = mysqli_real_escape_string($conn, $_POST['perm_zip']);
	$perm_phone = mysqli_real_escape_string($conn, $_POST['perm_phone']);
	$sex = mysqli_real_escape_string($conn, $_POST['sex']);
	$ethnicity = mysqli_real_escape_string($conn, $_POST['ethnicity']);
	$race = mysqli_real_escape_string($conn, $_POST['race']);
	$disability = mysqli_real_escape_string($conn, $_POST['disability']);
	$first_in_family = mysqli_real_escape_string($conn, $_POST['first_in_family']);
	$mother_education = mysqli_real_escape_string($conn, $_POST['mother_education']);
	$father_education = mysqli_real_escape_string($conn, $_POST['father_education']);
	$current_classification = mysqli_real_escape_string($conn, $_POST['current_classification']);
	$current_classification_description = mysqli_real_escape_string($conn, $_POST['current_classification_description']);
	$high_school_grad_date = mysqli_real_escape_string($conn, $_POST['high_school_grad_date']);
	$attending_university = mysqli_real_escape_string($conn, $_POST['attending_university']);
	$major = mysqli_real_escape_string($conn, $_POST['major']);
	$minor = mysqli_real_escape_string($conn, $_POST['minor']);
	$gpa = mysqli_real_escape_string($conn, $_POST['gpa']);
	$gpa_major = mysqli_real_escape_string($conn, $_POST['gpa_major']);
	$expected_grad_date = mysqli_real_escape_string($conn, $_POST['expected_grad_date']);
	$institution_type = mysqli_real_escape_string($conn, $_POST['institution_type']);
	$institution_type_description = mysqli_real_escape_string($conn, $_POST['institution_type_description']);
	$academic_awards = mysqli_real_escape_string($conn, $_POST['academic_awards']);
	$extracurricular_activities = mysqli_real_escape_string($conn, $_POST['extracurricular_activities']);
	$prof_acad_memberships = mysqli_real_escape_string($conn, $_POST['prof_acad_memberships']);
	$courses_taken = mysqli_real_escape_string($conn, $_POST['courses_taken']);
	$experience = mysqli_real_escape_string($conn, $_POST['experience']);
	$transcripts = mysqli_real_escape_string($conn, $_POST['transcripts']);
	for($i=1; $i<10; $i++)
		$project_preferences .= mysqli_real_escape_string($conn, $_POST['project' . $i]) . "||" ;
	$project_preferences .= mysqli_real_escape_string($conn, $_POST['project10']);
	
	$housing = mysqli_real_escape_string($conn, $_POST['housing']);
	$ref1_title = mysqli_real_escape_string($conn, $_POST['ref1_title']);
	$ref1_fname = mysqli_real_escape_string($conn, $_POST['ref1_fname']);
	$ref1_lname = mysqli_real_escape_string($conn, $_POST['ref1_lname']);
	$ref1_email = mysqli_real_escape_string($conn, $_POST['ref1_email']);
	$ref2_title = mysqli_real_escape_string($conn, $_POST['ref2_title']);
	$ref2_fname = mysqli_real_escape_string($conn, $_POST['ref2_fname']);
	$ref2_lname = mysqli_real_escape_string($conn, $_POST['ref2_lname']);
	$ref2_email = mysqli_real_escape_string($conn, $_POST['ref2_email']);
	$ref_letters_review_right = mysqli_real_escape_string($conn, $_POST['ref_letters_review_right']);
    
    // Description to the recommender letter about reference letters review right
    $ref_letters_review_right_desc = "";
    if($_POST['ref_letters_review_right'] == "2")
        $ref_letters_review_right_desc = "not";
    
	$essay_description = mysqli_real_escape_string($conn, $_POST['essay_description']);
	
	// Generating token only if it is the first time saving the application
	if(!isset($_GET['token']) && $token=='')
	{
		$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
		$string = '';
		for ($i = 0; $i < 10; $i++) {
			$string .= $characters[mt_rand(0, strlen($characters) - 1)];
		}
		
		$token = sha1($string);
	
	/*$file_type = pathinfo($_FILES['resume']['name'],PATHINFO_EXTENSION);
	$filename = "Resume_" . $fname . "_" . $lname . "." . $file_type;
	$temp_file_name = $_FILES['resume']['tmp_name'];
	$upload_path = "uploads/" . $filename;*/
	
	// Saving the details to DB
	
	$sql_save_details = "INSERT INTO `applicants`(`citizen`, 
											`fname`, 
											`mname`, 
											`lname`, 
											`semail`, 
											`pemail`, 
											`address`, 
											`city`, 
											`state`, 
											`zip`, 
											`phone`, 
											`sex`, 
											`resume`, 
											`dob`, 
											`perm_local_addresses_same`, 
											`perm_address`, 
											`perm_city`, 
											`perm_state`, 
											`perm_zip`, 
											`perm_phone`, 
											`ethnicity`, 
											`race`, 
											`disability`, 
											`first_in_family`, 
											`mother_education`, 
											`father_education`, 
											`current_classification`,
											`current_classification_description`, 
											`high_school_grad_date`, 
											`attending_university`, 
											`major`, 
											`minor`, 
											`gpa`, 
											`gpa_major`, 
											`expected_grad_date`, 
											`institution_type`,
											`institution_type_description`, 
											`academic_awards`, 
											`extracurricular_activities`, 
											`prof_acad_memberships`, 
											`courses_taken`, 
											`experience`, 
											`project_preferences`,
											`housing`, 
											`ref1_title`, 
											`ref1_fname`, 
											`ref1_lname`, 
											`ref1_email`, 
											`ref2_title`, 
											`ref2_fname`, 
											`ref2_lname`, 
											`ref2_email`, 
											`ref_letters_review_right`, 
											`essay`, 
											`token`,
											`status`) VALUES 
											('$citizen',
											 '$fname',
											 '$mname',
											 '$lname',
											 '$semail',
											 '$pemail',
											 '$address',
											 '$city',
											 '$state',
											 '$zip',
											 '$phone',
											 '$sex',
											 '$resume',
											 '$dob',
											 '$perm_local_addresses_same',
											 '$perm_address',
											 '$perm_city',
											 '$perm_state',
											 '$perm_zip',
											 '$perm_phone',
											 '$ethnicity',
											 '$race',
											 '$disability',
											 '$first_in_family',
											 '$mother_education',
											 '$father_education',
											 '$current_classification',
											 '$current_classification_description',
											 '$high_school_grad_date',
											 '$attending_university',
											 '$major',
											 '$minor',
											 '$gpa',
											 '$gpa_major',
											 '$expected_grad_date',
											 '$institution_type',
											 '$institution_type_description',
											 '$academic_awards',
											 '$extracurricular_activities',
											 '$prof_acad_memberships',
											 '$courses_taken',
											 '$experience',
											 '$project_preferences',
											 '$housing',
											 '$ref1_title',
											 '$ref1_fname',
											 '$ref1_lname',
											 '$ref1_email',
											 '$ref2_title',
											 '$ref2_fname',
											 '$ref2_lname',
											 '$ref2_email',
											 '$ref_letters_review_right',
											 '$essay_description',
											 '$token',
											 '$status')";
	}
	
	// If the form has already been saved, updating the existing form
	else
	{
		$sql_save_details = "UPDATE `applicants` SET `citizen`='$citizen',
													 `fname`='$fname',
													 `mname`='$mname',
													 `lname`='$lname',
													 `semail`='$semail',
													 `pemail`='$pemail',
													 `address`='$address',
													 `city`='$city',
													 `state`='$state',
													 `zip`='$zip',
													 `phone`='$phone',
													 `sex`='$sex',
													 `resume`='$resume',
													 `dob`='$dob',
													 `perm_local_addresses_same`='$perm_local_addresses_same',
													 `perm_address`='$perm_address',
													 `perm_city`='$perm_city',
													 `perm_state`='$perm_state',
													 `perm_zip`='$perm_zip',
													 `perm_phone`='$perm_phone',
													 `ethnicity`='$ethnicity',
													 `race`='$race',
													 `disability`='$disability',
													 `first_in_family`='$first_in_family',
													 `mother_education`='$mother_education',
													 `father_education`='$father_education',
													 `current_classification`='$current_classification',
													 `current_classification_description` = '$current_classification_description',
													 `high_school_grad_date`='$high_school_grad_date',
													 `attending_university`='$attending_university',
													 `major`='$major',
													 `minor`='$minor',
													 `gpa`='$gpa',
													 `gpa_major`='$gpa_major',
													 `expected_grad_date`='$expected_grad_date',
													 `institution_type`='$institution_type',
													 `institution_type_description` = '$institution_type_description',
													 `academic_awards`='$academic_awards',
													 `extracurricular_activities`='$extracurricular_activities',
													 `prof_acad_memberships`='$prof_acad_memberships',
													 `courses_taken`='$courses_taken',
													 `experience`='$experience',
													 `project_preferences`='$project_preferences',
													 `housing`='$housing',
													 `ref1_title`='$ref1_title',
													 `ref1_fname`='$ref1_fname',
													 `ref1_lname`='$ref1_lname',
													 `ref1_email`='$ref1_email',
													 `ref2_title`='$ref2_title',
													 `ref2_fname`='$ref2_fname',
													 `ref2_lname`='$ref2_lname',
													 `ref2_email`='$ref2_email',
													 `ref_letters_review_right`='$ref_letters_review_right',
													 `essay`='$essay_description', 
													 `status`='$status' WHERE `token`= '" . $token . "'";
	}
	
	$project_preferences = explode("||", $project_preferences); 
	//die($sql_save_details);
	if(mysqli_query($conn, $sql_save_details))
	{ 
		
		// updating the trascripts
		
		// Getting the ID
		$sql_get_id = "select id from applicants where token='$token'";
		$result = mysqli_query($conn, $sql_get_id);
		$id = mysqli_fetch_assoc($result)['id'];
		
		$filename = "Transcripts_" . $id . ".pdf";
        
        $temp_file_name = $_FILES['transcripts']['tmp_name'];
		$upload_path = "uploads/Transcripts/" . $filename;
		
		// Moving the file and updating the DB
		if(move_uploaded_file($temp_file_name, $upload_path))
		{
			// Saving the file path in DB
			$sql_update_transcripts_path = "UPDATE `applicants` SET `transcripts`= '$filename' WHERE token='$token'";
			mysqli_query($conn, $sql_update_transcripts_path);
		}
			
		$application_url = "application.php?token=$token";
		$url = $base_url . $application_url;
		
        if($type == "save")
		{
			$message = "Hello $fname $lname :
			
Your application is saved. Please use $url to submit the application later.";
			
			$save_error = "<font color='green'> Your application is saved. Please use <a target='_blank' href='$application_url'>$url</a> to submit the application later.  
							Please check your preferred email for the same.</font>";
		}

		else if($type="submit")
		{
			// setting the session variable for avoiding form resubmission.
			$_SESSION['submit_status'] = "submitted";
			
			// Saving the application in PDF
			include 'application_pdf.php';
			
			// Emailing references to submit their reference letters.
			$refernces = Array(Array($ref1_fname,$ref1_lname,$ref1_title,$ref1_email),Array($ref2_fname,$ref2_lname,$ref2_title,$ref2_email));
			
			for($i=0; $i<2; $i++)
			{
				$encoded_token = base64_encode("ref". ($i+1) . "||" . $token);
				$message_reference = "Dear Dr. " . $refernces[$i][0] . " " . $refernces[$i][1] . ":
			
The student, $fname $lname has submitted an application for the NeuroNEM REU, a nine-week summer program for students to work collaboratively on brain dynamics research projects related to epilepsy and memory.
 Please find more detials about the program on the website.

 $base_url
 
 The student $fname $lname has suggested you as one of the references and has $ref_letters_review_right_desc waived the right to see your recommendation letter. We would appreciate if you could use the below link to upload your reference letter.
 
 " . $base_url . "reference_letter_upload.php?token=$encoded_token
 
 Thank you for your time!
 
 The NeuroNEM REU Program.
";
				$to = $refernces[$i][3];
				$subject = "NeuroNEM REU Application";
				$from = "neuronem@latech.edu";
				
				$headers = "From: $from"."\r\n".
						"Reply-To: $from"."\r\n" .
						"X-Mailer: PHP/".phpversion();
					
				mail($to, $subject, $message_reference, $headers);
				
			}
			
			// Emailing student
			
			$message = "Hello $fname $lname :
				
Your application is submitted. And the emails have been sent to the references. Once they submit the reference letters you will be notified through emails. Please use $url to view the application.";
				
			$save_error = "<font color='green'> Your application is submitted. Please use <a target='_blank' href='$application_url'>$url</a> to view the application.
			Please check your preferred email for the same.</font>";
		}
		
		$to = $pemail;
		$subject = "NeuroNEM REU Application";
		$from = "neuronem@latech.edu";
		
		$headers = "From: $from"."\r\n".
				"Reply-To: $from"."\r\n" .
				"X-Mailer: PHP/".phpversion();
			
		mail($to, $subject, $message, $headers);
		
	}
	else
	{
		//die(mysqli_error($conn));
		$save_error = "<font color='red'>Sorry there was an error in submitting the application. Please try again later." . mysqli_error($conn) . "</font>";
	}
	// Moving the uploaded file to the uploads directory
	/*if(move_uploaded_file($temp_file_name, $upload_path))
	{
		if(mysqli_query($conn, $sql_insert))
			$save_error = "<font color='green'>Thank you, Your application is submitted.</font>";
		else
		{
			$save_error = "<font color='red'>Sorry there was an error in submitting the form. Please try again later." . mysqli_error($conn) . "</font>";
			// deleting the moved file
			unlink($upload_path);
		}
	}
	else
		$save_error = "<font color='red'>Sorry, there was an error in uploading the file. Please try again later.</font>";*/
}

else if(isset($_GET['token']) && trim($_GET['token'])!='')
{
	$sql_fetch_details = "SELECT * FROM `applicants` WHERE token = '" . $_GET['token'] . "'";
	$result = mysqli_query($conn, $sql_fetch_details);
	if(mysqli_num_rows($result)>0)
	{
		$row = mysqli_fetch_assoc($result);
		$citizen = $row['citizen'];
		$fname = $row['fname'];
		$mname = $row['mname'];
		$lname = $row['lname'];
		$semail = $row['semail'];
		$pemail = $row['pemail'];
		$address = $row['address'];
		$city = $row['city'];
		$state = $row['state'];
		$zip = $row['zip'];
		$phone = $row['phone'];
		$dob = $row['dob'];
		$perm_local_addresses_same = $row['perm_local_addresses_same'];
		$perm_address = $row['perm_address'];
		$perm_city = $row['perm_city'];
		$perm_state = $row['perm_state'];
		$perm_zip = $row['perm_zip'];
		$perm_phone = $row['perm_phone'];
		$sex = $row['sex'];
		$ethnicity = $row['ethnicity'];
		$race = $row['race'];
		$disability = $row['disability'];
		$first_in_family = $row['first_in_family'];
		$mother_education = $row['mother_education'];
		$father_education = $row['father_education'];
		$current_classification = $row['current_classification'];
		$current_classification_description = $row['current_classification_description'];
		$high_school_grad_date = $row['high_school_grad_date'];
		$attending_university = $row['attending_university'];
		$major = $row['major'];
		$minor = $row['minor'];
		$gpa = $row['gpa'];
		$gpa_major = $row['gpa_major'];
		$expected_grad_date = $row['expected_grad_date'];
		$institution_type = $row['institution_type'];
		$institution_type_description = $row['institution_type_description'];
		$academic_awards =  $row['academic_awards'];
		$extracurricular_activities = $row['extracurricular_activities'];
		$prof_acad_memberships = $row['prof_acad_memberships'];
		$courses_taken = $row['courses_taken'];
		$experience = $row['experience'];
		$transcripts = $row['transcripts'];
        $filename = $transcripts;
		$project_preferences = explode("||", $row['project_preferences']);
		$housing = $row['housing'];
		$ref1_title = $row['ref1_title'];
		$ref1_fname = $row['ref1_fname'];
		$ref1_lname = $row['ref1_lname'];
		$ref1_email = $row['ref1_email'];
		$ref2_title = $row['ref2_title'];
		$ref2_fname = $row['ref2_fname'];
		$ref2_lname = $row['ref2_lname'];
		$ref2_email = $row['ref2_email'];
		$ref_letters_review_right = $row['ref_letters_review_right'];
		$essay_description = $row['essay'];
		$status = $row['status'];
	}
	else
	{
		$save_error = "<font color='red'>Sorry, No application found. Check your application ID. </font>";
	}
}