<?php 
	ob_start ();
	require_once("FPDF/fpdf.php");

	$header = array("Nombre", "Apellido", "DNI", "Email", "Telefono");

	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial',"",16);

	$pdf->Cell(40,10,'Postulantes',1,1,"C");
	
	$pdf->SetFont('Courier',"",10);
	
	// Colores, ancho de línea y fuente en negrita
    $pdf->SetFillColor(255,0,0);
    $pdf->SetTextColor(255);
    $pdf->SetDrawColor(128,0,0);
    $pdf->SetLineWidth(.1);
    $pdf->SetFont('','B');
    // Cabecera
    $w = array(25, 25, 40, 50, 50);
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'A',true);
    $pdf->Ln();
    // Restauración de colores y fuentes
    $pdf->SetFillColor(224,235,255);
    $pdf->SetTextColor(0);
    $pdf->SetFont('');
    // Datos
    $fill = false;
    
    foreach($list as $row)
    {   
        if($row != null){
            $pdf->Cell($w[0],6,$row->getFirstName(),'LR',0,'L',$fill);
            $pdf->Cell($w[1],6,$row->getLastName(),'LR', 0, 'L',$fill);
            $pdf->Cell($w[2],6,$row->getDni(),'LR',0,'L',$fill);
            $pdf->Cell($w[3],6,$row->getEmail(),'LR',0,'L',$fill);
            $pdf->Cell($w[4],6,$row->getPhoneNumber(),'LR',0,'L',$fill);
            $pdf->Ln();
            $fill = !$fill;   
        }
        
    }
    // Línea de cierre
    $pdf->Cell(array_sum($w),0,'','T');
	
	$pdf->Output();
	ob_end_flush();


 ?>