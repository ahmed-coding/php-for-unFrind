<?php
$server = 'localhost';
$database = 'un_shop';
$user = 'root';

$conn = mysqli_connect($server, $user, null);


$sql = "CREATE DATABASE IF NOT EXISTS $database  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;;";

if (mysqli_query($conn, $sql)) {
} else {
    die("error on create database" . mysqli_error($conn));
}

mysqli_close($conn);

$conn = mysqli_connect($server, $user, null, $database);

$sql = "CREATE TABLE IF NOT EXISTS users (id INT AUTO_INCREMENT PRIMARY KEY, username VARCHAR(50), password VARCHAR(50), admin BIT)";
if (mysqli_query($conn, $sql)) {
} else {
    die("Error creating table users: " . mysqli_error($conn));
}
$sql = "CREATE TABLE IF NOT EXISTS category (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(50), image_url VARCHAR(255), description VARCHAR(255))";

if (mysqli_query($conn, $sql)) {
} else {
    die("Error creating table category: " . mysqli_error($conn));
}

$sql = "CREATE TABLE IF NOT EXISTS product (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(50), price FLOAT, category_id INT, image_url VARCHAR(255), qyt INT)";

if (mysqli_query($conn, $sql)) {
} else {
    die("Error creating table product: " . mysqli_error($conn));
}
