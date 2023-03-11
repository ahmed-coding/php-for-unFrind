<!DOCTYPE html>
<html lang="ar">

<head>
    <!-- هذا علميد يتعرف ع اللغه العربيه -->
    <meta charset="UTF-8">
    <!-- هذا للملف حق ال css اللي فعلناه داخل ملف اسمه css واسمه style.css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- هذا حق ملف الايقونات اللي عملناهن اخر الصفحه  -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <title>MOVIES</title>
</head>

<!-- هذه الصفحة الرئيسيه ال Home page   -->

<body dir="rtl">
    <?php

    include('db_conn.php');

    ?>

    <!-- هذا ال div سبرنا له كلاس اسمه header وسبرنا الصوره اللي حق ديزني اللي اول الموقع ك خلفيه لهذا  ال div في ملف ال css-->
    <div class="header">

    </div>
    <!-- هذا اسم الموقع -->
    <h1>Movies لمشاهدة الافلام</h1>

    <!-- سبنا كلاس اسمة container علشان يمسك العناصر كلهن في النص علميد لايرتبشين -->
    <div class="container">
        <h2>قائمة الافلام</h2>
    </div>

    <!-- هذا القسم فيه الافلام اللي اقدري تدخلي منهن كل صندوق لحقه الفلم  -->
    <section class="movies">
        <!-- وسبرنا العناصر كلهن وسط ال container علشان نقدر نرتب العناصر مثل فوق  -->
        <div class="container">
            <!-- هذا ال a عيدخلك للصفحه حق Ratatouille.html -->
            <a href="Ratatouille.html">
                <!-- دخلنا العناصر وسط ال card علشان نقدر نخليهم جنب بعض ولما تقرب بالماوس لعنده او تاشر عليه يفعل الحركة حق الصور -->
                <div class="card">
                    <div class="image">
                        <img src="image/Ratatouille/photo_2022-10-15_00-12-48.jpg" alt="">
                    </div>
                    <div class="contant">
                        <h3>RATATOUILLE</h3>
                    </div>
                </div>
            </a>

            <!-- هذا ال a عيدخلك للصفحه حق Bee-movie.html -->
            <a href="Bee-movie.html">
                <!-- دخلنا العناصر وسط ال card علشان نقدر نخليهم جنب بعض ولما تقرب بالماوس لعنده او تاشر عليه يفعل الحركة حق الصور  نفس فوق -->
                <div class="card">
                    <div class="image">
                        <img src="image/Bee-movie/photo_2022-10-15_00-07-02.jpg" alt="">
                    </div>
                    <div class="contant">
                        <h3>Bee-movie</h3>
                    </div>
                </div>
            </a>

            <!-- هذا ال a عيدخلك للصفحه حق Frozen.html -->
            <a href="Frozen.html">
                <div class="card">
                    <div class="image">
                        <img src="image/Frozen/photo_2022-10-15_00-00-58.jpg" alt="">
                    </div>
                    <div class="contant">
                        <h3>Frozen</h3>
                    </div>
                </div>
            </a>
            <!-- هذا ال a عيدخلك للصفحه حق Tangled.html -->
            <a href="Tangled.html">
                <div class="card">
                    <div class="image">
                        <img src="image/Tangled/photo_2022-10-15_00-07-58.jpg" alt="">
                    </div>
                    <div class="contant">
                        <h3>Tangled</h3>
                    </div>
                </div>
            </a>
        </div>
    </section>

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
            <!-- وهولا الاسامي -->
            <div class="contant">
                <p>تصميم ملاك سريع & سهام بركات </p>
            </div>
        </div>
    </div>
</body>

</html>