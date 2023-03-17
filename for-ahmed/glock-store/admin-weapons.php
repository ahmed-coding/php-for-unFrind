<?php
include 'init.php';
if (isset($_POST['submit'])) {

    $image_url = 'images/' . basename($_FILES['image_file']['name']);
    if (move_uploaded_file($_FILES['image_file']['tmp_name'], $image_url)) {
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
}


?>

<!DOCTYPE html>
<html lang="ar" dir="rtl ">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اضافة اسلحة</title>
</head>

<body>

    <form method="post">

        <div>
            <label for="name"><input type="text" name="name" id="name">اسم السلاح </lable>
        </div>
        <div>
            <label for="image_url"><input type="file" name="image_file" id="image_url"> صورة السلاح</lable>
        </div>
        <div>
            <label for="scope"><input type="text" name="scope" id="scope">نطاق السلاح</lable>
        </div>
        <div>
            <label for="madeIn"><input type="text" name="madeIn" id="madeIn"> بلد المنشاء</lable>
        </div>
        <div>
            <label for="storage"><input type="text" name="storage" id="storage">سعة المخزون</lable>
        </div>

        <div>
            <label for="storageType"><input type="text" name="storageType" id="storageType">نوع الذخيره</lable>
        </div>

        <div>
            <label for="model"><input type="text" name="model" id="model">رقم الموديل</lable>
        </div>

        <div>
            <label for="weight"><input type="text" name="weight" id="weight">وزن السلاح</lable>
        </div>

        <div>
            <label for="category_id"><input type="text" name="category_id" id="category_id">صنف السلاح</lable>
        </div>

        <div>
            <label for="color"><input type="text" name="color" id="color">اللون </lable>
        </div>

        <div>
            <label for="price"><input type="text" name="price" id="price">السعر</lable>
        </div>
        <div>
            <button type="submit" name="submit">ارسال</button>
        </div>

    </form>


</body>

</html>