<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>

<body>
    <form action="db_con.php" method="post">
        <h2>تسجيل الدخول</h2>
        <!-- <div>ID:<input type="number" name="id" id="id"></div> -->
        <div>First name<input type="text" name="first_name" id="" required></div>
        <div>Last Name<input type="text" name="last_name" id="" required></div>
        <div>Age<input type="number" name="age" id="" required></div>
        <div>Major<input type="text" name="major" id="" required></div>
        <div>Level<input type="number" name="level" id="" required></div>
        <div><input type="submit" value="Submit" name="submit"></div>

    </form>

</body>

</html>