<?php

    require('assets/snippets/connect.php');

    $old = $_GET['old'];
    $newpwd = $_GET['newpwd'];
    $user = $_GET['user'];

    if($res = mysqli_query($connect, "SELECT * from `users` WHERE USERNAME='".$user."' AND PASSWORD='".$old."';")){
        if(mysqli_num_rows($res) == 1){
            $row = mysqli_fetch_array($res);
            mysqli_query($connect,"UPDATE `users` SET PASSWORD='".$newpwd."',LAST_LOGIN=1 WHERE USERNAME='".$user."' AND PASSWORD='".$old."'");
            session_start();
            $_SESSION['category'] = $row['CATEGORY'];
            $_SESSION['uid'] = $row['ID'];
            header('Location: index.php');
        }
        else{
            // header('Location: login.php');
        }
    }

    // header('Location: ../../login.php');



