<?php
    require ('connect.php');
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $category=$_POST['category'];
    $sql="INSERT INTO users VALUES(NULL,'".$name."','".$email."','".$phone."','".$password."','".$category."',0)";
    if(mysqli_query($connect,$sql)){
        echo json_encode(array("statusCode"=>200));
    }
    else
    {
        echo json_encode(array("statusCode"=>201));
    }
    mysqli_close($connect);
?>