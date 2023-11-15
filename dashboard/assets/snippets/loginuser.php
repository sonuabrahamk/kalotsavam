<?php
    require('connect.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql="SELECT * from `users` WHERE USERNAME='".$username."' AND PASSWORD='".$password."';";
    if($res = mysqli_query($connect,$sql)){
        if(mysqli_num_rows($res) == 1){
            if($row = mysqli_fetch_array($res)){
                if($row['LAST_LOGIN'] == 0){
                    echo json_encode(array("statusCode"=>100));
                }
                else{
                    session_start();
                    $_SESSION['category'] = $row['CATEGORY'];
                    $_SESSION['uid'] = $row['ID'];
                    echo json_encode(array("statusCode"=>200));
                }
            }
        }
        else{
            echo json_encode(array("statusCode"=>'Invalid Credentials!!'));
        }        
    }
    else
    {
        echo json_encode(array("statusCode"=>201));
    }
?>