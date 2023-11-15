<?php

    require('connect.php');

    $name = $_POST['input-name'];
    $email = $_POST['input-email'];
    $dob = $_POST['input-dob'];
    $qual = $_POST['input-qualification'];
    $address = $_POST['input-address'];
    $iid = $_POST['input-iid'];
    $contact = $_POST['input-contact'];

    $uid = $_POST['input-uid'];

    mysqli_query($connect, "UPDATE `USERS` SET 
    `NAME` = '$name',
    `EMAIL` = '$email',
    `DOB` = '$dob',
    `ADDRESS` = '$address',
    `CONTACT` = '$contact',
    `QUALIFICATION` = '$qual',
    `IID` = '$iid' WHERE `UID` = $uid");

    


    header('Location: ../../user.php?flag=1');



