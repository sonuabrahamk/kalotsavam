<?php

    require('connect.php');

    $fid = $_POST['input-fid'];
    $eid = $_POST['input-eid'];
    $first = $_POST['input-first'];
    $second = $_POST['input-second'];

    if(mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `RESULTS` WHERE `FID` = ".$fid." AND `EID` = ".$eid." "))){
        mysqli_query($connect, "UPDATE `RESULTS` SET
    `FIRST` = '$first',
    `SECOND` = '$second'
    WHERE `FID` = $fid AND `EID` = $eid");
    }
    else{
        mysqli_query($connect, "INSERT INTO `RESULTS` values(
    $fid,
    $eid,
    $first,
    $second
    )");

    }

    
   
   
    header('Location: ../../event-details.php?fid='.$fid.'&flag=3');



