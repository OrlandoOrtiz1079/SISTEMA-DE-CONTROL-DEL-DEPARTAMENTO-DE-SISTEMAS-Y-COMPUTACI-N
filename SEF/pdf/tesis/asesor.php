<?php
session_start();

require '../FPDF/fpdf.php';
require '../../controladores/jerarquia.controlador.php';
require '../../modelos/jerarquia.modelo.php';
class PDF extends FPDF
{
    public $docente;
    public function Header()
    {
        $this->SetFont('Arial', 'B', '10');
        $this->Image('../img/cabecera.png', 10, 10, 185, 27, 'PNG');
        $this->Ln(35); //NOTE no borrar
    }
    public function Footer()
    {
        $this->Image('../img/pie.jpg', 30, 258, 171, 20);
    }
}

$tabla = "jerarquia";
$puesto = "JEFE DEL DEPTO. DE SISTEMAS Y COMPUTACIÓN";
$puesto2 = "SUBDIRECTOR ACADÉMICO";
$res2 = ControladorJerarquia::ctrMostrarDocentesJerarquia2($tabla, $puesto);
$res3 = ControladorJerarquia::ctrMostrarDocentesJerarquia2($tabla, $puesto2);

$fecha = $_POST["fecha"];
$docente = $_POST["docente"];
$periodo = $_POST["periodo"];
$p1 = $_POST['p1'];
$p2 = $_POST['p2'];
$p3 = $_POST['p3'];
$p4 = $_POST['p4'];
$p5 = $_POST['p5'];
$p6 = $_POST['p6'];
$p7 = $_POST['p7'];
$p8 = $_POST['p8'];

$pdf = new PDF('P', 'mm', 'Letter');
$pdf->AddPage();
$pdf->AddFont('helvetica');
$h = $pdf->GetPageHeight();
$w = $pdf->GetPageWidth();
$pdf->SetTitle(utf8_decode('Constancia_de_liberación_de_actividades_' . $docente));
$pdf->Cell(88);
$pdf->SetFont('helvetica','B', '10');
$pdf->Cell(20, 10, utf8_decode('DEPARTAMENTO DE SISTEMAS Y COMPUTACIÓN'), 0, 1, 'L');
$pdf->Cell(138);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('helvetica','', '9');

$pdf->Cell(10, 5, 'Iguala, Gro. a ' . $fecha, 0, 1, 'L');
$pdf->Cell(105);
$pdf->SetFont('helvetica','B', '10');
$pdf->Cell(15, 5, 'ASUNTO:   ', 0, 0, 'L');
$pdf->SetFont('helvetica','', '9');
$pdf->Cell(15, 5, utf8_decode('   CONSTANCIA DE LIBERACIÓN DE'), 0, 1, 'L');

$pdf->Cell(122);
$pdf->SetFont('helvetica','', '9');
$pdf->Cell(15, 5, '  ACTIVIDADES FRENTE A GRUPO', 0, 1, 'L');
$pdf->Ln(5); //CELDA DE ESPACIO

$pdf->SetFont('helvetica','B', '10');
$pdf->Cell(19);
$pdf->Cell(80, 6, utf8_decode($docente), 0, 1, 'L');
$pdf->Cell(19);
$pdf->Cell(80, 4, 'PRESENTE.', 0, 1, 'L');
$pdf->Ln(5); //CELDA DE ESPACIO

$pdf->SetFont('helvetica','', '9');
$pdf->Cell(19);
$pdf->Cell(0, 0, utf8_decode('Por medio de la presente se hace de su conocimiento que durante el semestre '), 10, 1, 'L');

$resultado = substr($fecha, 0, 4);
$pdf->Cell(131);
$pdf->SetFont('helvetica','B', '9');
$pdf->Cell(15, 0, $periodo ." ".$resultado, 0, 1, 'L');

$pdf->Cell(155);
$pdf->SetFont('helvetica','', '9');
$pdf->Cell(15, 4, utf8_decode(' '), 0, 1, 'L');



