<?php
include "init.php";
if (isset($_POST['submit'])) {

    $name = $_POST['name'];

    $sql = "INSERT INTO category (id , name) VALUES (null,'$name')";
    if (mysqli_query($connect, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }
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


    <section class="log-in" dir='rtl'>
        <div class="fields">
            <div class="container">
                <div class="row">
                    <h3 class="text-center mb-3"> اضافة صنف </h3>

                    <form role="form" method="POST">

                        <div class="col-md-4 m-auto">

                            <div class="input-group mb-2 flex-nowrap ">
                                <input class="form-control" type="text" name="name" placeholder="اسم الصنف " autocomplete="off" />
                            </div>


                            <input class="btn btn-primary  w-100" type="submit" name="submit" value="ارسال" />

                        </div>


                    </form>
                </div>
            </div>
        </div>
    </section>



    <script src="js/bootstrap.min.js"></script>
</body>

</html>