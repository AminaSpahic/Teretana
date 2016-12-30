
<?php
require('fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(32,10,'Izvjestaj',1,0,'C');
	//Line break
    $this->Ln(20);
	//Subtitle
	$this->Cell(0,10,'Spisak clanova teretane',0,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$xmlfajl= 'xmlovi/clanovi.xml';
if(file_exists($xmlfajl)){
	$files= simplexml_load_file($xmlfajl);
}
$i=1;
	foreach($files->data as $file){
		$pdf->Cell(0,10,'Clan broj '.$i.':',0,2);

	    $pdf->Cell(0,10,'Ime :' .$file->name,0,1);
		$pdf->Cell(0,10,'Prezime :' .$file->lastname,0,1);
		$pdf->Cell(0,10,'Email :' .$file->email,0,1);

		$i=$i+1;
	}
$pdf->Output();
?>
