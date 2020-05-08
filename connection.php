<?php  

	$host = "localhost";
	$dbName = "attnd";
	$user = "root";
	$pass = "";

	$link = new mysqli($host,$user,$pass,$dbName);

	if($link){
	//	echo "Connection established successfully";
	}else{
		echo "Error";
	}

?>