$pdf->Cell(19);
$pdf->SetFont('helvetica','', '9');
$pdf->Cell(0, 0, utf8_decode('se evaluó el cumplimiento de las siguientes actividades docentes:'), 0, 1, 'L');
$pdf->Ln(4); //CELDA DE ESPACIO

// Table head
$pdf->Cell(20);
$pdf->SetFont('helvetica','B', '9');
$pdf->Cell(8, 5, "NO.", 1);
$pdf->Cell(123, 5, "ACTIVIDADES", 1, 0, 'C');
$pdf->Cell(8, 5, "SI", 1, 0, 'C');
$pdf->Cell(8, 5, "NO", 1, 0, 'C');
$pdf->Cell(8, 5, "N/A", 1, 0, 'C');
$pdf->Ln(5);

//Table body
// Pregunta 1
$pdf->Cell(20);
$pdf->SetFont('helvetica','', '9');
$pdf->Cell(8, 8, "1", 1, 0, 'C');
$pdf->MultiCell(123, 4, utf8_decode("La elaboración y entrega de la dosificación de la planeación del curso y avance programático de las materias impartidas."), 1);
$pdf->SetFont('helvetica','B', '9');
$pdf->Ln(-8);
if ($p1 == "SI") {
    $pdf->Cell(151);
    $pdf->Cell(8, 8, "X", 1, 0, 'C');
    $pdf->Cell(8, 8, " ", 1, 0, 'C');
    $pdf->Cell(8, 8, " ", 1, 0, 'C');
} else  if ($p1 == "NO") {
    $pdf->Cell(151);
    $pdf->Cell(8, 8, " ", 1, 0, 'C');
    $pdf->Cell(8, 8, "X", 1, 0, 'C');
    $pdf->Cell(8, 8, " ", 1, 0, 'C');
} else {
    $pdf->Cell(151);
    $pdf->Cell(8, 8, " ", 1, 0, 'C');
    $pdf->Cell(8, 8, " ", 1, 0, 'C');
    $pdf->Cell(8, 8, "X", 1, 0, 'C');
}
// Pregunta 2
$campop2 = 5;
$pdf->Ln(8);
$pdf->Cell(20);
$pdf->SetFont('helvetica','', '9');
$pdf->Cell(8, $campop2, "2", 1, 0, 'C');
$pdf->MultiCell(123, $campop2, utf8_decode("La elaboración y entrega de la instrumentación didáctica."), 1);
$pdf->SetFont('helvetica','B', '9');
$pdf->Ln(-$campop2);
if ($p2 == "SI") {
    $pdf->Cell(151);
    $pdf->Cell(8, $campop2, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop2, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop2, " ", 1, 0, 'C');
} else  if ($p2 == "NO") {
    $pdf->Cell(151);
    $pdf->Cell(8, $campop2, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop2, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop2, " ", 1, 0, 'C');
} else {
    $pdf->Cell(151);
    $pdf->Cell(8, $campop2, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop2, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop2, "X", 1, 0, 'C');
}

// Pregunta 3
$campop3 = 5;
$pdf->Ln(5);
$pdf->Cell(20);
$pdf->SetFont('helvetica','', '9');
$pdf->Cell(8, $campop3, "3", 1, 0, 'C');
$pdf->MultiCell(123, $campop3, utf8_decode("El 100% del contenido de los programas de estudio."), 1);
$pdf->SetFont('helvetica','B', '9');
$pdf->Ln(-$campop3);
if ($p3 == "SI") {
    $pdf->Cell(151);
    $pdf->Cell(8, $campop3, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop3, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop3, " ", 1, 0, 'C');
} else  if ($p3 == "NO") {
    $pdf->Cell(151);
    $pdf->Cell(8, $campop3, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop3, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop3, " ", 1, 0, 'C');
} else {
    $pdf->Cell(151);
    $pdf->Cell(8, $campop3, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop3, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop3, "X", 1, 0, 'C');
}

