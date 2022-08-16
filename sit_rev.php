<?php
require('fpdf184/fpdf.php');
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

class PDF extends FPDF
{

  function Header()
  {
    $this->AddLink();
    $this->Image('images/LOGOPROV.png',10,5,20,0,'');
    $this->SetFont('Arial','B',18);
    $this->Cell(80);
    $this->Cell(30,5, iconv('UTF-8','ISO-8859-2','SITUACIÓN DE REVISTA'),0,1,'C');
    $this->SetFont('Arial','B',14);
    $this->Cell(80);
    $this->Cell(30,10,iconv('UTF-8','ISO-8859-2','Dirección General de Personal'),0,1,'C');
    $this->Line(200,35,10,35);
    $this->Ln(11);

  }

  function Footer()
  {
    $this->SetY(-18);
    $this->SetFont('Arial','I',10);
    //$this->AddLink();
    $this->Cell(5,10,'D.I.C. & S.E.',0,0,'L');
    $this->SetFont('Arial','I',9);
    $this->Line(200,280,10,280);
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().' de {nb}',0,0,'C');

  }

}
$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages();

function invertir_fecha($fecha)
{
   $fecha = str_replace("/","-",$fecha);
   list($uno,$dos,$tres)=  explode("-",$fecha);
   $fec= $tres."-".$dos."-".$uno;
   return $fec;

}
  $id = $_GET['id'];

  $consulta = "SELECT * FROM personal WHERE id = '$id'";
  $resultado = $conexion->prepare($consulta);
  $resultado->execute();
  $data=$resultado->fetchAll(PDO::FETCH_ASSOC);



  foreach($data as $row) {
    $pdf->Image('images/'.$row['legajo'].'/'.$row['dni'].'.jpg',170,5,30,0,'');
    $pdf->setFillColor(255,255,255);
    $pdf->SetFont('Arial','B',13);
    $pdf->Cell(54,10,'APELLIDO Y NOMBRE:',0,0,'R');
    $pdf->SetFont('Arial','',13);
    $pdf->Cell(120,10,$row['apellido'].' '.$row['nombre'],0,0,1,'L');
    $pdf->Ln(9);
    $pdf->SetFont('Arial','B',13);
    $pdf->Cell(54,10,'LEGAJO:',0,0,'R');
    $pdf->SetFont('Arial','',13);
    $pdf->Cell(47,10,$row['legajo'],0,0,1,'R');
    $pdf->SetFont('Arial','B',13);
    $pdf->Ln(9);
    $pdf->Cell(54,10,utf8_decode('CUADRO JERÁRQUICO:'),0,0,'R');
    $pdf->SetFont('Arial','',13);
    $pdf->Cell(44,10,$row['cuadro_jerarquico'],0,0,1,'R');
    $pdf->Ln(9);
    $pdf->SetFont('Arial','B',13);
    $pdf->Cell(54,10,'CUIL:',0,0,'R');
    $pdf->SetFont('Arial','',13);
    $pdf->Cell(47,10,$row['cuil'],0,0,1,'R');
    $pdf->Ln(9);
    $pdf->setFont('Arial','B',13);
    $pdf->Cell(54,10,'FECHA DE INGRESO:',0,0,'R');
    $pdf->SetFont('Arial','',13);
    $pdf->Cell(47,10,invertir_fecha($row['fingreso']),0,0,1,'R');
    $pdf->Ln(9);
    $pdf->SetFont('Arial','B',13);
    $pdf->Cell(54,10,'LOCALIDAD:',0,0,'R');
    $pdf->SetFont('Arial','',13);
    $pdf->Cell(47,10,$row['localidad'],0,0,1,'R');
  }

  $cons_dom = "SELECT d.* FROM domicilio as d INNER JOIN personal as p ON d.personal_id = p.id AND p.legajo LIKE '$id'";
  $res = $conexion->prepare($cons_dom);
  $res->execute();
  $dom=$res->fetchAll(PDO::FETCH_ASSOC);

foreach ($dom as $cel) {
  $pdf->SetFont('Arial','B',13);
  $pdf->Cell(54,10,'DOMICILIO:',0,0,'R');
  $pdf->SetFont('Arial','',13);
  $pdf->Cell(120,10,$cel['calle'],0,0,1,'L');
  $pdf->Ln(9);
}

$pdf->Output();
 ?>
