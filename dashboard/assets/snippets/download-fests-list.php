<?php
session_start();
require('connect.php');


// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=all-fests.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('FID','NAME','CATEGORY','TYPE', 'DESCRIPTION', 'INSTITUTION', 'RULES', 'MAXPARTICIPANTS', 'DATE', 'ISACTIVE'));

// fetch the data

$rs2 = mysqli_query($connect, "SELECT 
`FESTS`.`FID`,
`FESTS`.`NAME` `FNAME`,
`FESTS`.`CATEGORY`,
`FESTS`.`TYPE`,
`FESTS`.`DESCRIPTION`,
`INSTITUTIONS`.`NAME` `INAME`,
`FESTS`.`RULES`,
`FESTS`.`MAXPARTICIPANTS`,
`FESTS`.`DATE`,
`FESTS`.`ISACTIVE`

FROM `FESTS`, `INSTITUTIONS` WHERE `FESTS`.`IID` = `INSTITUTIONS`.`IID`");



// loop over the rows, outputting them
while ($row = mysqli_fetch_assoc($rs2)) fputcsv($output, $row);

?>