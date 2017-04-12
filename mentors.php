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
	<body id="mentors">
  		<?php 
  			include "includes/header.php"; ?>
  			<div class="container setminheight">
  				<div id="mentor_profiles">
  					
  					<div id="latech_mentors">
  						<h1>LaTech Mentors</h1>
		  				<div class="page-header" style="overflow: hidden;">
		  					<!-- Image -->
		  					<div class="col-sm-3 col-xs-12 bottom-margin">
		  						<img alt="Prabhu Arumugam" class="img-responsive" src="images/mentors/Arumugam.jpg">
		  					</div>
		  					<!-- Bio -->
		  					<div class="col-sm-9 col-xs-12">
			  					<div class="bottom-margin">
				  					<b>Prabhu Arumugam</b><br>
									Ph.D., Microelectronics and Photonics<br>
									Assistant Professor and Director of the Advanced Materials Research Laboratory<br>
									Mechanical Engineering, and the Institute for Micromanufacturing (IfM) and the Center for Biomedical<br>
									Engineering and Rehabilitation Science (CBERS)<br>
									Louisiana Tech University<br>
									Email: <a href="mailto:parumug@latech.edu">parumug@latech.edu</a>
								</div>
								<div>
									<P>Bio:<br>
									Dr. Arumugam has expertise in micro-nanofabrication of electrodes, biological and neurochemical
									sensor technologies, electroanalytical chemistry, microfluidics and surface science of carbon
									nanomaterials. His research focuses on the development of metal modified carbon nanotube (CNT) and
									nanodiamond composite microelectrodes to monitor neurochemicals electrochemically. Current area of
									application of his research is in the detection of neurochemicals using custom-modified platinum
									microelectrode arrays.</P>
								</div>
							</div>
		  				</div>
		  				
		  				<div class="page-header" style="overflow: hidden;">
		  					<!-- Image -->
		  					<div class="col-sm-3 col-xs-12 bottom-margin">
		  						<img alt="Mark DeCoster" class="img-responsive" src="images/mentors/DeCoster.jpg">
		  					</div>
		  					<!-- Bio -->
		  					<div class="col-sm-9 col-xs-12">
			  					<div class="bottom-margin">
				  					<b>Mark DeCoster</b><br>
									Ph.D., Biochemistry and Molecular Biophysics; B.S., Biology<br>
									Professor and Director of the Cellular Neuroscience Laboratory<br>
									Biomedical Engineering and the Center for Biomedical Engineering and Rehabilitation Science (CBERS)<br>
									Louisiana Tech University<br>
									Email: <a href="mailto:decoster@latech.edu">decoster@latech.edu</a>
								</div>
								<div>
									<P>Bio:<br>
									Dr. DeCoster' research focuses on cellular neuroscience, especially in the areas of brain cell signaling.
									For this REU project, Dr. DeCoster will work jointly with Dr. Evans' team toward the acquisition of live
									brain cell signaling dynamics and subsequent simulation and analysis of molecular and cellular
									networks.</P>
								</div>
							</div>
		  				</div>
		  				
		  				<div class="page-header" style="overflow: hidden;">
		  					<!-- Image -->
		  					<div class="col-sm-3 col-xs-12 bottom-margin">
		  						<img alt="Katie Evans" class="img-responsive" src="images/mentors/Evans.jpg">
		  					</div>
		  					<!-- Bio -->
		  					<div class="col-sm-9 col-xs-12">
			  					<div class="bottom-margin">
				  					<b>Katie Evans</b><br>
									Ph.D., Mathematics<br>
									Associate Professor and Academic Director of Mathematics &amp; Statistics and Industrial
									Engineering, Director of the Integrated STEM Education Research Center, Director of the Office
									for Women in Science and Engineering.<br>
									Mathematics and Statistics and the Center for Biomedical Engineering and Rehabilitation Science (CBERS)<br>
									Louisiana Tech University<br>
									Email: <a href="mailto:kevans@latech.edu">kevans@latech.edu</a>
								</div>
								<div>
									<P>Bio:<br>
									Dr. Evans has expertise in distributed parameter control modeling and simulation, numerical
									analysis, dynamic modeling of physical systems, and STEM education research. For this REU project, Dr.
									Evans will work jointly with Dr. DeCoster's team toward the modeling and simulation of dynamic
									molecular and cellular networks.</P>
								</div>
							</div>
		  				</div>
		  				
		  				<div class="page-header" style="overflow: hidden;">
		  					<!-- Image -->
		  					<div class="col-sm-3 col-xs-12 bottom-margin">
		  						<img alt="Teresa Murray" class="img-responsive" src="images/mentors/Murry.jpg">
		  					</div>
		  					<!-- Bio -->
		  					<div class="col-sm-9 col-xs-12">
			  					<div class="bottom-margin">
				  					<b>Teresa A. Murray</b><br>
									Ph.D., Bioengineering; B.S., Bioengineering<br>
									Assistant Professor and Director of the Integrated Neuroscience Imaging Laboratory<br>
									Biomedical Engineering and the Center for Biomedical Engineering and Rehabilitation Science (CBERS)<br>
									Louisiana Tech University<br>
									Email: <a href="mailto:tmurray@latech.edu">tmurray@latech.edu</a><br>
									Web site: <a href="http://bioengineer1.wixsite.com/murray-lab" target="_blank">http://bioengineer1.wixsite.com/murray-lab</a>
								</div>
								<div>
									<P>Bio:<br>
									Dr. Murray is the Director of the Integrated Neuroscience and Imaging (INI) Lab at Louisiana Tech
									University. During her graduate studies at Arizona State University, Dr. Murray's research focused on
									cellular neuroscience, molecular biology, and recording electrical activity of brain cell networks
									(electrophysiology). During her postdoctoral research at Yale University, she designed miniature,
									implantable lenses to image deep into the brain of live mice. Her current projects in the INI Lab use
									leading edge, multiphoton microscopy, electrophysiology and custom-designed tools to detect changes
									in brain structure and activity in mice and rats with brain injuries or disorders, such as epilepsy.</P>
								</div>
							</div>
		  				</div>
		  				
		  				<div class="page-header" style="overflow: hidden;">
		  					<!-- Image -->
		  					<div class="col-sm-3 col-xs-12 bottom-margin">
		  						<img alt="Shabnam Siddiqui" class="img-responsive" src="images/mentors/Shabnam.jpg">
		  					</div>
		  					<!-- Bio -->
		  					<div class="col-sm-9 col-xs-12">
			  					<div class="bottom-margin">
				  					<b>Shabnam Siddiqui</b><br>
									Ph.D., Physics<br>
									Research Assistant Professor<br>
									Center for Biomedical Engineering Rehabilitation Science (CBERS)<br>
									Louisiana Tech University<br>
									Email: <a href="mailto:shabnam@latech.edu">shabnam@latech.edu</a>
								</div>
								<div>
									<P>Bio:<br>
									Dr. Siddiqui has expertise in mathematical, analytical and computational modeling of carbon
									nanomaterials. Her research focuses on studies of electrical and chemical properties of carbon
									nanomaterial enabled electrodes for applications in biological, neurochemical sensing and energy
									storage. Her other interests include physics education and development of educational tools for
									teaching of quantum mechanics.</P>
								</div>
							</div>
		  				</div>
		  				
		  				<div class="page-header" style="overflow: hidden;">
		  					<!-- Image -->
		  					<div class="col-sm-3 col-xs-12 bottom-margin">
		  						<img alt="Leon Iasemidis" class="img-responsive" src="images/mentors/leon.jpg">
		  					</div>
		  					<!-- Bio -->
		  					<div class="col-sm-9 col-xs-12">
			  					<div class="bottom-margin">
				  					<b>Leon Iasemidis</b><br>
									Ph.D., Biomedical Engineering; M.S., Physics; B.S., Electrical Engineering<br>
									Professor, Director of the Center for Biomedical Engineering &amp; Rehabilitation Science (CBERS) and Director of the Brain Dynamics Lab<br>
									Biomedical Engineering and the Center for Biomedical Engineering and Rehabilitation Science (CBERS)<br>
									Louisiana Tech University<br>
									Email: <a href="mailto:leonidas@latech.edu">leonidas@latech.edu</a><br>
									Web sites: 
									<ul>
										<li><a href="http://www.braindynamics.latech.edu; http://coes.latech.edu/cbers" target="_blank">http://www.braindynamics.latech.edu; http://coes.latech.edu/cbers</a></li>
										<li><a href="http://www2.latech.edu/~leonidas/" target="_blank">http://www2.latech.edu/~leonidas/</a></li>
									</ul>
								</div>
								<div>
									<P>Bio:<br>
									Dr. Iasemidis is a world renowned expert in nonlinear dynamics and the development of new measures of
									dynamics for the detection, prediction and control of crises in complex coupled systems, in particular the
									animal and human epileptic brain. His research and over 100 peer-reviewed publications, interdisciplinary
									conference organizations, presentations and invited talks have stimulated an international interest in the
									prediction and control of epileptic seizures and understanding of the mechanisms of epileptogenesis. He
									is considered one of the founders of the field of seizure prediction. Dr. Iasemidis served on the editorial
									board of Epilepsia and the IEEE Transactions on Biomedical Engineering, and currently is on the editorial
									board of the Annals of Biomedical Engineering and the International Journal of Neural Systems. He is a
									reviewer for a score of journals and research sponsoring national and international agencies, including
									the National Institutes of Health (NIH) and the National Science Foundation (NSF). Over the years, Dr.
									Iasemidis' research has been funded by NIH, VA, DARPA, NSF, DoD, the Epilepsy Foundation of
									America, the Science Foundation of Arizona, the Whitaker Foundation and industry. He has co-founded
									three companies in the area of neuromodulation and control of epilepsy and is the co-author of 4
									awarded, 2 pending and 9 provisional patents in this area. His research has been highlighted on multiple
									forums, including the New York Times, Discover magazine, the Teaching Company, and the American
									Association for the Advancement of Science (AAAS). Dr. Iasemidis is a Fellow of the American Institute of
									Medical and Biological Engineers (AIMBE) and the National Academy of Inventors.</P>
								</div>
							</div>
		  				</div>
	  				</div>
	  				
	  				<div id="uams_mentors">
	  					<h1>UAMS Mentors</h1>
		  				<div class="page-header" style="overflow: hidden;">
		  					<!-- Image -->
		  					<div class="col-sm-3 col-xs-12 bottom-margin">
		  						<img alt="Diana Escalona-Vargas" class="img-responsive" src="images/mentors/Diana.png">
		  					</div>
		  					<!-- Bio -->
		  					<div class="col-sm-9 col-xs-12">
			  					<div class="bottom-margin">
				  					<b>Diana Escalona-Vargas</b><br>
									Ph.D., Computer Science<br>
									Department of Obstetrics and Gynacology<br>
									University of Arkansas for Medical Sciences<br>
									Email: <a href="mailto:">xyz.abc</a><br>
								</div>
								<div>
									<P>Bio:<br>
									Dr. Escalona has expertise in the area of biomedical signal processing, where she has applied
									new techniques for electrophysiological signal analysis from large sensor arrays. Her research
									focuses on statistical signal modeling and estimation from electroencephalographic (EEG) and
									magnetoencephalographic (MEG) arrays for brain source activity localization, signal processing
									for resting-state and task-related brain activity and connectivity in the brain. Dr. Escalona has
									also contributed novel techniques to improve the extraction, quantification, and
									characterization of EEG, MEG and fetal MEG (fMEG) signals.</P>
								</div>
							</div>
		  				</div>
		  				
		  				<div class="page-header" style="overflow: hidden;">
		  					<!-- Image -->
		  					<div class="col-sm-3 col-xs-12 bottom-margin">
		  						<img alt="Linda J. Larson-Prior" class="img-responsive" src="images/mentors/Linda.png">
		  					</div>
		  					<!-- Bio -->
		  					<div class="col-sm-9 col-xs-12">
			  					<div class="bottom-margin">
				  					<b>Linda J. Larson-Prior</b><br>
									Ph.D., Neurobiology<br>
									Departments of Psychiatry, Neurobiology and Developmental Sciences and Neurology<br>
									University of Arkansas for Medical Sciences
								</div>
								<div>
									<P>Bio:<br>
									Dr. Larson-Prior has a background in functional neuroimaging, using functional magnetic
									resonance imaging (fMRI) and high-density electroencephalography (hdEEG) to study sleep in
									normal adult human volunteers and electrocorticography (ECoG) to study sleep and wake
									behavior in epilepsy patients undergoing invasive monitoring preparatory for resection surgery.
									In keeping with the laboratory's general interest in brain neurodynamics, particularly as it
									relates to state changes in the brain, summer projects will focus on changes in cognitive
									function and their relationship to sleep/wake behavior in adult subjects undergoing monitoring
									prior to respective surgery for intractable epilepsy.</P>
								</div>
							</div>
		  				</div>
		  				
	  				</div>
	  				
	  				<div id="uab_mentors">
	  					<h1>University of Alabaman at Birmingham Mentors</h1>
  						<div class="page-header" style="overflow: hidden;">
	  					<!-- Image -->
		  					<div class="col-sm-3 col-xs-12 bottom-margin">
		  						<img alt="Timothy J. Gawne" class="img-responsive" src="images/mentors/Timothy.png">
		  					</div>
		  					<!-- Bio -->
		  					<div class="col-sm-9 col-xs-12">
			  					<div class="bottom-margin">
				  					<b>Timothy J. Gawne</b><br>
									Ph.D.<br>
									Associate Professor, Dept. of Optometry and Vision Science<br>
									University of Alabama at Birmingham
								</div>
								<div>
									<P>Bio:<br>
									Dr. Gawne is an M.I.T. trained electrical engineer who applies engineering techniques to
									investigating the systems level functioning of the nervous system, with an especial focus on the
									cerebral cortex. He is currently using magnetoencephalography ("MEG") to explore brain
									rhythms and functional connectivity in normal brains, as well as in the brains of patients with
									epilepsy and schizophrenia.</P>
								</div>
							</div>
		  				</div>
		  				
		  				<div class="page-header" style="overflow: hidden;">
	  					<!-- Image -->
		  					<div class="col-sm-3 col-xs-12 bottom-margin">
		  						<img alt="Sandipan Pati" class="img-responsive" src="images/mentors/Sandipan.png">
		  					</div>
		  					<!-- Bio -->
		  					<div class="col-sm-9 col-xs-12">
			  					<div class="bottom-margin">
				  					<b>Sandipan Pati</b><br>
									M.D.<br>
									Assistant Professor at Dept. of Neurology (Epilepsy Division)<br>
									University of Alabama at Birmingham
								</div>
								<div>
									<P>Bio:<br>
									Dr. Pati is a fellowship trained epilepsy neurologist involved in evaluating patients with difficult-
									to-treat epilepsies. The process involves mapping cerebral cortex involved in seizure evolution
									and delineating parts of the brain involved in speech, movement, and memory. Noninvasive
									(structural and functional MRI) and invasive methods (intracranial EEG) are routinely practiced
									at the UAB Epilepsy Center, and brain stimulaton is often performed for diagnostic purpose.</P>
								</div>
							</div>
		  				</div>
		  				
		  				<div class="page-header" style="overflow: hidden;">
	  					<!-- Image -->
		  					<div class="col-sm-3 col-xs-12 bottom-margin">
		  						<img alt="Jerzy P. Szaflarski" class="img-responsive" src="images/mentors/Jerzy.png">
		  					</div>
		  					<!-- Bio -->
		  					<div class="col-sm-9 col-xs-12">
			  					<div class="bottom-margin">
				  					<b>Jerzy P. Szaflarski</b><br>
									M.D., Ph.D.<br>
									Professor of Neurology, Director, UAB Epilepsy Center<br>
									University of Alabama at Birmingham
								</div>
								<div>
									<P>Bio:<br>
									Dr. Szaflarski is a fellowship trained epilepsy neurologist
									involved in evaluating patients with difficult-to- treat epilepsies. The
									evaluation process includes mapping cerebral cortex involved in
									seizure evolution and delineating parts of the brain involved in speech,
									movement, and memory. Noninvasive (structural and functional MRI) and
									invasive methods (intracranial EEG) are routinely practiced at the UAB
									Epilepsy Center, and brain stimulaton is often performed for diagnostic
									purpose. Also, Dr. Szaflarski has research interest in brain mapping using 
									structural and functional MRI.</P>
								</div>
							</div>
		  				</div>
		  				
	  				</div>
	  				
	  			</div>
  			</div>
  		<?php 
  			include 'includes/footer.php'; ?>
  	</body>
  </html>