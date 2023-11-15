<?php

    require('connect.php');

    $cat = $_GET['cat'];
    $event = $_GET['event'];
    $pname = $_GET['pname'];
    $chno = $_GET['chno'];
    $parish = $_GET['parish'];
    $forane = $_GET['forane'];

    $sql = 'SELECT * FROM `master_data` md JOIN `events` e ON e.SECTION = md.SECTION WHERE md.FULL_NAME LIKE "%'.$pname.'%" AND md.CHEST_NO LIKE "%'.$chno.'%" AND md.PARISH LIKE "%'.$parish.'%" AND md.FORANE LIKE "%'.$forane.'%" AND e.NAME LIKE "%'.$event.'%" AND e.CATEGORY LIKE "%'.$cat.'%" AND e.STATUS in ("PUBLISHED","APPROVED") ORDER BY md.STATUS DESC, e.CODE ASC, e.NAME ASC, md.RANK ASC, md.CHEST_NO ASC; ';

    if($res = mysqli_query($connect,$sql)){
        $data = array();
        while($x = mysqli_fetch_array($res)){
            $data[] = $x;
        }                
        $jsonData = json_encode($data);
        echo ($jsonData);
    }
?>



