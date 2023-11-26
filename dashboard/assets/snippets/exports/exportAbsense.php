<?php  

// Include the main TCPDF library (search for installation path).
require_once('TCPDF/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

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
require('../connect.php');
$content = '';

$cat = $_GET['cat'];
$event = $_GET['event'];
$chno = $_GET['chno'];

$sql = 'SELECT md.CHEST_NO,md.SECTION,e.NAME,e.CATEGORY,md.STATUS FROM `master_data` md JOIN `events` e ON e.SECTION = md.SECTION WHERE md.CHEST_NO LIKE "%'.$chno.'%" AND e.NAME LIKE "%'.$event.'%" AND e.CATEGORY LIKE "%'.$cat.'%" ORDER BY STATUS DESC; ';

$result = mysqli_query($connect, $sql);  
while($row = mysqli_fetch_array($result))  
{   
        if(($row['STATUS'] == 'ABSENT') || ($row['STATUS'] == 'ABSENT')){
            $content .= '<tr style="background-color: #e17055;">  
                    <td style="width: 15%">'.$row["CHEST_NO"].'</td>  
                    <td style="width: 27%;">'.$row["NAME"].'</td>  
                    <td style="width: 27%">'.$row["CATEGORY"].'</td>  
                    <td style="width: 16%">'.$row["SECTION"].'</td>  
                    <td style="width: 15%">'.$row["STATUS"].'</td>  
                </tr>  
                    '; 
        }
        else{
                $content .= '<tr>  
                    <td style="width: 15%">'.$row["CHEST_NO"].'</td>  
                    <td style="width: 27%;">'.$row["NAME"].'</td>  
                    <td style="width: 27%">'.$row["CATEGORY"].'</td>  
                    <td style="width: 16%">'.$row["SECTION"].'</td>  
                    <td style="width: 15%">'.$row["STATUS"].'</td>  
                </tr>  
                    ';  
        }
}

$html = <<<EOD
<img src="https://kalotsavam.cbcmandya.com/assets/img/BK_flag.jpg" /> <hr/>
<h5 style="text-align: center;">Participant List</h5>
<table cellpadding="8px" style="font-size: 10px;" border="1">
    <tr>
        <th style="width: 15%; padding: 10px 0; font-weight: bold; font-size: 12px;">CT NO</th>
        <th style="width: 27%; padding: 10px 0; font-weight: bold; font-size: 12px;">EVENT</th>
        <th style="width: 27%; padding: 10px 0; font-weight: bold; font-size: 12px;">CATEGORY</th>
        <th style="width: 16%; padding: 10px 0; font-weight: bold; font-size: 12px;">SECTION</th>
        <th style="width: 15%; padding: 10px 0; font-weight: bold; font-size: 12px;">STATUS</th>
    </tr>
    $content
</table>
EOD;

// Print text using writeHTML()
$pdf->writeHTML($html, true, false, false, false, '');

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('Participant_Report.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+










 
 ?>  
 