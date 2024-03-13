<?php
// Disable deprecated warnings
error_reporting(E_ALL & ~E_DEPRECATED);

require(str_replace("\\","/",getcwd()).'/utils/PDF/fpdf16/fpdf.php');
$pdf=new FPDF();	
$pdf->AddPage();	//Agregar una pagina
$pdf->SetFont('Arial','B',14);	//Letra Arial, negrita (Bold), tam. 20

// Connect to MySQL
$link = mysqli_connect("localhost","root","");
mysqli_select_db($link,"videoteca");

// Query the database
$result=mysqli_query($link,"SELECT id_pelicula,titulo,director,actor from pelicula");

// Add image and title
$pdf->Image('utils/videoteca.jpg',5,8,15);
$pdf->Cell(80,15,'        Videoteca',0,1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'ID       Titulo     Director    Actor',0,1);
$pdf->Cell(0,10,'_____________________________________',0,1); 
$pdf->SetFont('Arial','',10);

// Fetch data from the database and add to PDF
while($row = mysqli_fetch_array($result)) { 
   $id=$row["id_pelicula"];
   $ti=$row["titulo"];
   $di=$row["director"];
   $ac=$row["actor"];
   $pdf->Cell(0,10,$id.'   '.$ti.'    '.$di.'   '.$ac,0,1);
} 

// Set header information and output the PDF
$pdf->SetTextColor(0,0,255);
$pdf->SetFont('','U'); 
$pdf->Output();
mysqli_free_result($result); 
mysqli_close($link);
?>
