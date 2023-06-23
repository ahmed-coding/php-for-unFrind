<?php

$db_host = 'localhost';
$db_user = 'root';
$db_name = 'un_ms_php';
$db_port = null;



//create database
$con = mysqli_connect($db_host, $db_user, null, null);

if (mysqli_connect_errno()) {
    die("Error when connected with database and error message" . mysqli_connect_error());
}

$query = "CREATE DATABASE IF NOT EXISTS `$db_name` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;";

if (mysqli_query($con, $query)) {
} else {
    die('filed on create database');
}

mysqli_close($con);

$con = mysqli_connect($db_host, $db_user, null, $db_name);

$query = "CREATE TABLE IF NOT EXISTS users (id INTEGER PRIMARY KEY AUTO_INCREMENT , name VARCHAR(30), email VARCHAR(255) UNIQUE, is_superuser BIT,password VARCHAR(50));";

if (mysqli_query($con, $query)) {
} else {
    die('filed on create table users');
}

$query = "CREATE TABLE IF NOT EXISTS `movies` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `description` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `video_url` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `image_url` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `link` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";


if (mysqli_query($con, $query)) {
} else {
    die('filed on create table movies');
}


mysqli_close($con);


// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// echo $_POST['email'];

// الاتصال بقاعدة البيانات
$con = mysqli_connect($db_host, $db_user, '', $db_name, $db_port);


if (mysqli_connect_errno()) {
    die("Error when connected with database and error message" . mysqli_connect_error());
}


function get_details()
{
    // Handle the video file upload
    $video_file_path = 'media/videos/' . basename($_FILES['video_file']['name']);
    if (move_uploaded_file($_FILES['video_file']['tmp_name'], $video_file_path)) {
    } else {
        return false;
    }

    // Handle the image file upload
    $image_file_path = 'media/images/' . basename($_FILES['image_file']['name']);
    if (move_uploaded_file($_FILES['image_file']['tmp_name'], $image_file_path)) {
        // The image file was uploaded successfully
    } else {
        return false;
    }

    return ['video_url' => $video_file_path, 'image_url' => $image_file_path];
}

if (isset($_POST['submit_login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE password = '$password' and email = '$email';";
    mysqli_error($con);
    $result = mysqli_query($con, $query);
    // echo $result;
    if ($result) {
        mysqli_close($con);

        foreach ($result as $key) {
            $is_superuser = $key['is_superuser'];
            setcookie("login", true);
            setcookie("is_superuser", true);
            if (!$is_superuser) {
                setcookie('is_superuser', true);
                header('Location: index.php');
            } else {
                header("Location: dashboard.php");
            }
        }
    } else {
        mysqli_close($con);

        $error_message = "User not found chack the data";
        header("Location: login.php?login&&login_error=$error_message");
    }
} elseif (isset($_POST['submit_signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $is_superuser = (bool)$_POST['is_superuser'] | null;
    // die("asdfasdfasdf");
    $query = "INSERT INTO `users` (id, name, email, is_superuser, password) VALUES (NULL, '$name', '$email', $is_superuser, '$password');";
    if (mysqli_query($con, $query)) {
        mysqli_close($con);
        $success_message = "process Successfuly: Go to Login again";
        header("Location:login.php?signup&&sign_message=$success_message");
    } else {
        mysqli_close($con);
        $error_messagee = "error when added: " . mysqli_error($con);
        header("Location:login.php?signup&&sign_errorsign_error=$error_message");
    }
} elseif (isset($_POST['submit_addNew'])) {

    $datail = get_details();

    // $name = mysqli_real_escape_string($con, $_POST['name']);

    // $description = mysqli_real_escape_string($con, $_POST['description']);
    // $link = mysqli_real_escape_string($con, $_POST['link']);
    // $video_url = mysqli_real_escape_string($con, $datail['video_url']);
    // $image_url = mysqli_real_escape_string($con, $datail['image_url']);

    $name =  $_POST['name'];

    $description =  $_POST['description'];
    $link = $_POST['link'];
    $video_url =  $datail['video_url'];
    $image_url = $datail['image_url'];
    $query = "INSERT INTO `movies` (name, description, video_url, image_url, link) VALUES ('$name', '$description', '$video_url', '$image_url', '$link');";

    if (mysqli_query($con, $query)) {
        mysqli_close($con);
        $success_message = "process Successfuly: Go to Login again";
        header("Location:dashboard.php?success=$success_message");
    } else {
        mysqli_close($con);
        $error_messagee = "error when added: " . mysqli_error($con);
        header("Location:dashboard.php?error=$error_message");
    }
}
