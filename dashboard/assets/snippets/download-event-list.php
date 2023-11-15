<?php
session_start();
require('connect.php');

$fid = $_REQUEST['fid'];
$eid = $_REQUEST['eid'];

$rw0 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM `FESTS` WHERE `FID` = ".$fid));
$rw1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM `EVENTS` WHERE `EID` = ".$eid));

// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename='.$rw0['NAME'].'-'.$rw1['NAME'].'.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('UID','NAME','INSTITUTION','TEAM'));

// fetch the data

$rs2 = mysqli_query($connect, "SELECT 
`REGISTRATIONS`.`UID`,
`USERS`.`NAME` `PARTICIPANT NAME`,
`INSTITUTIONS`.`NAME` `INSTITUTION NAME`,
`REGISTRATIONS`.`TEAM` 
FROM `REGISTRATIONS`,`USERS`,`INSTITUTIONS`, `EVENTS`
WHERE 
`REGISTRATIONS`.`EID` = ".$rw1['EID']." AND 
`EVENTS`.`FID` = ".$fid." AND 
`USERS`.`UID` = `REGISTRATIONS`.`UID` AND
`EVENTS`.`EID` = `REGISTRATIONS`.`EID` AND
`INSTITUTIONS`.`IID` = `USERS`.`IID`  
ORDER BY `REGISTRATIONS`.`TEAM`");



// loop over the rows, outputting them
while ($row = mysqli_fetch_assoc($rs2)) fputcsv($output, $row);

?>