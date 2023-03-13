<?php
$hostname = 'localhost';
$user = 'root';
$db_name = "un_test";


$con = mysqli_connect($hostname, $user, '');
if (mysqli_connect_errno()) {
    die("error in connect with server:" . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS $db_name ;";

if (!mysqli_query($con, $sql)) {
    die("error in create database " . mysqli_error($con));
}

mysqli_close($con);

$con = mysqli_connect($hostname, $user, '', $db_name);

$sql = "CREATE TABLE IF NOT EXISTS users(id INT PRIMARY KEY AUTO_INCREMENT ,first_name VARCHAR(30), last_name VARCHAR(30),age Integer, major CHAR(30),level VARCHAR(30));";

if (mysqli_query($con, $sql)) {
} else {
    die("error on create tables " . mysqli_error($con));
}

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$age = $_POST['age'];
$major = $_POST['major'];

$level = $_POST['level'];

if ($age >= 5 || $age <= 0) {
    die("Your age is");
} elseif ($level >= 5 || $age <= 1) {
    die("Your Level is");
} else {
    $sql =  "INSERT INTO users (first_name,last_name,major,age ,Level) VALUES ( '$first_name', '$last_name', '$major',  $age, ' $level');";

    if (mysqli_query($con, $sql)) {
        echo "Addedd Successfuly";
    } else {
        die("error on added to table: " . mysqli_error($con));
    }
}
