<?php  

// Include the main TCPDF library (search for installation path).
require_once('TCPDF/tcpdf.php');

// create new PDF document
$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('MCY');
$pdf->SetTitle('BK Results');
$pdf->SetSubject('BK Results');


// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
$pdf->AddPage();

// Set some content to print

$content = '';

$sql = "CALL bibliaStar()";

require('../connect.php');

if($res = mysqli_query($connect,$sql)){
    $count = 1;
    while($row = mysqli_fetch_array($res))  
    {   
        $content .= '<tr>   
                        <td style="font-size: 10px;">'.$row["CATEGORY"].'</td>  
                        <td style="font-size: 10px;">'.$row["FULL_NAME"].'</td>  
                        <td style="font-size: 10px;">'.$row["PARISH"].'</td>  
                        <td style="font-size: 10px;">'.$row["FORANE"].'</td>
                        <td style="font-size: 10px;">'.$row["idv_rkpoint"].'</td>
                        <td style="font-size: 10px;">'.$row["idv_grdpoint"].'</td>
                    </tr>  
                        ';  
    }       
}

$html = <<<EOD
<div style="text-align: center;">
<img src="../../img/BK_flag.jpg" height="100px" />
</div>
<hr/>
<h5 style="text-align: center;">Biblia Stars Points Table</h5>
<table cellpadding="8px" style="font-size: 8px;" border="1">
        <tr>
            <th style="width: 15%;padding: 5px 0; font-weight: bold; font-size: 12px;">CATEGORY</th>
            <th style="width: 25%;padding: 5px 0; font-weight: bold; font-size: 12px;">PARTICIPANT NAME</th>
            <th style="width: 30%;padding: 5px 0; font-weight: bold; font-size: 12px;">PARISH</th>
            <th style="width: 20%;padding: 5px 0; font-weight: bold; font-size: 12px;">FORANE</th>
            <th style="width: 20%;padding: 5px 0; font-weight: bold; font-size: 12px;">RANK POINTS</th>
            <th style="width: 20%;padding: 5px 0; font-weight: bold; font-size: 12px;">GRADE POINTS</th>
        </tr>
    $content
</table>
EOD;

// Print text using writeHTML()
$pdf->writeHTML($html, true, false, false, false, '');

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('Forane_pts_table.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+










 
 ?>  
 