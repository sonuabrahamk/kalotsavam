<?php

session_start();

$id = $_GET['ID'];
$j1 = $_GET['J1'];
$j2 = $_GET['J2'];
$j3 = $_GET['J3'];

date_default_timezone_set('Asia/Kolkata'); 
$date = time();

require('connect.php');

if($res = mysqli_query($connect,'UPDATE `master_data` SET JUDGE_1="'.$j1.'",JUDGE_2="'.$j2.'",JUDGE_3="'.$j3.'" WHERE id="'.$id.'"')){
    if($res1 = mysqli_query($connect, 'SELECT * FROM `master_data` WHERE id = "'.$id.'"')){
        if($row = mysqli_fetch_array($res1)){
            mysqli_query($connect,"INSERT INTO `logs` VALUES (NULL,'".$date."','".$_SESSION['uid']."','".$row['SECTION']."','Scores verified as: J1:".$j1." | J2:".$j2." | J3:".$j3." ');");
            
            mysqli_query($connect,'CALL findGradePoints("'.$row['SECTION'].'")');
            mysqli_query($connect,'CALL rankupdate("'.$row['SECTION'].'")');
            mysqli_query($connect,'CALL rankPointUpdate("'.$row['SECTION'].'")');
            
            mysqli_query($connect,'CALL totalPointsUpdate("'.$row['SECTION'].'")');

            mysqli_query($connect,"INSERT INTO `logs` VALUES (NULL,'".$date."','".$_SESSION['uid']."','".$row['SECTION']."','Rank grade and total points updated at verification stage.');");

            $data = array();
            if($res1 = mysqli_query($connect,'SELECT * FROM `master_data` WHERE SECTION="'.$row['SECTION'].'" ORDER BY RANK, GRADE')){
                while($x = mysqli_fetch_array($res1)){
                    $data[] = $x;
                }                
                $jsonData = json_encode($data);
                echo ($jsonData);
            }

        }
        else{
            echo 'Updates failed to DB !';
        }
    }
}

?>


