<?php

$errorMessage = '';
$succesMsg =  '';


include 'database_conn.php';


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $pass = $_POST['password'];

    // Check If The User Exist In Database
    $sql = "SELECT *  FROM users WHERE username = '$username' AND password = '$pass' ;";
    $result = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($result);
    if (!$result) {
        $errorMessage = 'User Not Found';
    } else {
        setcookie("login", true);
        setcookie("user", $result['username']);
        if ($result['admin']) {
            setcookie('admin', true);
        }
        header('Location: index.php');
        mysqli_close($con);

        exit();
    }
} elseif (isset($_POST['signup'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $is_admin = isset($_POST['admin']) ? (bool)$_POST['admin'] : false;



    $sql = "INSERT INTO users (id, username, password, admin ) VALUES (null, '$username', '$password', $is_admin);";

    if (mysqli_query($con, $sql)) {
        $succesMsg =  'Congrats You Are Now Registerd User ';
    } else {
        $errorMessage = 'Error :' . mysqli_error($con);
    }


    //Echo Success Message


}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="layout/css/bootstrap.min.css" />
    <link rel="stylesheet" href="layout/fonts/font-awesome/css/all.css" />
    <link rel="stylesheet" href="layout/css/front.css" />
</head>

<body>
    <section class="login-page">
        <div class="fields">
            <div class="container">
                <div class="row">
                    <h3 class="text-center header">
                        <span data-class="login" class="selected">Login</span>
                        |
                        <span data-class="signup">SignUp</span>

                        <i class="fas fa-sign-in-alt" style="color: #333"></i>
                    </h3>
                    <!-- Start signup Form -->

                    <form role="form" method="POST" class="signup">
                        <div class="col-md-10 offset-md-1">
                            <div class="input-group mb-2 flex-nowrap">
                                <input class="form-control" title="User Name Must Be More Than 4 & Less Than 8 Characters" pattern=".{4,8}" type="text" name="username" placeholder="Type Your UserName" autocomplete="off" required />
                            </div>

                            <div class="input-group mb-2 flex-nowrap">
                                <input class="form-control" minlength="6" maxlength="15" required title="Password Must Be More Than 6 & Less Than 15 Characters" type="password" name="password" placeholder="Type A Complex Password" autocomplete="new-password" />
                            </div>

                            <div class="input-group mb-2 flex-nowrap">
                                <input class="form-control" type="password" minlength="6" maxlength="15" required title="Password Must Be More Than 6 & Less Than 15 Characters" name="re-pass" placeholder="Type The Password Agin" autocomplete="new-password" />
                            </div>


                            <div class="input-group mb-2 flex-nowrap">
                                <label for=""> <input class="" type="checkbox" name="admin" checked />super user status</label>
                            </div>

                            <input class="btn btn-success w-100 mb-2" type="submit" name="signup" value="SignUp" />

                        </div>
                    </form>

                    <!-- End signup Form -->

                    <!-- Start Login Form -->
                    <form role="form" method="POST" class="login">
                        <div class="col-md-10 offset-md-1">
                            <div class="input-group mb-2 flex-nowrap">
                                <input class="form-control" type="text" name="username" placeholder="User Name" />
                            </div>

                            <div class="input-group mb-2 flex-nowrap">
                                <input class="form-control" type="password" name="password" placeholder="Password" autocomplete="new-password" />
                            </div>

                            <input class="btn btn-primary w-100 mb-2" type="submit" name="login" value="login" />
                            <?php
                            if ($errorMesechosage) {
                                '<p class="text-center msg">' . $errorMessage . '</p>';
                            }
                            if ($succesMsg) {
                                echo '<div class="msg success">' . $succesMsg . '</div>';
                            }
                            ?>
                        </div>
                    </form>

                    <!-- End Login Form -->
                </div>
            </div>
        </div>
    </section>

    <script src="layout/js/jquery.js"></script>
    <script src="layout/js/bootstrap.min.js"></script>
    <script src="layout/js/front.js"></script>
</body>

</html>