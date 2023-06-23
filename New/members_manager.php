<?php


session_start();
$pagetitle = 'members';
$userID = $_GET['userID'];
$user;
$nations;
$sex;
$age;

if (isset($_SESSION['username'])) {

    include 'init.php';
    //update members page
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $userID  = $_GET['userID'];
        $result = getItem("userID", "users", $userID);

        $user = $result[0]['username'];
        $nations = $result[0]['Nationality'];
        $sex = $result[0]['Sex'];
        $age = $result[0]['Age'];
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "<h1 class='text-center'>Update Members</h1>";
        echo "<div class='container'>";


        //get variables from the form
        $user = $_POST['username'];
        $userID = $_POST['userID'];
        $nations = $_POST['nation'];
        $sex  = $_POST['sax'];
        $age  = $_POST['old'];



        //validate the form
        $formerrors = array();



        //check if there's no proceed the update opreation

        if (empty($formerrors)) {

            // check if user exist in database
            $result = getItem("userID", "users", $userID);
            if (!$result) {


                $themsg = '<div class ="alert alert-danger">sorry this user doesn\'t is exists</div>';

                redirectHome($themsg, 'back');
            } else {



                //update userinfo in database

                $stmt = $con->prepare("UPDATE `users` SET `username`=\"$user\" ,Nationality=\"$nations\" ,`Sex`=\"$sex\" ,`Age`=\"$age\" ,`ragstatus`=1 ,`date`=now() WHERE `userID`=$userID;");
                $stmt->execute();

                //echo success message

                $themsg = "<div class='alert alert-success'>" . $stmt->rowcount() . '  record updated </div>';

                redirectHome($themsg);
            }
        }
    }

?>
    <h1 class="text-center">تعديل بيانات الطالب </h1>
    <div class="container">
        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">

            <!-- start field-->
            <input type="hidden" name="userID" value="<?php echo $userID ?>">
            <div class="form-group form-group-lg">
                <label class="col-sm-2 control-label">الاسم</label>
                <div class="col-sm-10 col-md-6">
                    <input type="text" name="username" value="<?php echo $user ?>" class="form-control" required="required" autocomplete="off" placeholder="ادخل اسم الطالب">
                </div>
            </div>


            <div class="form-group form-group-lg">
                <label class="col-sm-2 control-label">الجنسية</label>
                <div class="col-sm-10 col-md-6">
                    <input type="text" name="nation" value="<?php echo $nations ?>" class="form-control" required="required" autocomplete="off" placeholder="ادخل جنسية الطالب">
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
                    <input type="number" name="old" value="<?php echo $age ?>" class="form-control" required="required" placeholder="ادخل عمر الطالب ">
                </div>
            </div>
            <div>
            </div>
    </div>

    <!-- submit field-->
    <div class="">
        <div class="form-group form-group-lg">
            <div class="locl-sm-offset-2 col-sm-10">
                <input type="submit" value=" حفظ التغييرات" class="btn btn-primary btn-lg">
            </div>
        </div>
        <!-- end submit field-->
        </form>
    </div>
<?php
} else {
    header('Location:members.php');
    exit();
}
