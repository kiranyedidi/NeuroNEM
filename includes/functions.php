<?php

// Dev server DB

/*function connect(){
	$server = "localhost";
	$dbname = "forms";
	$username = "forms";
	$password = "onTimeNetwork387";
	
	return mysqli_connect($server, $username, $password, $dbname);
}*/

// Local server DB

function connect(){
	$server = "localhost";
	$dbname = "reu";
	$username = "root";
	$password = "";

	return mysqli_connect($server, $username, $password, $dbname);
	
}