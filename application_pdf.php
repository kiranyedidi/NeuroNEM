<?php
require('fpdf.php');

if(isset($_GET['type']))
	$type = $_GET['type'];

if((isset($_POST['preview']) && $_POST['preview'] == "Preview") || (isset($_POST['submit']) && $_POST['submit'] == "Submit"))
{
	$citizen_array = Array("U.S. Citizen","Permanent Resident","Neither");
	$sex_array = Array("Male","Female","Prefer not to answer");
	$ethnicity_array = Array("Hispanic or Latino","Not Hispanic or Latino","Prefer not to answer");
	$race_array = Array("American Indian or Alaskan Native","Asian","Black or African American","Native Hawaiian or Other Pacific Islander","White","Prefer not to answer");
	$yes_no_array = Array("Yes","No","Prefer not to answer");
	$parent_education_array = Array("Elementary","High School","Some College","Bachelor's Degree","Graduate/Professional Degree");
	$current_classification_array = Array("Freshman","Sophomore","Junior","Senior","Other (please specify)");
	$institution_type_array = Array("Community College","Liberal Arts College","Traditional Four-Year College","Comprehensive University","Other (please specify)");
	$project_preferences_array = Array("Brain Dynamics and Epileptic Networks (LATech, Mentors: Iasemidis, Vlachos)",
								"Brain Dynamics and Memory Networks (LATech, Mentors: Iasemidis, Vlachos)",										
								"Animal Surgeries, Sensors implantation, EEG Acquisition and Optical Imaging (LATech, Mentor: Murray)",										
								"Electrochemical Sensor Characterization (LATech, Mentors: Arumugam, Siddiqui)",										
								"Molecular and Cellular Modeling and Experiments (LATech, Mentors: DeCoster, Evans)",										
								"Scalp and Intracranial EEG Recording (UAB, Mentors: Szaflarski, Pati)",										
								"MEG recording (UAB, Mentors: Gawne, Pati)",										
								"Memory Experiments (UAB, Mentors: Martin, Pati)",										
								"Scalp and Intracranial EEG Recording (UAMS, Mentors: Bashir Shihabuddin, Larsen)",										
								"Memory and EEG Experiments (UAMS, Mentors: Gess, Kleiner, Larson)");
		
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$semail = $_POST['semail'];
	$pemail = $_POST['pemail'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$phone = $_POST['phone'];
	$dob = $_POST['dob'];
	$perm_address = $_POST['perm_address'];
	$perm_city = $_POST['perm_city'];
	$perm_state = $_POST['perm_state'];
	$perm_zip = $_POST['perm_zip'];
	$perm_phone = $_POST['perm_phone'];
	$current_classification_description = $_POST['current_classification_description'];
	$high_school_grad_date = $_POST['high_school_grad_date'];
	$attending_university = $_POST['attending_university'];
	$major = $_POST['major'];
	$minor = $_POST['minor'];
	$gpa = $_POST['gpa'];
	$gpa_major = $_POST['gpa_major'];
	$expected_grad_date = $_POST['expected_grad_date'];
	$institution_type_description = $_POST['institution_type_description'];
	$academic_awards = $_POST['academic_awards'];
	$extracurricular_activities = $_POST['extracurricular_activities'];
	$prof_acad_memberships = $_POST['prof_acad_memberships'];
	$courses_taken = $_POST['courses_taken'];
	$experience = $_POST['experience'];
	$ref1_title = $_POST['ref1_title'];
	$ref1_fname = $_POST['ref1_fname'];
	$ref1_lname = $_POST['ref1_lname'];
	$ref1_email = $_POST['ref1_email'];
	$ref2_title = $_POST['ref2_title'];
	$ref2_fname = $_POST['ref2_fname'];
	$ref2_lname = $_POST['ref2_lname'];
	$ref2_email = $_POST['ref2_email'];
	$essay_description = $_POST['essay_description'];
		
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','', 12);
	
	$pdf->Write(6, "1. Please tell us which applies to you. Note: You must be a U.S. Citizen or Permanent Resident to apply/qualify for the DeltaREM REU.");
	$pdf->Ln(12);
	$pdf->Write('', "Ans: " . $citizen_array[$_POST['citizen'] - 1]);
	$pdf->Ln(12);
	
	$pdf->Write('', "2. Personal/school and local mailing information.");
	$pdf->Ln(12);
	$pdf->Write('', "First Name: ");
	$pdf->Write('', $fname);
	$pdf->Ln(8);
	$pdf->Write('', "Middle Name: ");
	$pdf->Write('', $mname);
	$pdf->Ln(8);
	$pdf->Write('', "Last Name: ");
	$pdf->Write('', $lname);
	$pdf->Ln(8);
	$pdf->Write('', "Current Street Address: ");
	$pdf->Write('', $address);
	$pdf->Ln(8);
	$pdf->Write('', "City: ");
	$pdf->Write('', $city);
	$pdf->Ln(8);
	$pdf->Write('', "State: ");
	$pdf->Write('', $state);
	$pdf->Ln(8);
	$pdf->Write('', "Zip Code: ");
	$pdf->Write('', $zip);
	$pdf->Ln(8);
	$pdf->Write('', "Phone Number: ");
	$pdf->Write('', $phone);
	$pdf->Ln(8);
	$pdf->Write('', "School Email Address: ");
	$pdf->Write('', $semail);
	$pdf->Ln(8);
	$pdf->Write('', "Preferred Email: ");
	$pdf->Write('', $pemail);
	$pdf->Ln(8);
	$pdf->Write('', "Date of Birth: ");
	$pdf->Write('', $dob);
	
	$pdf->Ln(12);
	$pdf->Write('', "3. Permanent Address.");
	$pdf->Ln(12);
	$pdf->Write('', "Street Address: ");
	$pdf->Write('', $perm_address);
	$pdf->Ln(8);
	$pdf->Write('', "City: ");
	$pdf->Write('', $perm_city);
	$pdf->Ln(8);
	$pdf->Write('', "State: ");
	$pdf->Write('', $perm_state);
	$pdf->Ln(8);
	$pdf->Write('', "Zip Code: ");
	$pdf->Write('', $perm_zip);
	$pdf->Ln(8);
	$pdf->Write('', "Phone Number: ");
	$pdf->Write('', $perm_phone);
	
	$pdf->Ln(12);
	$pdf->Write('', "4. Sex: ");
	$pdf->Write('', $sex_array[$_POST['sex'] - 1]);
		
	$pdf->Ln(12);
	$pdf->Write('', "5. Ethnicity: ");
	$pdf->Write('', $ethnicity_array[$_POST['ethnicity'] - 1]);
	
	$pdf->Ln(12);
	$pdf->Write('', "6. Race: ");
	$pdf->Write('', $race_array[$_POST['race'] - 1]);
	
	$pdf->Ln(12);
	$pdf->Write('', "7. Do you have a documented disability? ");
	$pdf->Write('', $yes_no_array[$_POST['disability'] - 1]);
	
	$pdf->Ln(12);
	$pdf->Write('', "8. Are you the first person in your family to attend college? ");
	$pdf->Write('', $yes_no_array[$_POST['first_in_family'] - 1]);
	
	$pdf->Ln(12);
	$pdf->Write('', "9. Please mark the highest education level for each parent.");
	$pdf->Ln(8);
	$pdf->Write('', "Mother's Education: ");
	if(isset($_POST['mother_education']))
		$pdf->Write('', $parent_education_array[$_POST['mother_education'] - 1]);
	else
		$pdf->Write('', "NA");
	$pdf->Ln(8);
	$pdf->Write('', "Father's Education: ");
	if(isset($_POST['father_education']))
		$pdf->Write('', $parent_education_array[$_POST['father_education'] - 1]);
	else
		$pdf->Write('', "NA");
	
	$pdf->Ln(12);
	$pdf->Write('', "10.  Current Classification (during spring 2017): ");
	
	if($current_classification_array[$_POST['current_classification'] - 1] == "Other (please specify)")
		$pdf->Write('', $current_classification_description);
	else
		$pdf->Write('', $current_classification_array[$_POST['current_classification'] - 1]);
	
	$pdf->Ln(12);
	$pdf->Write('', "11. Academic History.");
	$pdf->Ln(12);
	$pdf->Write('', "Date of High School Graduation: ");
	$pdf->Write('', $high_school_grad_date);
	$pdf->Ln(8);
	$pdf->Write('', "College/University Currently Attending: ");
	$pdf->Write('', $attending_university);
	$pdf->Ln(8);
	$pdf->Write('', "Major: ");
	$pdf->Write('', $major);
	$pdf->Ln(8);
	$pdf->Write('', "Minor: ");
	$pdf->Write('', $minor);
	$pdf->Ln(8);
	$pdf->Write('', "Overall GPA: ");
	$pdf->Write('', $gpa);
	$pdf->Ln(8);
	$pdf->Write('', "GPA in Major: ");
	$pdf->Write('', $gpa_major);
	$pdf->Ln(8);
	$pdf->Write('', "Date of Expected Graduation: ");
	$pdf->Write('', $expected_grad_date);
	
	$pdf->Ln(12);
	$pdf->Write('', "12. Please indicate the type of institution you are currently attending: ");
	
	if($institution_type_array[$_POST['institution_type'] - 1] == "Other (please specify)")
		$pdf->Write('', $institution_type_description);
	else
		$pdf->Write('', $institution_type_array[$_POST['institution_type'] - 1]);
	
	$pdf->Ln(12);
	$pdf->Write('', "13. List any academic awards/honors.");
	$pdf->Ln(6);
	if(trim($_POST['academic_awards']))
	{
		$academic_awards_array = explode("\n", $academic_awards);
		foreach ($academic_awards_array as $award)
		{
			$pdf->Write('6', $award . " ");
		}
	}
	else
		$pdf->Write('6', "NA");
	
	$pdf->Ln(16);
	$pdf->Write('', "14. List extracurricular activities during undergraduate education.");
	$pdf->Ln(6);
	if(trim($_POST['extracurricular_activities']))
	{
		$extracurricular_activities_array = explode("\n", $extracurricular_activities);
		foreach ($extracurricular_activities_array as $activity)
		{
			$pdf->Write('6', $activity . " ");
		}
	}
	else
		$pdf->Write('6', "NA");
	
	$pdf->Ln(16);
	$pdf->Write('', "15. List Professional and academic association memberships.");
	$pdf->Ln(6);
	if(trim($_POST['prof_acad_memberships']))
	{
		$prof_acad_memberships_array = explode("\n", $prof_acad_memberships);
		foreach ($prof_acad_memberships_array as $membership)
		{
			$pdf->Write('6', $membership . " ");
		}
	}
	else
		$pdf->Write('6', "NA");
	
	$pdf->Ln(14);
	$pdf->Write('6', "16. Please list all science, math, engineering, computing, and technology courses taken, programming languages known and any other course related to STEM field.");
	$pdf->Ln(10);
	if(trim($_POST['courses_taken']))
	{
		$courses_taken_array = explode("\n", $courses_taken);
		foreach ($courses_taken_array as $course)
		{
			$pdf->Write('6', $course . " ");
		}
	}
	else
		$pdf->Write('6', "NA");
	
	$pdf->Ln(16);
	$pdf->Write('', "17. Please describe any research, technical, co-op or internship experience you've had.");
	$pdf->Ln(6);
	if(trim($_POST['experience']))
	{
		$experience_array = explode("\n", $experience);
		foreach ($experience_array as $exp)
		{
			$pdf->Write('6', $exp . " ");
		}
	}
	else
		$pdf->Write('6', "NA");
	
	$pdf->Ln(14);
	$pdf->Write('6', "18. Please rank the available projects in order of your preference (1 being first preference and so on).");
	$pdf->Ln(14);
	
	// Project priorities table
	// Header
	$pdf->SetFont( 'Arial', 'B', 12 );
	$pdf->Cell( 160, 12, "Projects", 1, 0, 'C');
	$pdf->Cell( 30, 12, "Ranking", 1, 0, 'C');
	$pdf->Ln(12);
	// Data
	$pdf->SetFont( 'Arial', '', 12 );
	for($i=0; $i<10; $i++)
	{
		// 3rd and 5th questions need cell wrapping. As the questions are fixed, hardcoding the question numbers. If the
		// questions generate randomly, we need to caluclate the length of the question to find out if it is extending the
		// cell width and based on that we need to wrap.
		if($i==2 || $i==4)
		{
			$x_axis = $pdf->GetX();
			$project = str_split($project_preferences_array[$i],75);
			$pdf->Cell(160, 8, $project[0], '', '', '');
			$pdf->SetX($x_axis);
			$pdf->Cell(160, 18, $project[1], '', '', '');
			$pdf->SetX($x_axis);
			$pdf->Cell(160, 24, '', 1, 0, 'L');
			$x_axis = $pdf->GetX();
			$pdf->SetX($x_axis);
			$pdf->Cell(30, 12, $_POST['project' . ($i+1)], '', '', 'C');
			$pdf->SetX($x_axis);
			$pdf->Cell(30, 24, '', 1, '', 'C');
		}
		else
		{	
			$pdf->Cell(160, 12, $project_preferences_array[$i], 1, 0, 'L');
			$pdf->Cell( 30, 12, $_POST['project' . ($i+1)], 1, 0, 'C');
		}
		$pdf->Ln(12);
	}
	// End of table
	
	$pdf->Ln(12);
	$pdf->Write('', "19. If selected, do you require on-campus housing? ");
	$pdf->Write('', $yes_no_array[$_POST['housing'] - 1]);
	
	$pdf->Ln(12);
	$pdf->Write('', "20. Reference #1 contact information.");
	$pdf->Ln(12);
	$pdf->Write('', "Title: ");
	$pdf->Write('', $ref1_title);
	$pdf->Ln(8);
	$pdf->Write('', "First Name: ");
	$pdf->Write('', $ref1_fname);
	$pdf->Ln(8);
	$pdf->Write('', "Last Name: ");
	$pdf->Write('', $ref1_lname);
	$pdf->Ln(8);
	$pdf->Write('', "Email Address: ");
	$pdf->Write('', $ref1_email);
	
	$pdf->Ln(12);
	$pdf->Write('', "21. Reference #2 contact information.");
	$pdf->Ln(12);
	$pdf->Write('', "Title: ");
	$pdf->Write('', $ref2_title);
	$pdf->Ln(8);
	$pdf->Write('', "First Name: ");
	$pdf->Write('', $ref2_fname);
	$pdf->Ln(8);
	$pdf->Write('', "Last Name: ");
	$pdf->Write('', $ref2_lname);
	$pdf->Ln(8);
	$pdf->Write('', "Email Address: ");
	$pdf->Write('', $ref2_email);
	
	$pdf->Ln(12);
	$pdf->Write('', "22. Do you waive the right to review the reference letters submitted on your behalf? ");
	$pdf->Write('', $yes_no_array[$_POST['ref_letters_review_right'] - 1]);
	
	$pdf->Ln(12);
	$pdf->Write('6', "23. Please write 500 word essay that includes a description of your academic background, the reason of your interest in this program, and your future career plans. The essay should also cover how you will benefit from this summer research experience.");
	$pdf->Ln(10);
	$essay_description_array = explode("\n", $essay_description);
	
	foreach ($essay_description_array as $essay)
	{
		$pdf->Write('6', $essay . " ", 'FJ');
	}
	
	if(isset($_POST['submit']) && $_POST['submit'] == "Submit")
	{
		// Getting application ID
		
		$sql_get_id = "select id from applicants where token='$token'";
		$result = mysqli_query($conn, $sql_get_id);
		$id = mysqli_fetch_assoc($result)['id'];
		$pdf->Output('F','uploads/Applications/application_' . $id . '.pdf');
		
		// updating the application column
		$sql_update_application = "update applicants set application = 'application_$id.pdf' where token='$token'";
		mysqli_query($conn, $sql_update_application);
	}
	else
		$pdf->Output();
}
?>