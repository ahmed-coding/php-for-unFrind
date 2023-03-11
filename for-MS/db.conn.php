<?php


$db_host = 'localhost';
$db_user = 'root';
$db_name = 'un_php';
//create database
$con = mysqli_connect($db_host, $db_user, '');

$query = <<<"query"
CREATE DATABASE IF NOT EXISTS $db_name;
query;

if (!mysqli_query($con, $query)) {
    die('filed on create database');
}

mysqli_close($con);



$con =
    mysqli_connect($db_host, $db_user, '', $db_name);

$query = <<<"query"
CREATE TABLE IF NOT EXISTS movies(id INTEGER PRIMARY KEY AUTO_INCREMENT , name VARCHAR(30), description VARCHAR(255), video_url VARCHAR(255),image_url VARCHAR(255));
CREATE TABLE IF NOT EXISTS users(id INTEGER PRIMARY KEY AUTO_INCREMENT , name VARCHAR(30), email VARCHAR(255), is_superuser VARCHAR(255),password VARCHAR(50));
query;

if (!mysqli_query($con, $query)) {
    die('filed on create tables');
}

mysqli_close($con);
