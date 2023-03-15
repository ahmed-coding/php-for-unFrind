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
    <title>RATATOUILLE-MOVIES</title>
</head>

<body >
     <!-- <?php
            if (!isset($_COOKIE['login'])) {
                header("location: login.php?login");
            }
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

  
    <h1>Movies لمشاهدة الافلام</h1>

    <!-- هذا الجزء حق الفيديو حق الفيلم  -->
    <div class="video">
        <div class="container">
            <!-- هذا الفيديو  -->
            <video controls poster="image/Ratatouille/photo_2022-10-15_00-12-48.jpg" muted>
                <source src="image/Ratatouille/Ratatouille (2007) - Anton Ego Tastes Ratatouille - Flashback Scene [HD].mp4" type="video/mp4">
            </video>
            <h2> فيلم RATATOUILLE</h2>
        </div>
    </div>

    <!-- وهذا الجزء حق معلومات الفيلم contant-video  -->
    <div class="contant-video pb-5" dir='rtl'>
        <div class="container">
        <div class="row">
                <div class="col-sm-3">
                     <div class="col-item">
                           <div class="photo">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0rJiqAa-i7Dyqp_RICbHpHlXsYa0n7Ni8MIFYLK5kqY4kqU3gWdotNrnBkl82Vo6QjsM&usqp=CAU" class="img-responsive d-block m-auto" alt="a" />
                            </div>
                    </div>
                </div>
                <div class="col-sm-9">

                <!-- هنا اسم الفيلم  -->
            <h2>قصة الفلم</h2>
            <!-- هنا القصه حق الفيلم -->
            <p>قصه فلم الفار الطباخ...
                يحلم الفأر (ريمي ) بأن يكون طباخاً ماهراً، وعقب إنفصاله عن عائلته بعد أن اكتشف وكرها، ليصل إلى باريس، ثم
                يستقر في مطبخ
                مطعم فاخر، يلتحق الشاب (بلنجويني) للعمل بالمطعم، ويستطيع (ريمي) التحكم فيه عن طريق التحكم في تحريك شعره،
                مما يجعله
                طباخاً ماهراً، ويثير غيرة زملائه الطباخين.
            </p>
            <!-- وهذا الزر اللي لما تضغطه يشلك تشوف الفيلم من ال youtube -->
            <a href="https://youtu.be/bNwfZi_EQ3I" target="_blank"><button>مشاهده</button></a>
        </div>
        </div>
    </div>
    </div>

   
</body>

</html>