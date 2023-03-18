<?php

include 'database_conn.php';

$query = "SELECT * FROM category";
$category = mysqli_query($con, $query);

if (isset($_POST['submit'])) {
  $image_url = 'upload/' . basename($_FILES['image_url']['name']);
  if (move_uploaded_file($_FILES['image_url']['tmp_name'], $image_url)) {
    // The image file was uploaded successfully
  } else {
    die("error on move the image to server");
  }
  $name = $_POST['name'];
  $category_id = $_POST['category_id'];
  $price = $_POST['price'];
  $made_in = $_POST['made_in'];
  $description = $_POST['description'];

  $created_time = date("Y-m-d H");
  $addedBy = isset($_COOKIE['user']) ? $_COOKIE['user'] : "None";

  $sql = "INSERT INTO product (name, price, category_id, image_url, addedBy, created_time, made_in, description) VALUES ('$name', '$price', '$category_id', '$image_url', '$addedBy', '$created_time', '$made_in', '$description')";
  if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Add Item</title>
  <link rel="stylesheet" href="layout/css/bootstrap.min.css" />
  <link rel="stylesheet" href="layout/fonts/font-awesome/css/all.css" />
  <link rel="stylesheet" href="layout/css/front.css" />
</head>

<body>
  <?php if (!isset($_COOKIE['login']) && !isset($_COOKIE['admin'])) {
    header('Location:login.php');
  } ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">Home Page</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#app-nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="app-nav">
        <ul class="navbar-nav ms-auto">
          <?php if (isset($_COOKIE['login']) && isset($_COOKIE['admin'])) : ?>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="addItem.php">Add Item</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="addCategory.php">Add Category</a>
            </li>
          <?php endif ?>
          <div class="dropdown">
            <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" style="margin: 6px" data-bs-toggle="dropdown" aria-expanded="false"><?php echo isset($_COOKIE['user']) ? $_COOKIE['user'] : "user" ?></button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <?php echo !isset($_COOKIE['login']) ? '<li><a class="dropdown-item" href="login.php">Login</a></li>' : '<li><a class="dropdown-item" href="logout.php">Log out</a></li>' ?>
              <!-- <li><a class="dropdown-item" href="logout.php">log Out</a></li> -->
            </ul>
          </div>
        </ul>
      </div>
    </div>
  </nav>


  <section class="edit-profile">
    <div class="fields">
      <div class="container">
        <div class="row">
          <h3 class="text-center h1 header">Add New Item</h3>

          <form role="form" method="POST" enctype="multipart/form-data">
            <div class="col-md-6 offset-md-3">
              <div class="input-group mb-2 flex-nowrap">
                <input type="text" name="name" class="form-control" placeholder="Name" required="required" />
              </div>

              <div class="input-group mb-2">
                <textarea name="description" class="form-control" style="height: 150px" placeholder="Descripe The Item" required="required">
                  </textarea>
              </div>

              <div class="input-group mb-2 flex-nowrap">
                <input type="text" name="price" class="form-control" placeholder="Price Of The Item" required="required" />
              </div>

              <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect03">Category</label>
                <select class="form-select" id="inputGroupSelect03" name="category_id">
                  <option value="0" selected>Choose...</option>
                  <?php
                  foreach ($category as $row) :
                  ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                    <!-- <option value="19">Cell Phones</option>
                    <option value="24">- Apple</option>
                    <option value="20">Clothing</option>
                    <option value="22">Games</option> -->
                  <?php endforeach ?>
                </select>
              </div>
              <div class="input-group mb-2 flex-nowrap">
                <input type="text" name="made_in" class="form-control" placeholder="Made IN" />
              </div>
              <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">The Image</label>
                <input type="file" class="form-control" id="inputGroupFile01" name="image_url" />
              </div>

              <input type="submit" value="Add Item" class="btn btn-primary btn-md w-100" name="submit" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <script src="layout/js/jquery.js"></script>
  <script src="layout/js/bootstrap.min.js"></script>
  <script src="layout/js/front.js"></script>
</body>

</html>