<?php

    $cat = $_GET['cat'];
    $event = $_GET['event'];
    $pname = $_GET['pname'];
    $chno = $_GET['chno'];
    $parish = $_GET['parish'];
    $forane = $_GET['forane'];
    $status = $_GET['status'];

    $sql = 'SELECT md.CHEST_NO,md.FULL_NAME,md.PARISH,md.FORANE,md.SECTION,e.NAME,e.CATEGORY, md.STATUS FROM `master_data` md JOIN `events` e ON e.SECTION = md.SECTION WHERE md.FULL_NAME LIKE "%'.$pname.'%" AND md.CHEST_NO LIKE "%'.$chno.'%" AND md.PARISH LIKE "%'.$parish.'%" AND md.FORANE LIKE "%'.$forane.'%" AND e.NAME LIKE "%'.$event.'%" AND e.CATEGORY LIKE "%'.$cat.'%" AND md.STATUS LIKE "%'.$status.'%" ORDER BY md.FORANE, md.PARISH, md.FULL_NAME; ';

    require('connect.php');

    if($res = mysqli_query($connect,$sql)){
        $data = array();
        while($x = mysqli_fetch_array($res)){
            $data[] = $x;
        }                
        $jsonData = json_encode($data);
        echo ($jsonData);
    }

    



?>