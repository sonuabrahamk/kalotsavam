<?php

    require('connect.php');

    $section = $_GET['section'];
    $comment = $_GET['comment'];
    $status = '';

    if($res = mysqli_query($connect,'SELECT * FROM `events` WHERE SECTION="'.$section.'"')){
        if($row = mysqli_fetch_array($res)){
            if($row['STATUS'] == 'CALCULATED'){
                $status='PENDING';
            }
            else if($row['STATUS'] == 'VERIFIED'){
                $status='CALCULATED';
            }
            else if($row['STATUS'] == 'APPROVED'){
                $status='VERIFIED';
            }
            else if($row['STATUS'] == 'PUBLISHED'){
                $status='APPROVED';
            }
            else{
                echo 'Unknown Status!';
            }
        }
        if(mysqli_query($connect,'UPDATE `events` SET STATUS="'.$status.'",COMMENT="'.$comment.'" WHERE SECTION="'.$section.'"')){
            echo 'Rejected the event scores to previous level!';
        }
    }

?>