<?php

include("logics-builder-pdf.php");
include('../admin/config/dbconn.php');

$reportTitle = "Medicine Inventory";

$pdf = new LB_PDF('L', false, $reportTitle);
$pdf->SetMargins(15, 10);
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',12);
$pdf->AddPage();

$titlesArr = array('Date', 'Unit', 'Medicines', 
'Quantity','Consumed','Total');

$pdf->SetWidths(array(25, 25, 95, 40, 40, 40));
$pdf->SetAligns(array('L', 'L', 'L', 'C', 'C', 'C'));
// $pdf->Ln();
// $pdf->Ln();
 $pdf->Ln(15);

$pdf->AddTableHeader($titlesArr);

$sql= "SELECT m.received,m.med_name,m.unit,ms.current_stock,ms.consumed,ms.total
        FROM medicines m INNER JOIN medicine_stocks ms 
        ON m.id = ms.medicines_id
        ORDER BY m.id ASc";
$results = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($results))
{
        
        $data = array(
            date('Y-m-d',strtotime($row['received'])),
            $row['unit'],
            $row['med_name'],
            $row['current_stock'],
            $row['consumed'],
            $row['total']        
        );

	$pdf->AddRow($data);           
}

$pdf->Output('print-medicine-inventory.pdf', 'I');
?>