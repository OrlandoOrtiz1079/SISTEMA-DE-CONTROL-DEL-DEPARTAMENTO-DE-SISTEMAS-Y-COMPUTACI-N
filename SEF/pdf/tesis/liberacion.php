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
        $this->Image('../img/cabecera2.png', 10, 10, 185, 27, 'PNG');
        $this->Ln(35); //NOTE no borrar
    }
    public function Footer()
    {
        $this->Image('../img/documentoNoControlado2.png', 18, 260, 171, 15, 'PNG');
    }
}
$tabla = "jerarquia";
$puesto = "JEFE DEL DEPTO. ACADEMICO";
$puesto2 = "PRESIDENTE DE ACADEMIA";
$res = ControladorJerarquia::ctrMostrarDocentesJerarquia2($tabla, $puesto);
$res2 = ControladorJerarquia::ctrMostrarDocentesJerarquia2($tabla, $puesto2);

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
$p9 = $_POST['p9'];
$p10 = $_POST['p10'];
$p11 = $_POST['p11'];
$p12 = $_POST['p12'];
$p13 = $_POST['p13'];
$p14 = $_POST['p14'];
$otros = $_POST['otros'];



$pdf = new PDF('P', 'mm', 'Letter');
$pdf->AddPage();
$h = $pdf->GetPageHeight();
$w = $pdf->GetPageWidth();
$pdf->AddFont('Montserrat-Bold');
$pdf->AddFont('Montserrat-Regular');
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Montserrat-Bold', '', '10');
$pdf->SetTitle(utf8_decode('CONSTANCIA DE LIBERACIÓN DE ACTIVIDADES ACADÉMICAS ' . $docente));
$pdf->Cell(80);
$pdf->Cell(20, 13, utf8_decode('CARTA DE LIBERACIÓN DE ACTIVIDADES ACADÉMICAS'), 0, 1, 'C');
$pdf->Cell(93);
$pdf->SetFont('Montserrat-Regular', '', '9');
$pdf->Cell(10, 4, utf8_decode(' DEPARTAMENTO DE SISTEMAS Y COMPUTACIÓN'), 0, 1, 'L');
$pdf->Cell(113);
$pdf->Cell(10, 4, utf8_decode('Lugar y fecha: Iguala, Gro. a ' . $fecha), 0, 1, 'L');
$pdf->Cell(116);
$pdf->Cell(10, 4, utf8_decode('Asunto: Constancia de liberación de'), 0, 1, 'L');
$pdf->Cell(134);
$pdf->Cell(10, 4, utf8_decode('Actividades Académicas '), 0, 1, 'L');


$pdf->Ln(3); //Docente
$pdf->SetFont('Montserrat-Bold', '', '10');
$pdf->Cell(19);
$pdf->Cell(80, 6, utf8_decode($docente), 0, 1, 'L');
$pdf->Cell(19);
$pdf->Cell(80, 4, 'PRESENTE.', 0, 1, 'L');
$pdf->Ln(5); //CELDA DE ESPACIO

$pdf->SetFont('Montserrat-Regular', '', '9');
$pdf->Cell(19);
$pdf->Cell(15, 0, utf8_decode('Por medio de la presente se hace de su conocimiento que durante el semestre '), 10, 1, 'L');
$pdf->Cell(145);
$pdf->SetFont('Montserrat-Bold', '', '9');
$pdf->Cell(15, 0, $periodo, 0, 1, 'L');

$pdf->Ln(4); //CELDA DE ESPACIO
$resultado = substr($fecha, 0, 4);

$pdf->Cell(19);
$pdf->Cell(0, 0, utf8_decode($resultado), 0, 1);

$pdf->Cell(27);
$pdf->SetFont('Montserrat-Regular', '', '9');
$pdf->Cell(0, 0, utf8_decode('se evaluó el cumplimiento de las siguientes actividades docentes:'), 0, 1, 'L');
$pdf->Ln(4); //CELDA DE ESPACIO

