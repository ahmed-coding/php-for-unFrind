<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    body {
      background-image: url(img/1.jpg);
      background-size: cover;

    }
  </style>
  <!--      -->
  <meta charset="UTF-8">
  <!--      -->
  <meta name="viewport" content="GLOCKSTORE-جلوك ستور">
  <title>GLOCKSTORE-جلوك ستور</title>
  <!--      -->

  <!--      -->
  <link href="css/tooplate-wave.css" rel="stylesheet" />
  <!--      -->
  <link rel="stylesheet" href="css/tooplate-wave-weapons.css">
</head>

<body>
  <?php
  include "init.php";
  $query = "SELECT * FROM category;";
  $data = mysqli_query($connect, $query);
  ?>
  <div class="tm-container">


    <div class="tm-row">

      <!-- Site Header -->
      <div class="tm-left">
        <!--      -->
        <div class="tm-left-inner">
          <div class="tm-site-header1">
            <!--      -->

            <h1 class="tm-site-name">GLOCKSTORE-جلوك ستور</h1>
          </div>
          <!--      -->

          <nav class="tm-site-nav">
            <ul class="tm-site-nav-ul">
              <?php
              foreach ($data as $row) :
              ?>
                <li class="tm-page-nav-item">
                  <a href=" <?php echo 'list.php?category=' . $row['id'] ?>" class="tm-page-link active">
                    <i class="fas fa-glass-martini tm-page-link-icon"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['name'] ?> </i>
                    <!--      -->

                  </a>
                </li>
              <?php endforeach ?>
              <!--      -->

            </ul>
          </nav>
        </div>
      </div>


    </div>


  </div>


</body>

</html>