<?php
session_start();
if (isset($_SESSION['student_username'])) {
    session_destroy();
}
$ref = @$_GET['q'];
header("location:index.php");
?>