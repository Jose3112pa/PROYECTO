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
        $this->Write(7,'Datos de los pacientes                                                              ');
    }
// Tabla simple
function BasicTable($footer, $data)
{
    
	// Cabecera
	foreach($footer as $col)
		$this->Cell(48,7,$col,1,0,'C');
	$this->Ln();
	// Datos
	while($arreglo=mysqli_fetch_array($data))
	{
	
        
        
        $this->SetFont('HELVETICA','B', 8);
        $this->Cell(48,6,$arreglo[0],1);
        
        $this->SetFont('HELVETICA','B', 8);
        
        $this->Cell(48,6,$arreglo[1],1);
        
        $this->SetFont('HELVETICA','B', 8);
        
        $this->Cell(48,6,$arreglo[2],1);
        
        $this->SetFont('HELVETICA','B', 8);
        
        $this->Cell(48,6,$arreglo[3],1);
        
        


         
        
       
        
        
		$this->Ln();
	}
}

}

$pdf = new PDF();
// T�tulos de las columnas
$header = array('ID',utf8_decode('Nombre'),'Sexo', 'Edad');
// Carga de datos
//$data = $pdf->LoadData('paises.txt');
include('conexi.php');
$link= conexion();
$sql= 'SELECT id, Nombre, Sexo, Edad FROM paciente ';
$consulta=mysqli_query($link,$sql);
$pdf->SetFont('HELVETICA','',8);
$pdf->AddPage();
$pdf->BasicTable($header,$consulta);

//$pdf->ImprovedTable($header,$data);
//$pdf->AddPage();
//$pdf->FancyTable($header,$data);
$pdf->Output();
?>