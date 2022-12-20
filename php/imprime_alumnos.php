<?php
require('fpdf184/fpdf.php');

class PDF extends FPDF
{
    function header(){
        $this->SetFont('Courier','B', 30);
        $this->Write(8, '
        

        Sistema de Oxigenacion y Ritmo Cardiaco                               ');
        
        $this->Image('img/logo.png', 160, -1,40,40,'png');
        $this->Image('img/logo1.png', 10, -1,55,40,'png');
        $this->SetFont('HELVETICA','B', 19);
        $this->Write(7,'Los datos capturados por el sistema son los que se muestran en la siguiente tabla                                                 ');
    }
// Tabla simple
function BasicTable($footer, $data)
{
    
	// Cabecera
	foreach($footer as $col)
		$this->Cell(40,7,$col,1,0,'C');
	$this->Ln();
	// Datos
	while($arreglo=mysqli_fetch_array($data))
	{
	
        $this->Ln();
        $this->Ln();
        $this->SetFont('HELVETICA','B', 12);
        $this->Write(7,'Su id registrado es:');
        $this->Ln();
        $this->Cell(180,6,$arreglo[0],1);
        $this->Ln();
        $this->SetFont('HELVETICA','B', 12);
        $this->Write(7,'Nombre:');
        $this->Ln();
        $this->Cell(180,6,$arreglo[1],1);
        $this->Ln();
        $this->SetFont('HELVETICA','B', 12);
        $this->Write(7,'Sexo:');
        $this->Ln();
        $this->Cell(180,6,$arreglo[2],1);
        $this->Ln();
        $this->SetFont('HELVETICA','B', 12);
        $this->Write(7,'Edad:');
        $this->Ln();
        $this->Cell(180,6,$arreglo[3],1);
        $this->Ln();
        $this->SetFont('HELVETICA','B', 12);
        $this->Write(7,'Nivel de oxigenacion y estado de salud de oxigenacion:');
        $this->Ln();
        $this->SetFont('HELVETICA','B', 6);
        $this->Cell(180,6,$arreglo[4],1);
        $this->Ln();  
        $this->SetFont('HELVETICA','B', 12);
        $this->Write(7,'Ritmo Cardiaco y estado de salud cardiaca:');
        $this->Ln();  
        $this->SetFont('HELVETICA','B', 6);
        $this->Cell(180,6,$arreglo[5],1);
       
        
        
		$this->Ln();
	}
}
function footer(){
    $this->Image('img/logo2.png', 20, 199,40,40,'png');
    $this->SetFont('Arial','B', 12);
    $this->Write(6,'
    
    
    
    
    
    
    
    
    ____________________
    Firma del Ing.Adrian');
}
}

$pdf = new PDF();
// T�tulos de las columnas
$header = array('ID',utf8_decode('Nombre'),'Sexo', 'Edad','Nivel de oxigenacion, estado de salud y recomendaciones','Ritmo cardiaco, estado de salud y recomendaciones');
// Carga de datos
//$data = $pdf->LoadData('paises.txt');
include('conexi.php');
$link= conexion();
$sql= 'SELECT id, Nombre, Sexo, Edad, enf_rec, enf_rec_ FROM paciente ORDER by id DESC LIMIT 1';
$consulta=mysqli_query($link,$sql);
$pdf->SetFont('HELVETICA','',8);
$pdf->AddPage();
$pdf->BasicTable($header,$consulta);

//$pdf->ImprovedTable($header,$data);
//$pdf->AddPage();
//$pdf->FancyTable($header,$data);
$pdf->Output();
?>

