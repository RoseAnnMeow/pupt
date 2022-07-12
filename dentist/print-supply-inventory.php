<?php

include("logics-builder-pdf.php");
include('../admin/config/dbconn.php');

$reportTitle = "Supply Inventory";
$datetime = date('F Y');

$pdf = new LB_PDF('L', false, $reportTitle, $datetime);
$pdf->SetMargins(15, 10);
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',12);
$pdf->AddPage();

$titlesArr = array('Date', 'Unit', 'Supplies', 
'Quantity','Consumed','Total');

$pdf->SetWidths(array(25, 25, 95, 40, 40, 40));
$pdf->SetAligns(array('L', 'L', 'L', 'C', 'C', 'C'));
// $pdf->Ln();
// $pdf->Ln();
 $pdf->Ln(15);

$pdf->AddTableHeader($titlesArr);

$sql= "SELECT s.received,s.supply_name,s.unit,ss.current_stock,ss.consumed,ss.total
        FROM supplies s INNER JOIN supply_stocks ss 
        ON s.id = ss.supply_id
        ORDER BY s.id ASc";
$results = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($results))
{
        
        $data = array(
            null,
            $row['unit'],
            $row['supply_name'],
            $row['current_stock'],
            $row['consumed'],
            $row['total']        
        );

	$pdf->AddRow($data);           
}

$pdf->Output('print-medicine-inventory.pdf', 'I');
?>