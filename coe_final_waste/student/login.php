<?php
session_start();
if (isset($_SESSION["student_username"])) {
    session_destroy();
}
include_once 'dbConnection.php';
$ref      = @$_GET['q'];
$username = $_POST['username'];
$password1 = $_POST['password'];

$username = stripslashes($username);
$username = addslashes($username);
$password = stripslashes($password);
$password = addslashes($password);
$password = md5($password);
//print_r("SELECT name,branch FROM user WHERE username = '$username' and password = '$password1'");die();
$result = mysqli_query($con, "SELECT name,branch FROM user WHERE username = '$username' and password = '$password1'") or die('Error');
$count = mysqli_num_rows($result);
if ($count == 1) {
    while ($row = mysqli_fetch_array($result)) {
        $name = $row['name'];
        $branch = $row['branch'];
    }
   $branch_result = mysqli_query($con, "SELECT title FROM  quiz WHERE title = '$branch'") or die('Error'); 
   $count = mysqli_num_rows($branch_result);
   if($count==1){
     $_SESSION["name"]     = $name;
    $_SESSION["student_username"] = $username;
   header("location:account.php?q=99");
  //  header("location:account.php?q=1");
}else{
    header("location:$ref?w=Your not Eligible to atten the exam");
}
   
} else
    header("location:$ref?w=Wrong Username or Password");


?>