// Table head
$pdf->Cell(20);
$pdf->SetFont('Montserrat-Bold', '', '9');
$pdf->Cell(130, 5, "ACTIVIDADES", 1, 0, 'C');
$pdf->Cell(8, 5, "SI", 1, 0, 'C');
$pdf->Cell(8, 5, "NO", 1, 0, 'C');
$pdf->Cell(8, 5, "N/A", 1, 0, 'C');
$pdf->Ln(5);

//Table body
// Pregunta 1
$pdf->Cell(20);
$pdf->SetFont('Montserrat-Regular', '', '9');
$pdf->MultiCell(130, 5, utf8_decode("Asistencia a reuniones convocadas."), 1);
$pdf->SetFont('Montserrat-Bold', '', '9');
$pdf->Ln(-5);
$pdf->Cell(150);
if ($p1 == "SI") {
    $pdf->Cell(8, 5, "X", 1, 0, 'C');
    $pdf->Cell(8, 5, " ", 1, 0, 'C');
    $pdf->Cell(8, 5, " ", 1, 0, 'C');
} else  if ($p1 == "NO") {
    $pdf->Cell(8, 5, " ", 1, 0, 'C');
    $pdf->Cell(8, 5, "X", 1, 0, 'C');
    $pdf->Cell(8, 5, " ", 1, 0, 'C');
} else {
    $pdf->Cell(8, 5, " ", 1, 0, 'C');
    $pdf->Cell(8, 5, " ", 1, 0, 'C');
    $pdf->Cell(8, 5, "X", 1, 0, 'C');
}

// Pregunta 2
$campop2 = 5;
$pdf->Ln(5);
$pdf->Cell(20);
$pdf->SetFont('Montserrat-Regular', '', '9');
$pdf->MultiCell(130, $campop2, utf8_decode("Participación en programas de formación y actualización docente."), 1);
$pdf->SetFont('Montserrat-Bold', '', '9');
$pdf->Ln(-$campop2);
$pdf->Cell(150);
if ($p2 == "SI") {
    $pdf->Cell(8, $campop2, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop2, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop2, " ", 1, 0, 'C');
} else  if ($p2 == "NO") {
    $pdf->Cell(8, $campop2, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop2, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop2, " ", 1, 0, 'C');
} else {
    $pdf->Cell(8, $campop2, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop2, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop2, "X", 1, 0, 'C');
}

// Pregunta 3
$campop3 = 5;
$pdf->Ln(5);
$pdf->Cell(20);
$pdf->SetFont('Montserrat-Regular', '', '9');
$pdf->MultiCell(130, $campop3, utf8_decode("Asesorías en procesos de titulación integral encomendadas."), 1);
$pdf->SetFont('Montserrat-Bold', '', '9');
$pdf->Ln(-$campop3);
$pdf->Cell(150);
if ($p3 == "SI") {
    $pdf->Cell(8, $campop3, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop3, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop3, " ", 1, 0, 'C');
} else  if ($p3 == "NO") {
    $pdf->Cell(8, $campop3, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop3, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop3, " ", 1, 0, 'C');
} else {
    $pdf->Cell(8, $campop3, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop3, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop3, "X", 1, 0, 'C');
}

// Pregunta 4
$campop4 = 5;
$pdf->Ln(5);
$pdf->Cell(20);
$pdf->SetFont('Montserrat-Regular', '', '9');
$pdf->MultiCell(130, $campop4, utf8_decode("Propuestas de mejoras en la operación de programas y proyectos académicos."), 1);
$pdf->SetFont('Montserrat-Bold', '', '9');
$pdf->Ln(-$campop4);
$pdf->Cell(150);
if ($p4 == "SI") {
    $pdf->Cell(8, $campop4, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop4, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop4, " ", 1, 0, 'C');
} else  if ($p4 == "NO") {
    $pdf->Cell(8, $campop4, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop4, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop4, " ", 1, 0, 'C');
} else {
    $pdf->Cell(8, $campop4, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop4, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop4, "X", 1, 0, 'C');
}