// Pregunta 4
$campop4 = 5;
$pdf->Ln(5);
$pdf->Cell(20);
$pdf->SetFont('helvetica','', '9');
$pdf->Cell(8, $campop4, "4", 1, 0, 'C');
$pdf->MultiCell(123, $campop4, utf8_decode("La entrega en tiempo y forma de calificaciones parciales y finales."), 1);
$pdf->SetFont('helvetica','B', '9');
$pdf->Ln(-$campop4);
if ($p4 == "SI") {
    $pdf->Cell(151);
    $pdf->Cell(8, $campop4, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop4, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop4, " ", 1, 0, 'C');
} else  if ($p4 == "NO") {
    $pdf->Cell(151);
    $pdf->Cell(8, $campop4, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop4, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop4, " ", 1, 0, 'C');
} else {
    $pdf->Cell(151);
    $pdf->Cell(8, $campop4, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop4, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop4, "X", 1, 0, 'C');
}

// Pregunta 5
$campop5 = 5;
$pdf->Ln(5);
$pdf->Cell(20);
$pdf->SetFont('helvetica','', '9');
$pdf->Cell(8, $campop5, "5", 1, 0, 'C');
$pdf->MultiCell(123, $campop5, utf8_decode("La entrega en tiempo y forma del reporte final."), 1);
$pdf->SetFont('helvetica','B', '9');
$pdf->Ln(-$campop5);
if ($p5 == "SI") {
    $pdf->Cell(151);
    $pdf->Cell(8, $campop5, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop5, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop5, " ", 1, 0, 'C');
} else  if ($p5 == "NO") {
    $pdf->Cell(151);
    $pdf->Cell(8, $campop5, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop5, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop5, " ", 1, 0, 'C');
} else {
    $pdf->Cell(151);
    $pdf->Cell(8, $campop5, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop5, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop5, "X", 1, 0, 'C');
}


// Pregunta 6
$campop6 = 16;
$pdf->Ln(5);
$pdf->Cell(20);
$pdf->SetFont('helvetica','', '9');
$pdf->Cell(8, $campop6, "6", 1, 0, 'C');
$pdf->MultiCell(123, 4, utf8_decode("La entrega del informe de los proyectos individuales / Horas de apoyo a la docencia del programa de trabajo académico realizados en horas de apoyo a la docencia. (Cumplimiento de las actividades declaradas como apoyo a la docencia en el formato)."), 1);
$pdf->SetFont('helvetica','B', '9');
$pdf->Ln(-$campop6);
if ($p6 == "SI") {
    $pdf->Cell(151);
    $pdf->Cell(8,  $campop6, "X", 1, 0, 'C');
    $pdf->Cell(8,  $campop6, " ", 1, 0, 'C');
    $pdf->Cell(8,  $campop6, " ", 1, 0, 'C');
} else  if ($p6 == "NO") {
    $pdf->Cell(151);
    $pdf->Cell(8, $campop6, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop6, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop6, " ", 1, 0, 'C');
} else {
    $pdf->Cell(151);
    $pdf->Cell(8, $campop6, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop6, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop6, "X", 1, 0, 'C');
}


// Pregunta 7
$campop7 = 5;
$pdf->Ln(16);
$pdf->Cell(20);
$pdf->SetFont('helvetica','', '9');
$pdf->Cell(8, $campop7, "7", 1, 0, 'C');
$pdf->MultiCell(123, $campop7, utf8_decode("Entrega de índices de reprobación y deserción mensuales y finales."), 1);
$pdf->SetFont('helvetica','B', '9');
$pdf->Ln(-$campop7);
if ($p7 == "SI") {
    $pdf->Cell(151);
    $pdf->Cell(8, $campop7, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop7, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop7, " ", 1, 0, 'C');
} else  if ($p7 == "NO") {
    $pdf->Cell(151);
    $pdf->Cell(8, $campop7, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop7, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop7, " ", 1, 0, 'C');
} else {
    $pdf->Cell(151);
    $pdf->Cell(8, $campop7, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop7, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop7, "X", 1, 0, 'C');
}

