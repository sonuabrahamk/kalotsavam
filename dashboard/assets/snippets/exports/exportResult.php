<?php  

// Include the main TCPDF library (search for installation path).
require_once('TCPDF/tcpdf.php');

// create new PDF document
$pdf = new TCPDF('P', PDF_UNIT, 'A3', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('MCY');
$pdf->SetTitle('BK Results');
$pdf->SetSubject('BK Results');


// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM);

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

$cat = $_GET['cat'];
$event = $_GET['event'];
$pname = $_GET['pname'];
$chno = $_GET['chno'];
$parish = $_GET['parish'];
$forane = $_GET['forane'];

$sql = 'SELECT * FROM `master_data` md JOIN `events` e ON e.SECTION = md.SECTION WHERE md.FULL_NAME LIKE "%'.$pname.'%" AND md.CHEST_NO LIKE "%'.$chno.'%" AND md.PARISH LIKE "%'.$parish.'%" AND md.FORANE LIKE "%'.$forane.'%" AND e.NAME LIKE "%'.$event.'%" AND e.CATEGORY LIKE "%'.$cat.'%" AND e.STATUS in ("PUBLISHED","APPROVED") ORDER BY e.CODE ASC, e.NAME ASC, md.STATUS DESC, md.RANK ASC, md.CHEST_NO ASC; ';

require('../connect.php');

if($res = mysqli_query($connect,$sql)){
    while($row = mysqli_fetch_array($res))  
    {     
        if(($row['RANK'] > 0)&&($row['RANK'] <= 3)){
            $content .= '<tr style="background-color: #55efc4">  
                            <td style=""><b>'.$row["CHEST_NO"].'</b><br />
                                '.$row["FULL_NAME"].'<br/>
                                '.$row["PARISH"].'
                            </td>  
                            <td style="">'.$row["GRADE"].'</td>
                            <td style="">'.$row["RANK"].'</td>
                            <td style="">'.$row["POINTS"].'</td>
                        </tr>  
                            ';  
        } 
        else{
            $content .= '<tr>  
                            <td style=""><b>'.$row["CHEST_NO"].'</b><br />
                                '.$row["FULL_NAME"].'<br/>
                                '.$row["PARISH"].'
                            </td>
                            <td style="">'.$row["GRADE"].'</td>
                            <td style="">'.$row["RANK"].'</td>
                            <td style="">'.$row["POINTS"].'</td>
                        </tr>  
                            ';  
        }
    }       
}

$html = <<<EOD
<div style="text-align: center;">
<img src="https://kalotsavam.cbcmandya.com/assets/img/BK_flag.jpg" height="100px" />
</div>
<hr/>
<h5 style="text-align: center;">$event ($cat) Results</h5>
<table cellpadding="8px" style="font-size: 10px; padding-left: 23%;" border="1">
        <tr>
            <th style="width: 25%;padding: 5px 0; font-weight: bold; font-size: 12px;">Participant</th>
            <th style="width: 10%;padding: 5px 0; font-weight: bold; font-size: 12px;">GRADE</th>
            <th style="width: 10%;padding: 5px 0; font-weight: bold; font-size: 12px;">RANK</th>
            <th style="width: 10%;padding: 5px 0; font-weight: bold; font-size: 12px;">POINTS</th>
        </tr>
    $content
</table>
EOD;

// Print text using writeHTML()
$pdf->writeHTML($html, true, false, false, false, '');

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output($event.'_'.$cat.'_Result.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+










 
 ?>  
 