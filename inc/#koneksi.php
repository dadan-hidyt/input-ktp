<?php 
//file koneksi kedatabase
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'db_input_ktp';

//dsn
$dsn = sprintf("mysql:host=%s;dbname=%s",$host,$dbname);
try {
	$PDO = new PDO($dsn,$user,$password);
	$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
	die($e->getMessage());
}
?>