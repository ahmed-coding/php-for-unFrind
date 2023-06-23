<?php

session_start();
$pagetitle = 'members';

if (isset($_SESSION['username'])) {

	include 'init.php';


	$do = isset($_GET['do']) ? $_GET['do'] : 'manage';
	if ($do == 'manage') { //ADD members page 

		$query = '';

		if (isset($_GET['page']) && $_GET['page'] == 'pending') {

			$query = 'AND ragstatus =0';
		}

		//select all user except admin 

		$stmt = $con->prepare("SELECT * FROM users $query order by userID desc");
		//excute the statment
		$stmt->execute();
		//assign the varible
		$rows = $stmt->fetchall();

		if (!empty($rows)) {

?>

			<h1 class="text-center">ادارة الطلاب</h1>
			<div class="container">
				<div class="table-responsive">
					<table class="main-table text-center manage-members table table-bordered">
						<tr>
							<td>ID</td>
							<td>الاسم</td>
							<td>الجنسية</td>
							<td>الجنس</td>
							<td>العمر</td>
							<td>تاريخ التسجيل</td>
							<td>Actions</td>


						</tr>
						<?php

						foreach ($rows as $row) {

							echo "<tr>";
							echo "<td>" . $row['userID'] . "</td>";
							echo "<td>" . $row['username'] . "</td>";
							echo "<td>" . $row['Nationality'] . "</td>";
							echo "<td>" . $row['Sex'] . "</td>";
							echo "<td>" . $row['Age'] . "</td>";
							echo "<td>" . $row['date'] . "</td>";
							echo "<td><a href=\"members_manager.php?userID=" . $row['userID'] . "\">تعديل</a></td>";
							echo "</td>";
							echo "</tr>";
						}
						?>

					</table>
				</div>
				<a href="members.php?do=ADD" class="btn btn-primary"><i class="fa fa-plus"></i>اضافة طالب</a>
			</div>
		<?php } else {
			echo '<div class="container">';
			echo '<div class="nice-message">There\s no Member to show</div>';
			echo ' <a href="members.php?do=ADD" class="btn btn-primary"><i class="fa fa-plus"></i> New Member</a>';
			echo '</div>';
		} ?>
	<?php

	} elseif ($do == 'ADD') {	//Add members page	
	?>

		<h1 class="text-center">اضافة طالب مستجد</h1>
		<div class="container">
			<form class="form-horizontal" action="?do=insert" method="POST" enctype="multipart/form-data">

				<!-- start field-->
				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label">الاسم</label>
					<div class="col-sm-10 col-md-6">
						<input type="text" name="username" class="form-control" required="required" autocomplete="off" placeholder="ادخل اسم الطالب">
					</div>
				</div>


				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label">الجنسية</label>
					<div class="col-sm-10 col-md-6">
						<input type="text" name="nation" class="form-control" required="required" autocomplete="off" placeholder="ادخل جنسية الطالب">
					</div>
				</div>

				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label">الجنس</label>
					<div class="col-sm-10 col-md-6">
						<div>
							<input id="vis-yes" type="radio" name="sax" value="Male" checked>
							<label for="vis-yes">Male</label>
						</div>
						<div>
							<input id="vis-no" type="radio" name="sax" value="Female">
							<label for="vis-no">Female</label>
						</div>
					</div>
				</div>

				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label">العمر</label>
					<div class="col-sm-10 col-md-6">
						<input type="number" name="old" class="form-control" required="required" placeholder="ادخل عمر الطالب ">
					</div>
				</div>
				<div>
				</div>
		</div>

		<!-- submit field-->
		<div class="">
			<div class="form-group form-group-lg">
				<div class="locl-sm-offset-2 col-sm-10">
					<input type="submit" value="  اضافة الطالب" class="btn btn-primary btn-lg">
				</div>
			</div>
			<!-- end submit field-->
			</form>
		</div>



	<?php
	} elseif ($do == 'insert') {

		//insert members page


		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			echo "<h1 class='text-center'>Insert Members</h1>";
			echo "<div class='container'>";



			//get variables from the form
			$user  = $_POST['username'];
			$nations = $_POST['nation'];
			$sex  = $_POST['sax'];
			$age  = $_POST['old'];



			//validate the form
			$formerrors = array();



			//check if there's no proceed the update opreation

			if (empty($formerrors)) {


				//check if user exist in database

				$check = checkitem("username", "users", $user);

				if ($check == 1) {

					$themsg = '<div class ="alert alert-danger">sorry this user is exist</div>';

					redirectHome($themsg, 'back');
				} else {

					//insert userinfo in database

					$stmt = $con->prepare("INSERT INTO users(username,Nationality,Sex,Age,ragstatus,date)
			VALUES(:zuser,:znation,:zsex,:zage,1,now())");
					$stmt->execute(array(

						'zuser' => $user,
						'znation' => $nations,
						'zsex' => $sex,
						'zage' => $age
					));

					//echo success message

					$themsg = "<div class='alert alert-success'>" . $stmt->rowcount() . '  record inserted </div>';

					redirectHome($themsg);
				}
			}
		} else {

			echo "<div class ='container'>";

			$themsg = '<div class="alert alert-danger">sorry you cant browse this page direcly </div>';

			redirectHome($themsg, 'back');

			echo "</div>";
		}
		echo "</div>";


		echo '</div>';
	?>
		<a href="members.php" class="btn btn-primary"><i class="fa fa-back"></i>Members</a>
		</div>
<?php
	}
} else {
	header('Location:members.php');
	exit();
}
