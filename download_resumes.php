<?php
$zip = new ZipArchive();
$zip_name = "REU_Resumes.zip";
if($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE)
	die("Sorry ZIP creation failed at this time");

// Getting all the Resumes

$handle = opendir("uploads/");
while(false !== ($resume = readdir($handle)))
	if ($resume != "." && $resume != "..")
		$zip->addFile("uploads/" . $resume);
		//echo $resume . "<br>";
$zip->close();

// Making zip downloadable
header('Content-type: application/zip');
header('Content-Disposition: attachment; filename="'.$zip_name.'"');
readfile($zip_name);
unlink($zip_name);