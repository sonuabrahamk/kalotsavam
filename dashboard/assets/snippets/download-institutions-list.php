<?php
session_start();
require('connect.php');


// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=all-institutions.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('IID','NAME','ADDRESS'));

// fetch the data

$rs2 = mysqli_query($connect, "SELECT * FROM `INSTITUTIONS`");



// loop over the rows, outputting them
while ($row = mysqli_fetch_assoc($rs2)) fputcsv($output, $row);

?>