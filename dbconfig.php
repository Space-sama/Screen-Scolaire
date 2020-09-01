<?php	
	$DBhost = "localhost";
	$DBuser = "root";
	$DBpass = "";
	$DBname = "screen_scolaire";
	
	try{
		
		$idcom = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
		$idcom->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	}catch(PDOException $ex){
		
		die($ex->getMessage());
    }
?>