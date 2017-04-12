<?php 
session_start();
?>
<header>
	<?php 
	if(isset($_SESSION['username']))
		echo '<img alt="signin" onclick="logout();" src="images/logout.png">';
	else
		echo '<img alt="signin" onclick="login();" src="images/login.png">';
	?>
	<div class="container">
		<nav class="navbar navbar-default">
			<div class="navbar-header">
				<div class="col-sm-4" style="text-align: center">
					<a class="navbar-brand" href="index.php"><img alt="REU Logo" src="images/NeuroNEM Logo.jpg"><img style="max-height: 115px;" alt="NSF Logo" class="img-responsive" src="images/nsf1.png"></a>
				</div>
				<div style="text-align: center;font-size: 30px;color: white;display: flex;min-height: 115px;align-items: center;flex-wrap: wrap;justify-content: center;" class="col-sm-8 hidden-xs">
					Neuronal Networks in Epilepsy and Memory<br>
					<span style="font-size: 25px;">research . innovation . education . outreach</span>
				</div>
				<div style="text-align: center">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation" aria-expanded="false"> 
						<span class="sr-only">Toggle navigation</span> 
						<span class="icon-bar"></span> 
						<span class="icon-bar"></span> 
						<span class="icon-bar"></span> 
					</button>
				</div>
			</div>
			<div class="collapse navbar-collapse" id="navigation">
				<ul class="nav nav-justified">
					<li><a class="home" href="index.php">Home</a></li>
					
					<li><a class="mentors dropdown-toggle" data-toggle="dropdown" href="mentors.php">Mentors <b class="caret"></b></a>
						<!-- Projects drop down Menu -->
						<ul class="dropdown-menu">
							<li><a href="mentors.php#latech_mentors">Tech Mentors</a></li>
							<li><a href="mentors.php#uams_mentors">UAMS Mentors</a></li>
							<li><a href="mentors.php#uab_mentors">UAB Mentors</a></li>
						</ul>
					</li>
					
					<li><a class="projects dropdown-toggle" data-toggle="dropdown" href="projects.php">Projects <b class="caret"></b></a>
						<!-- Projects drop down Menu -->
						<ul class="dropdown-menu">
							<li><a href="projects.php#latech_projects">Tech Projects</a></li>
							<li><a href="projects.php#uams_projects">UAMS Projects</a></li>
							<li><a href="projects.php#uab_projects">UAB Projects</a></li>
						</ul>
					</li>
					
					<li><a class="requirements" href="requirements.php">Requirements</a></li>
					<li><a class="dates" href="dates.php">Important Dates</a></li>
					<li><a class="application" href="application.php">Application</a></li>
					<li><a class="logistics" href="logistics.php">Logistics</a></li>
					<li><a class="activities" href="activities.php">Activities</a></li>
					<?php 
					if(isset($_SESSION['username']))
						echo '<li><a class="applicants" href="applicants.php">View Applicants</a></li>';
					?>
				</ul>
			</div>
		</nav>
	</div>
</header>