<?php  

// Include the main TCPDF library (search for installation path).
require_once('TCPDF/tcpdf.php');

// create new PDF document
$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

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

$sql = "SELECT * FROM `master_data` mdata JOIN `events` e on e.STATUS='PUBLISHED' AND e.SECTION = mdata.SECTION WHERE e.STATUS='PUBLISHED' AND RANK > 0 AND RANK < 4 ORDER BY e.CERTIFICATE ASC, RANK ASC, CHEST_NO ASC";

require('../connect.php');

if($res = mysqli_query($connect,$sql)){
    $prev = '';
    while($row = mysqli_fetch_array($res))  
    {     

        if($row['SECTION'] != $prev){
            $content .= '<tr style="background-color: #55efc4">  
                            <td style="text-align: center; font-size: 14px; font-weight: bold" colspan="9">'.$row["NAME"].' | '.$row["CATEGORY"].'</td> 
                        </tr> 
                        <tr>
                            <th style="width: 6%;padding: 5px 0; font-weight: bold; font-size: 10px;">CT NO</th>
                            <th style="width: 15%;padding: 5px 0; font-weight: bold; font-size: 10px;">NAME</th>
                            <th style="width: 25%;padding: 5px 0; font-weight: bold; font-size: 10px;">PARISH</th>
                            <th style="width: 12%;padding: 5px 0; font-weight: bold; font-size: 10px;">FORANE</th>
                            <th style="width: 14%;padding: 5px 0; font-weight: bold; font-size: 10px;">EVENT</th>
                            <th style="width: 10%;padding: 5px 0; font-weight: bold; font-size: 10px;">CATEGORY</th>
                            <th style="width: 6%;padding: 5px 0; font-weight: bold; font-size: 10px;">GRADE</th>
                            <th style="width: 6%;padding: 5px 0; font-weight: bold; font-size: 10px;">RANK</th>
                            <th style="width: 6%;padding: 5px 0; font-weight: bold; font-size: 10px;">POINTS</th>
                        </tr> 
                            ';  
            $prev = $row['SECTION'];
        }  
        $content .= '<tr>  
                        <td style="">'.$row["CHEST_NO"].'</td>  
                        <td style="">'.$row["FULL_NAME"].'</td>  
                        <td style="">'.$row["PARISH"].'</td>  
                        <td style="">'.$row["FORANE"].'</td>  
                        <td style="">'.$row["NAME"].'</td>  
                        <td style="">'.$row["CATEGORY"].'</td> 
                        <td style="">'.$row["GRADE"].'</td>  
                        <td style="">'.$row["RANK"].'</td>   
                        <td style="">'.$row["POINTS"].'</td>  
                    </tr>  
                        '; 
    }       
}

$html = <<<EOD
<div style="text-align: center;">
<img src="https://kalotsavam.cbcmandya.com/assets/img/BK_flag.jpg" height="100px" />
</div>
<hr/>
<h5 style="text-align: center;">Consolidated Results</h5>
<table cellpadding="8px" style="font-size: 8px;" border="1">
    $content
</table>
EOD;

// Print text using writeHTML()
$pdf->writeHTML($html, true, false, false, false, '');

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('Consolidated_Result.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+










 
 ?>  
 