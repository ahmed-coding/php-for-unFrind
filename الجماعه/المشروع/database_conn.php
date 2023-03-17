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

$sql1 = "CREATE TABLE IF NOT EXISTS users (id INT AUTO_INCREMENT PRIMARY KEY, username VARCHAR(50), password VARCHAR(50), admin BIT)";
$sql2 = "CREATE TABLE IF NOT EXISTS category (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(50), image_url VARCHAR(255), description VARCHAR(255))";
$sql3 = "CREATE TABLE IF NOT EXISTS product (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(50), price FLOAT, category_id INT, image_url VARCHAR(255), qyt INT)";

// Execute SQL statements
if (mysqli_query($conn, $sql1)) {
} else {
    echo "Error creating table users: " . mysqli_error($conn);
}

if (mysqli_query($conn, $sql2)) {
} else {
    echo "Error creating table category: " . mysqli_error($conn);
}

if (mysqli_query($conn, $sql3)) {
} else {
    echo "Error creating table product: " . mysqli_error($conn);
}
