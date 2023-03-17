<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="layout/css/bootstrap.min.css" />
  <link rel="stylesheet" href="layout/fonts/font-awesome/css/all.css" />
  <link rel="stylesheet" href="layout/css/front.css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="dashboard.html">Home Page</a>
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
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="login.php">login or signup </a></li>
              <li><a class="dropdown-item" href="logout.php">log Out</a></li>
            </ul>
          </div>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <h2 class="text-center h1 header">All Item</h2>

    <div class="row">
      <div class="col-6 col-md-3">
        <div class="img-thumbnail item-box">
          <span class="price-tag">$5000</span><img src="admin/upload/items/932598_photo_2022-10-10_07-39-47.jpg" alt="" class="card-img" height="200px" />
          <div class="caption">
            <h4 class="desc" style="margin: 5px">
              <a class="title" href="view.php">annskfksjgkj</a>
            </h4>
            <p class="desc">nice music</p>
            <p style="
                  color: #636363;
                  margin: 5px;
                  text-align: right;
                  font-size: 13px;
                  font-weight: bold;
                ">
              2023-02-11
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="layout/js/jquery.js"></script>
  <script src="layout/js/bootstrap.min.js"></script>
  <script src="layout/js/front.js"></script>
</body>

</html>