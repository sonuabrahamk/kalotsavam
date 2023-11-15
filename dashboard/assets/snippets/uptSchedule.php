<?php
    session_start();
    require('connect.php');

    $section = $_GET['section'];
    $start = $_GET['start'];
    $end = $_GET['end'];
    $venue = $_GET['venue'];

    if($res = mysqli_query($connect,'UPDATE `events` SET START_TIME="'.$start.'", END_TIME="'.$end.'", VENUE="'.$venue.'" WHERE SECTION="'.$section.'"')){
        date_default_timezone_set('Asia/Kolkata'); 
        $date = time();
        mysqli_query($connect,"INSERT INTO `logs` VALUES (NULL,'".$date."','".$_SESSION['uid']."','".$section."','Schedule upt: ST: '".$start."' |ET: '".$end."' |VN: '".$venue."' ');");
        echo "1";
    }
    else{
        echo 'Connection to DB lost';
    }


?>



