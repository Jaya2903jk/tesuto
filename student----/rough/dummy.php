<?php
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Veltech Online Examination</title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

 
  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 <!--  <script type="text/javascript">
      $(document).ready(function() {
    $('html').on('keypress', function(key) {
        if((key.charCode < 97 || key.charCode > 122) && (key.charCode < 65 || key.charCode > 90) && (key.charCode != 45)) {
            return false;   
        }
    });
   
});
  </script> -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<?php
if (@$_GET['w']) {
    echo '<script>alert("' . @$_GET['w'] . '");</script>';
}
?>
<style>
    .booked {
        background-color: green; /* Define your style for booked seats */
        color: white;
        border: none;
 
/*  padding: 7px 12px;*/
  text-align: center;
  text-decoration: none;
  display: inline-block;
/*  font-size: 16px;*/
    }

    .available {
        background-color: red; /* Define your style for available seats */
        color: white;
        border: none;
 
/*  padding: 7px 12px;*/
  text-align: center;
  text-decoration: none;
  display: inline-block;
/*  font-size: 16px;*/
    }
</style>
</head>
<?php
include_once 'dbConnection.php';
?>
<body>
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo"><img src="../logo-white.png" style="width: 18%;"></span></div>
<div class="col-md-4 col-md-offset-2">
 <?php
include_once 'dbConnection.php';
session_start();
//     if($_SESSION['username']){
// $user=$_SESSION['username'];
//      $result = mysqli_query($con, "SELECT * FROM  user WHERE username  = '$user'");
//    while ($row = mysqli_fetch_array($result)) {
//         $branch=$row['branch'];
//    }
//     $query = mysqli_query($con, "SELECT Distinct branch FROM  questions WHERE branch  = '$branch'");
//     while ($row = mysqli_fetch_array($query)) {
//         $eid=$row['eid'];
//        // print_r($eid);
//    }
//    // if($eid==''){
//    //    header('location:http://localhost/coe_final%20/student/account.php?q=1');
//    // }

//     }
if (!(isset($_SESSION['student_username']))) {
    header("location:index.php");

} else {
    $name     = $_SESSION['name'];
    $username = $_SESSION['student_username'];
    
    include_once 'dbConnection.php';
    echo '<span class="pull-right top title1" ><span style="color:white"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span><span class="log log1" style="color:lightyellow">' . $name . '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="logout.php?q=dummy.php" style="color:lightyellow"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Logout</button></a></span>';
}
$user=$_SESSION["student_username"];
$result = mysqli_query($con, "SELECT * FROM  tesuto_user WHERE username  = '$user'");
 while ($row = mysqli_fetch_array($result)) {
        $branch=$row['branch'];
//print_r($branch);
   }
  
    ?>

</div>
</div></div>
<div class="bg">
<nav class="navbar navbar-default title1">

  <div class="container-fluid">
   <?php 
   //  if (isset($_GET['start']) && $_GET['start'] == "start")
   // {
    $q = mysqli_query($con, "SELECT * FROM tesuto_history WHERE username='$username'") or die('Error156');
                while ($row = mysqli_fetch_array($q)) {
                    $status = $row['status'];
                }
               
              // if($status=="ongoing" &&  isset($_SESSION["code"])
                if ($status == "ongoing" && isset($_SESSION["code"])){
                echo'<font size="3" style="margin-left:1400px;font-family:\'typo\' font-size:20px; font-weight:bold;color:darkred">Time Left : </font><span  style="margin-left:20px;"><font style="font-family:\'typo\';font-size:20px;font-weight:bold;color:darkblue;" id="countdown"></font></span><br>';
               }
  
  //} 
  ?>
  </div>
</nav>
<div class="container">
<div class="row">
<div class="col-md-12">
    <?php

if (@$_GET['q']==99)

{
if($_SESSION['6e447159fg']=='6e447159fg')
{
 echo "<script>alert('Dear Candidate,Your Online Examination is successfully completed');</script>";
}
    echo '<div class="panel" id="exam_code_check"><table class="table table-striped title1 "  style="vertical-align:middle">
     <form action="dummy.php?q=1" method="post">

<tr><td style="vertical-align:middle"><b>Enter the Exam Code</b></td><td style="vertical-align:middle"><input type="text" name="ex_code" class="form-control" required></td><td><button type="submit" class="btn btn-primary">submit</button></td></tr></form>';
}

?>

<?php

