<?php

    session_start();

    if(isset($_SESSION['uid'])){
        if(($_SESSION['category'] != 'SUPERADMIN')){
            header('Location: login.php');
        }
    }
    else{
        header('Location: login.php');
    }

    require ('assets/snippets/connect.php');
    $res = mysqli_query($connect,'SELECT * FROM `master_data` ORDER BY ID');

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="export.csv"');

    $fp = fopen('php://output', 'w');

    fputcsv($fp, array('ID','CHEST_NO','FULL_NAME','PARISH','FORANE','SECTION','JUDGE_1','JUDGE_2','JUDGE_3','MARKS','RANK','RANK_POINTS','GRADE','GRADE_POINTS','POINTS','STATUS','COMMENT'));

    while($row = mysqli_fetch_assoc($res)){
        fputcsv($fp,$row);
    }

    fclose($fp);
?>