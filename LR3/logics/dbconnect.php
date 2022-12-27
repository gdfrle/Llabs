<?php
error_reporting(0);
session_start();
define('DB_USER', 'root');
define('DB_PASSWORD', '');

try{
	$mysql = new PDO('mysql:host=localhost;dbname=rostrubostal', DB_USER, DB_PASSWORD);
}
catch (PDOException $e){
	print "Error!: " . $e->getMessage();
	die();
}