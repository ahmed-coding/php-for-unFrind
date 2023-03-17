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
            <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" style="margin: 6px" data-bs-toggle="dropdown" aria-expanded="false"></button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="logout.php">log Out</a></li>
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
          <h3 class="text-center h1 header">Add New Category</h3>

          <form role="form" action="?do=Insert" method="POST">
            <div class="col-md-6 offset-md-3">
              <div class="input-group mb-2 flex-nowrap">
                <input type="text" name="name" class="form-control" placeholder="Name Of Categories" autocomplete="off" required="required" />
              </div>

              <div class="input-group mb-2">
                <input type="text" name="description" class="form-control" placeholder="Descripe The Category" />
              </div>

              <input type="submit" value="Add Category" class="btn btn-primary btn-md w-30 d-block p-2" />
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