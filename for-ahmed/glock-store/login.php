<?php
include 'init.php';

$errorMessage = '';
$succesMsg = '';

if (isset($_POST['submit_login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // Check If The User Exist In Database

    $sql = "SELECT *  FROM users WHERE email = '$email' AND password = '$pass' ;";
    $result = mysqli_query($connect, $sql);
    $result = mysqli_fetch_assoc($result);
    if (!$result) {
        echo 'User Not Found';
    } else {
        setcookie("login", true);
        setcookie("user", $result['email']);
        if (isset($result['admin']) && $result['admin'] == 1) {
            setcookie('admin', true);
        }
        header('Location: index.php');
    }
} elseif (isset($_POST['submit_signup'])) {

    $password = $_POST['password'];
    $email = $_POST['email'];
    $is_admin = false;

    $email_exists_query = "SELECT * FROM users WHERE email = '$email'";

    $email_exists_result = mysqli_query($connect, $email_exists_query);

    if (mysqli_num_rows($email_exists_result) > 0) {
        echo 'Error: email already exists';
    } else {
        // insert new user record
        $insert_query = "INSERT INTO users (password, admin, email) VALUES ('$password', '$is_admin', '$email')";
        if (mysqli_query($connect, $insert_query)) {
            echo 'Congrats You Are Now Registered User';
        } else {
            echo 'Error: ' . mysqli_error($connect);
        }
    }


    //Echo Success Message


}

?>


<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>اضافة اسلحة</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">الرئيسية</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto me-4 mb-2 mb-lg-0">
                    <?php if (isset($_COOKIE['admin'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="admin-weapons.php"> اضافة سلاح </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="admin-category.php"> اضافة صنف </a>
                        </li>
                    <?php endif ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="login.php"> تسجيل الدخول </a>
                    </li>
                </ul>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo isset($_COOKIE['login']) ? $_COOKIE['user'] : "USER" ?> </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <li><?php echo isset($_COOKIE['login']) ? '<a class="dropdown-item" href="logout.php">Logout <i class="fas fa-sign-out-alt"></i></a>' : '<a class="dropdown-item" href="login.php">Login <i class="fas fa-sign-out-alt"></i></a>' ?></li>
                        </ul>
                    </li>

                </ul>

            </div>
        </div>
    </nav>


    <section class="log-in">
        <div class="fields">
            <div class="container">
                <div class="row">
                    <h3 class="text-center mb-3">Login </h3>

                    <form role="form" method="POST">

                        <div class="col-md-4 m-auto">

                            <div class="input-group mb-2 flex-nowrap ">

                                <input class="form-control" type="text" name="email" placeholder="Email" autocomplete="off" />
                            </div>

                            <div class="input-group mb-2 flex-nowrap ">

                                <input class="form-control" type="password" name="password" placeholder="Password" autocomplete="new-password" />

                            </div>

                            <input class="btn btn-primary  w-100" type="submit" name="submit_login" value="تسجيل دخول" />
                            <?php
                            if ($errorMessage) {
                                '<p class="text-center msg">' . $errorMessage . '</p>';
                            }
                            if ($succesMsg) {
                                echo '<div class="msg success">' . $succesMsg . '</div>';
                            }
                            ?>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="log-in mt-3">
        <div class="fields">
            <div class="container">
                <div class="row">
                    <h3 class="text-center mb-3">Register </h3>

                    <form role="form" method="POST">

                        <div class="col-md-4 m-auto">

                            <!-- <div class="input-group mb-2 flex-nowrap ">

                                <input class="form-control" type="text" name="username" placeholder="UserName" autocomplete="off" />
                            </div> -->

                            <div class="input-group mb-2 flex-nowrap ">

                                <input class="form-control" type="email" name="email" placeholder="Email" autocomplete="off" />
                            </div>

                            <div class="input-group mb-2 flex-nowrap ">

                                <input class="form-control" type="password" name="password" placeholder="Password" autocomplete="new-password" />

                            </div>
                            <!-- <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="admin" value="" id="flexCheckDefault" style="float: none; margin-left: 0;">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Admin
                                </label>
                            </div> -->

                            <input class="btn btn-primary  w-100" type="submit" name="submit_signup" value="انشاء حساب" />
                            <?php

                            ?>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
    if ($errorMessage) {
        '<p class="text-center msg">' . $errorMessage . '</p>';
    }
    if ($succesMsg) {
        echo '<div class="msg success">' . $succesMsg . '</div>';
    }
    ?>

    <script src="js/bootstrap.min.js"></script>
</body>

</html>