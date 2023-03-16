<?php
// فتح ااتصال بقاعدة البيانات $con
include('db_conn.php');
$id = 0;
// اخذ الايدي حق الفلم
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

// ارسال الامر لقاعدة البيانات
$result = mysqli_query($con, "SELECT * FROM movies WHERE id = $id");
// اغلاق الاتصال
mysqli_close($con);

// اخذ اول صف
$result = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <!-- هذا علميد يتعرف ع اللغه العربيه -->
    <meta charset="UTF-8">
    <!-- هذا حق ملف الايقونات اللي عملناهن اخر الصفحه  -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css2/styles.min.css">
    <!-- هذا للملف حق ال css اللي فعلناه داخل ملف اسمه css واسمه style.css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <title><?php echo $result['name']; ?>-MOVIES</title>
</head>

<body>
    <?php

    // التاكد من تسجييل الدخول
    if (!isset($_COOKIE['login'])) {
        // نقل المستخدم لصفحة تسجيل الدخول
        header("location: login.php?login");
    }
    ?>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
        <div class="container"><a class="navbar-brand" href="index.php" style="color: var(--bs-blue);"><br>Movies لمشاهدة الافلام<br><br></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">عرض الصفحة الرئيسية</a></li>
                    <?php
                    if (isset($_COOKIE['is_superuser'])) {
                        echo '<li class="nav-item"><a class="nav-link active" href="dashboard.php">اضافة فيلم</a></li>';
                    }
                    ?>

                </ul>
            </div>
        </div>
    </nav>


    <h1>Movies لمشاهدة الافلام</h1>

    <div class="video">
        <div class="container">
            <video controls poster="<?php echo $result['image_url']; ?>" muted>
                <source src="<?php echo $result['video_url']; ?>" type="video/mp4">
            </video>
            <h2> فيلم <?php echo $result['name']; ?></h2>
        </div>
    </div>

    <div class="contant-video pb-5" dir='rtl'>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="col-item">
                        <div class="photo me-3">
                            <img src="<?php echo $result['image_url']; ?>" class="img-responsive d-block m-auto w-100" alt="a" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-9">

                    <h2>قصة الفلم</h2>
                    <p><?php echo $result['description']; ?>
                    </p>
                    <a href="<?php echo $result['link']; ?>" target="_blank"><button>مشاهده</button></a>
                </div>
            </div>
        </div>
    </div>


</body>

</html>