if (@$_GET['q'] == 1) 
{
$code=$_POST['ex_code'];
$query=mysqli_query($con,"SELECT * from tesuto_exam_code where ex_code='$code'");
$count = mysqli_num_rows($query);
while ($row = mysqli_fetch_array($query)) {
    $code_exam = $row['ex_code'];
    }
if($count==1){
    $_SESSION["code"]=$code_exam;
}else{
     header("location:dummy.php?q=99");
}
   if(isset($_SESSION["code"]))
   {
   

    $result = mysqli_query($con, "SELECT * FROM tesuto_quiz WHERE status = 'enabled' And title='$branch'  ORDER BY date DESC") or die('Error');
    echo '<div class="panel"><table class="table table-striped title1"  style="vertical-align:middle">
<tr>';
// <td style="vertical-align:middle"><b>S.No.</b></td>
echo'<td style="vertical-align:middle"><b>Department</b></td>
<td style="vertical-align:middle"><b>Total question</b></td>
<td style="vertical-align:middle"><b>Time limit</b></td>
<td style="vertical-align:middle"><b>Action</b></td>
</tr>';
    $c = 1;
    while ($row = mysqli_fetch_array($result)) {
        $title   = $row['title'];
        $total   = $row['total'];
       
       
        $time    = $row['time'];
        $eid     = $row['eid'];
        $q12 = mysqli_query($con, "SELECT score FROM tesuto_history WHERE eid='$eid' AND username='$username'") or die('Error98');
        $rowcount = mysqli_num_rows($q12);

// \\--------------------\\
    $snn = mysqli_query($con, "SELECT sn AS s FROM tesuto_questions WHERE eid = '$eid' AND branch = '$branch' ORDER BY sn DESC LIMIT 1") or die('Error');
$count = mysqli_num_rows($snn);
while ($row = mysqli_fetch_array($snn)) {
    $nq = $row['s']; 
   
}


$_SESSION['n']=$nq;
$n = $_SESSION['n'];
$q='quiz';
$step=2;
$start="start";
//$sessionData = $nq; 
$key = bin2hex(random_bytes(32)); // Replace this with a strong, secret key

$method = "aes-256-cbc";
$ivLength = openssl_cipher_iv_length($method);
$iv = openssl_random_pseudo_bytes($ivLength);

$encryptedData = openssl_encrypt("q=$q&step=$step&eid=$eid&n=$n&t=$total&start=$start",$method, $key, 0, $iv);
// Encode the encrypted data and IV for URL
$encodedData = urlencode(base64_encode($encryptedData));
$encodedIV = urlencode(base64_encode($iv));
$encodedKey = urlencode(base64_encode($key));

// \\--------------------\\
if($rowcount == 0)
 {

            //echo '<tr><td style="vertical-align:middle">' . $c++ . '</td>
            echo '<td style="vertical-align:middle">' . $title . '</td>
            <td style="vertical-align:middle">' . $total . '</td>
            <td style="vertical-align:middle;display:none;">+' . $correct . '</td>
            <td style="vertical-align:middle;display:none;">-' . $wrong . '</td>
            <td style="vertical-align:middle;display:none;">' . $correct * $total . '</td>
             <td style="vertical-align:middle">' . $time . '&nbsp;min</td>
  <td style="vertical-align:middle"><b><a href="http://localhost/veltech/exam/tesuto/student/dummy.php?data=<?= '.$encodedData.' ?>&iv=<?= '.$encodedIV.' ?>&key=<?= '.$encodedKey.' ?>" class="btn" style="color:#FFFFFF;background:darkgreen;font-size:12px;padding:7px;padding-left:10px;padding-right:10px"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span><b>Start</b></span></a></b></td>

  </tr>';
 
  $_SESSION['exam_id']=$eid;
  $_SESSION['total']=$total;
        }
         else
          {

            $q = mysqli_query($con, "SELECT * FROM tesuto_history WHERE username='$_SESSION[student_username]' AND eid='$eid' ") or die('Error197');
            while ($row = mysqli_fetch_array($q)) {
               $timec  = $row['timestamp'];
                $status = $row['status'];
            }
            $q = mysqli_query($con, "SELECT * FROM tesuto_quiz WHERE eid='$eid' ") or die('Error197');
            while ($row = mysqli_fetch_array($q)) 
            {
                $ttimec  = $row['time'];
                $qstatus = $row['status'];
            }
            $remaining = (($ttimec * 60) - ((time() - $timec)));
            //print_r($remaining);
            if ($remaining > 0 && $qstatus == "enabled" && $status == "ongoing") 
            {
                $_SESSION['n']=$nq;
                $_SESSION['continue']='61454rff221';
                //<tr style="color:darkgreen"><td style="vertical-align:middle">' . $c++ . '</td>
                echo '<td style="vertical-align:middle">' . $title . '&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
                <td style="vertical-align:middle">' . $total . '</td>
                <td style="vertical-align:middle;display:none;">+' . $correct . '</td>
                <td style="vertical-align:middle;display:none;">-' . $wrong . '</td>
                <td style="vertical-align:middle;display:none;">' . $correct * $total . '</td>
                <td style="vertical-align:middle">' . $time . '&nbsp;min</td>
  <td style="vertical-align:middle"><b><a href="dummy.php?q=quiz&step=2&eid=' . $eid . '&n='.$nq.'&t=' . $total . '&start=start" class="btn" style="margin:0px;background:darkorange;color:white">&nbsp;<span class="title1"><b>Continue</b></span></a></b></td></tr>';
        
            } else {
                //<tr style="color:darkgreen"><td style="vertical-align:middle">' . $c++ . '</td>
                echo '<td style="vertical-align:middle">' . $title . '&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td style="vertical-align:middle">' . $total . '</td>
    <td style="vertical-align:middle;display:none;">+' . $correct . '</td>
    <td style="vertical-align:middle;display:none;">-' . $wrong . '</td>
    <td style="vertical-align:middle;display:none;">' . $correct * $total . '</td>
                <td style="vertical-align:middle">' . $time . '&nbsp;min</td>
  <td style="vertical-align:middle"><b><a href="dummy.php?q=1" class="btn disabled" style="margin:0px;background:darkred;color:white">&nbsp;<span class="title1"><b>Exam Over</b></span></a></b></td></tr>';
            }
        }
    }
    $c = 0;
    // echo '</table></div><div class="panel" style="padding-top:1px;padding-left:15%;padding-right:15%;word-wrap:break-word"><h3 align="center" style="font-family:calibri">:: General Instructions ::</h3><br /><ul type="circle"><font style="font-size:14px;font-family:calibri">';
    $file = fopen("instructions.txt", "r");
    // while (!feof($file))
    //  {
    //     echo '<li>';
    //     $string = fgets($file);
    //     $num    = strlen($string) - 1;
    //     $c      = str_split($string);
    //     for ($i = 0; $i < $num; $i++) {
    //         $last = $c[$i];
    //         if ($c[$i] == ' ' && $last == ' ') {
    //             echo '&nbsp;';
    //         } else {
    //             echo $c[$i];
    //         }
    //     }
    //     echo "</li><br />";
    // }
    
    fclose($file);
    echo '</font></ul></div>';
    
}
} //exam code
?>

<?php

$encryptedDataFromURL = base64_decode(urldecode($_GET['data']));
$ivFromURL = base64_decode(urldecode($_GET['iv']));
$keyFromURL = base64_decode(urldecode($_GET['key']));

