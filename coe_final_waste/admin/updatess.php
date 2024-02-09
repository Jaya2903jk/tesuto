<?php
include_once 'dbConnection.php';

session_start();
$username = $_SESSION['username'];
if (isset($_SESSION['key'])) {
    if (@$_GET['fdid'] && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') {
        $id = @$_GET['fdid'];
        $result = mysqli_query($con, "DELETE FROM feedback WHERE id='$id' ") or die('Error');
        header("location:dashss.php?q=3");
    }
}
if (isset($_SESSION['key'])) {
    if (@$_GET[''] && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') {
        $eid = @$_GET['deidquiz'];
        $r1 = mysqli_query($con, "UPDATE quiz SET status='disabled' WHERE eid='$eid' ") or die('Error');
        $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND status='ongoing' AND score_updated='false'");
        while($row = mysqli_fetch_array($q)){
            $user = $row['username'];
            $s = $row['score'];
            $r1 = mysqli_query($con, "UPDATE history SET status='finished',score_updated='true' WHERE eid='$eid' AND username='$user' ") or die('Error');
            $q1 = mysqli_query($con, "SELECT * FROM rank WHERE username='$user'") or die('Error161');
            $rowcount = mysqli_num_rows($q1);
            if ($rowcount == 0) {
                $q2 = mysqli_query($con, "INSERT INTO rank VALUES(NULL,'$user','$s',NOW())") or die('Error165');
            } else {
                while ($row = mysqli_fetch_array($q1)) {
                    $sun = $row['score'];
                }
                        
                $sun = $s + $sun;
                $q3 = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'") or die('Error174');
            }
        }
        header("location:dash.php?q=0");
    }
}
if (isset($_SESSION['key'])) {
    if (@$_GET['eeidquiz'] && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') {
        $eid = @$_GET['eeidquiz'];
        $r1 = mysqli_query($con, "UPDATE quiz SET status='enabled' WHERE eid='$eid' ") or die('Error');
        header("location:dashss.php?q=0");
    }
}
if (isset($_SESSION['key'])) {
    if (@$_GET['dusername'] && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') {
        $dusername = @$_GET['dusername'];
        $r1 = mysqli_query($con, "DELETE FROM rank WHERE username='$dusername' ") or die('Error');
        $r2 = mysqli_query($con, "DELETE FROM history WHERE username='$dusername' ") or die('Error');
        $result = mysqli_query($con, "DELETE FROM user WHERE username='$dusername' ") or die('Error');
        header("location:dashss.php?q=1");
    }
}
if (isset($_SESSION['key'])) {
    if (@$_GET['q'] == 'rmquiz' && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') {
        $eid = @$_GET['eid'];
        $result = mysqli_query($con, "SELECT * FROM questions WHERE eid='$eid' ") or die('Error');
        while ($row = mysqli_fetch_array($result)) {
            $qid = $row['qid'];
            $r1 = mysqli_query($con, "DELETE FROM options WHERE qid='$qid'") or die('Error');
            $r2 = mysqli_query($con, "DELETE FROM answer WHERE qid='$qid' ") or die('Error');
        }
        
        $r3 = mysqli_query($con, "DELETE FROM questions WHERE eid='$eid' ") or die('Error');
        $r4 = mysqli_query($con, "DELETE FROM quiz WHERE eid='$eid' ") or die('Error');
        $r4 = mysqli_query($con, "DELETE FROM history WHERE eid='$eid' ") or die('Error');
        header("location:dashss.php?q=5");
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
       // $id      = uniqid();
        $get=mysqli_fetch_array(mysqli_query($con, "SELECT eid FROM quiz  ORDER BY `quiz`.`eid` DESC LIMIT 1;"));
        $count1 = $get['eid'];
        if($count1 == 0)
                {
                    $id = "Exam".'_'."230001"; 
                
                }
                else
                {
                    $id=$count1;
                    $value = explode("_",$id);
                    $add=$value[0];
                    $add1=$value[1]+1;
                    $id=$add.'_'.$add1;
                }
        $q3      = mysqli_query($con, "INSERT INTO quiz VALUES(NULL,'$id','$name','$correct','$wrong','$total','$time', 'NOW()','$status')");
        header("location:dashss.php?q=4&step=2&eid=$id&n=$total");
    }
}
if (isset($_SESSION['key'])) {
    if (@$_GET['q'] == 'addqns' && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') {
        $n   = @$_GET['n'];
       
        $eid = @$_GET['eid'];
        $ch  = @$_GET['ch'];

$get_branch=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM quiz where eid='$eid'"));
 $branch = $get_branch['title'];
 //print_r($branch);die();
$serialno = 1;
for ($i = 0; $i < $n; $i++) {
    //$qid  = uniqid();    

    $get=mysqli_fetch_array(mysqli_query($con, "SELECT qid FROM questions  ORDER BY `questions`.`qid` DESC LIMIT 1;"));
    $count1 = $get['qid'];
    if($count1 == 0)
    {
     $qid = "qus".'_'."23001";            
    }
   else
    {
                    $qid=$count1;
                    $value = explode("_",$qid);
                    $add=$value[0];
                    $add1=$value[1]+1;
                    $qid=$add.'_'.$add1;
    }

    $qus="qs";
    $ntransfer1 = $_FILES['qns']['name'][$i];
    $ntemptransfer1 = $_FILES['qns']['tmp_name'][$i]; 
    $nsizetransfer1 = $_FILES['qns']['size'][$i]; 
    $ntypetransfer1 = $_FILES['qns']['type'][$i]; 
    $qns = $qus."-".rand(100001,2000000)."-".$_FILES['qns']['name'][$i];
    $folder1="uploads/";
    $movetempnat = move_uploaded_file($ntemptransfer1, $folder1.$qns);
    

            $q3   = mysqli_query($con, "INSERT INTO questions VALUES  (NULL,'$eid','$qid','$qns' ,'$branch', '$ch' , '$serialno')") or die();
            $serialno = $serialno +1;
            $oaid = uniqid();
            $obid = uniqid();
            $ocid = uniqid();
            $odid = uniqid();
//print_r($oaid);die();
            
            // $a    = addslashes($_POST[$i . '1']);
              $a=$_POST['option1'][$i];
              $b=$_POST['option2'][$i];
              $c=$_POST['option3'][$i];
              $d=$_POST['option4'][$i];
            // //print_r($a);die();
           
            // $b    = addslashes($_POST[$i . '2']);
            // $c    = addslashes($_POST[$i . '3']);
            // $d    = addslashes($_POST[$i . '4']);
            $qa = mysqli_query($con, "INSERT INTO options VALUES  (NULL,'$qid','$a','$oaid')") or die('Error61');
            $qb = mysqli_query($con, "INSERT INTO options VALUES  (NULL,'$qid','$b','$obid')") or die('Error62');
            $qb = mysqli_query($con, "INSERT INTO options VALUES  (NULL,'$qid','$c','$ocid')") or die('Error63'.mysqli_error($con));
            $qd = mysqli_query($con, "INSERT INTO options VALUES  (NULL,'$qid','$d','$odid')") or die('Error64');
            $e = $_POST['ans' . $i];
            //print_r($e);die();
            

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
            
            $qans = mysqli_query($con, "INSERT INTO answer VALUES  (NULL,'$qid','$ansid')");
        }
        
        header("location:dashss.php?q=0");
    }
}
if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2 && isset($_SESSION['6e447159425d2d']) && $_SESSION['6e447159425d2d'] == "6e447159425d2d" && isset($_POST['ans']) && (!isset($_GET['delanswer']))) {
    $eid   = @$_GET['eid'];
    $sn    = @$_GET['n'];
    $total = @$_GET['t'];
    $ans   = $_POST['ans'];
    $qid   = @$_GET['qid'];
    $q = mysqli_query($con, "SELECT * FROM history WHERE username='$username' AND eid='$_GET[eid]' ") or die('Error197');
    if (mysqli_num_rows($q) > 0) {
        $q = mysqli_query($con, "SELECT * FROM history WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
        while ($row = mysqli_fetch_array($q)) {
            $time   = $row['timestamp'];
            $status = $row['status'];
        }
        
        $q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$_GET[eid]' ") or die('Error197');
        while ($row = mysqli_fetch_array($q)) {
            $ttime   = $row['time'];
            $qstatus = $row['status'];
        }
        
        $remaining = (($ttime * 60) - ((time() - $time)));
        if ($status == "ongoing" && $remaining > 0 && $qstatus == "enabled") {
            $q = mysqli_query($con, "SELECT * FROM user_answer WHERE eid='$_GET[eid]' AND username='$_SESSION[username]' AND qid='$qid' ") or die('Error115');
            while ($row = mysqli_fetch_array($q)) {
                $prevans = $row['ans'];
            }
            $q = mysqli_query($con, "SELECT * FROM answer WHERE qid='$qid' ");
            while ($row = mysqli_fetch_array($q)) {
                $ansid = $row['ansid'];
            }
            $q = mysqli_query($con, "SELECT * FROM user_answer WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' AND qid='$qid' ") or die('Error1977');
            if (mysqli_num_rows($q) != 0) {
                $q = mysqli_query($con, "UPDATE user_answer SET ans='$ans' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' AND qid='$qid' ") or die('Error197');
            } else {
                $q = mysqli_query($con, "INSERT INTO user_answer VALUES(NULL,'$qid','$ans','$ansid','$_GET[eid]','$_SESSION[username]')");
            }
            
            $q = mysqli_query($con, "SELECT * FROM options WHERE qid='$qid' AND optionid='$ans'");
            while ($row = mysqli_fetch_array($q)) {
                $option = $row['option'];
            }
            
            
            if ($ans == $ansid) {
                $q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$eid' ");
                while ($row = mysqli_fetch_array($q)) {
                    $correct = $row['correct'];
                    $wrong   = $row['wrong'];
                }
                
                $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND username='$username' ") or die('Error115');
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
                    $q = mysqli_query($con, "UPDATE `history` SET `score`=$s,`level`=$sn,`correct`=$r,`wrong`=$w, date= NOW()  WHERE  username = '$username' AND eid = '$eid'") or die('Error13');
                } else {
                    $r++;
                    $s = $s + $correct;
                    $q = mysqli_query($con, "UPDATE `history` SET `score`=$s,`level`=$sn,`correct`=$r, date= NOW()  WHERE  username = '$username' AND eid = '$eid'") or die('Error14');
                }
            } else {
                $q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$eid' ") or die('Error129');
                while ($row = mysqli_fetch_array($q)) {
                    $wrong   = $row['wrong'];
                    $correct = $row['correct'];
                }
                
                $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND username='$username' ") or die('Error139');
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
                    $q = mysqli_query($con, "UPDATE `history` SET `score`=$s,`level`=$sn,`wrong`=$w,`correct`=$r, date= NOW()  WHERE  username = '$username' AND eid = '$eid'") or die('Error11');
                } else {
                    $w++;
                    $s = $s - $wrong;
                    $q = mysqli_query($con, "UPDATE `history` SET `score`=$s,`level`=$sn,`wrong`=$w,date= NOW()  WHERE  username = '$username' AND eid = '$eid'") or die('Error12');
                }
            }
            header("location:accountss.php?q=quiz&step=2&eid=$eid&n=$sn&t=$total") or die('Error152');
            
        } else {
            unset($_SESSION['6e447159425d2d']);
            $q = mysqli_query($con, "UPDATE history SET status='finished' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
        $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$_GET[eid]' AND username='$_SESSION[username]'") or die('Error156');
                while ($row = mysqli_fetch_array($q)) {
                    $s = $row['score'];
                    $scorestatus = $row['score_updated'];
                }
                if($scorestatus=="false"){
                    $q = mysqli_query($con, "UPDATE history SET score_updated='true' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
                    $q = mysqli_query($con, "SELECT * FROM rank WHERE username='$username'") or die('Error161');
                    $rowcount = mysqli_num_rows($q);
                    if ($rowcount == 0) {
                        $q2 = mysqli_query($con, "INSERT INTO rank VALUES(NULL,'$username','$s',NOW())") or die('Error165');
                    } else {
                        while ($row = mysqli_fetch_array($q)) {
                            $sun = $row['score'];
                        }
                        
                        $sun = $s + $sun;
                        $q = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'") or die('Error174');
                    }
                }
            header('location:accountss.php?q=result&eid=' . $_GET[eid]);
        }
    } else {
        unset($_SESSION['6e447159425d2d']);
        $q = mysqli_query($con, "UPDATE history SET status='finished' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
        $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$_GET[eid]' AND username='$_SESSION[username]'") or die('Error156');
                while ($row = mysqli_fetch_array($q)) {
                    $s = $row['score'];
                    $scorestatus = $row['score_updated'];
                }
                if($scorestatus=="false"){
                    $q = mysqli_query($con, "UPDATE history SET score_updated='true' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
                    $q = mysqli_query($con, "SELECT * FROM rank WHERE username='$username'") or die('Error161');
                    $rowcount = mysqli_num_rows($q);
                    if ($rowcount == 0) {
                        $q2 = mysqli_query($con, "INSERT INTO rank VALUES(NULL,'$username','$s',NOW())") or die('Error165');
                    } else {
                        while ($row = mysqli_fetch_array($q)) {
                            $sun = $row['score'];
                        }
                        
                        $sun = $s + $sun;
                        $q = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'") or die('Error174');
                    }
                }
            header('location:accountss.php?q=result&eid=' . $_GET[eid]);
    }
}

if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2 && isset($_SESSION['6e447159425d2d']) && $_SESSION['6e447159425d2d'] == "6e447159425d2d" && (!isset($_POST['ans'])) && (isset($_GET['delanswer'])) && $_GET['delanswer'] == "delanswer") {
    $eid   = @$_GET['eid'];
    $sn    = @$_GET['n'];
    $total = @$_GET['t'];
    $qid   = @$_GET['qid'];
    $q = mysqli_query($con, "SELECT * FROM history WHERE username='$username' AND eid='$_GET[eid]' ") or die('Error197');
    if (mysqli_num_rows($q) > 0) {
        $q = mysqli_query($con, "SELECT * FROM history WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
        while ($row = mysqli_fetch_array($q)) {
            $time   = $row['timestamp'];
            $status = $row['status'];
        }
        
        $q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$_GET[eid]' ") or die('Error197');
        while ($row = mysqli_fetch_array($q)) {
            $ttime   = $row['time'];
            $qstatus = $row['status'];
        }
        
        $remaining = (($ttime * 60) - ((time() - $time)));
        if ($status == "ongoing" && $remaining > 0 && $qstatus == "enabled") {
            $q = mysqli_query($con, "SELECT * FROM answer WHERE qid='$qid' ");
            while ($row = mysqli_fetch_array($q)) {
                $ansid = $row['ansid'];
            }
            $q = mysqli_query($con, "SELECT * FROM user_answer WHERE eid='$_GET[eid]' AND username='$_SESSION[username]' AND qid='$qid' ") or die('Error115');
            $row = mysqli_fetch_array($q);
            $ans = $row['ans'];
            $q = mysqli_query($con, "DELETE FROM user_answer WHERE qid='$qid' AND username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die("Error2222");
            if ($ans == $ansid) {
                $q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$eid' ") or die('Error129');
                while ($row = mysqli_fetch_array($q)) {
                    $wrong   = $row['wrong'];
                    $correct = $row['correct'];
                }
                
                $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND username='$username' ") or die('Error139');
                while ($row = mysqli_fetch_array($q)) {
                    $s = $row['score'];
                    $w = $row['wrong'];
                    $r = $row['correct'];
                }
                $r--;
                $s = $s - $correct;
                $q = mysqli_query($con, "UPDATE `history` SET `score`=$s,`level`=$sn,`correct`=$r, date= NOW()  WHERE  username = '$username' AND eid = '$eid'") or die('Error11');
            } else {
                $q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$eid' ") or die('Error129');
                while ($row = mysqli_fetch_array($q)) {
                    $wrong   = $row['wrong'];
                    $correct = $row['correct'];
                }
                
                $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND username='$username' ") or die('Error139');
                while ($row = mysqli_fetch_array($q)) {
                    $s = $row['score'];
                    $w = $row['wrong'];
                    $r = $row['correct'];
                }
                $w--;
                $s = $s + $wrong;
                $q = mysqli_query($con, "UPDATE `history` SET `score`=$s,`level`=$sn,`wrong`=$w, date= NOW()  WHERE  username = '$username' AND eid = '$eid'") or die('Error11');
            }
            header('location:accountss.php?q=quiz&step=2&eid=' . $_GET[eid] . '&n=' . $_GET[n] . '&t=' . $total);
            
        } else {
            unset($_SESSION['6e447159425d2d']);
            $q = mysqli_query($con, "UPDATE history SET status='finished' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
        $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$_GET[eid]' AND username='$_SESSION[username]'") or die('Error156');
                while ($row = mysqli_fetch_array($q)) {
                    $s = $row['score'];
                    $scorestatus = $row['score_updated'];
                }
                if($scorestatus=="false"){
                    $q = mysqli_query($con, "UPDATE history SET score_updated='true' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
                    $q = mysqli_query($con, "SELECT * FROM rank WHERE username='$username'") or die('Error161');
                    $rowcount = mysqli_num_rows($q);
                    if ($rowcount == 0) {
                        $q2 = mysqli_query($con, "INSERT INTO rank VALUES(NULL,'$username','$s',NOW())") or die('Error165');
                    } else {
                        while ($row = mysqli_fetch_array($q)) {
                            $sun = $row['score'];
                        }
                        
                        $sun = $s + $sun;
                        $q = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'") or die('Error174');
                    }
                }
            header('location:accountss.php?q=result&eid=' . $_GET[eid]);
        }
    } else {
        unset($_SESSION['6e447159425d2d']);
        $q = mysqli_query($con, "UPDATE history SET status='finished' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
        $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$_GET[eid]' AND username='$_SESSION[username]'") or die('Error156');
                while ($row = mysqli_fetch_array($q)) {
                    $s = $row['score'];
                    $scorestatus = $row['score_updated'];
                }
                if($scorestatus=="false"){
                    $q = mysqli_query($con, "UPDATE history SET score_updated='true' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
                    $q = mysqli_query($con, "SELECT * FROM rank WHERE username='$username'") or die('Error161');
                    $rowcount = mysqli_num_rows($q);
                    if ($rowcount == 0) {
                        $q2 = mysqli_query($con, "INSERT INTO rank VALUES(NULL,'$username','$s',NOW())") or die('Error165');
                    } else {
                        while ($row = mysqli_fetch_array($q)) {
                            $sun = $row['score'];
                        }
                        
                        $sun = $s + $sun;
                        $q = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'") or die('Error174');
                    }
                }
            header('location:accountss.php?q=result&eid=' . $_GET[eid]);
    }
}
?>
