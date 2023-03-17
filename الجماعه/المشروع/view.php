<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Item</title>
  <link rel="stylesheet" href="layout/css/bootstrap.min.css" />
  <link rel="stylesheet" href="layout/fonts/font-awesome/css/all.css" />
  <link rel="stylesheet" href="layout/css/front.css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.html">Home Page</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#app-nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="app-nav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="addItem.php">Add Item</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="addCategory.php">Add Category</a>
          </li>

          <div class="dropdown">
            <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" style="margin: 6px" data-bs-toggle="dropdown" aria-expanded="false">
              user
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="logout.php">log Out</a></li>
            </ul>
          </div>
        </ul>
      </div>
    </div>
  </nav>

  <section class="items">
    <h1 class="header text-center" style="color: #fff">annskfksjgkj</h1>
    <div class="container">
      <hr />
      <div class="row">
        <div class="col-3">
          <div class="d-flex justify-content-end">
            <img src="admin/upload/items/932598_photo_2022-10-10_07-39-47.jpg" class="img-thumbnail" alt="..." />
          </div>
        </div>
        <div class="col-9">
          <h2>annskfksjgkj</h2>
          <p>nice music</p>
          <ul class="list-unstyled">
            <li>
              <i class="fas fa-calendar fa-fw"></i>
              <span>Added Date </span>: 2023-02-11
            </li>
            <li>
              <i class="fas fa-wallet fa-fw"></i>
              <span>Price </span>: $5000
            </li>
            <li>
              <i class="fas fa-globe-asia fa-fw"></i>
              <span>Made In </span>: Yemen
            </li>
            <li>
              <i class="fas fa-tags fa-fw"></i>
              <span>Category </span>:
              <a class="categor" href="categories.php?pageid=22"> Games </a>
            </li>
            <li>
              <i class="fas fa-user fa-fw"></i>
              <span>Added By </span>:<a class="categor" href="profile.php">
                anas</a>
            </li>
            <li>
              <i class="fas fa-user fa-fw"></i>
              <span>Tags </span>:
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