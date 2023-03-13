<?php

$db_host = 'localhost';
$db_user = 'root';
$db_name = 'un_php';
$db_port = null;

//create database
// $con = mysqli_connect($db_host, $db_user, null, null);

// if (mysqli_connect_errno()) {
//     die("Error when connected with database and error message" . mysqli_connect_error());
// }

// $query = "CREATE DATABASE IF NOT EXISTS $db_name;";

// if (mysqli_query($con, $query)) {
// } else {
//     die('filed on create database');
// }

// // mysqli_close($con);

// $con = mysqli_connect($db_host, $db_user, null, $db_name);

// $query = "CREATE TABLE IF NOT EXISTS users (id INTEGER PRIMARY KEY AUTO_INCREMENT , name VARCHAR(30), email VARCHAR(255) UNIQUE, is_superuser BIT,password VARCHAR(50));";

// if (mysqli_query($con, $query)) {
// } else {
//     die('filed on create table users');
// }

// $query = "CREATE TABLE IF NOT EXISTS movies(id INTEGER PRIMARY KEY AUTO_INCREMENT , name VARCHAR(30), description VARCHAR(255), video_url VARCHAR(255),image_url VARCHAR(255));";
// if (mysqli_query($con, $query)) {
// } else {
//     die('filed on create table movies');
// }


// // mysqli_close($con);


echo "<pre>";
print_r($_POST);
echo "</pre>";
// echo $_POST['email'];
$con = mysqli_connect($db_host, $db_user, '', $db_name, $db_port);

if (mysqli_connect_errno()) {
    die("Error when connected with database and error message" . mysqli_connect_error());
}

if (isset($_POST['submit_login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE password = '$password' and email = '$email';";
    // echo mysqli_query($con, $query);
    mysqli_error($con);
    $result = mysqli_query($con, $query);
    echo $result;
    if (!$result) {
        $is_superuser = $result['is_superuser'];
        setcookie("login", true);
        if (!$is_superuser) {
            header('Location: index.php');
        } else {
            header("Location: dashboard.php");
        }
    } else {
        $error_message = "User not found chack the data";
        header("Location: login.php?login&&login_error=$error_message");
    }
} elseif (isset($_POST['submit_signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $is_superuser = (bool)$_POST['is_superuser'];
    // die("asdfasdfasdf");
    $query = "INSERT INTO `users` (id, name, email, is_superuser, password) VALUES (NULL, '$name', '$email', $is_superuser, '$password');";
    if (mysqli_query($con, $sql)) {
        $success_message = "process Successfuly: Go to Login again";
        die("asdfasdfasdf");
        header("Location:login.php?signup&&sign_message=$success_message");
    } else {
        die("asdfasdfasdf");

        $error_messagee = "error when added: " . mysqli_error($con);
        header("Location:login.php?signup&&sign_errorsign_error=$error_message");
    }
} else {

    echo "submit_signup";
}
