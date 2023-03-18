<?php
include "init.php";

$category = $_GET['category'];

$query = "SELECT * FROM weapon WHERE category_id = $category ;";

$data = mysqli_query($connect, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!--      -->
    <meta charset="UTF-8">
    <!--      -->
    <meta name="viewport" content="GLOCKSTORE-جلوك ستور">
    <title>4</title>
    <!--      -->
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <!--      -->
    <link href="css/tooplate-wave.css" rel="stylesheet" />
    <!--      -->
    <link rel="stylesheet" href="css/tooplate-wave-weapons.css">
</head>

<body>
    <style>
        body {
            background-image: url(img/1.jpg);
            background-size: 100%;
            background-color: royalblue;
            background-attachment: fixed;

        }
    </style>
    <!--      -->
    <div class="tm-container">
        <!--      -->
        <div class="tm-row">
            <!-- Site Header -->
            <div class="tm-left">
                <!--      -->
                <div class="tm-left-inner">
                    <ul>
                        <li class="tm-page-nav-item">
                            <a href="menu.php" class="tm-page-link">
                                <i class="fas fa-glass-martini tm-page-link-icon" style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;السابق</i>

                            </a>
                        </li>
                    </ul>
                    <!--      -->


                </div>
            </div>
            <!--      -->
            <div class="tm-right">
                <main class="tm-main">
                    <!--      -->
                    <!-- Weapon Menu Page -->
                    <?php
                    foreach ($data as $row) :
                    ?>
                        <div class="tm-list">
                            <!-- |قناصه| -->
                            <div id="sniper" class="tm-list-item">
                                <img src=" <?php echo isset($row['image_url']) ? $row['image_url'] :  "img/photo_2022-18.jpg" ?>" alt="Image" class="tm-list-item-img">
                                <div class="tm-black-bg tm-list-item-text">
                                    <h1 class="tm-list-item-name"> <?php echo $row['name'] ?><span class="tm-list-item-price"> <?php echo $row['price'] ?></span>
                                    </h1>
                                    <p class="tm-list-item-description">بلاد النشاه: <?php echo $row['madeIn'] ?>
                                        <br>رقم الموديل: <?php echo $row['model'] ?>
                                        <br>سعه المخزن: <?php echo $row['storage'] ?>
                                        <br>حجم الذخيرة : <?php echo $row['storageType'] ?>
                                        <br>المدى الفعال: <?php echo $row['scope'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
            </div>
        </div>

    </div>


</body>

</html>