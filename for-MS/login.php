<?php
include_once('db_conn.php');

$error_message = "";
$success_message = "";

$con = mysqli_connect($db_host, $db_user, null, $db_name, $db_port);

if (isset($_POST['submit_login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = <<<"query"
    SELECT * FROM `users` WHERE password = '$password' and email = '$email';
    query;

    $result = mysqli_query($con, $query);
    echo $result;
    if ($result) {
        $is_superuser = $result['is_superuser'];
        setcookie("login", true);
        if (!$is_superuser) {
            setcookie("login", true);
            header('Location: index.php');
        } else {
        }
    }
} elseif (isset($_POST['submit_signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $is_superuser = $_POST['is_superuser'];
    $query = <<<"query"
    INSERT INTO `users` (`id`, `name`, `email`, `is_superuser`, `password`) VALUES (NULL, '$name', '$email', b'$is_superuser', '$password');
    query;
    if (!mysqli_query($con, $sql)) {
        $error_messagee = "error when added: " . mysqli_error($con);
        header("Location: login.php?sign_error=$error_message");
    } else {
        $success_message = "process Successfuly: Go to Login again";
        header("Location: login.php?sign_message=$success_message");
    }
}


?>


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

    <section class="register-photo">
        <div class="form-container">
            <?php if (isset($_GET['signup'])) : ?>
                <form method="post">

                    <?php if (isset($_GET['sign_error'])) : ?>
                        <div class="d-flex" id="some-message" style="background-color:green ;">
                            <div class="content">
                                <p><?php echo $_GET['sign_error'] ?></p>
                            </div>
                        </div>
                    <?php elseif (isset($_GET['sign_message'])) : ?>
                        <div class="d-flex" id="some-message">
                            <div class="content">
                                <p style="color: black;"><?php echo $_GET['sign_message'] ?></p>
                            </div>
                        </div>
                    <?php endif ?>

                    <h2 class="text-center"><strong>Create</strong> an account.</h2>
                    <div class="mb-3"><input class="form-control" type="text" name="name" placeholder="name"></div>
                    <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                    <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password"></div>
                    <!-- <div class="mb-3"><input class="form-control" type="password" name="password-repeat" placeholder="Password (repeat)"></div> -->

                    <div class="mb-3">Super User status<input class=" btn btn-primary " type="checkbox" name="is_superuser"></div>
















                    <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit" name="submit_signup">Sign Up</button></div>
                </form>
            <?php else : ?>
                <form method="post">
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