<?php

    require('connect.php');

    $cat = $_GET['cat'];
    $event = $_GET['event'];

    if(($cat == null)||($event == null)){
        echo "0";
    }
    else{

        if($res = mysqli_query($connect,"SELECT SECTION FROM `events` WHERE CATEGORY='".$cat."' AND NAME='".$event."'")){
            $row = mysqli_fetch_array($res);
            $section = $row[0];
            if($res1 = mysqli_query($connect,"SELECT * FROM `events` WHERE SECTION='".$section."' AND STATUS='VERIFIED'")){
                if(mysqli_num_rows($res1) != 1){
                    echo "1";
                }
                else if($res1 = mysqli_query($connect,"SELECT * FROM `master_data` WHERE SECTION='".$section."' ORDER BY `STATUS` DESC, `RANK` ASC ")){
                    $data = array();
                    while($x = mysqli_fetch_array($res1)){
                        $data[] = $x;
                    }                
                    $jsonData = json_encode($data);
                    echo ($jsonData);
                }
                else{
                    echo "error";
                }
            }
        }
        
    }
    

?>



