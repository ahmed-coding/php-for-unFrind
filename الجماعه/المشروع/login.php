<?php

$errorMessage = '';
$succesMsg =  '';

$pageTitle = "Login";

include('database_conn.php');
include('tempalets/header.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $

    // Check If The User Exist In Database
    $sql = "SELECT *  FROM users WHERE Username = $username AND password = $pass";
    $result = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($result);
    if (!$result) {
        $errorMessage = 'User Not Found';
    } else {
        setcookie("login", true);
        setcookie("user", $result);
        if ($result['admin']) {
            setcookie('admin', true);
        }
        header('Location: index.php');
        mysqli_close($conn);

        exit();
    }
} elseif ($_POST['signup']) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $is_admin = $_POST['admin'];



    $sql = "INSERT INTO users (id, username, passowrd, ,admin ) VALUES (null, $usernam, $password, $is_admin)";

    if (mysqli_query($conn, $sql)) {
        $succesMsg =  'Congrats You Are Now Registerd User ';
    } else {
        $errorMessage = 'Error :' . mysqli_error($conn);
    }


    mysqli_close($conn);
    //Echo Success Message


}


?>
<section class="login-page">
    <div class="fields">
        <div class="container">
            <div class="row">
                <h3 class="text-center header">
                    <span data-class='login' class='selected'>Login</span>
                    |
                    <span data-class='signup'>SignUp</span>

                    <i class="fas fa-sign-in-alt" style="color: #333;"></i>
                </h3>

                <!-- Start signup Form -->
                <?php if (isset($_GET['signup'])) : ?>

                    <form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']  ?>" class='signup'>

                        <div class="col-md-4 offset-md-4">

                            <div class="input-group mb-2 flex-nowrap ">

                                <input class="form-control" title="User Name Must Be More Than 4 & Less Than 8 Characters" pattern=".{4,8}" type="text" name="user" placeholder="Type Your UserName" autocomplete="off" required />
                            </div>

                            <div class="input-group mb-2 flex-nowrap ">

                                <input class="form-control" minlength="6" maxlength="15" required title="Password Must Be More Than 6 & Less Than 15 Characters" type="password" name="pass" placeholder="Type A Complex Password" autocomplete="new-password" />
                            </div>

                            <div class="input-group mb-2 flex-nowrap ">

                                <input class="form-control" type="password" minlength="6" maxlength="15" required title="Password Must Be More Than 6 & Less Than 15 Characters" name="re-pass" placeholder="Type The Password Agin" autocomplete="new-password" />

                            </div>
                            <div class="input-group mb-2 flex-nowrap ">

                                <input class="form-control" type="email" name="email" required placeholder="Type Your  Email" autocomplete="off" />

                            </div>
                            <div class="input-group mb-2 flex-nowrap ">

                                <label for="admin"> <input class="form-control" type="checkbox" name="admin" required /></label>

                            </div>
                            <input class="btn btn-success  w-100 mb-2" type="submit" name="signup" value="SignUp" />

                            <?php
                            if ($errorMessage) {
                                echo '<p class="text-center msg">' . $errorMessage . '</p>';
                            }
                            if ($succesMsg) {
                                echo '<div class="msg success">' . $succesMsg . '</div>';
                            }
                            ?>


                        </div>
                    </form>

                    <!-- End signup Form -->
                    <!-- Start Login Form -->

                <?php else : ?>
                    <form role="form" method="POST" action="login.php" class='login'>

                        <div class="col-md-4 offset-md-4">

                            <div class="input-group mb-2 flex-nowrap ">

                                <input class="form-control" type="text" name="username" placeholder="User Name" />
                            </div>

                            <div class="input-group mb-2 flex-nowrap ">

                                <input class="form-control" type="password" name="password" placeholder="Password" autocomplete="new-password" />

                            </div>

                            <input class="btn btn-primary  w-100 mb-2" type="submit" name="login" value="login" />

                        </div>


                    </form>
                <?php endif ?>

                <!-- End Login Form -->


            </div>
        </div>
    </div>
</section>




<?php
include $tpl . 'footer.php';
ob_end_flush(); ?>