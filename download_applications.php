<?php
include "includes/functions.php";

$fileName = "REU_Applications.csv";
header("Content-type: text/csv");
header("Content-Disposition: attachment; filename='" . $fileName . "'");
$out = fopen("php://output", 'w');
$conn = connect();
if(!$conn)
	die("Connection to DB failed. Please try again after some time");
// Iterating through the rows and genrating the table with applicants details
$sql_applicants = "SELECT `id`, `fname`, `lname`, `email`, `gender`, `country`, `phone`, `resume` FROM `applicants`";
if($result = mysqli_query($conn, $sql_applicants))
{
	fputcsv($out, Array("Application ID","First Name","Last Name","Email","Gender","Country","Phone","Resume"),",");
	while($row = mysqli_fetch_assoc($result))
	{
		fputcsv($out, Array($row['id'],$row['fname'],$row['lname'],$row['email'],$row['gender'],$row['country'],$row['phone'],$row['resume']),",");
	}
}
else
	die("Sorry, there was an error in fetching applicants details. Please try again after some time.");

fclose($out);
exit;