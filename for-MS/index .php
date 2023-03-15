<!DOCTYPE html>
<html lang="en">

<head>
    <!-- هذا علميد يتعرف ع اللغه العربيه -->
    <meta charset="UTF-8">
    <!-- هذا حق ملف الايقونات اللي عملناهن اخر الصفحه  -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css2/styles.min.css">
    <!-- هذا للملف حق ال css اللي فعلناه داخل ملف اسمه css واسمه style.css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <title>MOVIES</title>
</head>

<!-- هذه الصفحة الرئيسيه ال Home page   -->

<body dir="ltr" style="background: none;">

    <!-- <div class="header"></div> -->

    <!-- <?php
            /*
            if (!isset($_COOKIE['login'])) {
                header("location: login.php?login");
            }*/
            echo ("asd");
            ?> -->
    <!-- هذا ال div سبرنا له كلاس اسمه header وسبرنا الصوره اللي حق ديزني اللي اول الموقع ك خلفيه لهذا  ال div في ملف ال css-->
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
        <div class="container"><a class="navbar-brand" href="index.php" style="color: var(--bs-blue);"><br>Movies لمشاهدة الافلام<br><br></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">عرض الصفحة الرئيسية</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <h1 class="display-3 text-center">Movies لمشاهدة الافلام<br></h1>
    <h3 class="display-4 text-center">قائمة الافلام<br></h3>
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-md-9">
                    <h3>
                        قائمة الافلام</h3>
                </div>
                <div class="col-md-3">
                    <!-- Controls -->
                </div>
            </div>
            <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="row">
                            <div class="col-sm-3">
                                <a href="view.php">
                                    <div class="col-item">
                                        <div class="photo">
                                            <img src="assets/img/iphone6.jpg" class="img-responsive d-block m-auto" alt="a" />
                                        </div>
                                        <div class="info">
                                            <div class="row">
                                                <div class="price">
                                                    <h5 class="text-center">Sample Product</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- هذا القسم فيه الافلام اللي اقدري تدخلي منهن كل صندوق لحقه الفلم  -->

    <!-- هذا قسم الاسامي والايقونات  -->
    <div class="footer">
        <div class="container">
            <h2>Contact Us</h2>
            <!-- هولا الايقونات  -->
            <div class="icon">
                <i class="fab fa-facebook-square"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-whatsapp-square"></i>
                <i class="fa fa-envelope"></i>
                <i class="fab fa-linkedin"></i>
                <i class="fab fa-twitter"></i>
            </div>
        </div>
    </div>

    <script src="assets/bootstrap3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>