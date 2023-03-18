<?php
include 'database_conn.php';
if (isset($_GET['product_id'])) {
  $id = $_GET['product_id'];
  $query = "SELECT * FROM product WHERE id = $id;";

  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_assoc($result);
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Item-<?php echo $row['name'] ?> </title>
  <link rel="stylesheet" href="layout/css/bootstrap.min.css" />
  <link rel="stylesheet" href="layout/fonts/font-awesome/css/all.css" />
  <link rel="stylesheet" href="layout/css/front.css" />
</head>

<body>
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


  <section class="items">
    <h1 class="header text-center" style="color: #fff"><?php echo $row['name'] ?> </h1>
    <div class="container">
      <hr />
      <div class="row">
        <div class="col-3">
          <div class="d-flex justify-content-end">
            <img src="<?php echo $row['image_url'] ?>" class="img-thumbnail" alt="..." />
          </div>
        </div>
        <div class="col-9">
          <h2><?php echo $row['name'] ?> </h2>
          <p><?php echo $row['description'] ?> </p>
          <ul class="list-unstyled">
            <li>
              <i class="fas fa-calendar fa-fw"></i>
              <span>Added Date </span>:<?php echo $row['created_time'] ?>
            </li>
            <li>
              <i class="fas fa-wallet fa-fw"></i>
              <span>Price </span>: $<?php echo $row['price'] ?>
            </li>
            <li>
              <i class="fas fa-globe-asia fa-fw"></i>
              <span>Made In </span>: <?php echo $row['made_in'] ?>
            </li>
            <li>
              <i class="fas fa-tags fa-fw"></i>
              <span>Category </span>:
              <a class="categor" href="categories.php?pageid=22"> Games </a>
            </li>
            <li>
              <i class="fas fa-user fa-fw"></i>
              <span>Added By </span>: <?php echo $row['addedBy'] ?>
            </li>

            <li>
              <a class="btn btn-success btn-sm" href="https://www.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=EC-46855608FF732572J">Buy Now</a>
            </li>
          </ul>
        </div>
      </div>

      <hr />
    </div>
  </section>

  <script src="layout/js/jquery.js"></script>
  <script src="layout/js/bootstrap.min.js"></script>
  <script src="layout/js/front.js"></script>
</body>

</html>