// Pregunta 5
$campop5 = 5;
$pdf->Ln(5);
$pdf->Cell(20);
$pdf->SetFont('Montserrat-Regular', '', '9');
$pdf->MultiCell(130, $campop5, utf8_decode("Sinodales en protocolos de titulación."), 1);
$pdf->SetFont('Montserrat-Bold', '', '9');
$pdf->Ln(-$campop5);
$pdf->Cell(150);
if ($p5 == "SI") {
    $pdf->Cell(8, $campop5, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop5, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop5, " ", 1, 0, 'C');
} else  if ($p5 == "NO") {
    $pdf->Cell(8, $campop5, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop5, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop5, " ", 1, 0, 'C');
} else {
    $pdf->Cell(8, $campop5, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop5, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop5, "X", 1, 0, 'C');
}

// Pregunta 6
$campop6 = 5;
$pdf->Ln(5);
$pdf->Cell(20);
$pdf->SetFont('Montserrat-Regular', '', '9');
$pdf->MultiCell(130, 5, utf8_decode("Participación en eventos de la academia."), 1);
$pdf->SetFont('Montserrat-Bold', '', '9');
$pdf->Ln(-$campop6);
$pdf->Cell(150);
if ($p6 == "SI") {
    $pdf->Cell(8,  $campop6, "X", 1, 0, 'C');
    $pdf->Cell(8,  $campop6, " ", 1, 0, 'C');
    $pdf->Cell(8,  $campop6, " ", 1, 0, 'C');
} else  if ($p6 == "NO") {
    $pdf->Cell(8, $campop6, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop6, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop6, " ", 1, 0, 'C');
} else {
    $pdf->Cell(8, $campop6, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop6, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop6, "X", 1, 0, 'C');
}

// Pregunta 7
$campop7 = 5;
$pdf->Ln(5);
$pdf->Cell(20);
$pdf->SetFont('Montserrat-Regular', '', '9');
$pdf->MultiCell(130, $campop7, utf8_decode("Contribución con propuestas de mejora en los planes y programas de estudio."), 1);
$pdf->SetFont('Montserrat-Bold', '', '9');
$pdf->Ln(-$campop7);
$pdf->Cell(150);
if ($p7 == "SI") {
    $pdf->Cell(8, $campop7, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop7, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop7, " ", 1, 0, 'C');
} else  if ($p7 == "NO") {
    $pdf->Cell(8, $campop7, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop7, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop7, " ", 1, 0, 'C');
} else {
    $pdf->Cell(8, $campop7, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop7, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop7, "X", 1, 0, 'C');
}

// Pregunta 8
$campop8 = 5;
$pdf->Ln(5);
$pdf->Cell(20);
$pdf->SetFont('Montserrat-Regular', '', '9');
$pdf->MultiCell(130, $campop8, utf8_decode("Desarrollo de materiales de apoyo didáctico."), 1);
$pdf->SetFont('Montserrat-Bold', '', '9');
$pdf->Ln(-$campop8);
$pdf->Cell(150);
if ($p8 == "SI") {
    $pdf->Cell(8, $campop8, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop8, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop8, " ", 1, 0, 'C');
} else  if ($p8 == "NO") {
    $pdf->Cell(8, $campop8, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop8, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop8, " ", 1, 0, 'C');
} else {
    $pdf->Cell(8, $campop8, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop8, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop8, "X", 1, 0, 'C');
}

// Pregunta 9
$campop9 = 5;
$pdf->Ln(5);
$pdf->Cell(20);
$pdf->SetFont('Montserrat-Regular', '', '9');
$pdf->MultiCell(130, $campop9, utf8_decode("Propuestas para bancos de proyectos."), 1);
$pdf->SetFont('Montserrat-Bold', '', '9');
$pdf->Ln(-$campop9);
$pdf->Cell(150);
if ($p9 == "SI") {
    $pdf->Cell(8, $campop9, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop9, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop9, " ", 1, 0, 'C');
} else  if ($p9 == "NO") {
    $pdf->Cell(8, $campop9, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop9, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop9, " ", 1, 0, 'C');
} else {
    $pdf->Cell(8, $campop9, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop9, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop9, "X", 1, 0, 'C');
}

