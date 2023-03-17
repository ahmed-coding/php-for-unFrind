<?php

$connect = mysqli_connect("localhost", "root", '');

if (mysqli_connect_errno()) {
    die("Error when connected with database and error message" . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS `glock_store` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;";

if (mysqli_query($connect, $sql)) {
} else {
    die('database error');
}


mysqli_close($connect);

$connect = mysqli_connect("localhost", "root", '', 'glock_store');

$query = "CREATE TABLE IF NOT EXISTS users (id INTEGER PRIMARY KEY AUTO_INCREMENT ,email VARCHAR(255) UNIQUE, admin BIT,password VARCHAR(50));";

if (mysqli_query($connect, $query)) {
} else {
    die('filed on create table users');
}

$query = "CREATE TABLE IF NOT EXISTS category (id INTEGER PRIMARY KEY AUTO_INCREMENT, name VARCHAR(100))";
if (mysqli_query($connect, $query)) {
} else {
    die('filed on create table category');
}

$query = "CREATE TABLE IF NOT EXISTS weapon (id INTEGER PRIMARY KEY AUTO_INCREMENT, name VARCHAR(100), category_id INTEGER, scope VARCHAR(50), madeIn VARCHAR(50), storage VARCHAR(50), storageType VARCHAR(50), color VARCHAR(50), weight VARCHAR(50))";
if (mysqli_query($connect, $query)) {
} else {
    die('filed on create table weapons');
}
