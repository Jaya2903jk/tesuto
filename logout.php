<?php
session_start();
if (isset($_SESSION['student_username'])) {
    session_destroy();
}
$ref = @$_GET['q'];
// header("location:index.php");https://apps.veltech.edu.in/exams/tesuto/student/index.php
header("location:https://apps.veltech.edu.in/exams/tesuto/index.php");
?>