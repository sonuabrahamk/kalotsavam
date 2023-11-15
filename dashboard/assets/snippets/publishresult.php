<?php

    session_start();

    require('connect.php');

    $section = $_GET['section'];

    if(mysqli_query($connect,'UPDATE `events` SET STATUS="PUBLISHED", COMMENT="" WHERE SECTION="'.$section.'"')){
        date_default_timezone_set('Asia/Kolkata'); 
        $date = time();
        mysqli_query($connect,"INSERT INTO `logs` VALUES (NULL,'".$date."','".$_SESSION['uid']."','".$section."','Result has been published.');");
        echo 'Successfully published the Scores to public!';
    }

?>