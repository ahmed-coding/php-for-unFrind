<?php
session_start();
$nonavbar = '';
$pagetitle = 'login';

if (isset($_SESSION['username'])) {
	header('location:members.php'); //register to dashboard page
}
include 'init.php';
include $tpl . 'header.php';


//check if user coming from http requset

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$username = $_POST['user'];
	$password = $_POST['pass'];
	$hashedpass = sha1($password);

	//check if the user exist in database
	$stmt = $con->prepare("SELECT
	                       userID,username,password
	                       FROM 
						   admine
	                       WHERE
	                          username =? 
	                       and 
                           	password=? 
                        	
							LIMIT 1");

	$stmt->execute(array($username, $hashedpass));
	$row = $stmt->fetch();
	$count = $stmt->rowcount();
	//if count > 0 this mean the database contain record about this username
	if ($count > 0) {
		$_SESSION['username'] = $username; //rigister session name
		$_SESSION['ID'] = $row['userID']; //rigister session ID
		header('location:members.php');     //rigister to dashboard page
		exit();
	}
}
?>

<form class="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
	<h4 class="text-center">login to Control Panel </4>
		<input class="form-control" type="text" name="user" placeholder="Username" autocomplete="off">
		<input class="form-control" type="password" name="pass" placeholder="password" autocomplete="new-password">
		<input class="btn btn-primary btn-block" type="submit" value="login">


</form>

<?php include $tpl . 'footer.php'; ?>