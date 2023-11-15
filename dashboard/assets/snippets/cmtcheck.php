<?php


$section = $_GET['section'];

require('connect.php');

if($res = mysqli_query($connect,"SELECT COMMENT FROM `events` WHERE SECTION='".$section."'")){
    $row = mysqli_fetch_array($res);
    echo $row['COMMENT'];
}
else{
    echo 'Error occured in checking for comments.';
}

?>