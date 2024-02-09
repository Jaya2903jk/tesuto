

<?php
	$host="localhost";
$username="smsvelte_vasset";
$password="hoe6KG99ru8T";
$database="smsvelte_asset";

$con=mysqli_connect("$host","$username","$password","$database");
if(!$con){
    header("location:./errors/db.php");
      die();
}else{
    //echo "Database connected";
}

?>
