<?php
include_once 'dbConnection.php';

session_start();
$username = $_SESSION['student_username'];
if (isset($_SESSION['key'])) {
    if (@$_GET['fdid'] && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') {
        $id = @$_GET['fdid'];
        $result = mysqli_query($con, "DELETE FROM feedback WHERE id='$id' ") or die('Error');
        header("location:dash.php?q=3");
    }
}
if (isset($_SESSION['key'])){
    if (@$_GET['deidquiz'] && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') {
        $eid = @$_GET['deidquiz'];
        $r1 = mysqli_query($con, "UPDATE tesuto_quiz SET status='disabled' WHERE eid='$eid' ") or die('Error');
        $q = mysqli_query($con, "SELECT * FROM tesuto_history WHERE eid='$eid' AND status='ongoing' AND score_updated='false'");
        while($row = mysqli_fetch_array($q)){
            $user = $row['username'];
            $s = $row['score'];
            $r1 = mysqli_query($con, "UPDATE tesuto_history SET status='finished',score_updated='true' WHERE eid='$eid' AND username='$user' ") or die('Error');
            $q1 = mysqli_query($con, "SELECT * FROM tesuto_rank WHERE username='$user'") or die('Error161');
            $rowcount = mysqli_num_rows($q1);
            if ($rowcount == 0) {
                $q2 = mysqli_query($con, "INSERT INTO tesuto_rank VALUES(NULL,'$user','$s',NOW())") or die('Error165');
            } else {
                while ($row = mysqli_fetch_array($q1)) {
                    $sun = $row['score'];
                }
                        
                $sun = $s + $sun;
                $q3 = mysqli_query($con, "UPDATE `tesuto_rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'") or die('Error174');
            }
        }
        header("location:dash.php?q=0");
    }
}
if (isset($_SESSION['key'])) {
    if (@$_GET['eeidquiz'] && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') {
        $eid = @$_GET['eeidquiz'];
        $r1 = mysqli_query($con, "UPDATE tesuto_quiz SET status='enabled' WHERE eid='$eid' ") or die('Error');
        header("location:dash.php?q=0");
    }
}
if (isset($_SESSION['key'])) {
    if (@$_GET['dusername'] && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') {
        $dusername = @$_GET['dusername'];
        $r1 = mysqli_query($con, "DELETE FROM tesuto_rank WHERE username='$dusername' ") or die('Error');
        $r2 = mysqli_query($con, "DELETE FROM tesuto_history WHERE username='$dusername' ") or die('Error');
        $result = mysqli_query($con, "DELETE FROM tesuto_user WHERE username='$dusername' ") or die('Error');
        header("location:dash.php?q=1");
    }
}
if (isset($_SESSION['key'])) {
    if (@$_GET['q'] == 'rmquiz' && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') {
        $eid = @$_GET['eid'];
        $result = mysqli_query($con, "SELECT * FROM tesuto_questions_b WHERE eid='$eid' ") or die('Error');
        while ($row = mysqli_fetch_array($result)) {
            $qid = $row['qid'];
            $r1 = mysqli_query($con, "DELETE FROM tesuto_options WHERE qid='$qid'") or die('Error');
            $r2 = mysqli_query($con, "DELETE FROM tesuto_answer WHERE qid='$qid' ") or die('Error');
        }
        
        $r3 = mysqli_query($con, "DELETE FROM tesuto_questions_b WHERE eid='$eid' ") or die('Error');
        $r4 = mysqli_query($con, "DELETE FROM tesuto_quiz WHERE eid='$eid' ") or die('Error');
        $r4 = mysqli_query($con, "DELETE FROM tesuto_history WHERE eid='$eid' ") or die('Error');
        header("location:dash.php?q=5");
    }
}
if (isset($_SESSION['key'])) {
    if (@$_GET['q'] == 'addquiz' && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') {
        $name    = $_POST['name'];
        $name    = ucwords(strtolower($name));
        $total   = $_POST['total'];
        $correct = $_POST['right'];
        $wrong   = $_POST['wrong'];
        $time    = $_POST['time'];
        $status  = "disabled";
        $id      = uniqid();
        $q3      = mysqli_query($con, "INSERT INTO tesuto_quiz VALUES(NULL,'$id','$name','$correct','$wrong','$total','$time', 'NOW()','$status')");
        header("location:dash.php?q=4&step=2&eid=$id&n=$total");
    }
}
if (isset($_SESSION['key'])) {
    if (@$_GET['q'] == 'addqns' && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') {
        $n   = @$_GET['n'];
        $eid = @$_GET['eid'];
        $ch  = @$_GET['ch'];

        for ($i = 1; $i <= $n; $i++) {
            $qid  = uniqid();
// $qus="question";
//     $ntransfer1 = $_FILES['qns']['name']; 
   
//     $ntemptransfer1 = $_FILES['qns' . $i]['tmp_name']; 
//     $nsizetransfer1 = $_FILES['qns']['size']; 
//     $ntypetransfer1 = $_FILES['qns']['type']; 
//     $qns = $qus."-".rand(100001,2000000)."-".$_FILES['qns']['name'];
//     $folder1="uploads/";
//     $movetempnat = move_uploaded_file($ntemptransfer1, $folder1.$qns);
     
             $qns  = addslashes($_POST['qns'. $i]);
              //print_r($qns);die();
            $q3   = mysqli_query($con, "INSERT INTO tesuto_questions_b VALUES  (NULL,'$eid','$qid','$qns' , '$ch' , '$i')") or die();
            $oaid = uniqid();
            $obid = uniqid();
            $ocid = uniqid();
            $odid = uniqid();
            $a    = addslashes($_POST[$i . '1']);
            $b    = addslashes($_POST[$i . '2']);
            $c    = addslashes($_POST[$i . '3']);
            $d    = addslashes($_POST[$i . '4']);
            $qa = mysqli_query($con, "INSERT INTO tesuto_options VALUES  (NULL,'$qid','$a','$oaid')") or die('Error61');
            $qb = mysqli_query($con, "INSERT INTO tesuto_options VALUES  (NULL,'$qid','$b','$obid')") or die('Error62');
            $qb = mysqli_query($con, "INSERT INTO tesuto_options VALUES  (NULL,'$qid','$c','$ocid')") or die('Error63'.mysqli_error($con));
            $qd = mysqli_query($con, "INSERT INTO tesuto_options VALUES  (NULL,'$qid','$d','$odid')") or die('Error64');
            $e = $_POST['ans' . $i];
            switch ($e) {
                case 'a':
                    $ansid = $oaid;
                    break;
                
                case 'b':
                    $ansid = $obid;
                    break;
                
                case 'c':
                    $ansid = $ocid;
                    break;
                
                case 'd':
                    $ansid = $odid;
                    break;
                
                default:
                    $ansid = $oaid;
            }
            
            $qans = mysqli_query($con, "INSERT INTO tesuto_answer VALUES  (NULL,'$qid','$ansid')");
        }
        
        header("location:dash.php?q=0");
    }
}
if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2 && isset($_SESSION['6e447159425d2d']) && $_SESSION['6e447159425d2d'] == "6e447159425d2d" && isset($_POST['ans']) && (!isset($_GET['delanswer']))) {
    $eid   = @$_GET['eid'];
    $sn    = @$_GET['n'];
    $total = @$_GET['t'];
    $ans   = $_POST['ans'];
    $qid   = @$_GET['qid'];
    $q = mysqli_query($con, "SELECT * FROM tesuto_history WHERE username='$username' AND eid='$_GET[eid]' ") or die('Error197');
    if (mysqli_num_rows($q) > 0) {
        $q = mysqli_query($con, "SELECT * FROM tesuto_history WHERE username='$_SESSION[student_username]' AND eid='$_GET[eid]' ") or die('Error197');
        while ($row = mysqli_fetch_array($q)) {
            $time   = $row['timestamp'];
            $status = $row['status'];
        }
        
        $q = mysqli_query($con, "SELECT * FROM tesuto_quiz WHERE eid='$_GET[eid]' ") or die('Error197');
        while ($row = mysqli_fetch_array($q)) {
            $ttime   = $row['time'];
            $qstatus = $row['status'];
        }
        
        $remaining = (($ttime * 60) - ((time() - $time)));
        if ($status == "ongoing" && $remaining > 0 && $qstatus == "enabled") {
            $q = mysqli_query($con, "SELECT * FROM tesuto_user_answer WHERE eid='$_GET[eid]' AND username='$_SESSION[student_username]' AND qid='$qid' ") or die('Error115');
            while ($row = mysqli_fetch_array($q)) {
                $prevans = $row['ans'];
            }
            $q = mysqli_query($con, "SELECT * FROM tesuto_answer WHERE qid='$qid' ");
            while ($row = mysqli_fetch_array($q)) {
                $ansid = $row['ansid'];
            }
           $time_stamp = date("Y-m-d H:i:s");
            $q = mysqli_query($con, "SELECT * FROM tesuto_user_answer WHERE username='$_SESSION[student_username]' AND eid='$_GET[eid]' AND qid='$qid' ") or die('Error1977');
            if (mysqli_num_rows($q) != 0) {
                $q = mysqli_query($con, "UPDATE tesuto_user_answer SET ans='$ans' ,time_stamp='$time_stamp' WHERE username='$_SESSION[student_username]' AND eid='$_GET[eid]' AND qid='$qid' ") or die('Error197');
            } else {
                $q = mysqli_query($con, "INSERT INTO tesuto_user_answer VALUES(NULL,'$qid','$ans','$ansid','$_GET[eid]','$_SESSION[student_username]','$time_stamp')");
            }
            
            $q = mysqli_query($con, "SELECT * FROM tesuto_options WHERE qid='$qid' AND optionid='$ans'");
            while ($row = mysqli_fetch_array($q)) {
                $option = $row['option'];
            }
            
            
            if ($ans == $ansid) {
                $q = mysqli_query($con, "SELECT * FROM tesuto_quiz WHERE eid='$eid' ");
                while ($row = mysqli_fetch_array($q)) {
                    $correct = $row['correct'];
                    $wrong   = $row['wrong'];
                }
                
                $q = mysqli_query($con, "SELECT * FROM tesuto_history WHERE eid='$eid' AND username='$username' ") or die('Error115');
                while ($row = mysqli_fetch_array($q)) {
                    $s = $row['score'];
                    $r = $row['correct'];
                    $w = $row['wrong'];
                }
                
                if (isset($prevans) && $prevans == $ansid) {
                } else if (isset($prevans) && $prevans != $ansid) {
                    $r++;
                    $w--;
                    $s = $s + $correct + $wrong;
                    $q = mysqli_query($con, "UPDATE `tesuto_history` SET `score`=$s,`level`=$sn,`correct`=$r,`wrong`=$w, date= NOW()  WHERE  username = '$username' AND eid = '$eid'") or die('Error13');
                } else {
                    $r++;
                    $s = $s + $correct;
                    $q = mysqli_query($con, "UPDATE `tesuto_history` SET `score`=$s,`level`=$sn,`correct`=$r, date= NOW()  WHERE  username = '$username' AND eid = '$eid'") or die('Error14');
                }
            } else {
                $q = mysqli_query($con, "SELECT * FROM tesuto_quiz WHERE eid='$eid' ") or die('Error129');
                while ($row = mysqli_fetch_array($q)) {
                    $wrong   = $row['wrong'];
                    $correct = $row['correct'];
                }
                
                $q = mysqli_query($con, "SELECT * FROM tesuto_history WHERE eid='$eid' AND username='$username' ") or die('Error139');
                while ($row = mysqli_fetch_array($q)) {
                    $s = $row['score'];
                    $w = $row['wrong'];
                    $r = $row['correct'];
                }
                if (isset($prevans) && $prevans != $ansid) {
                } else if (isset($prevans) && $prevans == $ansid) {
                    $r--;
                    $w++;
                    $s = $s - $correct - $wrong;
                    $q = mysqli_query($con, "UPDATE `tesuto_history` SET `score`=$s,`level`=$sn,`wrong`=$w,`correct`=$r, date= NOW()  WHERE  username = '$username' AND eid = '$eid'") or die('Error11');
                } else {
                    $w++;
                    $s = $s - $wrong;
                    $q = mysqli_query($con, "UPDATE `tesuto_history` SET `score`=$s,`level`=$sn,`wrong`=$w,date= NOW()  WHERE  username = '$username' AND eid = '$eid'") or die('Error12');
                }

            } 
            header("location:account_reverse.php?q=quiz&step=2&eid=$eid&n=$sn&t=$total") or die('Error152');
            
        } else {
            unset($_SESSION['6e447159425d2d']);
            $q = mysqli_query($con, "UPDATE tesuto_history SET status='finished' WHERE username='$_SESSION[student_username]' AND eid='$_GET[eid]' ") or die('Error197');
        $q = mysqli_query($con, "SELECT * FROM tesuto_history WHERE eid='$_GET[eid]' AND username='$_SESSION[student_username]'") or die('Error156');
                while ($row = mysqli_fetch_array($q)) {
                    $s = $row['score'];
                    $scorestatus = $row['score_updated'];
                }
                if($scorestatus=="false"){
                    $q = mysqli_query($con, "UPDATE tesuto_history SET score_updated='true' WHERE username='$_SESSION[student_username]' AND eid='$_GET[eid]' ") or die('Error197');
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
            header('location:account_reverse.php?q=result&eid=' . $_GET[eid]);
        }
    } else {
        unset($_SESSION['6e447159425d2d']);
        $q = mysqli_query($con, "UPDATE tesuto_history SET status='finished' WHERE username='$_SESSION[student_username]' AND eid='$_GET[eid]' ") or die('Error197');
        $q = mysqli_query($con, "SELECT * FROM tesuto_history WHERE eid='$_GET[eid]' AND username='$_SESSION[student_username]'") or die('Error156');
                while ($row = mysqli_fetch_array($q)) {
                    $s = $row['score'];
                    $scorestatus = $row['score_updated'];
                }
                if($scorestatus=="false"){
                    $q = mysqli_query($con, "UPDATE tesuto_history SET score_updated='true' WHERE username='$_SESSION[student_username]' AND eid='$_GET[eid]' ") or die('Error197');
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
            header('location:account_reverse.php?q=result&eid=' . $_GET[eid]);
    }
}

if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2 && isset($_SESSION['6e447159425d2d']) && $_SESSION['6e447159425d2d'] == "6e447159425d2d" && (!isset($_POST['ans'])) && (isset($_GET['delanswer'])) && $_GET['delanswer'] == "delanswer") {
    $eid   = @$_GET['eid'];
    $sn    = @$_GET['n'];
    $total = @$_GET['t'];
    $qid   = @$_GET['qid'];
    $q = mysqli_query($con, "SELECT * FROM tesuto_history WHERE username='$username' AND eid='$_GET[eid]' ") or die('Error197');
    if (mysqli_num_rows($q) > 0) {
        $q = mysqli_query($con, "SELECT * FROM tesuto_history WHERE username='$_SESSION[student_username]' AND eid='$_GET[eid]' ") or die('Error197');
        while ($row = mysqli_fetch_array($q)) {
            $time   = $row['timestamp'];
            $status = $row['status'];
        }
        
        $q = mysqli_query($con, "SELECT * FROM tesuto_quiz WHERE eid='$_GET[eid]' ") or die('Error197');
        while ($row = mysqli_fetch_array($q)) {
            $ttime   = $row['time'];
            $qstatus = $row['status'];
        }
        
        $remaining = (($ttime * 60) - ((time() - $time)));
        if ($status == "ongoing" && $remaining > 0 && $qstatus == "enabled") {
            $q = mysqli_query($con, "SELECT * FROM tesuto_answer WHERE qid='$qid' ");
            while ($row = mysqli_fetch_array($q)) {
                $ansid = $row['ansid'];
            }
            $q = mysqli_query($con, "SELECT * FROM tesuto_user_answer WHERE eid='$_GET[eid]' AND username='$_SESSION[student_username]' AND qid='$qid' ") or die('Error115');
            $row = mysqli_fetch_array($q);
            $ans = $row['ans'];
            $q = mysqli_query($con, "DELETE FROM tesuto_user_answer WHERE qid='$qid' AND username='$_SESSION[student_username]' AND eid='$_GET[eid]' ") or die("Error2222");
            if ($ans == $ansid) {
                $q = mysqli_query($con, "SELECT * FROM tesuto_quiz WHERE eid='$eid' ") or die('Error129');
                while ($row = mysqli_fetch_array($q)) {
                    $wrong   = $row['wrong'];
                    $correct = $row['correct'];
                }
                
                $q = mysqli_query($con, "SELECT * FROM tesuto_history WHERE eid='$eid' AND username='$username' ") or die('Error139');
                while ($row = mysqli_fetch_array($q)) {
                    $s = $row['score'];
                    $w = $row['wrong'];
                    $r = $row['correct'];
                }
                $r--;
                $s = $s - $correct;
                $q = mysqli_query($con, "UPDATE `tesuto_history` SET `score`=$s,`level`=$sn,`correct`=$r, date= NOW()  WHERE  username = '$username' AND eid = '$eid'") or die('Error11');
            } else {
                $q = mysqli_query($con, "SELECT * FROM tesuto_quiz WHERE eid='$eid' ") or die('Error129');
                while ($row = mysqli_fetch_array($q)) {
                    $wrong   = $row['wrong'];
                    $correct = $row['correct'];
                }
                
                $q = mysqli_query($con, "SELECT * FROM tesuto_history WHERE eid='$eid' AND username='$username' ") or die('Error139');
                while ($row = mysqli_fetch_array($q)) {
                    $s = $row['score'];
                    $w = $row['wrong'];
                    $r = $row['correct'];
                }
                $w--;
                $s = $s + $wrong;
                $q = mysqli_query($con, "UPDATE `tesuto_history` SET `score`=$s,`level`=$sn,`wrong`=$w, date= NOW()  WHERE  username = '$username' AND eid = '$eid'") or die('Error11');
            }
            header('location:account_reverse.php?q=quiz&step=2&eid=' . $_GET[eid] . '&n=' . $_GET[n] . '&t=' . $total);
            
        } else {
            unset($_SESSION['6e447159425d2d']);
            $q = mysqli_query($con, "UPDATE tesuto_history SET status='finished' WHERE username='$_SESSION[student_username]' AND eid='$_GET[eid]' ") or die('Error197');
        $q = mysqli_query($con, "SELECT * FROM tesuto_history WHERE eid='$_GET[eid]' AND username='$_SESSION[student_username]'") or die('Error156');
                while ($row = mysqli_fetch_array($q)) {
                    $s = $row['score'];
                    $scorestatus = $row['score_updated'];
                }
                if($scorestatus=="false"){
                    $q = mysqli_query($con, "UPDATE tesuto_history SET score_updated='true' WHERE username='$_SESSION[student_username]' AND eid='$_GET[eid]' ") or die('Error197');
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
            header('location:account_reverse.php?q=result&eid=' . $_GET[eid]);
        }
    } else {
        unset($_SESSION['6e447159425d2d']);
        $q = mysqli_query($con, "UPDATE tesuto_history SET status='finished' WHERE username='$_SESSION[student_username]' AND eid='$_GET[eid]' ") or die('Error197');
        $q = mysqli_query($con, "SELECT * FROM tesuto_history WHERE eid='$_GET[eid]' AND username='$_SESSION[student_username]'") or die('Error156');
                while ($row = mysqli_fetch_array($q)) {
                    $s = $row['score'];
                    $scorestatus = $row['score_updated'];
                }
                if($scorestatus=="false"){
                    $q = mysqli_query($con, "UPDATE tesuto_history SET score_updated='true' WHERE username='$_SESSION[student_username]' AND eid='$_GET[eid]' ") or die('Error197');
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
            header('location:account_reverse.php?q=result&eid=' . $_GET[eid]);
    }
}
?>
