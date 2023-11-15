<?php

    session_start();

    require ('connect.php');

    $tmp = $_GET['passData'];

    $tmp_json = json_decode($tmp,true);

    $count = 0;

    date_default_timezone_set('Asia/Kolkata'); 
    $date = time();

    $length = count($tmp_json);

    for($i=0; $i < $length; $i++){
        $status = $tmp_json[$i]['val'];
        $chestno = $tmp_json[$i]['chestno'];
        if($res = mysqli_query($connect,'UPDATE `master_data` SET STATUS="'.$status.'", JUDGE_1="0", JUDGE_2="0", JUDGE_3="0",MARKS="0",GRADE="-",GRADE_POINTS="0",RANK="0",RANK_POINTS="0",POINTS="0" WHERE CHEST_NO="'.$chestno.'"')){
            $count++;
            mysqli_query($connect,"INSERT INTO `logs` VALUES (NULL,'".$date."','".$_SESSION['uid']."','".$chestno."','Chest No: ".$chestno." marked as ".$status.".');");
        }
        else{
            $count--;
        }
    }

    if($count == $length){
        echo "Successfully updated ".(count($tmp_json))." records!";
    }
    else{
        echo "Error in updating some of the items. Please retry!!";
    }

?>