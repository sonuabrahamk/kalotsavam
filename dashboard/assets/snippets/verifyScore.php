<?php

$id = $_GET['ID'];
$j1 = $_GET['J1'];
$j2 = $_GET['J2'];
$j3 = $_GET['J3'];

require('connect.php');

if($res = mysqli_query($connect,'SELECT * FROM `master_data` WHERE ID="'.$id.'"')){
    if($row = mysqli_fetch_array($res)){
        if(($row['JUDGE_1'] == $j1)&&($row['JUDGE_2'] == $j2)&&($row['JUDGE_3'] == $j3)){
            $total = $j1 + $j2 + $j3;
            $percent = $total * 0.3;
            if($percent >= 70){
                $grade = 'A';
                $grade_points = 5;
            }
            else if(($percent >= 60)&&($percent < 70)){
                $grade = 'B';
                $grade_points = 3;
            }
            else if(($percent >= 45)&&($percent < 60)){
                $grade = 'C';
                $grade_points = 1;
            }
            else{
                $grade = 'D';
                $grade_points = 0;
            }

            mysqli_query($connect,'UPDATE `master_data` SET MARKS="'.$total.'",GRADE="'.$grade.'",GRADE_POINTS="'.$grade_points.'" WHERE ID="'.$id.'"');
              
            $data = array();
            if($res1 = mysqli_query($connect,'SELECT * FROM `master_data` WHERE ID="'.$id.'"')){
                while($x = mysqli_fetch_array($res1)){
                    $data[] = $x;
                }                
                $jsonData = json_encode($data);
                echo ($jsonData);
            }
        }
        else{
            echo '1';
        }
    }
}

?>