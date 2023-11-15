<?php

    session_start();

    require('connect.php');

    $section = $_GET['secDisplay'];

    if($res = mysqli_query($connect,'SELECT * FROM `master_data` WHERE SECTION="'.$section.'" AND STATUS="PRESENT"')){

        $count=0;
        while($x = mysqli_fetch_array($res)){
            if(mysqli_query($connect,'UPDATE `master_data` SET JUDGE_1="'.$_GET[$x[0].'_J1'].'",JUDGE_2="'.$_GET[$x[0].'_J2'].'",JUDGE_3="'.$_GET[$x[0].'_J3'].'" WHERE ID="'.$x[0].'";')){
                date_default_timezone_set('Asia/Kolkata'); 
                $date = time();
                mysqli_query($connect,"INSERT INTO `logs` VALUES (NULL,'".$date."','".$_SESSION['uid']."','".$section."','Updated Scores -  J_1=".$_GET[$x[0].'_J1']." | J_2=".$_GET[$x[0].'_J2']." | J_3=".$_GET[$x[0].'_J3']." for chest no: ".$x['CHEST_NO']."');");
                $count++;
            }
            else{
                $count = -999;
            }
        }

        if(mysqli_query($connect,'UPDATE `events` SET STATUS="CALCULATED",COMMENT="" WHERE SECTION="'.$section.'"')){
            if(mysqli_query($connect,'CALL findGradePoints("'.$section.'");')){
                if(mysqli_query($connect,'CALL rankupdate("'.$section.'");')){
                    date_default_timezone_set('Asia/Kolkata'); 
                    $date = time();
                    mysqli_query($connect,"INSERT INTO `logs` VALUES (NULL,'".$date."','".$_SESSION['uid']."','".$section."','Grade Points and Rank Points updated!');");
                }
                else{$count=-999;}
            }
            else{$count=-999;}
        }
        else{$count=-999;}
        echo $count;

    }


?>



