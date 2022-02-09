<?php
session_start();
error_reporting(0);

	define('DB_USER', 'root');
	define('DB_PASSWORD', '');

	try{
		$mysql = new PDO('mysql:host=localhost;dbname=microfinance', DB_USER, DB_PASSWORD);
	}  
	catch (PDOException $exception){
		print "Could not connect to the database. Error: " . $exception->getMessage();
		die();
	}

?>