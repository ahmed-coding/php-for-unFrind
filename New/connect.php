<?php 

$dsn='mysql:host=localhost;dbname=q';
$user='root';
$pass='';
$option=array(
 PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);


try{
$con  = mysqli_connect("localhost", "root", "", "q");
	$con = new PDO($dsn,$user,$pass,$option);
	$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
	
}
catch(PDOException $e){
	echo 'faild to connect' . $e->getmessage();
}
