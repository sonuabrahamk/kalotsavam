<?php

$id = $_GET['ID'];
$rank = $_GET['RANK'];
$section = $_GET['SECTION'];

require('connect.php');

if($res = mysqli_query($connect,'UPDATE `master_data` SET RANK='.$rank.' WHERE id="'.$id.'"')){
    if($upt = mysqli_query($connect,'UPDATE `master_data` SET RANK_POINTS = (CASE WHEN (RANK = 1) THEN 10 WHEN (RANK = 2) THEN 5 WHEN (RANK = 3) THEN 3 ELSE 0 END) WHERE SECTION = "'.$section.'"')){
        if($upt = mysqli_query($connect,'UPDATE `master_data` SET POINTS = RANK_POINTS + GRADE_POINTS WHERE SECTION = "'.$section.'"')){
            $data = array();
            if($res1 = mysqli_query($connect,'SELECT * FROM `master_data` WHERE ID="'.$id.'"')){
                while($x = mysqli_fetch_array($res1)){
                    $data[] = $x;
                }                
                $jsonData = json_encode($data);
                echo ($jsonData);
            }
        }
    }
}

?>