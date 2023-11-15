<?php

    require('connect.php');

    $eid = $_REQUEST['eid'];
    $fid = $_REQUEST['fid'];

    mysqli_query($connect, "DELETE FROM `EVENTS` WHERE `EID` = $eid");

   
   
    header('Location: ../../event-details.php?flag=2&fid='.$fid);



