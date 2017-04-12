<?php
error_reporting(0);
session_start();
$base_url = "neuronem.latech.edu/";
if(isset($_GET['token']) && !empty($_GET['token']))
	$token = $_GET['token'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta content="width=device-width, initial-scale=1.0" name="viewport" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>NeuroNEM Research Experience for Undergraduates (REU)</title>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.8/validator.min.js"></script>
		<script type="text/javascript" src="resources/js/script.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				window.scrollTo(0,150);
			});
		</script>
		<link href="resources/css/default.css" rel="stylesheet" type="text/css" media="all" />
	</head>
	<body id="application">
  		<?php
  			include "includes/header.php";
  			include 'includes/functions.php';
  			$conn = connect();
  			if(!$conn)
  				die("<h3 style='margin-left: 20px;'>Connection to DB failed. Please try again after some time<h3>");
  			include 'includes/form_submit.php';
		?>
		<div class="container">
			<?php
			if(strpos($save_error, "color='red'")!==false)
				die("<div style='margin-top: 10px;'>$save_error</div>");
			else
				echo "<div style='margin-top: 10px;'>$save_error</div>";?>

        <!-- Checking if the deadline is reached and if it is the admin, allowing him to access the application -->
        <?php
				if(!isset($_SESSION['username'])){
	        date_default_timezone_set('America/Chicago');
	        $date1 = date('Y-m-d');
	        $date1 = date_create($date1);
	        $date2=date_create("2017-03-16");
	        $diff=date_diff($date1,$date2);
	        $days = $diff->format("%R%a");
	        if($days < 0)
	            die('<h1>The application period for Summer 2017 program is closed. You will hear from us in early March.</h1>');
				}
        ?>

			<h1>Application</h1>
			<h3>Submission Guidelines</h3>
			<p>This application must be completed with all required documents uploaded no later than <strike>February 23, 2017</strike> <font style= "color: #ff0000">  March 15,2017</font> in order to be considered for this REU.</p>
			<form class="form-horizontal" id="application_form" method="post" enctype="multipart/form-data" action="application.php<?php if($token!='') echo '?token=' . $token ;?>">
				<fieldset>
					<div class="col-sm-12"><legend>REU Application<div class="pull-right"><input type="submit" formnovalidate class="btn btn-success btn-md" name="save" <?php if($status=='submitted') echo "disabled";?> value="Save and continue later"></div></legend></div>
					<div class="clearfix"></div>

					<!-- Navigation (Different sections) -->
					<ul class="nav nav-tabs">
		  				<li class="active"><a data-toggle="tab" href="#personal_information">Personal Information</a></li>
		  				<li><a data-toggle="tab" href="#academic_information">Academic Information</a></li>
		  				<li><a data-toggle="tab" href="#reu_program_preferences">REU Program Preferences</a></li>
		  				<li><a data-toggle="tab" href="#reference_information">Reference Information</a></li>
		  				<li><a data-toggle="tab" href="#essay">Essay</a></li>
					</ul>

					<div class="tab-content">
						<div class="container tab-pane fade in active" id="personal_information">

							<div class="form-group">
								<p style="line-height: 25px">1. Please tell us which applies to you. <br>
											NOTE: To qualify for the NeuroNEM REU you must be a U.S. Citizen or U.S. Permanent Resident and the University you currently attend must be from an EPSCoR state (<a href="https://www.nsf.gov/od/oia/programs/epscor/nsf_oiia_epscor_EPSCoRstatewebsites.jsp" target="_blank">https://www.nsf.gov/od/oia/programs/epscor/nsf_oiia_epscor_EPSCoRstatewebsites.jsp </a>).</p>
								<div class="radio"><label><input type="radio" name="citizen" <?php if($citizen==1) echo " checked ";if($status=='submitted') echo "disabled";?> value=1 required> U.S. Citizen</label></div>
								<div class="radio"><label><input type="radio" name="citizen" <?php if($citizen==2) echo " checked ";if($status=='submitted') echo "disabled";?> value=2> Permanent Resident</label></div>
								<div class="radio"><label><input type="radio" name="citizen" <?php if($citizen==3) echo " checked ";if($status=='submitted') echo "disabled";?> value=3> Neither</label></div>
							</div>

							<div class="form-group">
								<p>2. Personal/school and local mailing information</p>
								<div class="form-group">
									<label class="col-xs-2" for="fname">First Name</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control" type="text" id="fname" name="fname" value="<?php echo $fname;?>" <?php if($status=='submitted') echo "disabled"; ?> required ></div>
								</div>
								<div class="form-group">
									<label class="col-xs-2" for="mname">Middle Name/Initial</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control" type="text" id="mname" name="mname" value="<?php echo $mname;?>" <?php if($status=='submitted') echo "disabled"; ?>></div>
								</div>
								<div class="form-group">
									<label class="col-xs-2" for="lname">Last Name</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control" type="text" id="lname" name="lname" value="<?php echo $lname;?>" <?php if($status=='submitted') echo "disabled"; ?> required ></div>
								</div>
								<div class="form-group">
									<label class="col-xs-2" for="address">Current Street Address</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control" type="text" id="address" name="address" value="<?php echo $address;?>" <?php if($status=='submitted') echo "disabled"; ?> required ></div>
								</div>
								<div class="form-group">
									<label class="col-xs-2" for="city">City</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control" type="text" id="city" name="city" value="<?php echo $city;?>" <?php if($status=='submitted') echo "disabled"; ?> required ></div>
								</div>
								<div class="form-group">
									<label class="col-xs-2" for="state">State</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control" type="text" id="state" name="state" value="<?php echo $state;?>" <?php if($status=='submitted') echo "disabled"; ?> required ></div>
								</div>
								<div class="form-group">
									<label class="col-xs-2" for="zip">Zip Code</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control" type="number" id="zip" name="zip" value="<?php echo $zip;?>" <?php if($status=='submitted') echo "disabled"; ?> required ></div>
								</div>
								<div class="form-group">
									<label class="col-xs-2" for="phone">Phone Number</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control" type="number" id="phone" name="phone" value="<?php echo $phone;?>" <?php if($status=='submitted') echo "disabled"; ?> required ></div>
								</div>
								<div class="form-group">
									<label class="col-xs-2" for="semail">School Email Address</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control" type="email" id="semail" name="semail" value="<?php echo $semail;?>" <?php if($status=='submitted') echo "disabled"; ?> required ></div>
								</div>
								<div class="form-group">
									<label class="col-xs-2" for="pemail">Preferred Email</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control" type="email" id="pemail" name="pemail" value="<?php echo $pemail;?>" <?php if($status=='submitted') echo "disabled"; ?> required ></div>
								</div>
								<div class="form-group">
									<label class="col-xs-2" for="dob">Date of Birth (mm/dd/yyyy)</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control full-date-picker" type="text" id="dob" name="dob" value="<?php echo $dob;?>" <?php if($status=='submitted') echo "disabled"; ?> required ></div>
								</div>
							</div>

							<div class="form-group">
								<div class="form-group">
									<p class="col-xs-2">3. Permanent Address</p>
									<label class="col-xs-10 col-sm-4"><input type="checkbox" name="perm_local_addresses_same" onclick="copyLocalAddress();" <?php if($perm_local_addresses_same==1) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> id="perm_local_addresses_same" value="1"> Permanent address same as local mailing address?</label>
								</div>
								<div class="form-group">
									<label class="col-xs-2" for="perm_address">Street Address</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control" type="text" id="perm_address" name="perm_address" value="<?php echo $perm_address;?>" <?php if($status=='submitted') echo "disabled"; ?> required ></div>
								</div>
								<div class="form-group">
									<label class="col-xs-2" for="perm_city">City</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control" type="text" id="perm_city" name="perm_city" value="<?php echo $perm_city;?>" <?php if($status=='submitted') echo "disabled"; ?> required ></div>
								</div>
								<div class="form-group">
									<label class="col-xs-2" for="perm_state">State</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control" type="text" id="perm_state" name="perm_state" value="<?php echo $perm_state;?>" <?php if($status=='submitted') echo "disabled"; ?> required ></div>
								</div>
								<div class="form-group">
									<label class="col-xs-2" for="perm_zip">Zip Code</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control" type="number" id="perm_zip" name="perm_zip" value="<?php echo $perm_zip;?>" <?php if($status=='submitted') echo "disabled"; ?> required ></div>
								</div>
								<div class="form-group">
									<label class="col-xs-2" for="perm_phone">Phone Number</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control" type="number" id="perm_phone" name="perm_phone" value="<?php echo $perm_phone;?>" <?php if($status=='submitted') echo "disabled"; ?> required ></div>
								</div>
							</div>

							<div class="form-group">
								<p>4. Sex (optional)</p>
								<div class="radio"><label><input type="radio" name="sex" <?php if($sex==1) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=1> Male</label></div>
								<div class="radio"><label><input type="radio" name="sex" <?php if($sex==2) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=2> Female</label></div>
								<div class="radio"><label><input type="radio" name="sex" <?php if($sex==3) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=3> Prefer not to answer</label></div>
							</div>

							<div class="form-group">
								<p>5. Ethnicity (optional)</p>
								<div class="radio"><label><input type="radio" name="ethnicity" <?php if($ethnicity==1) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=1> Hispanic or Latino</label></div>
								<div class="radio"><label><input type="radio" name="ethnicity" <?php if($ethnicity==2) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=2> Not Hispanic or Latino</label></div>
								<div class="radio"><label><input type="radio" name="ethnicity" <?php if($ethnicity==3) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=3> Prefer not to answer</label></div>
							</div>

							<div class="form-group">
								<p>6. Race (optional)</p>
								<div class="radio"><label><input type="radio" name="race" <?php if($race==1) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=1> American Indian or Alaskan Native</label></div>
								<div class="radio"><label><input type="radio" name="race" <?php if($race==2) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=2> Asian</label></div>
								<div class="radio"><label><input type="radio" name="race" <?php if($race==3) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=3> Black or African American</label></div>
								<div class="radio"><label><input type="radio" name="race" <?php if($race==4) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=4> Native Hawaiian or Other Pacific Islander</label></div>
								<div class="radio"><label><input type="radio" name="race" <?php if($race==5) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=5> White</label></div>
								<div class="radio"><label><input type="radio" name="race" <?php if($race==6) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=6> Prefer not to answer</label></div>
							</div>

							<div class="form-group">
								<p>7. Do you have a documented disability? (optional)</p>
								<div class="radio"><label><input type="radio" name="disability" <?php if($disability==1) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=1> Yes</label></div>
								<div class="radio"><label><input type="radio" name="disability" <?php if($disability==2) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=2> No</label></div>
								<div class="radio"><label><input type="radio" name="disability" <?php if($disability==3) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=3> Prefer not to answer</label></div>
							</div>

							<div class="form-group">
								<p>8. Are you the first person in your family to attend college? (optional)</p>
								<div class="radio"><label><input type="radio" name="first_in_family" <?php if($first_in_family==1) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=1> Yes</label></div>
								<div class="radio"><label><input type="radio" name="first_in_family" <?php if($first_in_family==2) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=2> No</label></div>
								<div class="radio"><label><input type="radio" name="first_in_family" <?php if($first_in_family==3) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?>value=3> Prefer not to answer</label></div>
							</div>

							<div class="form-group">
								<p>9. Please mark the highest education level for each parent. (optional)</p>
								<table class="table table-striped">
									<thead>
										<tr>
											<td></td><td></td>
											<td>Elementary</td>
											<td>High School</td>
											<td>Some College</td>
											<td>Bachelor's Degree</td>
											<td>Graduate/Professional Degree</td>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Mother</td>
											<td></td>
											<td><input type="radio" name="mother_education" <?php if($mother_education==1) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=1 ></td>
											<td><input type="radio" name="mother_education" <?php if($mother_education==2) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=2 ></td>
											<td><input type="radio" name="mother_education" <?php if($mother_education==3) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=3 ></td>
											<td><input type="radio" name="mother_education" <?php if($mother_education==4) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=4 ></td>
											<td><input type="radio" name="mother_education" <?php if($mother_education==5) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=5 ></td>
										</tr>
										<tr>
											<td>Father</td>
											<td></td>
											<td><input type="radio" name="father_education" <?php if($father_education==1) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=1 ></td>
											<td><input type="radio" name="father_education" <?php if($father_education==2) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=2 ></td>
											<td><input type="radio" name="father_education" <?php if($father_education==3) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=3 ></td>
											<td><input type="radio" name="father_education" <?php if($father_education==4) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=4 ></td>
											<td><input type="radio" name="father_education" <?php if($father_education==5) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=5 ></td>
										</tr>
									</tbody>
								</table>
							</div>

							<div class="form-group">
								<div class="col-sm-1 col-xs-2 pull-right"><input type="button" class="btn btn-primary" onclick="switchTabs('#academic_information');" id="continue_academic" name="continue" value="Next >>"></div>
							</div>

						</div>
						<div class="container tab-pane fade" id="academic_information">
							<div class="form-group">
								<p>10. Current Classification (during spring 2017)</p>
								<div class="radio"><label><input type="radio" name="current_classification" <?php if($current_classification==1) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=1 required> Freshman</label></div>
								<div class="radio"><label><input type="radio" name="current_classification" <?php if($current_classification==2) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=2> Sophomore</label></div>
								<div class="radio"><label><input type="radio" name="current_classification" <?php if($current_classification==3) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=3> Junior</label></div>
								<div class="radio"><label><input type="radio" name="current_classification" <?php if($current_classification==4) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=4> Senior</label></div>
								<div class="radio"><label><input type="radio" name="current_classification" <?php if($current_classification==5) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=5> Other (please specify)</label></div>
								<div class="other_description"><input type="text" class="col-sm-11 col-xm-11 form-control" id="current_classification_description" name="current_classification_description" <?php if($status=='submitted') echo "disabled"; ?> value="<?php echo $current_classification_description;?>"></div>
							</div>

							<div class="form-group">
								<p>11. Academic History</p>
								<div class="form-group">
									<label class="col-xs-2" for="high_school_grad_date">Date of High School Graduation (mm/dd/yyyy)</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control full-date-picker" type="text" id="high_school_grad_date" name="high_school_grad_date" value="<?php echo $high_school_grad_date;?>" <?php if($status=='submitted') echo "disabled"; ?> required ></div>
								</div>
								<div class="form-group">
									<label class="col-xs-2" for="attending_university">College/University Currently Attending</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control" type="text" id="attending_university" name="attending_university" value="<?php echo $attending_university;?>" <?php if($status=='submitted') echo "disabled"; ?> required ></div>
								</div>
								<div class="form-group">
									<label class="col-xs-2" for="major">Major</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control" type="text" id="major" name="major" value="<?php echo $major;?>" <?php if($status=='submitted') echo "disabled"; ?> required></div>
								</div>
								<div class="form-group">
									<label class="col-xs-2" for="minor">Minor</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control" type="text" id="minor" name="minor" value="<?php echo $minor;?>" <?php if($status=='submitted') echo "disabled"; ?> required ></div>
								</div>
								<div class="form-group">
									<label class="col-xs-2" for="gpa">Overall GPA</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control" type="text" id="gpa" name="gpa" value="<?php echo $gpa;?>" <?php if($status=='submitted') echo "disabled"; ?> required ></div>
								</div>
								<div class="form-group">
									<label class="col-xs-2" for="gpa_major">GPA in Major</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control" type="text" id="gpa_major" name="gpa_major" value="<?php echo $gpa_major;?>" <?php if($status=='submitted') echo "disabled"; ?> required ></div>
								</div>
								<div class="form-group">
									<label class="col-xs-2" for="expected_grad_date">Date of Expected Graduation (mm/dd/yyyy)</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control full-date-picker" type="text" id="expected_grad_date" name="expected_grad_date" value="<?php echo $expected_grad_date;?>" <?php if($status=='submitted') echo "disabled"; ?> required ></div>
								</div>
							</div>

							<div class="form-group">
								<p>12. Please indicate the type of institution you are currently attending.</p>
								<div class="radio"><label><input type="radio" name="institution_type" <?php if($institution_type==1) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=1 required> Community College</label></div>
								<div class="radio"><label><input type="radio" name="institution_type" <?php if($institution_type==2) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=2> Liberal Arts College</label></div>
								<div class="radio"><label><input type="radio" name="institution_type" <?php if($institution_type==3) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=3> Traditional Four-Year College</label></div>
								<div class="radio"><label><input type="radio" name="institution_type" <?php if($institution_type==4) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=4> Comprehensive University</label></div>
								<div class="radio"><label><input type="radio" name="institution_type" <?php if($institution_type==5) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=5> Other (please specify)</label></div>
								<div class="other_description"><input type="text" class="col-sm-11 col-xm-11 form-control" id="institution_type_description" name="institution_type_description" value="<?php echo $institution_type_description;?>" <?php if($status=='submitted') echo "disabled"; ?>></div>
							</div>

							<div class="form-group">
								<p>13. List any academic awards/honors. (optional)</p>
								<div class="col-xs-12 col-sm-6"><textarea id="academic_awards" name="academic_awards" rows="3" <?php if($status=='submitted') echo "disabled"; ?>><?php echo str_replace('\r\n','&#13;',$academic_awards);?></textarea></div>
							</div>
							<div class="form-group">
								<p>14. List extracurricular activities during undergraduate education. (optional)</p>
								<div class="col-xs-12 col-sm-6"><textarea id="extracurricular_activities" name="extracurricular_activities" rows="3" <?php if($status=='submitted') echo "disabled"; ?>><?php echo str_replace('\r\n','&#10;&#13;',$extracurricular_activities);?></textarea></div>
							</div>
							<div class="form-group">
								<p>15. List Professional and academic association memberships. (optional)</p>
								<div class="col-xs-12 col-sm-6"><textarea id="prof_acad_memberships" name="prof_acad_memberships" rows="3" <?php if($status=='submitted') echo "disabled"; ?>><?php echo str_replace('\r\n','&#13;',$prof_acad_memberships);?></textarea></div>
							</div>
							<div class="form-group">
								<p>16. Please list all science, math, engineering, computing, and technology courses taken, programming languages known and any other course related to STEM field. (optional)</p>
								<div class="col-xs-12 col-sm-6"><textarea id="courses_taken" name="courses_taken" rows="3" <?php if($status=='submitted') echo "disabled"; ?>><?php echo str_replace('\r\n','&#13;',$courses_taken);?></textarea></div>
							</div>
							<div class="form-group">
								<p>17. Please describe any research, technical, co-op or internship experience you've had. (optional)</p>
								<div class="col-xs-12 col-sm-6"><textarea id="experience" name="experience" rows="3" <?php if($status=='submitted') echo "disabled"; ?>><?php echo str_replace('\r\n','&#13;',$experience);?></textarea></div>
							</div>
							<div class="form-group">
								<p>18. Please upload transcripts in PDF format.</p>
						 		<div <?php if($status=='submitted') echo "style='display: none';";?> class="col-sm-6 col-xs-12"> If you want to change the transcripts, please upload new transcripts and it will replace the old transcripts.<br><br> <input type="file" class="form-control-file" id="transcripts" name="transcripts" aria-describedby="fileHelp" ></div>
                                <a id="saved_transcripts" target="_blank" <?php if(!$filename) echo "style='display:none';"?> href="uploads/Transcripts/<?php echo $filename;?>">Uploaded Trascripts</a>
						 		<p id="transcripts_error" style="color: red; display: none;">Please upload a PDF version of transcripts.</p>
							</div>

							<div class="form-group">
								<div class="col-sm-1 col-xs-2 pull-left"><input type="button" class="btn btn-primary" onclick="switchTabs('#personal_information');" id="continue_personal" name="continue" value="<< Prev"></div>
								<div class="col-sm-1 col-xs-2 pull-right"><input type="button" class="btn btn-primary" onclick="switchTabs('#reu_program_preferences');" id="continue_preferences" name="continue" value="Next >>"></div>
							</div>

						</div>
						<div class="container tab-pane fade" id="reu_program_preferences">
							<!--  <div class="form-group">
								<p>18. The DeltaREM REU is conducted at three different universities: Louisiana Tech, the University of Alabama at Birmingham, and the University of Arkansas for Medical Science.
								 You have the option of participation in the program at one of these univerisities. Please rank them in order of preferences (1 being first preference and so on).</p>
								<table class="table table-striped universities">
									<thead>
										<tr>
											<td></td><td></td>
											<td>1</td>
											<td>2</td>
											<td>3</td>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td colspan="2">Louisiana Tech University</td>
											<td><input type="radio" name="louisiana_tech_pref" <?php if($louisiana_tech_pref==1) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=1 required></td>
											<td><input type="radio" name="louisiana_tech_pref" <?php if($louisiana_tech_pref==2) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=2 ></td>
											<td><input type="radio" name="louisiana_tech_pref" <?php if($louisiana_tech_pref==3) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=3 ></td>
										</tr>
										<tr>
											<td colspan="2">University of Alabama at Birmingham</td>
											<td><input type="radio" name="alabama_university_pref" <?php if($alabama_university_pref==1) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=1 required></td>
											<td><input type="radio" name="alabama_university_pref" <?php if($alabama_university_pref==2) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=2 ></td>
											<td><input type="radio" name="alabama_university_pref" <?php if($alabama_university_pref==3) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=3 ></td>
										</tr>
										<tr>
											<td colspan="2">University of Arkansas for Medical Science</td>
											<td><input type="radio" name="arkansas_university_pref" <?php if($arkansas_university_pref==1) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=1 required></td>
											<td><input type="radio" name="arkansas_university_pref" <?php if($arkansas_university_pref==2) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=2 ></td>
											<td><input type="radio" name="arkansas_university_pref" <?php if($arkansas_university_pref==3) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=3 ></td>
										</tr>
									</tbody>
								</table>
							</div> -->

							<div class="form-group">
								<p>19. Please rank the available projects in order of your preference (1 being first preference and so on).</p>
								<table class="table table-striped projects">
									<thead>
										<tr>
											<td colspan="2"></td>
											<td>1</td>
											<td>2</td>
											<td>3</td>
											<td>4</td>
											<td>5</td>
											<td>6</td>
											<td>7</td>
											<td>8</td>
											<td>9</td>
											<td>10</td>
											<td>11</td>
											<td>12</td>
											<td>13</td>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td colspan="2">1. Advanced processing of EEG and MEG signals from the epileptic brain<br> (LATech, Mentors: Leon D. Iasemidis)</td>
											<td><input type="radio" name="project1" <?php if($project_preferences[0]==1) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=1 required></td>
											<td><input type="radio" name="project1" <?php if($project_preferences[0]==2) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=2 ></td>
											<td><input type="radio" name="project1" <?php if($project_preferences[0]==3) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=3 ></td>
											<td><input type="radio" name="project1" <?php if($project_preferences[0]==4) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=4 ></td>
											<td><input type="radio" name="project1" <?php if($project_preferences[0]==5) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=5 ></td>
											<td><input type="radio" name="project1" <?php if($project_preferences[0]==6) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=6 ></td>
											<td><input type="radio" name="project1" <?php if($project_preferences[0]==7) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=7 ></td>
											<td><input type="radio" name="project1" <?php if($project_preferences[0]==8) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=8 ></td>
											<td><input type="radio" name="project1" <?php if($project_preferences[0]==9) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=9 ></td>
											<td><input type="radio" name="project1" <?php if($project_preferences[0]==10) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=10 ></td>
											<td><input type="radio" name="project1" <?php if($project_preferences[0]==11) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=11 ></td>
											<td><input type="radio" name="project1" <?php if($project_preferences[0]==12) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=12 ></td>
											<td><input type="radio" name="project1" <?php if($project_preferences[0]==13) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=13 ></td>
										</tr>
										<tr>
											<td colspan="2">2. Mathematical analysis of neurochemical signals<br> (LATech, Mentors: Prabhu Arumugam and Leon D. Iasemidis)</td>
											<td><input type="radio" name="project2" <?php if($project_preferences[1]==1) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=1 required></td>
											<td><input type="radio" name="project2" <?php if($project_preferences[1]==2) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=2 ></td>
											<td><input type="radio" name="project2" <?php if($project_preferences[1]==3) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=3 ></td>
											<td><input type="radio" name="project2" <?php if($project_preferences[1]==4) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=4 ></td>
											<td><input type="radio" name="project2" <?php if($project_preferences[1]==5) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=5 ></td>
											<td><input type="radio" name="project2" <?php if($project_preferences[1]==6) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=6 ></td>
											<td><input type="radio" name="project2" <?php if($project_preferences[1]==7) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=7 ></td>
											<td><input type="radio" name="project2" <?php if($project_preferences[1]==8) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=8 ></td>
											<td><input type="radio" name="project2" <?php if($project_preferences[1]==9) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=9 ></td>
											<td><input type="radio" name="project2" <?php if($project_preferences[1]==10) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=10 ></td>
											<td><input type="radio" name="project2" <?php if($project_preferences[1]==11) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=11 ></td>
											<td><input type="radio" name="project2" <?php if($project_preferences[1]==12) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=12 ></td>
											<td><input type="radio" name="project2" <?php if($project_preferences[1]==13) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=13 ></td>
										</tr>
										<tr>
											<td colspan="2">3. Recording brain activity in epileptic rats<br> (LATech, Mentor: Teresa A. Murray)</td>
											<td><input type="radio" name="project3" <?php if($project_preferences[2]==1) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=1 required></td>
											<td><input type="radio" name="project3" <?php if($project_preferences[2]==2) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=2 ></td>
											<td><input type="radio" name="project3" <?php if($project_preferences[2]==3) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=3 ></td>
											<td><input type="radio" name="project3" <?php if($project_preferences[2]==4) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=4 ></td>
											<td><input type="radio" name="project3" <?php if($project_preferences[2]==5) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=5 ></td>
											<td><input type="radio" name="project3" <?php if($project_preferences[2]==6) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=6 ></td>
											<td><input type="radio" name="project3" <?php if($project_preferences[2]==7) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=7 ></td>
											<td><input type="radio" name="project3" <?php if($project_preferences[2]==8) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=8 ></td>
											<td><input type="radio" name="project3" <?php if($project_preferences[2]==9) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=9 ></td>
											<td><input type="radio" name="project3" <?php if($project_preferences[2]==10) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=10 ></td>
											<td><input type="radio" name="project3" <?php if($project_preferences[2]==11) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=11 ></td>
											<td><input type="radio" name="project3" <?php if($project_preferences[2]==12) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=12 ></td>
											<td><input type="radio" name="project3" <?php if($project_preferences[2]==13) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=13 ></td>
										</tr>
										<tr>
											<td colspan="2">4. Development of a Multiplexed Chemical Microsensor for Glutamate and Dopamine Detection<br> (LATech, Mentors: Prabhu Arumugam and Shabnam Siddiqui)</td>
											<td><input type="radio" name="project4" <?php if($project_preferences[3]==1) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=1 required></td>
											<td><input type="radio" name="project4" <?php if($project_preferences[3]==2) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=2 ></td>
											<td><input type="radio" name="project4" <?php if($project_preferences[3]==3) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=3 ></td>
											<td><input type="radio" name="project4" <?php if($project_preferences[3]==4) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=4 ></td>
											<td><input type="radio" name="project4" <?php if($project_preferences[3]==5) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=5 ></td>
											<td><input type="radio" name="project4" <?php if($project_preferences[3]==6) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=6 ></td>
											<td><input type="radio" name="project4" <?php if($project_preferences[3]==7) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=7 ></td>
											<td><input type="radio" name="project4" <?php if($project_preferences[3]==8) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=8 ></td>
											<td><input type="radio" name="project4" <?php if($project_preferences[3]==9) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=9 ></td>
											<td><input type="radio" name="project4" <?php if($project_preferences[3]==10) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=10 ></td>
											<td><input type="radio" name="project4" <?php if($project_preferences[3]==11) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=11 ></td>
											<td><input type="radio" name="project4" <?php if($project_preferences[3]==12) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=12 ></td>
											<td><input type="radio" name="project4" <?php if($project_preferences[3]==13) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=13 ></td>
										</tr>
										<tr>
											<td colspan="2">5. Molecular and cellular analysis of epileptic networks<br> (LATech, Mentors: Mark DeCoster and Katie Evans)</td>
											<td><input type="radio" name="project5" <?php if($project_preferences[4]==1) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=1 required></td>
											<td><input type="radio" name="project5" <?php if($project_preferences[4]==2) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=2 ></td>
											<td><input type="radio" name="project5" <?php if($project_preferences[4]==3) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=3 ></td>
											<td><input type="radio" name="project5" <?php if($project_preferences[4]==4) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=4 ></td>
											<td><input type="radio" name="project5" <?php if($project_preferences[4]==5) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=5 ></td>
											<td><input type="radio" name="project5" <?php if($project_preferences[4]==6) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=6 ></td>
											<td><input type="radio" name="project5" <?php if($project_preferences[4]==7) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=7 ></td>
											<td><input type="radio" name="project5" <?php if($project_preferences[4]==8) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=8 ></td>
											<td><input type="radio" name="project5" <?php if($project_preferences[4]==9) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=9 ></td>
											<td><input type="radio" name="project5" <?php if($project_preferences[4]==10) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=10 ></td>
											<td><input type="radio" name="project5" <?php if($project_preferences[4]==11) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=11 ></td>
											<td><input type="radio" name="project5" <?php if($project_preferences[4]==12) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=12 ></td>
											<td><input type="radio" name="project5" <?php if($project_preferences[4]==13) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=13 ></td>
										</tr>
										<tr>
											<td colspan="2">6. Scalp and Intracranial EEG Recording<br> (UAB, Mentors: Jerzy P. Szaflarski and Sandipan Pati)</td>
											<td><input type="radio" name="project6" value=1 <?php if($project_preferences[5]==1) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> required></td>
											<td><input type="radio" name="project6" <?php if($project_preferences[5]==2) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=2 ></td>
											<td><input type="radio" name="project6" <?php if($project_preferences[5]==3) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=3 ></td>
											<td><input type="radio" name="project6" <?php if($project_preferences[5]==4) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=4 ></td>
											<td><input type="radio" name="project6" <?php if($project_preferences[5]==5) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=5 ></td>
											<td><input type="radio" name="project6" <?php if($project_preferences[5]==6) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=6 ></td>
											<td><input type="radio" name="project6" <?php if($project_preferences[5]==7) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=7 ></td>
											<td><input type="radio" name="project6" <?php if($project_preferences[5]==8) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=8 ></td>
											<td><input type="radio" name="project6" <?php if($project_preferences[5]==9) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=9 ></td>
											<td><input type="radio" name="project6" <?php if($project_preferences[5]==10) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=10 ></td>
											<td><input type="radio" name="project6" <?php if($project_preferences[5]==11) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=11 ></td>
											<td><input type="radio" name="project6" <?php if($project_preferences[5]==12) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=12 ></td>
											<td><input type="radio" name="project6" <?php if($project_preferences[5]==13) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=13 ></td>
										</tr>
										<tr>
											<td colspan="2">7. MEG Recording of brain's resting state<br> (UAB, Mentors: Timothy J. Gawne and Sandipan Pati)</td>
											<td><input type="radio" name="project7" <?php if($project_preferences[6]==1) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=1 required></td>
											<td><input type="radio" name="project7" <?php if($project_preferences[6]==2) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=2 ></td>
											<td><input type="radio" name="project7" <?php if($project_preferences[6]==3) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=3 ></td>
											<td><input type="radio" name="project7" <?php if($project_preferences[6]==4) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=4 ></td>
											<td><input type="radio" name="project7" <?php if($project_preferences[6]==5) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=5 ></td>
											<td><input type="radio" name="project7" <?php if($project_preferences[6]==6) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=6 ></td>
											<td><input type="radio" name="project7" <?php if($project_preferences[6]==7) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=7 ></td>
											<td><input type="radio" name="project7" <?php if($project_preferences[6]==8) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=8 ></td>
											<td><input type="radio" name="project7" <?php if($project_preferences[6]==9) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=9 ></td>
											<td><input type="radio" name="project7" <?php if($project_preferences[6]==10) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=10 ></td>
											<td><input type="radio" name="project7" <?php if($project_preferences[6]==11) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=11 ></td>
											<td><input type="radio" name="project7" <?php if($project_preferences[6]==12) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=12 ></td>
											<td><input type="radio" name="project7" <?php if($project_preferences[6]==13) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=13 ></td>
										</tr>
										<tr>
											<td colspan="2">8. Functional MRI of memory and learning<br> (UAB, Mentors: Jerzy P. Szaflarski)</td>
											<td><input type="radio" name="project8" <?php if($project_preferences[7]==1) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=1 required></td>
											<td><input type="radio" name="project8" <?php if($project_preferences[7]==2) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=2 ></td>
											<td><input type="radio" name="project8" <?php if($project_preferences[7]==3) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=3 ></td>
											<td><input type="radio" name="project8" <?php if($project_preferences[7]==4) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=4 ></td>
											<td><input type="radio" name="project8" <?php if($project_preferences[7]==5) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=5 ></td>
											<td><input type="radio" name="project8" <?php if($project_preferences[7]==6) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=6 ></td>
											<td><input type="radio" name="project8" <?php if($project_preferences[7]==7) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=7 ></td>
											<td><input type="radio" name="project8" <?php if($project_preferences[7]==8) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=8 ></td>
											<td><input type="radio" name="project8" <?php if($project_preferences[7]==9) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=9 ></td>
											<td><input type="radio" name="project8" <?php if($project_preferences[7]==10) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=10 ></td>
											<td><input type="radio" name="project8" <?php if($project_preferences[7]==11) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=11 ></td>
											<td><input type="radio" name="project8" <?php if($project_preferences[7]==12) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=12 ></td>
											<td><input type="radio" name="project8" <?php if($project_preferences[7]==13) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=13 ></td>
										</tr>
										<tr>
											<td colspan="2">9. Association of post-ictal duration with cognitive recovery<br> (UAMS, Mentors: Linda J. Larson-Prior)</td>
											<td><input type="radio" name="project9" <?php if($project_preferences[8]==1) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=1 required></td>
											<td><input type="radio" name="project9" <?php if($project_preferences[8]==2) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=2 ></td>
											<td><input type="radio" name="project9" <?php if($project_preferences[8]==3) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=3 ></td>
											<td><input type="radio" name="project9" <?php if($project_preferences[8]==4) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=4 ></td>
											<td><input type="radio" name="project9" <?php if($project_preferences[8]==5) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=5 ></td>
											<td><input type="radio" name="project9" <?php if($project_preferences[8]==6) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=6 ></td>
											<td><input type="radio" name="project9" <?php if($project_preferences[8]==7) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=7 ></td>
											<td><input type="radio" name="project9" <?php if($project_preferences[8]==8) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=8 ></td>
											<td><input type="radio" name="project9" <?php if($project_preferences[8]==9) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=9 ></td>
											<td><input type="radio" name="project9" <?php if($project_preferences[8]==10) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=10 ></td>
											<td><input type="radio" name="project9" <?php if($project_preferences[8]==11) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=11 ></td>
											<td><input type="radio" name="project9" <?php if($project_preferences[8]==12) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=12 ></td>
											<td><input type="radio" name="project9" <?php if($project_preferences[8]==13) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=13 ></td>
										</tr>
										<tr>
											<td colspan="2">10. The effects of sleep disruption on post-surgical memory function<br> (UAMS, Mentors: Linda J. Larson-Prior)</td>
											<td><input type="radio" name="project10" <?php if($project_preferences[9]==1) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=1 required></td>
											<td><input type="radio" name="project10" <?php if($project_preferences[9]==2) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=2 ></td>
											<td><input type="radio" name="project10" <?php if($project_preferences[9]==3) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=3 ></td>
											<td><input type="radio" name="project10" <?php if($project_preferences[9]==4) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=4 ></td>
											<td><input type="radio" name="project10" <?php if($project_preferences[9]==5) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=5 ></td>
											<td><input type="radio" name="project10" <?php if($project_preferences[9]==6) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=6 ></td>
											<td><input type="radio" name="project10" <?php if($project_preferences[9]==7) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=7 ></td>
											<td><input type="radio" name="project10" <?php if($project_preferences[9]==8) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=8 ></td>
											<td><input type="radio" name="project10" <?php if($project_preferences[9]==9) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=9 ></td>
											<td><input type="radio" name="project10" <?php if($project_preferences[9]==10) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=10 ></td>
											<td><input type="radio" name="project10" <?php if($project_preferences[9]==11) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=11 ></td>
											<td><input type="radio" name="project10" <?php if($project_preferences[9]==12) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=12 ></td>
											<td><input type="radio" name="project10" <?php if($project_preferences[9]==13) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=13 ></td>
										</tr>
										<tr>
											<td colspan="2">11. Analysis of hdEEG evoked responses to EPSCoR memory tasks<br> (UAMS, Mentors: Linda J. Larson-Prior)</td>
											<td><input type="radio" name="project11" <?php if($project_preferences[10]==1) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=1 required></td>
											<td><input type="radio" name="project11" <?php if($project_preferences[10]==2) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=2 ></td>
											<td><input type="radio" name="project11" <?php if($project_preferences[10]==3) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=3 ></td>
											<td><input type="radio" name="project11" <?php if($project_preferences[10]==4) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=4 ></td>
											<td><input type="radio" name="project11" <?php if($project_preferences[10]==5) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=5 ></td>
											<td><input type="radio" name="project11" <?php if($project_preferences[10]==6) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=6 ></td>
											<td><input type="radio" name="project11" <?php if($project_preferences[10]==7) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=7 ></td>
											<td><input type="radio" name="project11" <?php if($project_preferences[10]==8) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=8 ></td>
											<td><input type="radio" name="project11" <?php if($project_preferences[10]==9) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=9 ></td>
											<td><input type="radio" name="project11" <?php if($project_preferences[10]==10) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=10 ></td>
											<td><input type="radio" name="project11" <?php if($project_preferences[10]==11) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=11 ></td>
											<td><input type="radio" name="project11" <?php if($project_preferences[10]==12) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=12 ></td>
											<td><input type="radio" name="project11" <?php if($project_preferences[10]==13) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=13 ></td>
										</tr>
										<tr>
											<td colspan="2">12. Phase Amplitude Coupled comodulogram maps in EEG and ECoG data<br> (UAMS, Mentors: Diana Escalona-Vargas)</td>
											<td><input type="radio" name="project12" <?php if($project_preferences[11]==1) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=1 required></td>
											<td><input type="radio" name="project12" <?php if($project_preferences[11]==2) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=2 ></td>
											<td><input type="radio" name="project12" <?php if($project_preferences[11]==3) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=3 ></td>
											<td><input type="radio" name="project12" <?php if($project_preferences[11]==4) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=4 ></td>
											<td><input type="radio" name="project12" <?php if($project_preferences[11]==5) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=5 ></td>
											<td><input type="radio" name="project12" <?php if($project_preferences[11]==6) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=6 ></td>
											<td><input type="radio" name="project12" <?php if($project_preferences[11]==7) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=7 ></td>
											<td><input type="radio" name="project12" <?php if($project_preferences[11]==8) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=8 ></td>
											<td><input type="radio" name="project12" <?php if($project_preferences[11]==9) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=9 ></td>
											<td><input type="radio" name="project12" <?php if($project_preferences[11]==10) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=10 ></td>
											<td><input type="radio" name="project12" <?php if($project_preferences[11]==11) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=11 ></td>
											<td><input type="radio" name="project12" <?php if($project_preferences[11]==12) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=12 ></td>
											<td><input type="radio" name="project12" <?php if($project_preferences[11]==13) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=13 ></td>
										</tr>
										<tr>
											<td colspan="2">13. Mapping functional connectivity in epileptic brains pre and post-operatively<br> (UAMS, Mentors: Diana Escalona-Vargas)</td>
											<td><input type="radio" name="project13" <?php if($project_preferences[12]==1) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=1 required></td>
											<td><input type="radio" name="project13" <?php if($project_preferences[12]==2) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=2 ></td>
											<td><input type="radio" name="project13" <?php if($project_preferences[12]==3) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=3 ></td>
											<td><input type="radio" name="project13" <?php if($project_preferences[12]==4) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=4 ></td>
											<td><input type="radio" name="project13" <?php if($project_preferences[12]==5) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=5 ></td>
											<td><input type="radio" name="project13" <?php if($project_preferences[12]==6) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=6 ></td>
											<td><input type="radio" name="project13" <?php if($project_preferences[12]==7) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=7 ></td>
											<td><input type="radio" name="project13" <?php if($project_preferences[12]==8) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=8 ></td>
											<td><input type="radio" name="project13" <?php if($project_preferences[12]==9) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=9 ></td>
											<td><input type="radio" name="project13" <?php if($project_preferences[12]==10) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=10 ></td>
											<td><input type="radio" name="project13" <?php if($project_preferences[12]==11) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=11 ></td>
											<td><input type="radio" name="project13" <?php if($project_preferences[12]==12) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=12 ></td>
											<td><input type="radio" name="project13" <?php if($project_preferences[12]==13) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=13 ></td>
										</tr>
									</tbody>
								</table>
							</div>

							<div class="form-group">
								<p>20. If selected, do you require on-campus housing?</p>
								<div class="radio"><label><input type="radio" name="housing" <?php if($housing==1) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=1 required> Yes</label></div>
								<div class="radio"><label><input type="radio" name="housing" <?php if($housing==2) echo " checked ";?> <?php if($status=='submitted') echo "disabled"; ?> value=2> No</label></div>
							</div>

							<div class="form-group">
								<div class="col-sm-1 col-xs-2 pull-left"><input type="button" class="btn btn-primary" onclick="switchTabs('#academic_information');" id="continue_academic" name="continue" value="<< Prev"></div>
								<div class="col-sm-1 col-xs-2 pull-right"><input type="button" class="btn btn-primary" onclick="switchTabs('#reference_information');" id="continue_references" name="continue" value="Next >>"></div>
							</div>

						</div>
						<div class="container tab-pane fade" id="reference_information">
							<p>
                                Please fill the references information and they will be contacted by the system automatically. You will be notified through email once they submit their recommendation letters.
                            </p>
                            <div class="form-group">
                                <p>21. Reference #1 contact information</p>
								<div class="form-group">
									<label class="col-xs-2" for="ref1_title">Title</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control" type="text" id="ref1_title" name="ref1_title" value="<?php echo $ref1_title;?>" <?php if($status=='submitted') echo "disabled"; ?> required ></div>
								</div>
								<div class="form-group">
									<label class="col-xs-2" for="ref1_fname">First Name</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control" type="text" id="ref1_fname" name="ref1_fname" value="<?php echo $ref1_fname;?>" <?php if($status=='submitted') echo "disabled"; ?> required ></div>
								</div>
								<div class="form-group">
									<label class="col-xs-2" for="ref1_lname">Last Name</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control" type="text" id="ref1_lname" name="ref1_lname" value="<?php echo $ref1_lname;?>" <?php if($status=='submitted') echo "disabled"; ?> required ></div>
								</div>
								<div class="form-group">
									<label class="col-xs-2" for="ref1_email">Email Address</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control" type="email" id="ref1_email" name="ref1_email" value="<?php echo $ref1_email;?>" <?php if($status=='submitted') echo "disabled"; ?> required ></div>
								</div>
							</div>

							<div class="form-group">
								<p>22. Reference #2 contact information</p>
								<div class="form-group">
									<label class="col-xs-2" for="ref2_title">Title</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control" type="text" id="ref2_title" name="ref2_title" value="<?php echo $ref2_title;?>" <?php if($status=='submitted') echo "disabled"; ?> required ></div>
								</div>
								<div class="form-group">
									<label class="col-xs-2" for="ref2_fname">First Name</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control" type="text" id="ref2_fname" name="ref2_fname" value="<?php echo $ref2_fname;?>" <?php if($status=='submitted') echo "disabled"; ?> required ></div>
								</div>
								<div class="form-group">
									<label class="col-xs-2" for="ref2_lname">Last Name</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control" type="text" id="ref2_lname" name="ref2_lname" value="<?php echo $ref2_lname;?>" <?php if($status=='submitted') echo "disabled"; ?> required ></div>
								</div>
								<div class="form-group">
									<label class="col-xs-2" for="ref2_email">Email Address</label>
									<div class="col-xs-10 col-sm-4"><input class="form-control" type="email" id="ref2_email" name="ref2_email" value="<?php echo $ref2_email;?>" <?php if($status=='submitted') echo "disabled"; ?> required ></div>
								</div>
							</div>

							<div class="form-group">
								<p>23. Do you waive the right to review the reference letters submitted on your behalf?</p>
								<div class="radio"><label><input type="radio" name="ref_letters_review_right" <?php if($ref_letters_review_right==1) echo " checked ";?> value=1 <?php if($status=='submitted') echo "disabled"; ?> required> Yes</label></div>
								<div class="radio"><label><input type="radio" name="ref_letters_review_right" <?php if($ref_letters_review_right==2) echo " checked ";?> value=2 <?php if($status=='submitted') echo "disabled"; ?>> No</label></div>
							</div>

							<div class="form-group">
								<div class="col-sm-1 col-xs-2 pull-left"><input type="button" class="btn btn-primary" onclick="switchTabs('#reu_program_preferences');" id="continue_preferences" name="continue" value="<< Prev"></div>
								<div class="col-sm-1 col-xs-2 pull-right"><input type="button" class="btn btn-primary" onclick="switchTabs('#essay');" id="continue_essay" name="continue" value="Next >>"></div>
							</div>

						</div>
						<div class="container tab-pane fade" id="essay">
							<div class="form-group">
								<p>24. Please write 500 word essay that includes a description of your academic background, the reason of your interest in this program, and your future
								career plans. The essay should also cover how you will benefit from this summer research experience.</p>
								<div class="col-xs-12 col-sm-12"><textarea id="essay_description" spellcheck=true name="essay_description" rows="10" <?php if($status=='submitted') echo "disabled"; ?>><?php echo $essay_description;?></textarea></div>
							</div>

							<div class="form-group">
								<div class="col-sm-1 col-xs-2 pull-left"><input type="button" class="btn btn-primary" onclick="switchTabs('#reference_information');" id="continue_references" name="continue" value="<< Prev"></div>
								<div class="col-sm-1 col-sm-offset-4"><input type="submit" onclick="return validateForm();" class="btn btn-success btn-md" formtarget="_blank" formaction="application_pdf.php" name="preview" <?php if($status=='submitted') echo "disabled";?> value="Preview"></div>
								<div class="col-sm-1"><input type="submit" class="btn btn-success btn-md" onclick="return validateForm();" name="submit" <?php if($status=='submitted') echo "disabled";?> value="Submit"></div>
							</div>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
		<?php include 'includes/footer.php'; ?>
	</body>
</html>

<?php
/*
<div class="form-group">
 	<div class="col-xs-12"><label>Resume</label><span class="required">*</span></div>
	<div class="col-sm-6 col-xs-12"><input type="file" class="form-control-file" id="resume" name="resume" aria-describedby="fileHelp" required ></div>
</div>
*/
?>
