<?php

// Function to get the real client IP address
function getRealIpAddress() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ipAddress = $_SERVER['REMOTE_ADDR'];
    }
    return $ipAddress;
}

// Get the real IP address of the visitor
$realIpAddress = getRealIpAddress();

// Print the real IP address
echo "Your real IP address is: " . $realIpAddress;


die();
session_start();
if(isset($_SESSION['student_username']) && (!isset($_SESSION['key']))){
  // header('location:account.php?q=1');
   header('location:index.php?q=1');
}
// else if(isset($_SESSION['username']) && isset($_SESSION['key']) && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39'){
//    header('location:dash.php?q=0');
// }
else{}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title> Vel Tech Online Examination</title>
   
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/> 
  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<?php
if (@$_GET['w']) {
    echo '<script>alert("' . @$_GET['w'] . '");</script>';
}
?>
<script>
function validateForm() {
  var y = document.forms["form"]["name"].value; 
  if (y == null || y == "") {
    document.getElementById("errormsg").innerHTML="Name must be filled out.";
    return false;
  }
  var br = document.forms["form"]["branch"].value;
  if (br == "") {
    document.getElementById("errormsg").innerHTML="Please select your branch";
    return false;
  }
  if (m.length < 10) {
    document.getElementById("errormsg").innerHTML="Passwordr must be 12 digits long";
    return false;
  }
  var g = document.forms["form"]["gender"].value;
  if (g=="") {
    document.getElementById("errormsg").innerHTML="Please select your gender";
    return false;
  }
  var x = document.forms["form"]["username"].value;
  if (x.length == 0) {
    document.getElementById("errormsg").innerHTML="Please enter a valid username";
    return false;
  }
  if (x.length < 4) {
    document.getElementById("errormsg").innerHTML="Username must be at least 4 characters long";
    return false;
  }
  var m = document.forms["form"]["phno"].value;
  if (m.length != 10) {
    document.getElementById("errormsg").innerHTML="Phone number must be 10 digits long";
    return false;
  }
  var a = document.forms["form"]["password"].value;
  if(a == null || a == ""){
    document.getElementById("errormsg").innerHTML="Password must be filled out";
    return false;
  }
  if(a.length<4 || a.length>15){
    document.getElementById("errormsg").innerHTML="Passwords must be 4 to 15 characters long.";
    return false;
  }
  var b = document.forms["form"]["cpassword"].value;
  if (a!=b){
    document.getElementById("errormsg").innerHTML="Passwords must match.";
    return false;
  }
}
</script>
</head>
<body>


<div class="bg11">
<div class="row">
<div class="col-md-6 "> 
  
<fieldset>
<div class="form-group ">
 
  <div class="col-md-12 panel">
     <p style="text-align:center;"> <img src="logo.png"></p>
  <h3 align="center"><b>CENTRE FOR ACADEMIC RESEARCH</b></h3>
    <h3 align="center"><b>Admission to Ph.D. Degree Programmes<br>
      Entrance Examinations – Winter Semester 2023 – 24</b>
   </h3>
    <div class="col-md-2 col-md-offset-4" >
<a href="#" class="btn btn-primary logb" data-toggle="modal" data-target="#myModal" style="text-align:center;"> <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;<span class="title1"><b> Candidate Login </b> </span></a>
</div>
      
      
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content title1">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title title1"><span style="color:darkblue;font-size:12px;font-weight: bold">Candidate Login</span></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="login.php?q=index.php" method="POST">
<fieldset>
<div class="form-group">
  <label class="col-md-3 control-label" for="username">Username</label>  
  <div class="col-md-6">
  <input id="username" name="username" placeholder="Enter Your Application Number"  style="text-transform:uppercase" class="form-control input-md" type="username" required>
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-3 control-label" for="password">Password</label>
  <div class="col-md-6">
    <input id="password" name="password" placeholder="DoB(e.g. DDMMYYY)" class="form-control input-md" type="password" required>
    
  </div>
</div>
</fieldset>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Log in</button>
     </div>
</form>
       
      </div>
    </div>
  </div>
</div>
  </div>
    
   
</div>
    <div class="form-group ">
 <h3 style="margin-left:5px;">Read the instructions carefully before attempting the examination </h3>
        <ol>
            <li>This is an objective type MCQ pattern examination consisting of <b>50 questions</b>.
            <!-- <br>
Username: Application Number<br>
Password: Date of Birth --> 
          </li>
        <li>The duration of examination is 90 minutes and you will not be permitted to leave<br> the hall before the completion of 60 minutes. </li>
            <li>The username will be the application number and the password is your date of birth in DDMMYYY format.</li>


<li>Type the “<b>Exam Code</b>” given by the Hall Invigilator in the appropriate box.</li>


<li>Your Name and Department to which you have applied will be shown on screen and you are advised to verify the same before proceeding further.</li>


<li>Click the “<b>Start</b>” to commence the examination.</li>


<li>Read the question carefully, select the answer and click the “<b>Save</b>” button to lock your choice. The saved answers alone will be evaluated.</li>


<li>You can click the “<b>View Summary</b>” button to view the answered and unanswered questions.
           <br>
a.	All the answered questions will be in “<b>GREEN</b>” color and the unanswered ones will be in “<b>RED</b>”<br>
b.	You may also click the “<b>GREEN</b>” color button again to review your choice and “<b>EDIT</b>” the already selected answer.  
          </li>


<li>Once you have completed all the questions and ready to END the examination, click the “<b>Finish Exams</b>” button on top right corner of screen</li>
          <li>The results will be declared by 01.30. P.M (23.12.2023) and will be published in the institution website www.veltech.edu.in as well as in the <b>notice boards of the Centre for Academic Research in Block 29, Research Park, 3rd Floor, Room No:29308</b>. All eligible candidates shall report for Interview in the respective departments from 2.30 P.M (23.12.2023) onwards.</li>
        </ol>
    </div>
</fieldset>
   

</div>
<div class="col-md-6 panel"><img src="exam.png" style="width:100%"></div>

</div></div>

<!-- <div class="row footer">
<div class="col-md-3 box">
<a href="#" data-toggle="modal" data-target="#login" style="color:lightyellow">Admin Login</a></div>
<div class="col-md-3 box">
 <span href="#" data-target="#login" style="color:lightyellow">Organized by abc<br><br></span> 
</div> -->


<div class="col-md-2 box">
<a href="feedback.php" style="color:lightyellow;" onmouseover="this.style('color:yellow')" target="new">Feedback</a></div>

 <!--   <div class="modal fade" id="login">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title"><span style="color:darkblue;font-size:12px;font-weight: bold">Admin Login</span></h4>
      </div>
      <div class="modal-body title1">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<form role="form" method="post" action="admin.php?q=index.php">

<div class="form-group">
  
  
<input type="text" name="uname" maxlength="20"  placeholder="Username" class="form-control"/> 
</div> 

<div class="form-group">
  
<input type="password" name="password" maxlength="30" placeholder="Password" class="form-control"/>
</div>
<div class="form-group" align="center">
<input type="submit" name="login" value="Login" class="btn btn-primary" />
</div>
</form>
</div><div class="col-md-3"></div></div>
      </div>
    </div>
  </div>
</div> -->
</body>
</html>
