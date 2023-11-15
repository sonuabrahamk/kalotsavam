<?php

    session_start();

    require('connect.php');

    $section = $_GET['section'];

    if(mysqli_query($connect,'UPDATE `events` SET STATUS="APPROVED",COMMENT="" WHERE SECTION="'.$section.'"')){
        date_default_timezone_set('Asia/Kolkata'); 
        $date = time();
        mysqli_query($connect,"INSERT INTO `logs` VALUES (NULL,'".$date."','".$_SESSION['uid']."','".$section."','Scores has been approved.');");
        echo 'Successfully approved the Scores and ready to be published!';
    }

?>