// Use the key, method, and IV for decryption
$method = "aes-256-cbc";

// Ensure the IV is the correct length
$ivLength = openssl_cipher_iv_length($method);
$ivFromURL = str_pad($ivFromURL, $ivLength, "\0");

// Decrypt the data
$decryptedData = openssl_decrypt($encryptedDataFromURL, $method, $keyFromURL, 0, $ivFromURL);

// Parse the decrypted data into individual variables
parse_str($decryptedData, $decryptedValues);

$eid = $decryptedValues['eid'];
$n = $decryptedValues['n'];
$t = $decryptedValues['t'];
$q = $decryptedValues['q'];
$step = $decryptedValues['step'];
$start = $decryptedValues['start'];

// if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2 && isset($_SESSION['6e447159425d2d']) && $_SESSION['6e447159425d2d'] == "6e447159425d2d" && isset($_GET['endquiz'])== 'end') 
// {
//     unset($_SESSION['6e447159425d2d']);
//     $_SESSION['6e447159fg']='6e447159fg';
//     $q = mysqli_query($con, "UPDATE tesuto_history SET status='finished' WHERE username='$_SESSION[student_username]' AND eid='$_GET[eid]' ") or die('Error197');
//         $q = mysqli_query($con, "SELECT * FROM tesuto_history WHERE eid='$_GET[eid]' AND username='$_SESSION[username]'") or die('Error156');
//                 while ($row = mysqli_fetch_array($q)) {
//                     $s = $row['score'];
//                     $scorestatus = $row['score_updated'];
//                 }
//                  if($scorestatus=="false"){
//                     $q = mysqli_query($con, "UPDATE tesuto_history SET score_updated='true' WHERE username='$_SESSION[student_username]' AND eid='$_GET[eid]' ") or die('Error197');
//                     $q = mysqli_query($con, "SELECT * FROM tesuto_rank WHERE username='$username'") or die('Error161');
//                     $rowcount = mysqli_num_rows($q);
//                     if ($rowcount == 0) {
//                         $q2 = mysqli_query($con, "INSERT INTO tesuto_rank VALUES(NULL,'$username','$s',NOW())") or die('Error165');
//                     } else {
//                         while ($row = mysqli_fetch_array($q)) {
//                             $sun = $row['score'];
//                         }
                        
//                         $sun = $s + $sun;
//                         $q = mysqli_query($con, "UPDATE `tesuto_rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'") or die('Error174');
//                     }
//                 }
//                 //header('location:https://apps.veltech.edu.in/exams/tesuto/student/account.php?q=1');
//             header('location:http://localhost/veltech/exam/tesuto/student/dummy.php?q=1');
//            // header('location:account.php?q=result&eid='.$_GET[eid]);
// }

 

//if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2 && isset($_GET['start']) && $_GET['start'] == "start" && (!isset($_SESSION['6e447159425d2d'])))
 if ($q == 'quiz' && $step == 2 && isset($start) && $start == "start" && (!isset($_SESSION['6e447159425d2d'])))
 {
  
   $_SESSION['eid']=$eid;
    $eid=$_SESSION['eid'];
    $query = mysqli_query($con, "SELECT * FROM tesuto_history WHERE username='$username' AND eid='$eid' ") or die('Error197');
     
    if (mysqli_num_rows($q) > 0)
     {
        //echo 'hi';die();
        $q = mysqli_query($con, "SELECT * FROM tesuto_history WHERE username='$_SESSION[student_username]' AND eid='$eid' ") or die('Error197');
        while ($row = mysqli_fetch_array($q)) {
            $timel  = $row['timestamp'];
            $status = $row['status'];
        }

        $q = mysqli_query($con, "SELECT * FROM tesuto_quiz WHERE eid='$eid' ") or die('Error197');
        while ($row = mysqli_fetch_array($q)) {
            $ttimel  = $row['time'];
            $qstatus = $row['status'];
        }
        $remaining = (($ttimel * 60) - ((time() - $timel)));
        if ($status == "ongoing" && $remaining > 0 && $qstatus == "enabled") {
            $_SESSION['6e447159425d2d'] = "6e447159425d2d";
            header('location:dummy.php?q='.$q.'&step='.$step.'&eid=' . $eid . '&n=' . $n . '&t='. $t);
            

        } else {
                $q = mysqli_query($con, "UPDATE tesuto_history SET status='finished' WHERE username='$_SESSION[student_username]' AND eid='$eid' ") or die('Error197');
        $q = mysqli_query($con, "SELECT * FROM tesuto_history WHERE eid='$eid' AND username='$_SESSION[student_username]'") or die('Error156');
                while ($row = mysqli_fetch_array($q)) {
                    $s = $row['score'];
                    $scorestatus = $row['score_updated'];
                }
                 if($scorestatus=="false"){
                    $q = mysqli_query($con, "UPDATE tesuto_history SET score_updated='true' WHERE username='$_SESSION[student_username]' AND eid='$eid' ") or die('Error197');
                    $q = mysqli_query($con, "SELECT * FROM tesuto_rank WHERE username='$username'") or die('Error161');
                    $rowcount = mysqli_num_rows($q);
                    if ($rowcount == 0) {
                        $q2 = mysqli_query($con, "INSERT INTO tesuto_rank VALUES(NULL,'$username','$s',NOW())") or die('Error165');
                    } else {
                        while ($row = mysqli_fetch_array($q)) {
                            $sun = $row['score'];
                        }
                        
                        $sun = $s + $sun;
                        $q = mysqli_query($con, "UPDATE `tesuto_rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'") or die('Error174');
                    }
                }
            header('location:dummy.php?q=result&eid=' . $eid);
        }
        
    } else {
         
        $time = time();

        $query = mysqli_query($con, "INSERT INTO tesuto_history VALUES(NULL,'$username','$eid' ,'0','0','0','0',NOW(),'$time','ongoing','false','0')") or die('Error137');
        $_SESSION['6e447159425d2d'] = "6e447159425d2d";
print_r($q);die();
        header('location:dummy.php?q='.$q.'&step='.$step.'&eid=' . $eid . '&n=' . $n . '&t=' . $t);
    }
}


