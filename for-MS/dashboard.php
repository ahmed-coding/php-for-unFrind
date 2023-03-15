<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dash Board</title>
    <link rel="stylesheet" href="assets/bootstrap2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css2/styles.min.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
        <div class="container"><a class="navbar-brand" href="index.php" style="color: var(--bs-blue);"><br>Movies لمشاهدة الافلام<br><br></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">عرض الصفحة الرئيسية</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="login-clean">
        <form method="post" action="db_conn.php" enctype="multipart/form-data">
            <h2 class="visually-hidden">Login Form</h2>
            <div class="illustration">
                <p style="font-size: 42px;">Add New Movie</p>
            </div>
            <div class="mb-3"><input type="text" class="form-control" name="name" placeholder="Name" required />
            </div>
            <div class="mb-3"></div>
            <div class="mb-3"><label class="form-label" style="font-size: 21px;"><strong>Images</strong></label><input class="form-control" type="file" name="image_url" required></div>
            <div class="mb-3"><label class="form-label" style="font-size: 23px;"><strong>Video</strong><br></label><input class="form-control" type="file" name="video_url" required></div>
            <div class="mb-3"><textarea class="form-control" placeholder="Description" name="description" required></textarea></div>
            <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit_addNew">Create</button></div>
        </form>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>