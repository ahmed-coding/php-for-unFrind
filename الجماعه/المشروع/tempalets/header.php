<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>"TEST"</title>
  <link rel="stylesheet" href="<?php echo $css; ?>bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo $fonts; ?>font-awesome/css/all.css" />
  <link rel="stylesheet" href="<?php echo $css; ?>front.css" />

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
          <?php
          // $category =  getAllFrom('*' , 'categories' , 'where parent = 0' ,'ID' ,'ASC');

          // foreach ($category as $cat){

          // echo '<li class="nav-item"><a class="nav-link active" aria-current="page" href="categories.php?pageid='. $cat['ID'] .'">'  .$cat['Name']. '</a></li>';
          // }





          if (isset($_COOKIE['user'])) : ?>
            <div class="dropdown">
              <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" style="margin: 6px;" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $_SESSION['user'] ?>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="profile.php">My Profile</a></li>
                <li><a class="dropdown-item" href="newadd.php">Add New Item</a></li>
                <li><a class="dropdown-item" href="logout.php">log Out</a></li>
              </ul>
            </div>
          <?php
          else :
          ?>
            <button class="btn btn-success btn-sm" type="button" style="margin: 6px;">
              <a href="login.php" style="text-decoration: none; color: #fff;">
                Login/Signup
              </a>

            </button>

          <?php endif ?>

        </ul>

        <!--		<ul class="navbar-nav ">
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
			<a class="dropdown-item" href="#">Edit Profile <i class="fas fa-edit"></i></a></li>
            <li><a class="dropdown-item" href="#">Setting <i class="fas fa-user-cog"></i></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">Logout <i class="fas fa-sign-out-alt"></i></a></li>
          </ul>
        </li>
        
      </ul>-->
      </div>
    </div>
  </nav>