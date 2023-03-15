<?php

$db_host = 'localhost';
$db_user = 'root';
$db_name = 'un_php';
$db_port = null;





//From chat GPT for madie

/* $conn = mysqli_connect('localhost', 'username', 'password', 'database');

// Check if a file was uploaded

if (isset($_FILES['file'])) {
    // Get file data
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $file_data = file_get_contents($_FILES['file']['tmp_name']);

    // Insert file data into the database
    $query = "INSERT INTO media (file_name, file_data, file_size, file_type) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssis", $file_name, $file_data, $file_size, $file_type);
    mysqli_stmt_execute($stmt);

    // Display a success message
    echo "File uploaded successfully.";
} else {
    // Display an error message
    echo "Error: No file uploaded.";
}




// Connect to database
$conn = mysqli_connect('localhost', 'username', 'password', 'example');

// Query database
$result = mysqli_query($conn, "SELECT id, name, email FROM users");

// Fetch a row from the result set as an associative array
$row = mysqli_fetch_assoc($result);

// Access the values in the associative array
echo "User ID: " . $row['id'] . "<br>";
echo "Name: " . $row['name'] . "<br>";
echo "Email: " . $row['email'] . "<br>";



// Connect to database
$conn = mysqli_connect('localhost', 'username', 'password', 'example');

// Retrieve file path from database
$fileId = 1; // Change this to the ID of the file you want to display
$result = mysqli_query($conn, "SELECT file_path FROM files WHERE id = $fileId");
$file = mysqli_fetch_assoc($result);
$filePath = $file['file_path'];

//html
<img src="<?php echo $filePath; ?>" alt="Image">



*/

//create database
$con = mysqli_connect($db_host, $db_user, null, null);

if (mysqli_connect_errno()) {
    die("Error when connected with database and error message" . mysqli_connect_error());
}

$query = "CREATE DATABASE IF NOT EXISTS $db_name;";

if (mysqli_query($con, $query)) {
} else {
    die('filed on create database');
}

// mysqli_close($con);

$con = mysqli_connect($db_host, $db_user, null, $db_name);

$query = "CREATE TABLE IF NOT EXISTS users (id INTEGER PRIMARY KEY AUTO_INCREMENT , name VARCHAR(30), email VARCHAR(255) UNIQUE, is_superuser BIT,password VARCHAR(50));";

if (mysqli_query($con, $query)) {
} else {
    die('filed on create table users');
}

$query = "CREATE TABLE IF NOT EXISTS movies(id INTEGER PRIMARY KEY AUTO_INCREMENT , name VARCHAR(30), description VARCHAR(255), video_url VARCHAR(255),image_url VARCHAR(255), link VARCHAR(255));";
if (mysqli_query($con, $query)) {
} else {
    die('filed on create table movies');
}


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
    mysqli_error($con);
    $result = mysqli_query($con, $query);
    // echo $result;
    if ($result) {
        foreach ($result as $key) {
            print_r($key);
            $is_superuser = $key['is_superuser'];
            setcookie("login", true);
            if (!$is_superuser) {
                setcookie('is_superuser', true);
                header('Location: index.php');
            } else {
                header("Location: dashboard.php");
            }
        }
    } else {
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
        $success_message = "process Successfuly: Go to Login again";
        header("Location:login.php?signup&&sign_message=$success_message");
    } else {
        $error_messagee = "error when added: " . mysqli_error($con);
        header("Location:login.php?signup&&sign_errorsign_error=$error_message");
    }
} elseif ($_POST['submit_addNew']) {
} else {
    echo "submit_signup";
}