if ($q == 'quiz' && $step == 2 && isset($_SESSION['6e447159425d2d']) && $_SESSION['6e447159425d2d'] == "6e447159425d2d") 
{
print_r($q);die();
    $query = mysqli_query($con, "SELECT * FROM tesuto_history WHERE username='$username' AND eid='$eid' ") or die('Error197');
   
    if (mysqli_num_rows($q) > 0)
     {
        $q = mysqli_query($con, "SELECT * FROM tesuto_history WHERE username='$_SESSION[student_username]' AND eid='$eid' ") or die('Error197');
        while ($row = mysqli_fetch_array($q)) {
            $time   = $row['timestamp'];
            $status = $row['status'];
        }
        $q = mysqli_query($con, "SELECT * FROM tesuto_quiz WHERE eid='$eid' ") or die('Error197');
        while ($row = mysqli_fetch_array($q)) {
            $ttime   = $row['time'];
            $qstatus = $row['status'];
        }
        $remaining = (($ttime * 60) - ((time() - $time)));


        if ($status == "ongoing" && $remaining > 0 && $qstatus == "enabled") 
        {
            $q = mysqli_query($con, "SELECT * FROM tesuto_history WHERE username='$_SESSION[student_username]' AND eid='$eid' ") or die('Error197');
            while ($row = mysqli_fetch_array($q)) {
                $time = $row['timestamp'];
            }
            $q = mysqli_query($con, "SELECT * FROM tesuto_quiz WHERE eid='$eid' ") or die('Error197');
            while ($row = mysqli_fetch_array($q)) {
                $ttime = $row['time'];
            }
            $remaining = (($ttime * 60) - ((time() - $time)));
            echo '<script>
var seconds = ' . $remaining . ' ;
function end(){
  data = prompt("Are you sure to end this Quiz? Remember, once finished, you wont be able to continue anymore and final results will be displayed. If you want to continue then enter \\"yes\\" in the textbox below and press enter");
  if(data=="yes"||data=="YES"){
    window.location ="dummy.php?q='.$q.'&step='.$step.'&eid=' . $eid . '&n=' . $n. '&t=' . isset($t) . '&endquiz=end";

  }
}
function enable(){
  document.getElementById("sbutton").removeAttribute("disabled");

}
function frmreset(){
  document.getElementById("sbutton").setAttribute("disabled","true");
  document.getElementById("qform").reset();
}
    function secondPassed() {
    var minutes = Math.round((seconds - 30)/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds; 
    }
    document.getElementById(\'countdown\').innerHTML = minutes + ":" +    remainingSeconds;
    if (seconds <= 0) {
        clearInterval(countdownTimer);
        document.getElementById(\'countdown\').innerHTML = "Time Over...";
        window.location ="dummy.php?q=quiz&step=2&eid=' . $eid . '&n=' . $n . '&t=' . isset($t) . '&endquiz=end";
    } else {    
        seconds--;
    }
    }
var countdownTimer = setInterval(\'secondPassed()\', 1000);
</script>';


            echo '<br><span class="timer btn btn-primary" style="margin-left:970px" onclick="end()"><span class=" glyphicon glyphicon-off"></span>&nbsp;&nbsp;<font style="font-size:12px;font-weight:bold">Finish Quiz</font></span>';
            // $eid   = @$_GET['eid'];
            // $sn    = @$_GET['n'];
            // $total = @$_GET['t'];
$eid   = $eid;
            $sn    = $n;
            $total = $t;
// $snn = mysqli_query($con, "SELECT sn AS s FROM tesuto_questions WHERE eid = '$eid' AND branch = '$branch' ORDER BY sn DESC LIMIT 1") or die('Error');
// $count = mysqli_num_rows($snn);
// while ($row = mysqli_fetch_array($snn)) {
//     $sn = $row['s']; 
  
// }
 // $_GET['n']=$sn;
 

    if(($_GET['v']=='sum') && ($n==$total)){
 // echo 'hi';
//print_r($_SESSION["view"]);
    if($_SESSION["view"]=='total_view')
                {
echo'<div class="panel" style="margin-right:5%;margin-left:5%;margin-top:10px;border-radius:10px">
<b> <table class="table-bordered table-responsive">
<h2>Total Question</h2>
<tr>';
$get_exam_id=$eid;
//
$get_all_question= mysqli_query($con,"SELECT * FROM tesuto_questions WHERE eid='$get_exam_id'");

 while($row = mysqli_fetch_array($get_all_question))
 {

   $popular[] = $row['qid'];
 }
$i=0;
//print_r($i);
for ($j = count($popular) - 1; $j >= 0; $j--) {
    $value = $popular[$j];
    $query = "SELECT * FROM tesuto_user_answer WHERE eid='$get_exam_id' AND username='$_SESSION[student_username]' AND qid='$value'";
    $result = mysqli_query($con, $query);
    $rowcount = mysqli_num_rows($result);

    if ($rowcount > 0) {
        $buttonClass = 'booked';
        $show = 'Edit';
        $c = "btn btn-success";
    } else {
        $buttonClass = 'available';
        $show = 'Answer';
        $c = "btn btn-danger";
    }
// echo '<pre>';
//                 echo $j;
//                 echo '</pre>';

     $count_org = $j + 1;
    $count = $i + 1;
  $i++;
    if ($count % 10 === 1) {
        if ($i > 1) {
            echo '</tr>';
        }
        echo '<tr>';
    }

    echo '<td><a class="' . $c . '" href="dummy.php?q='.$q.'&step='.$step.'&eid=' . $eid . '&n=' . $count_org . '&t=' . $total . '" class="text-light" style="color:white;" role="button"><b>' . $count . '-</b><b>' . $show . '</b></a></td>';
     
}

  echo '<div style="font-size:20px;font-weight:bold;font-family:calibri;margin:10px"></div></tr></table></b></div>'; 
 
                }
                header('location:dummy.php?q=result&eid=' . $eid);

exit();
            }
          

//////////////////--------------
            $q     = mysqli_query($con, "SELECT * FROM tesuto_questions WHERE eid='$eid' AND sn='$sn' And branch='$branch' ");
            
            echo '<div class="panel" style="margin-right:5%;margin-left:5%;margin-top:10px;border-radius:10px">';
            while ($row = mysqli_fetch_array($q)) {
                $qns = stripslashes($row['qns']);
                $qid = $row['qid'];
$url = 'http://localhost/veltech/exam/tesuto/admin/uploads/' . $qns;
echo '<b><pre style="background-color:white"><div style="font-size:20px;font-weight:bold;font-family:calibri;margin:10px">' . $sn . ' :
 <img src="' . $url . '"> </div></pre></b>';
            }
              // ------------------------//
            echo '<form id="qform" action="update_odd.php?q='.$q.'&step='.$step.'&eid=' . $eid . '&n=' . $sn . '&t=' . $total . '&qid=' . $qid . '" method="POST"  class="form-horizontal">
<br />';
            $q = mysqli_query($con,"SELECT * FROM tesuto_user_answer WHERE qid='$qid' AND username='$_SESSION[student_username]' AND eid='$eid'") or die("Error222");
            if (mysqli_num_rows($q) > 0){
                $row = mysqli_fetch_array($q);
                $ans = $row['ans'];
                $q = mysqli_query($con,"SELECT * FROM tesuto_options WHERE qid='$qid' AND optionid='$ans'") or die("Error222");
                $row = mysqli_fetch_array($q);
                $ans = $row['option'];

            } else {

                $ans = "";
            }
             if($ans)
                    {
              $select = true;
                }
                else{
                 $select = false; 
                }
            if (strlen($ans) > 0) {
                echo "<font style=\"color:green;font-size:12px;font-weight:bold\">Selected answer: </font><font style=\"color:#565252;font-size:12px;\">" . $ans . "</font>&nbsp;&nbsp;<a href=update_odd.php?q=quiz&step=2&eid=$eid&n=$sn&t=$total&qid=$qid&delanswer=delanswer></a><br /><br />";
            }
            echo '<div class="funkyradio">';
            $q = mysqli_query($con, "SELECT * FROM tesuto_options WHERE qid='$qid' ");
            while ($row = mysqli_fetch_array($q)) {
                $option   = stripslashes($row['option']);
                $optionid = $row['optionid'];
                // echo '<pre>';
                // echo $optionid;
                // echo '</pre>';
                $checked = ($option == $ans) ? 'checked' : '';
                echo '<div class="funkyradio-success"><input type="radio" id="' . $optionid . '" name="ans" value="' . $optionid . '"
                onclick="enable()" '. $checked .'> <label for="' . $optionid . '" style="width:50%"><div style="color:black;font-size:12px;word-wrap:break-word">&nbsp;&nbsp; ' . $option . '</div></label></div>';
            }


            if ($t > $n && $n!= 1) {
                echo 'middle';
                                $_SESSION["view"] = "total_view";
                echo '<br /><a href="dummy.php?q=quiz&step=2&eid=' . $eid . '&n=' . ($sn + 1) . '&t=' . $total . '" class="btn btn-primary" style="height:30px"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"  style="font-size:12px"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-success" disabled="true" id="sbutton" style="height:30px"><span class="glyphicon glyphicon-lock" style="font-size:12px" aria-hidden="true"></span><font style="font-size:12px;font-weight:bold"> Lock</font></button>&nbsp;&nbsp;&nbsp;&nbsp;';
                // <button type="button" class="btn btn-default" onclick="frmreset()" style="height:30px"></span><font style="font-size:12px;font-weight:bold">Reset</font></button>
                echo'&nbsp;&nbsp;&nbsp;&nbsp;<a href="dummy.php?q=quiz&step=2&eid=' . $eid . '&n=' . ($sn - 1) . '&t=' .$total.'" class="btn btn-primary" style="height:30px"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"  style="font-size:12px"></span></a></form><br><br>';
                // q=quiz&step=2&eid=Exam_230001&n=10&t=10&v=sum
                 echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-default" href="dummy.php?q=quiz&step=2&eid=' . $eid .'&n=' .$total . '&t='. $total . '&v=sum" role="button">View Summary</a>  &nbsp;&nbsp;&nbsp;&nbsp;</form><br><br>';

            }
else if ($t > $n && $n == 1) 
            // else if ($_GET["t"] == $_GET["n"])  

            {
echo 'now last';
 
                $_SESSION["view"] = "total_view";
                // echo '<br /><a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=' . ($sn - 1) . '&t=' . $total . '" class="btn btn-primary" style="height:30px"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"  style="font-size:12px"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-default" disabled="true" id="sbutton" style="height:30px"><span class="glyphicon glyphicon-lock" style="font-size:12px" aria-hidden="true"></span><font style="font-size:12px;font-weight:bold"> Lock</font></button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-default" onclick="frmreset()" style="height:30px"></span><font style="font-size:12px;font-weight:bold">View Summary</font></button>&nbsp;&nbsp;&nbsp;&nbsp;</form><br><br>';
                echo '<br/><button type="submit" class="btn btn-primary" disabled="true" id="sbutton" style="height:30px"><span class="glyphicon glyphicon-lock" style="font-size:12px" aria-hidden="true"></span><font style="font-size:12px;font-weight:bold"> Lock</font></button>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-default" href="dummy.php?q=quiz&step=2&eid=' . $eid .'&n=' .$total . '&t='. $total . '&v=sum" role="button">View Summary</a>  &nbsp;&nbsp;&nbsp;&nbsp;</form><br><br>';

            } 
         //else if ($_GET["t"] > $_GET["n"] && $_GET["n"] == 1) 
        else if ($t == $n)
            {
                echo 'first';
                $n=$n;
                $_SESSION["view"] = "total_view";
                echo '<br />&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-default" disabled="true" id="sbutton" style="height:30px"><span class="glyphicon glyphicon-lock" style="font-size:12px" aria-hidden="true"></span><font style="font-size:12px;font-weight:bold">Lock<font></button>&nbsp;&nbsp;&nbsp;&nbsp;';
                // <button type="button" class="btn btn-default" onclick="frmreset()" style="height:30px"></span><font style="font-size:12px;font-weight:bold">Reset</font></button>';
                echo '&nbsp;&nbsp;&nbsp;&nbsp;<a href="dummy.php?q='.$q.'&step='.$step.'&eid=' . $eid . '&n=' . ($sn - 1) . '&t=' . $total . '" class="btn btn-primary" style="height:30px"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"  style="font-size:12px">Next</span></a></form><br><br>';

                  echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-default" href="dummy.php?q='.q.'&step='.$step.'&eid=' . $eid .'&n=' .$total . '&t='. $total . '&v=sum" role="button">View Summary</a>  &nbsp;&nbsp;&nbsp;&nbsp;</form><br><br>';

            }
           

             else {
            }
            echo '</div>';
            echo '<div class="panel" style="text-align:center">';
            $q = mysqli_query($con, "SELECT * FROM tesuto_questions WHERE eid='$eid'") or die("Error222");
            $i = 1;
            while ($row = mysqli_fetch_array($q)) {
                $ques[$row['qid']] = $i;
                $i++;
            }
            $q = mysqli_query($con, "SELECT * FROM tesuto_user_answer WHERE eid='$eid' AND username='$_SESSION[student_username]'") or die("Error222a");
            $i = 1;
            while ($row = mysqli_fetch_array($q)) {
                if (isset($ques[$row['qid']])) {
                    $quesans[$ques[$row['qid']]] = true;
                }
            }


        } else {
            unset($_SESSION['6e447159425d2d']);
            $q = mysqli_query($con, "UPDATE tesuto_history SET status='finished' WHERE username='$_SESSION[student_username]' AND eid='$eid' ") or die('Error197');
        $q = mysqli_query($con, "SELECT * FROM tesuto_history WHERE eid='$eid' AND username='$_SESSION[student_username]'") or die('Error156');
                while ($row = mysqli_fetch_array($q)) {
                    $s = $row['score'];
                    $scorestatus = $row['score_updated'];
                }
                 if($scorestatus=="false"){
                    $q = mysqli_query($con, "UPDATE tesuto_history SET score_updated='true' WHERE username='$_SESSION[student_username]' AND eid='$eid' ") or die('Error197');
                    $q = mysqli_query($con, "SELECT * FROM tesuto_rank WHERE username='$username'") or die('Error161');
                    $rowcount = mysqli_num_rows($q);
                    if ($rowcount == 0) {
                        $q2 = mysqli_query($con, "INSERT INTO tesuto_rank VALUES(NULL,'$username','$s',NOW())") or die('Error165');
                    } else {
                        while ($row = mysqli_fetch_array($q)) {
                            $sun = $row['score'];
                        }
                        
                        $sun = $s + $sun;
                        $q = mysqli_query($con, "UPDATE `tesuto_rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'") or die('Error174');
                    }
                }
            header('location:dummy.php?q=result&eid=' . $eid);
        }
    } else {
        unset($_SESSION['6e447159425d2d']);
        $q = mysqli_query($con, "UPDATE tesuto_history SET status='finished' WHERE username='$_SESSION[student_username]' AND eid='$eid' ") or die('Error197');
        $q = mysqli_query($con, "SELECT * FROM tesuto_history WHERE eid='$eid' AND username='$_SESSION[student_username]'") or die('Error156');
                while ($row = mysqli_fetch_array($q)) {
                    $s = $row['score'];
                    $scorestatus = $row['score_updated'];
                }

                if($scorestatus=="false"){
                    $q = mysqli_query($con, "UPDATE tesuto_history SET score_updated='true' WHERE username='$_SESSION[student_username]' AND eid='$eid' ") or die('Error197');
                    $q = mysqli_query($con, "SELECT * FROM tesuto_rank WHERE username='$username'") or die('Error161');
                    $rowcount = mysqli_num_rows($q);
                    if ($rowcount == 0) {
                        $q2 = mysqli_query($con, "INSERT INTO tesuto_rank VALUES(NULL,'$username','$s',NOW())") or die('Error165');
                    } else {
                        while ($row = mysqli_fetch_array($q)) {
                            $sun = $row['score'];
                        }
                        
                        $sun = $s + $sun;
                        $q = mysqli_query($con, "UPDATE `tesuto_rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'") or die('Error174');
                    }
                }
            
            header('location:dummy.php?q=result&eid=' .$eid);
           // header('http://localhost/coe_final%20/student/account.php?q=1');
    }
}
if (@$_GET['q'] == 'result11' && $eid) {
    $eid = @$_GET['eid'];
    $q = mysqli_query($con, "SELECT * FROM tesuto_quiz WHERE eid='$eid' ") or die('Error157');
    while ($row = mysqli_fetch_array($q)) {
        $total = $row['total'];
    }
    $q = mysqli_query($con, "SELECT * FROM tesuto_history WHERE eid='$eid' AND username='$username' ") or die('Error157');
    
    while ($row = mysqli_fetch_array($q)) {
        $s      = $row['score'];
        $w      = $row['wrong'];
        $r      = $row['correct'];
        $status = $row['status'];
    }
    if ($status == "finished") {
        echo '<div class="panel">
<center><h1 class="title" style="color:#660033">Result</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';
        echo '<tr style="color:darkblue"><td style="vertical-align:middle">Total Questions</td><td style="vertical-align:middle">' . $total . '</td></tr>
      <tr style="color:darkgreen"><td style="vertical-align:middle">Correct Answer&nbsp;<span class="glyphicon glyphicon-ok-arrow" aria-hidden="true"></span></td><td style="vertical-align:middle">' . $r . '</td></tr> 
    <tr style="color:red"><td style="vertical-align:middle">Wrong Answer&nbsp;<span class="glyphicon glyphicon-remove-arrow" aria-hidden="true"></span></td><td style="vertical-align:middle">' . $w . '</td></tr>
    <tr style="color:orange"><td style="vertical-align:middle">Unattempted&nbsp;<span class="glyphicon glyphicon-ban-arrow" aria-hidden="true"></span></td><td style="vertical-align:middle">' . ($total - $r - $w) . '</td></tr>
    <tr style="color:darkblue"><td style="vertical-align:middle">Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td style="vertical-align:middle">' . $s . '</td></tr>';
        $q = mysqli_query($con, "SELECT * FROM tesuto_rank WHERE  username='$username' ") or die('Error157');
        while ($row = mysqli_fetch_array($q)) {
            $s = $row['score'];
            echo '<tr style="color:#990000"><td style="vertical-align:middle">Overall Score&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td style="vertical-align:middle">' . $s . '</td></tr>';
        }
        echo '<tr></tr></table></div><div class="panel"><br /><h3 align="center" style="font-family:calibri">:: Detailed Analysis ::</h3><br /><ol style="font-size:20px;font-weight:bold;font-family:calibri;margin-top:20px">';
        $q = mysqli_query($con, "SELECT * FROM tesuto_questions WHERE eid='$eid'") or die('Error197');
        while ($row = mysqli_fetch_array($q)) {
            $question = $row['qns'];
            $qid      = $row['qid'];
            $q2 = mysqli_query($con, "SELECT * FROM tesuto_user_answer WHERE eid='$eid' AND qid='$qid' AND username='$_SESSION[student_username]'") or die('Error197');
            if (mysqli_num_rows($q2) > 0) {
                $row1         = mysqli_fetch_array($q2);
                $ansid        = $row1['ans'];
                $correctansid = $row1['correctans'];
                $q3 = mysqli_query($con, "SELECT * FROM tesuto_options WHERE optionid='$ansid'") or die('Error197');
                $q4 = mysqli_query($con, "SELECT * FROM tesuto_options WHERE optionid='$correctansid'") or die('Error197');
                $row2       = mysqli_fetch_array($q3);
                $row3       = mysqli_fetch_array($q4);
                $ans        = $row2['option'];
                $correctans = $row3['option'];
            } else {
                $q3 = mysqli_query($con, "SELECT * FROM tesuto_answer WHERE qid='$qid'") or die('Error197');
                $row1         = mysqli_fetch_array($q3);
                $correctansid = $row1['ansid'];
                $q4 = mysqli_query($con, "SELECT * FROM tesuto_options WHERE optionid='$correctansid'") or die('Error197');
                $row2       = mysqli_fetch_array($q4);
                $correctans = $row2['option'];
                $ans        = "Unanswered";
            }
            if ($correctans == $ans && $ans != "Unanswered") {
                echo '<li><div style="font-size:16px;font-weight:bold;font-family:calibri;margin-top:20px;background-color:lightgreen;padding:10px;word-wrap:break-word;border:2px solid darkgreen;border-radius:10px;">' . $question . ' <span class="glyphicon glyphicon-ok" style="color:darkgreen"></span></div><br />';
                echo '<font style="font-size:14px;color:darkgreen"><b>Your Answer: </b></font><font style="font-size:14px;">' . $ans . '</font><br />';
                echo '<font style="font-size:14px;color:darkgreen"><b>Correct Answer: </b></font><font style="font-size:14px;">' . $correctans . '</font><br />';
            } 
            else if ($ans == "Unanswered") {
                echo '<li><div style="font-size:16px;font-weight:bold;font-family:calibri;margin-top:20px;background-color:#f7f576;padding:10px;word-wrap:break-word;border:2px solid #b75a0e;border-radius:10px;">' . $question . ' </div><br />';
                echo '<font style="font-size:14px;color:darkgreen"><b>Correct Answer: </b></font><font style="font-size:14px;">' . $correctans . '</font><br />';
            } 
            else {
                echo '<li><div style="font-size:16px;font-weight:bold;font-family:calibri;margin-top:20px;background-color:#f99595;padding:10px;word-wrap:break-word;border:2px solid darkred;border-radius:10px;">' . $question . ' <span class="glyphicon glyphicon-remove" style="color:red"></span></div><br />';
                echo '<font style="font-size:14px;color:darkgreen"><b>Your Answer: </b></font><font style="font-size:14px;">' . $ans . '</font><br />';
                echo '<font style="font-size:14px;color:red"><b>Correct Answer: </b></font><font style="font-size:14px;">' . $correctans . '</font><br />';
                
            }
            echo "<br /></li>";
        }
        echo '</ol>';
        echo "</div>";
    } else {
        die("Thats a 404 Error bro. You are trying to access a wrong page");
    }
}
if (@$_GET['q'] == 2) {
    $q = mysqli_query($con, "SELECT * FROM tesuto_history WHERE username='$username' AND status='finished' ORDER BY date DESC ") or die('Error197');
    echo '<div class="panel title">
<table class="table table-striped title1" >
<tr><td style="vertical-align:middle"><b>S.N.</b></td><td style="vertical-align:middle"><b>Quiz</b></td><td style="vertical-align:middle"><b>Total Questions</b></td><td style="vertical-align:middle"><b>Right</b></td><td style="vertical-align:middle"><b>Wrong<b></td><td style="vertical-align:middle"><b>Unattempted<b></td><td style="vertical-align:middle"><b>Score</b></td><td style="vertical-align:middle"><b>Action<b></td></tr>';
    $c = 0;
    while ($row = mysqli_fetch_array($q)) {
        $eid = $row['eid'];
        $s   = $row['score'];
        $w   = $row['wrong'];
        $r   = $row['correct'];
        $q23 = mysqli_query($con, "SELECT * FROM tesuto_quiz WHERE  eid='$eid' ") or die('Error208');
        while ($row = mysqli_fetch_array($q23)) {
            $title = $row['title'];
            $total = $row['total'];
        }
        $c++;
         // echo '<tr><td style="vertical-align:middle">' . $c . '</td><td style="vertical-align:middle">' . $title . '</td><td style="vertical-align:middle">' . $total . '</td><td style="vertical-align:middle">' . $r . '</td><td style="vertical-align:middle">' . $w . '</td><td style="vertical-align:middle">' . ($total - $r - $w) . '</td><td style="vertical-align:middle">' . $s . '</td><td style="vertical-align:middle"><b><a href="account.php?q=result&eid=' . $eid . '" class="btn" style="margin:0px;background:darkred;color:white">&nbsp;<span class="title1"><b>View Result</b></td></tr>';
        echo '<tr><td style="vertical-align:middle">' . $c . '</td><td style="vertical-align:middle">' . $title . '</td><td style="vertical-align:middle">' . $total . '</td><td style="vertical-align:middle">' . $r . '</td><td style="vertical-align:middle">' . $w . '</td><td style="vertical-align:middle">' . ($total - $r - $w) . '</td><td style="vertical-align:middle">' . $s . '</td><td style="vertical-align:middle"><b><a href="dummy.php?q=result&eid=" class="btn" style="margin:0px;background:darkred;color:white">&nbsp;<span class="title1"><b>View Result1</b></td></tr>';
    }
    echo '</table></div>';
}
if (@$_GET['q'] == 3) {
    if(isset($_GET['show'])){
        $show = $_GET['show'];
        $showfrom = (($show-1)*10) + 1;
        $showtill = $showfrom + 9;
    }
    else{
        $show = 1;
        $showfrom = 1;
        $showtill = 10;
    }
    $q = mysqli_query($con, "SELECT * FROM tesuto_rank") or die('Error223');
    echo '<div class="panel title">
<table class="table table-striped title1" >
<tr><td style="vertical-align:middle"><b>Rank</b></td><td style="vertical-align:middle"><b>Name</b></td><td style="vertical-align:middle"><b>Branch</b></td><td style="vertical-align:middle"><b>Username</b></td><td style="vertical-align:middle"><b>Score</b></td></tr>';
    $c = $showfrom-1;
    $total = mysqli_num_rows($q);
    if($total >= $showfrom){
        $q = mysqli_query($con, "SELECT * FROM tesuto_rank ORDER BY score DESC, time ASC LIMIT ".($showfrom-1).",10") or die('Error223');
        while ($row = mysqli_fetch_array($q)) {
            $e = $row['username'];
            $s = $row['score'];
            $q12 = mysqli_query($con, "SELECT * FROM tesuto_user WHERE username='$e' ") or die('Error231');
            while ($row = mysqli_fetch_array($q12)) {
                $name     = $row['name'];
                $branch   = $row['branch'];
                $username = $row['username'];
            }
            $c++;
            echo '<tr><td style="color:#99cc32"><b>' . $c . '</b></td><td style="vertical-align:middle">' . $name . '</td><td style="vertical-align:middle">' . $branch . '</td><td style="vertical-align:middle">' . $username . '</td><td style="vertical-align:middle">' . $s . '</td><td style="vertical-align:middle">';
        }
    }
    else{
    }
    echo '</table></div>';
    echo '<div class="panel title"><table class="table table-striped title1" ><tr>';
    $total = round($total/10) + 1;
    if(isset($_GET['show'])){
        $show = $_GET['show'];
    }
    else{
        $show = 1;
    }
    if($show == 1 && $total==1){
    }
    else if($show == 1 && $total!=1){
        $i = 1;
        while($i<=$total){
            echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dummy.php?q=3&show='.$i.'">&nbsp;'.$i.'&nbsp;</a></td>';
            $i++;
        }
        echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dummy.php?q=3&show='.($show+1).'">&nbsp;>>&nbsp;</a></td>';
    }
    else if($show != 1 && $show==$total){
        echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dummy.php?q=3&show='.($show-1).'">&nbsp;<<&nbsp;</a></td>';

        $i = 1;
        while($i<=$total){
            echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dummy.php?q=3&show='.$i.'">&nbsp;'.$i.'&nbsp;</a></td>';
            $i++;
        }
    }
    else{
        echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dummy.php?q=3&show='.($show-1).'">&nbsp;<<&nbsp;</a></td>';
        $i = 1;
        while($i<=$total){
            echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dummy.php?q=3&show='.$i.'">&nbsp;'.$i.'&nbsp;</a></td>';
            $i++;
        }
        echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dummy.php?q=3&show='.($show+1).'">&nbsp;>>&nbsp;</a></td>';
    }
    echo '</tr></table></div>';
}
?>

</div></div></div></div>

<div class="row ">
 <div class="col-md-2 box"></div>
<div class="col-md-3 box">
<!-- <a href="#" data-toggle="modal" data-target="#developers" s style="color:lightyellow;" onmouseover="this.style('color:yellow')" target="new">Organized by Muki InfoTech,Erode</a> -->
</div>
<!-- Modal For Developers-->
<div class="modal fade title1" id="developers">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" style="font-family:'typo' "><span style="color:orange">Muki InfoTech</span></h4>
      </div>
	  
      <div class="modal-body">
        <p>
		<div class="row">
		<div class="col-md-4">
		 <img src="image/muki.jpg" width=100 height=100 alt="Mugunthan" class="img-rounded">
		 </div>
		 <div class="col-md-5">
		</div></div>
		</p>
      </div>
    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="col-md-2 box">
<!-- <a href="feedback.php" style="color:lightyellow;text-decoration:underline" onmouseover="this.style('color:yellow')" target="new">Feedback</a>-->
</div> 

</body>
</html>
