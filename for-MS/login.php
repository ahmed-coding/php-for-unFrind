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

    include_once('db.php');

    $con = mysqli_connect($db_host, $db_user, null, $db_name, $db_port);

    if (mysqli_connect_errno()) {
        die("Error when connected with database and error message" . mysqli_connect_error());
    }
    ?>
    <section class="register-photo">
        <div class="form-container">
            <?php if (isset($_GET['signup'])) : ?>
                <form method="post" action="sign_up.php">
                    <h2 class="text-center"><strong>Create</strong> an account.</h2>
                    <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                    <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password"></div>
                    <!-- <div class="mb-3"><input class="form-control" type="password" name="password-repeat" placeholder="Password (repeat)"></div> -->
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