// Pregunta 8
$campop8 = 5;
$pdf->Ln(10);
$pdf->Cell(20);
$pdf->SetFont('helvetica','', '9');
$pdf->MultiCell(131, $campop8, utf8_decode("Se otorga liberación de actividades."), 1);
$pdf->SetFont('helvetica','B', '9');
$pdf->Ln(-$campop8);
if ($p8 == "SI") {
    $pdf->Cell(151);
    $pdf->Cell(8, $campop8, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop8, " ", 1, 0, 'C');
} else  if ($p8 == "NO") {
    $pdf->Cell(151);
    $pdf->Cell(8, $campop8, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop8, "X", 1, 0, 'C');
}


$pdf->Ln(10);
$pdf->SetFont('helvetica','B', '10');
$pdf->Cell(19);
$pdf->Cell(80, 4, 'Nota:', 0, 1, 'L');

$pdf->SetFont('helvetica','', '9');
$pdf->Cell(19);
$pdf->Cell(80, 4,  utf8_decode('El punto 6 no aplicará en el caso de Docentes con nombramiento por horas, indicar N/A..'), 0, 1, 'L');
$pdf->Ln(5); //CELDA DE ESPACIO

$pdf->Cell(19);
$pdf->Cell(80, 4,  utf8_decode('Si el docente cumplió con el 100% de los puntos del 1 al 7 aplicables en su caso, se otorga la liberación'), 0, 1, 'L');
$pdf->Cell(19);
$pdf->Cell(80, 4,  utf8_decode('de actividades.'), 0, 1, 'L');
$pdf->Ln(5); //CELDA DE ESPACIO
$pdf->Cell(19);
$pdf->Cell(80, 4,  utf8_decode('Lo anterior, según lo establecido en el Reglamento Interior de Trabajo del Personal Docente.'), 0, 1, 'L');

$pdf->Ln(15);
$pdf->SetFont('helvetica','B', '10');
$pdf->Cell(19);
$pdf->MultiCell(80, 5, utf8_decode("______________________________________"), 0, 'C', 1);
$pdf->Cell(19);
$pdf->MultiCell(80, 5, utf8_decode($res2["nombre"]), 0, 'C', 1);
$pdf->SetFont('helvetica','', '10');
$pdf->Cell(19);
if($res2['sexo']== 'F'){
    $pdf->MultiCell(80, 5, utf8_decode("JEFA DEL DEPTO. DE SISTEMAS Y COMPUTACIÓN"), 0, 'C', 1);
}else{
    $pdf->MultiCell(80, 5, utf8_decode("JEFE DEL DEPTO. DE SISTEMAS Y COMPUTACIÓN"), 0, 'C', 1);
}

$pdf->Ln(-20);
$pdf->Cell(99);
$pdf->SetFont('helvetica','B', '10');
$pdf->MultiCell(80, 5, utf8_decode("_____________________________________"), 0, 'C', 1);
$pdf->Cell(99);
$pdf->MultiCell(80, 5, utf8_decode($res3["nombre"]), 0, 'C', 1);
$pdf->SetFont('helvetica','', '10');
if($res3['sexo']== 'F'){
    $pdf->Cell(99);
    $pdf->MultiCell(80, 5, utf8_decode("SUBDIRECTORA ACADÉMICA"), 0, 'C', 1);
}else{
    $pdf->Cell(99);
    $pdf->MultiCell(80, 5, utf8_decode("SUBDIRECTOR ACADÉMICO"), 0, 'C', 1);
}


$pdf->Ln(15);
$pdf->SetFont('helvetica', '', '8');
$pdf->Cell(20);
$pdf->Cell(80, 4,  utf8_decode('C.p. Subdirección Académica'), 0, 1, 'L');
$pdf->Cell(20);
$pdf->Cell(80, 1,  utf8_decode('C.p. Archivo '), 0, 1, 'L');
$pdf->Output('I', 'Constancia_de_liberación_de_actividades_frente_al_grupo_' . $docente . '.pdf', 'D');