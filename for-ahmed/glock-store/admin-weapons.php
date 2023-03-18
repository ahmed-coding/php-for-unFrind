<?php
include 'init.php';
$query = "SELECT * FROM category";
$category_item = mysqli_query($connect, $query);


if (isset($_POST['submit'])) {

    $image_url = 'images/' . basename($_FILES['image_url']['name']);
    if (move_uploaded_file($_FILES['image_url']['tmp_name'], $image_url)) {
        // The image file was uploaded successfully
    } else {
        die("error on move the image to server");
    }
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $scope = $_POST['scope'];
    $madeIn = $_POST['madeIn'];
    $storage = $_POST['storage'];
    $storageType = $_POST['storageType'];
    $model = $_POST['model'];
    $color = $_POST['color'];
    $weight = $_POST['weight'];
    $price = $_POST['price'];

    $sql = "INSERT INTO weapon (name, category_id, scope, madeIn, storage, storageType, model, color, weight, price, image_url) VALUES ('$name', '$category_id', '$scope', '$madeIn', '$storage', '$storageType', '$model', '$color', '$weight', '$price', '$image_url');";
    if (mysqli_query($connect, $sql)) {
        echo 'Congrats You Are Now Registered User';
    } else {
        die('Error: ' . mysqli_error($connect));
    }
    // mysqli_query()
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
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="admin-weapons.php"> اضافة سلاح </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="admin-category.php"> اضافة صنف </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="login.php"> تسجيل الدخول </a>
                    </li>


                </ul>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            User </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <li><a class="dropdown-item" href="logout.php">Logout <i class="fas fa-sign-out-alt"></i></a></li>
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
                    <h3 class="text-center mb-3"> اضافة سلاح </h3>

                    <form role="form" method="POST" enctype="multipart/form-data">

                        <div class="col-md-4 m-auto">

                            <div class="input-group mb-2 flex-nowrap ">
                                <input class="form-control" type="text" name="name" placeholder="اسم السلاح " autocomplete="off" />
                            </div>
                            <div class="input-group mb-2 flex-nowrap ">
                                <input class="form-control" type="text" name="scope" placeholder="نطاق السلاح" autocomplete="off" />
                            </div>
                            <div class="input-group mb-2 flex-nowrap ">
                                <input class="form-control" type="text" name="madeIn" placeholder="بلد المنشاء" autocomplete="off" />
                            </div>
                            <div class="input-group mb-2 flex-nowrap ">
                                <input class="form-control" type="text" name="storage" placeholder="سعة المخزون" autocomplete="off" />
                            </div>
                            <div class="input-group mb-2 flex-nowrap ">
                                <input class="form-control" type="text" name="storageType" placeholder="نوع الذخيره" autocomplete="off" />
                            </div>
                            <div class="input-group mb-2 flex-nowrap ">
                                <input class="form-control" type="text" name="model" placeholder="رقم الموديل" autocomplete="off" />
                            </div>
                            <div class="input-group mb-2 flex-nowrap ">
                                <input class="form-control" type="text" name="weight" placeholder="وزن السلاح" autocomplete="off" />
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect03">Category</label>
                                <select class="form-select" id="inputGroupSelect03" name="category_id">
                                    <option value="0" selected>Choose...</option>
                                    <?php
                                    foreach ($category_item as $row) :
                                    ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                        <!-- <option value="19">Cell Phones</option>
                    <option value="24">- Apple</option>
                    <option value="20">Clothing</option>
                    <option value="22">Games</option> -->
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="input-group mb-2 flex-nowrap ">
                                <input class="form-control" type="text" name="color" placeholder="اللون" autocomplete="off" />
                            </div>
                            <div class="input-group mb-2 flex-nowrap ">
                                <input class="form-control" type="text" name="price" placeholder="السعر" autocomplete="off" />
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupFile01"> صورة السلاح</label>
                                <input type="file" class="form-control" name="image_url" id="inputGroupFile01" required>
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