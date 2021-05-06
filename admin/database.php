<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "jewellerys";
	$conn =  mysqli_connect($servername,$username,$password,$dbname);
	if(!$conn){
		die("Connection failed:".mysqli_connect_error());
	}
	else{
		echo "<script>console.log('connected');</script>";
	}			
?>