// Pregunta 10
$campop10 = 5;
$pdf->Ln(5);
$pdf->Cell(20);
$pdf->SetFont('Montserrat-Regular', '', '9');
$pdf->MultiCell(130, $campop10, utf8_decode("Asesorías académicas."), 1);
$pdf->SetFont('Montserrat-Bold', '', '9');
$pdf->Ln(-$campop10);
$pdf->Cell(150);
if ($p10 == "SI") {
    $pdf->Cell(8, $campop10, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop10, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop10, " ", 1, 0, 'C');
} else  if ($p10 == "NO") {
    $pdf->Cell(8, $campop10, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop10, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop10, " ", 1, 0, 'C');
} else {
    $pdf->Cell(8, $campop10, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop10, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop10, "X", 1, 0, 'C');
}

// Pregunta 11
$campop11 = 5;
$pdf->Ln(5);
$pdf->Cell(20);
$pdf->SetFont('Montserrat-Regular', '', '9');
$pdf->MultiCell(130, $campop11, utf8_decode("Tutoría."), 1);
$pdf->SetFont('Montserrat-Bold', '', '9');
$pdf->Ln(-$campop11);
$pdf->Cell(150);
if ($p11 == "SI") {
    $pdf->Cell(8, $campop11, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop11, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop11, " ", 1, 0, 'C');
} else  if ($p11 == "NO") {
    $pdf->Cell(8, $campop11, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop11, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop11, " ", 1, 0, 'C');
} else {
    $pdf->Cell(8, $campop11, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop11, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop11, "X", 1, 0, 'C');
}

// Pregunta 12
$campop12 = 12;
$pdf->Ln(5);
$pdf->Cell(20);
$pdf->SetFont('Montserrat-Regular', '', '9');
$pdf->MultiCell(130, 4, utf8_decode("Participación en comisiones académicas (equivalencias, salida lateral, traslado, acreditaciones, certificaciones, diseño especialidades, proyectos integradores, etc)."), 1);
$pdf->SetFont('Montserrat-Bold', '', '9');
$pdf->Ln(-$campop12);
$pdf->Cell(150);
if ($p12 == "SI") {
    $pdf->Cell(8, $campop12, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop12, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop12, " ", 1, 0, 'C');
} else  if ($p12 == "NO") {
    $pdf->Cell(8, $campop12, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop12, "X", 1, 0, 'C');
    $pdf->Cell(8, $campop12, " ", 1, 0, 'C');
} else {
    $pdf->Cell(8, $campop12, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop12, " ", 1, 0, 'C');
    $pdf->Cell(8, $campop12, "X", 1, 0, 'C');
}

