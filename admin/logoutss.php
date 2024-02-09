<?php
session_start();
//print_r($_SESSION['username']);die();
if (isset($_SESSION['username'])) {
   
    session_destroy();
}
$ref = @$_GET['q'];
// header("location:index.php");
header("location:https://apps.veltech.edu.in/exams/tesuto/admin/index.php");
?>