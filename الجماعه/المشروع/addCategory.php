<?php
include 'database_conn.php';

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $description = $_POST['description'];

    $sql = "INSERT INTO category (id ,name, description) VALUES (null,'$name', '$description')";
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
    <title>Dashboard</title>
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
                    <?php
                        header('Location:login.php');
                    endif ?>
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
                    <h3 class="text-center h1 header">Add New Category</h3>

                    <form role="form" method="POST">
                        <div class="col-md-6 offset-md-3">
                            <div class="input-group mb-2 flex-nowrap">
                                <input type="text" name="name" class="form-control" placeholder="Name Of Categories" autocomplete="off" required="required" />
                            </div>

                            <div class="input-group mb-2">
                                <input type="text" name="description" class="form-control" placeholder="Descripe The Category" />
                            </div>

                            <input type="submit" name="submit" value="Add Category" class="btn btn-primary btn-md w-30 d-block p-2" />
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