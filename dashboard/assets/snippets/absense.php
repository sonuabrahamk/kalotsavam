<?php

    $cat = $_GET['cat'];
    $event = $_GET['event'];
    $chno = $_GET['chno'];

    $sql = 'SELECT md.CHEST_NO,md.SECTION,e.NAME,e.CATEGORY, md.STATUS FROM `master_data` md JOIN `events` e ON e.SECTION = md.SECTION WHERE md.CHEST_NO LIKE "%'.$chno.'%" AND e.NAME LIKE "%'.$event.'%" AND e.CATEGORY LIKE "%'.$cat.'%" AND e.STATUS="PENDING" ORDER BY md.STATUS, md.CHEST_NO; ';

    require('connect.php');

    if($res = mysqli_query($connect,$sql)){
        if(mysqli_num_rows($res) > 0){
            $data = array();
            while($x = mysqli_fetch_array($res)){
                $data[] = $x;
            }                
            $jsonData = json_encode($data);
            echo ($jsonData);
        }
        else{
            echo "0";
        }
    }

    



?>