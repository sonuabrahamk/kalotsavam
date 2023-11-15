<?php

    session_start();

    require('connect.php');

    $section = $_GET['section'];

    if($upt = mysqli_query($connect,'CALL findGradePoints ("'.$section.'")')){
        if($res = mysqli_query($connect,'CALL rankupdate ("'.$section.'")')){
            if($res = mysqli_query($connect,'CALL rankPointUpdate ("'.$section.'")')){
                if($upt = mysqli_query($connect,'CALL totalPointsUpdate ("'.$section.'")')){
                    if(mysqli_query($connect,'UPDATE `events` SET STATUS="VERIFIED", COMMENT="" WHERE SECTION="'.$section.'"')){
                        date_default_timezone_set('Asia/Kolkata'); 
                        $date = time();
                        mysqli_query($connect,"INSERT INTO `logs` VALUES (NULL,'".$date."','".$_SESSION['uid']."','".$section."','Rank, grade and total points updated for section.Event has been set to VERIFIED status.');");
                        echo 'Successfully verified and moved for Publishing!';
                    }
                    
                }
            }
        }
    }


?>



