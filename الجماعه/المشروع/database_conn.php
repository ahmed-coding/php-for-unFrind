<?php
$server = 'localhost';
$database = 'un_shop';
$user = 'root';

$conn = mysqli_connect($server, $user, null);


$sql = "CREATE DATABASE IF NOT EXISTS $database;";

if (mysqli_query($conn, $sql)) {
} else {
    die("error on create database" . mysqli_error($conn));
}

mysqli_close($conn);

$conn = mysqli_connect($server, $user, null, $database);

$sql = "CREATE TABLE IF NOT EXISTS users (id INT AUTO_INCREMENT PRIMARY KEY,username VARCHAR(50), password  VARCHAR(50), admin BIT);
CREATE TABLE IF NOT EXISTS category (id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(50), image_url VARCHAR(255), description VARCHAR(255));
CREATE TABLE IF NOT EXISTS product (id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(50), price FLOAT,category_id INT, image_url VARCHAR(255), qyt INT);";

if (mysqli_query($conn, $sql)) {
    echo "TEst";
} else {
    // die("error on create Tables" . mysqli_error($conn));
    echo "error";
}