if (strlen("Otros (especificar):" . $otros) <= 80) {

    $campop13 = 5;  // Pregunta 13
    $pdf->Ln(12);
    $pdf->Cell(20);
    $pdf->SetFont('Montserrat-Regular', '', '9');
    $pdf->MultiCell(130, $campop13, utf8_decode("Otros (especificar):" . $otros), 1);
    $pdf->SetFont('Montserrat-Bold', '', '9');
    $pdf->Ln(-$campop13);
    $pdf->Cell(150);
    if ($p13 == "SI") {
        $pdf->Cell(8, $campop13, "X", 1, 0, 'C');
        $pdf->Cell(8, $campop13, " ", 1, 0, 'C');
        $pdf->Cell(8, $campop13, " ", 1, 0, 'C');
    } else  if ($p13 == "NO") {
        $pdf->Cell(8, $campop13, " ", 1, 0, 'C');
        $pdf->Cell(8, $campop13, "X", 1, 0, 'C');
        $pdf->Cell(8, $campop13, " ", 1, 0, 'C');
    } else {
        $pdf->Cell(8, $campop13, " ", 1, 0, 'C');
        $pdf->Cell(8, $campop13, " ", 1, 0, 'C');
        $pdf->Cell(8, $campop13, "X", 1, 0, 'C');
    }
    // Pregunta 14
    $campop14 = 5;
    $pdf->Ln(5);
    $pdf->Cell(20);
    $pdf->SetFont('Montserrat-Regular', '', '9');
    $pdf->MultiCell(130, $campop14, utf8_decode("¿Cumplió con las actividades académicas encomendadas al 100%?"), 1);
    $pdf->SetFont('Montserrat-Bold', '', '9');
    $pdf->Ln(-$campop14);
    $pdf->Cell(150);
    if ($p14 == "SI") {
        $pdf->Cell(8, $campop14, "X", 1, 0, 'C');
        $pdf->Cell(8, $campop14, " ", 1, 0, 'C');
        $pdf->Cell(8, $campop14, " ", 1, 0, 'C');
    } else  if ($p14 == "NO") {
        $pdf->Cell(8, $campop14, " ", 1, 0, 'C');
        $pdf->Cell(8, $campop14, "X", 1, 0, 'C');
        $pdf->Cell(8, $campop14, " ", 1, 0, 'C');
    } else {
        $pdf->Cell(8, $campop14, " ", 1, 0, 'C');
        $pdf->Cell(8, $campop14, " ", 1, 0, 'C');
        $pdf->Cell(8, $campop14, "X", 1, 0, 'C');
    }
} else if (strlen("Otros (especificar):" . $otros) >= 81 && strlen("Otros (especificar):" . $otros) <= 165) {
    // Pregunta 13
    $campop12 = 8;
    $pdf->Ln(12);
    $pdf->Cell(20);
    $pdf->SetFont('Montserrat-Regular', '', '9');
    $pdf->MultiCell(130, 4, utf8_decode("Otros (especificar):" . $otros), 1);
    $pdf->SetFont('Montserrat-Bold', '', '9');
    $pdf->Ln(-$campop12);
    $pdf->Cell(150);
    if ($p13 == "SI") {
        $pdf->Cell(8, $campop12, "X", 1, 0, 'C');
        $pdf->Cell(8, $campop12, " ", 1, 0, 'C');
        $pdf->Cell(8, $campop12, " ", 1, 0, 'C');
    } else  if ($p13 == "NO") {
        $pdf->Cell(8, $campop12, " ", 1, 0, 'C');
        $pdf->Cell(8, $campop12, "X", 1, 0, 'C');
        $pdf->Cell(8, $campop12, " ", 1, 0, 'C');
    } else {
        $pdf->Cell(8, $campop12, " ", 1, 0, 'C');
        $pdf->Cell(8, $campop12, " ", 1, 0, 'C');
        $pdf->Cell(8, $campop12, "X", 1, 0, 'C');
    }
    // Pregunta 14
    $campop14 = 5;
    $pdf->Ln(8);
    $pdf->Cell(20);
    $pdf->SetFont('Montserrat-Regular', '', '9');
    $pdf->MultiCell(130, $campop14, utf8_decode("¿Cumplió con las actividades académicas encomendadas al 100%?"), 1);
    $pdf->SetFont('Montserrat-Bold', '', '9');
    $pdf->Ln(-$campop14);
    $pdf->Cell(150);
    if ($p14 == "SI") {
        $pdf->Cell(8, $campop14, "X", 1, 0, 'C');
        $pdf->Cell(8, $campop14, " ", 1, 0, 'C');
        $pdf->Cell(8, $campop14, " ", 1, 0, 'C');
    } else  if ($p14 == "NO") {
        $pdf->Cell(8, $campop14, " ", 1, 0, 'C');
        $pdf->Cell(8, $campop14, "X", 1, 0, 'C');
        $pdf->Cell(8, $campop14, " ", 1, 0, 'C');
    } else {
        $pdf->Cell(8, $campop14, " ", 1, 0, 'C');
        $pdf->Cell(8, $campop14, " ", 1, 0, 'C');
        $pdf->Cell(8, $campop14, "X", 1, 0, 'C');
    }
} else if (strlen("Otros (especificar):" . $otros) >= 166 && strlen("Otros (especificar):" . $otros) <= 230) {
    // Pregunta 13
    $campop131 = 12;
    $pdf->Ln(12);
    $pdf->Cell(20);
    $pdf->SetFont('Montserrat-Regular', '', '9');
    $pdf->MultiCell(130, 4, utf8_decode("Otros (especificar):" . $otros), 1);
    $pdf->SetFont('Montserrat-Bold', '', '9');
    $pdf->Ln(-$campop131);
    $pdf->Cell(150);
    if ($p13 == "SI") {
        $pdf->Cell(8, $campop131, "X", 1, 0, 'C');
        $pdf->Cell(8, $campop131, " ", 1, 0, 'C');
        $pdf->Cell(8, $campop131, " ", 1, 0, 'C');
    } else  if ($p13 == "NO") {
        $pdf->Cell(8, $campop131, " ", 1, 0, 'C');
        $pdf->Cell(8, $campop131, "X", 1, 0, 'C');
        $pdf->Cell(8, $campop131, " ", 1, 0, 'C');
    } else {
        $pdf->Cell(8, $campop131, " ", 1, 0, 'C');
        $pdf->Cell(8, $campop131, " ", 1, 0, 'C');
        $pdf->Cell(8, $campop131, "X", 1, 0, 'C');
    }
    // Pregunta 14
    $campop14 = 5;
    $pdf->Ln(12);
    $pdf->Cell(20);
    $pdf->SetFont('Montserrat-Regular', '', '9');
    $pdf->MultiCell(130, $campop14, utf8_decode("¿Cumplió con las actividades académicas encomendadas al 100%?"), 1);
    $pdf->SetFont('Montserrat-Bold', '', '9');
    $pdf->Ln(-$campop14);
    $pdf->Cell(150);
    if ($p14 == "SI") {
        $pdf->Cell(8, $campop14, "X", 1, 0, 'C');
        $pdf->Cell(8, $campop14, " ", 1, 0, 'C');
        $pdf->Cell(8, $campop14, " ", 1, 0, 'C');
    } else  if ($p14 == "NO") {
        $pdf->Cell(8, $campop14, " ", 1, 0, 'C');
        $pdf->Cell(8, $campop14, "X", 1, 0, 'C');
        $pdf->Cell(8, $campop14, " ", 1, 0, 'C');
    } else {
        $pdf->Cell(8, $campop14, " ", 1, 0, 'C');
        $pdf->Cell(8, $campop14, " ", 1, 0, 'C');
        $pdf->Cell(8, $campop14, "X", 1, 0, 'C');
    }
}

