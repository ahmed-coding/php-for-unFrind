<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>التكليف_php</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
    <?php
    $db_host = 'localhost';
    $db_user = 'root';
    $db_name = 'un_php';
    $db_port = null;
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

    $query = "CREATE TABLE IF NOT EXISTS movies(id INTEGER PRIMARY KEY AUTO_INCREMENT , name VARCHAR(30), description VARCHAR(255), video_url VARCHAR(255),image_url VARCHAR(255));";
    if (mysqli_query($con, $query)) {
    } else {
        die('filed on create table movies');
    }
    // mysqli_close($con);

    ?>
    <section class="register-photo">
        <div class="form-container">
            <?php if (isset($_GET['signup'])) : ?>
                <form method="post" action="db_conn.php">
                    <?php if (isset($_GET['sign_error'])) : ?>
                        <div class="d-flex" id="some-message" style="background-color:#e12f54 ;">
                            <div class="content">
                                <p><?php echo $_GET['sign_error'] ?></p>
                            </div>
                        </div>
                    <?php elseif (isset($_GET['sign_message'])) : ?>
                        <div class="d-flex" id="some-message" style="background-color:#17975b ;">
                            <div class="content">
                                <p style="color: black;"><?php echo $_GET['sign_message'] ?></p>
                            </div>
                        </div>
                    <?php endif ?>

                    <h2 class="text-center"><strong>Create</strong> an account.</h2>
                    <div class="mb-3"><input class="form-control" type="text" name="name" placeholder="name"></div>
                    <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                    <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password"></div>
                    <div class="mb-3">Super User status<input class=" btn btn-primary " type="checkbox" name="is_superuser"></div>
                    <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit" name="submit_signup">Sign Up</button></div>
                </form>
            <?php else : ?>
                <form method="post" action="db_conn.php">
                    <?php if (isset($_GET['login_error'])) : ?>
                        <div class="d-flex" id="some-message" style="background-color: #e12f54;">
                            <div class="content">
                                <p><?php echo $_GET['login_error'] ?></p>
                            </div>
                        </div>
                    <?php endif ?>
                    <h2 class="text-center"><strong>Welcome Back</strong> </h2>
                    <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                    <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password"></div>
                    <!-- <div class="mb-3"><input class="form-control" type="password" name="password-repeat" placeholder="Password (repeat)"></div> -->
                    <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit" name="submit_login">login</button></div>
                </form>
            <?php endif; ?>
        </div>
        <p class="text-center">or <a href="login.php?signup">Create a New account?</a> </p>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>