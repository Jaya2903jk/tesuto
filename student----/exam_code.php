<?php
session_start();
if (isset($_SESSION["student_username"])) {
    session_destroy();
}
include_once 'dbConnection.php';
$ref      = @$_GET['q'];
$code = $_POST['ex_code'];
//print_r($code);die();
$result = mysqli_query($con, "SELECT * FROM exam_code WHERE ex_code = '$code' ") or die('Error');
$count = mysqli_num_rows($result);
//print_r("SELECT ex_code FROM exam_code WHERE ex_code='1234'");die();
if ($count == 1) {
    while ($row = mysqli_fetch_array($result)) {
        $code = $row['code'];
    }
    $_SESSION["code"] = $code;
    header("location:account.php?q=1");
} else
       header("location:index.php");
   // header("location:$ref?w=Wrong Username or Password");


?>