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
                    <p class="text-center">Have Account?<a href="login.php?login">Login!</a> </p>

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
                    <p class="text-center">or <a href="login.php?signup">Create a New account?</a> </p>

                </form>

        </div>
    <?php endif; ?>

    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>