$pdf->Ln(15);
$pdf->Cell(99);
$pdf->SetFont('Montserrat-Bold', '', '10');
$pdf->MultiCell(80, 5, utf8_decode("Vo. Bo."), 0, 'C', 1);
$pdf->Cell(19);
if ($res2['sexo'] == 'F') {
    $pdf->MultiCell(80, 5, utf8_decode("PRESIDENTA DE ACADEMIA"), 0, 'C', 1);
} else {
    $pdf->MultiCell(80, 5, utf8_decode("PRESIDENTE DE ACADEMIA"), 0, 'C', 1);
}
$pdf->Ln(15);
$pdf->Cell(19);
$pdf->MultiCell(80, 5, utf8_decode("_________________________________________"), 0, 'C', 1);
$pdf->Cell(19);
$pdf->MultiCell(80, 5, utf8_decode($res2["nombre"]), 0, 'C', 1);

$pdf->Ln(-30);
$pdf->Cell(99);
if ($res['sexo'] == 'F') {
    $pdf->MultiCell(80, 5, utf8_decode("JEFA DEL DEPTO. ACADEMICO"), 0, 'C', 1);
} else {
    $pdf->MultiCell(80, 5, utf8_decode("JEFE DEL DEPTO. ACADEMICO"), 0, 'C', 1);
}
$pdf->Ln(15);
$pdf->Cell(99);
$pdf->MultiCell(80, 5, utf8_decode("_________________________________________"), 0, 'C', 1);
$pdf->Cell(99);
$pdf->MultiCell(80, 5, utf8_decode($res["nombre"]), 0, 'C', 1);

$pdf->Ln(25);
$pdf->SetFont('Courier', '', '8');
$pdf->Cell(20);
$pdf->Cell(80, 4,  utf8_decode('C.p. Expediente '), 0, 1, 'L');
$pdf->Output('I', 'CONSTANCIA DE LIBERACIÓN DE ACTIVIDADES ACADÉMICAS ' . $docente . '.pdf', 'D');
