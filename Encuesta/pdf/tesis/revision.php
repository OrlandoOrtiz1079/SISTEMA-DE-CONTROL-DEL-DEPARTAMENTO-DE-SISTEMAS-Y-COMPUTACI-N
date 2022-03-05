<?php
session_start();
require '../FPDF/fpdf.php';
require '../../modelos/conexion.php';
class PDF extends FPDF
{
    public function Header()
    {
        $this->SetFont('Arial', 'B', '10');
        $this->Image('../img/cabecera.png', 13, 0, 190, 34, 'PNG');
        $this->Ln(40); //NOTE no borrar
    }
    public function Footer()
    {
        $this->Image('../img/pie.png', 13, 245, 190, 34, 'PNG');
    }
    public function WriteText($text)
    {
        $intPosIni = 0;
        $intPosFim = 0;
        if (strpos($text, '<') !== false && strpos($text, '[') !== false) {
            if (strpos($text, '<') < strpos($text, '[')) {
                $this->Write(4, substr($text, 0, strpos($text, '<')));
                $intPosIni = strpos($text, '<');
                $intPosFim = strpos($text, '>');
                $this->SetFont('', 'B');
                $this->Write(4, substr($text, $intPosIni + 1, $intPosFim - $intPosIni - 1));
                $this->SetFont('', '');
                $this->WriteText(substr($text, $intPosFim + 1, strlen($text)));
            } else {
                $this->Write(4, substr($text, 0, strpos($text, '[')));
                $intPosIni = strpos($text, '[');
                $intPosFim = strpos($text, ']');
                $w = $this->GetStringWidth('a') * ($intPosFim - $intPosIni - 1);
                $this->Cell($w, $this->FontSize + 0.75, substr($text, $intPosIni + 1, $intPosFim - $intPosIni - 1), 1, 0, '');
                $this->WriteText(substr($text, $intPosFim + 1, strlen($text)));
            }
        } else {
            if (strpos($text, '<') !== false) {
                $this->Write(4, substr($text, 0, strpos($text, '<')));
                $intPosIni = strpos($text, '<');
                $intPosFim = strpos($text, '>');
                $this->SetFont('', 'B');
                $this->WriteText(substr($text, $intPosIni + 1, $intPosFim - $intPosIni - 1));
                $this->SetFont('', '');
                $this->WriteText(substr($text, $intPosFim + 1, strlen($text)));
            } elseif (strpos($text, '[') !== false) {
                $this->Write(4, substr($text, 0, strpos($text, '[')));
                $intPosIni = strpos($text, '[');
                $intPosFim = strpos($text, ']');
                $w = $this->GetStringWidth('a') * ($intPosFim - $intPosIni - 1);
                $this->Cell($w, $this->FontSize + 0.75, substr($text, $intPosIni + 1, $intPosFim - $intPosIni - 1), 1, 0, '');
                $this->WriteText(substr($text, $intPosFim + 1, strlen($text)));
            } else {
                $this->Write(4, $text);
            }
        }
    }
}
// PARTE I: DATOS PERSONALES
$nombre = $_POST['nombre'];
$añoing = $_POST['añoing'];
$control = $_POST['control'];
$carrera = $_POST['carrera'];
$planestu = $_POST['planestu'];
$añoegre = $_POST['añoegre'];
$semestre = $_POST['semestre'];
$especialidad = $_POST['especialidad'];
$pciudad = $_POST['pciudad'];
$pmunicipio = $_POST['pmunicipio'];
$pestado = $_POST['pestado'];
$ociudad = $_POST['ociudad'];
$omunicipio = $_POST['omunicipio'];
$oestado = $_POST['oestado'];
$cel = $_POST['cel'];
$emaili = $_POST['emaili'];
$emailp = $_POST['emailp'];
$face = $_POST['face'];
$planestudios = "";

// PARTE II: SOBRE LA FORMACIÓN PROPORCIONADA
$prt2p1 = $_POST['prt2p1'];
$prt2p2 = $_POST['prt2p2'];
$prt2p3 = $_POST['prt2p3'];
$prt2p4 = $_POST['prt2p4'];
$prt2p5 = $_POST['prt2p5'];
$prt2p6 = $_POST['prt2p6'];

// PARTE III: SOBRE LOS SERVICIOS PROPORCIONADOS
$prt3p1 = $_POST['prt3p1'];
$prt3p2 = $_POST['prt3p2'];
$prt3p3 = $_POST['prt3p3'];
$prt3p4 = $_POST['prt3p4'];
$prt3p5 = $_POST['prt3p5'];
$prt3p6 = $_POST['prt3p6'];
$prt3p7 = $_POST['prt3p7'];
$prt3p8 = $_POST['prt3p8'];
$prt3p9 = $_POST['prt3p9'];
$prt3p10 = $_POST['prt3p10'];
$prt3p11 = $_POST['prt3p11'];
$prt3p12 = $_POST['prt3p12'];
$prt3p13 = $_POST['prt3p13'];
$prt3p14 = $_POST['prt3p14'];
$prt3p15 = $_POST['prt3p15'];
$prt3p16 = $_POST['prt3p16'];
$prt3p17 = $_POST['prt3p17'];
$prt3p18 = $_POST['prt3p18'];
$prt3p19 = $_POST['prt3p19'];
$prt3p20 = $_POST['prt3p20'];
$prt3p21 = $_POST['prt3p21'];
$prt3p22 = $_POST['prt3p22'];
$prt3p23 = $_POST['prt3p23'];

// PARTE IV: SOBRE TU OBJETIVOS
$prt4p1 = $_POST['prt4p1'];
$prt4p2 = $_POST['prt4p2'];
$prt4p3 = $_POST['prt4p3'];
$prt4p4 = $_POST['prt4p4'];
$prt4p5 = $_POST['prt4p5'];
$prt4p6 = $_POST['prt4p6'];
$prt4p7 = $_POST['prt4p7'];
$prt4p8 = $_POST['prt4p8'];
$prt4p9 = $_POST['prt4p9'];
$prt4p10 = $_POST['prt4p10'];

// PARTE V: SOBRE LA FORMACION COMPLEMENTARIA
$prt5p1 = $_POST['prt5p1'];
$prt5p2 = $_POST['prt5p2'];
$prt5p3 = $_POST['prt5p3'];

// PARTE VI: SOBRE LA CAPACITACIÓN CONTÍNUA
$prt6p1 = $_POST['prt6p1'];
$prt6p2 = $_POST['prt6p2'];
$prt6p3 = $_POST['prt6p3'];

// Fecha
$Object = new DateTime();
$Object->setTimezone(new DateTimeZone('America/Mexico_City'));
$fecha = $Object->format("d-m-Y");

if ($carrera == "Ingeniería en Sistemas Computacionales" || $carrera == "INGENIERÍA EN SISTEMAS COMPUTACIONALES" || $carrera = "ING en Sistemas Computacionales") {
    $carrera = "Ing. en Sistemas Computacionales";
} else {
    $carrera = "Ing. en Informatica";
}


$pdf = new PDF('P', 'mm', 'Letter');
$pdf->AddPage();
$h = $pdf->GetPageHeight();
$w = $pdf->GetPageWidth();
$pdf->SetFillColor(255, 255, 255);
// $pdf->SetTextColor(0,126,216);
$pdf->SetTitle(utf8_decode('ENCUESTA DEL EGRESADO ' . $control));

$pdf->Ln(-18);
$pdf->Cell(5);
$pdf->SetFont('times', 'B', '10');
$pdf->MultiCell(186, 4, utf8_decode("ENCUESTA DE SALIDA PARA RECIÉN EGRESADOS DE NIVEL LICENCIATURA"), 0, 'C', 1);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(186, 4, utf8_decode("Con el propósito de mejorar los servicios que ofrece el Instituto Tecnológico de Iguala te pedimos responder la siguiente encuesta."), 0, 'L', 1);

$pdf->Ln(5);
$pdf->Cell(5);
$pdf->SetFont('times', 'B', '10');
$pdf->MultiCell(186, 4, utf8_decode("PARTE I: DATOS PERSONALES"), 0, 'L', 1);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(186, 4, utf8_decode("Nombre Completo"), 1, 'C', 1);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(186, 4, utf8_decode($nombre), 1, 'C', 1);

$pdf->Ln(5);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(186, 4, utf8_decode("Datos Escolares"), 1, 'C', 1);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(37, 4, utf8_decode("Año de ingreso: " . $añoegre), 1, 'L', 1);

$pdf->Ln(-4);
$pdf->Cell(42);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(35, 4, utf8_decode("No. Control: " . $control), 1, 'L', 1);

$pdf->Ln(-4);
$pdf->Cell(77);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(65, 4, utf8_decode("Carrera: " . $carrera), 1, 'L', 1);

$pdf->Ln(-4);
$pdf->Cell(141);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(50, 4, utf8_decode("Plan de estudios: " . $planestu), 1, 'L', 1);

$pdf->Ln(5);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(186, 4, utf8_decode("Datos de Egreso"), 1, 'C', 1);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(93, 4, utf8_decode("Año de egreso: " . $añoing), 1, 'L', 1);

$pdf->Ln(-4);
$pdf->Cell(93);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(98, 4, utf8_decode("Semestre de Egreso: " . $semestre), 1, 'L', 1);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(186, 4, utf8_decode("Especialidad: " . $especialidad), 1, 'L', 1);

$pdf->Ln(5);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(186, 4, utf8_decode("Recidencia Permanente"), 1, 'C', 1);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(62, 4, utf8_decode("Ciudad/Localidad: " . $pciudad), 1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(67);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(62, 4, utf8_decode("Municipio: " . $pmunicipio), 1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(129);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(62, 4, utf8_decode("Estado: " . $pestado), 1, 'L', 1);

$pdf->Ln(5);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(186, 4, utf8_decode("Recidencia Origen"), 1, 'C', 1);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(62, 4, utf8_decode("Ciudad/Localidad: " . $ociudad), 1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(67);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(62, 4, utf8_decode("Municipio: " . $omunicipio), 1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(129);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(62, 4, utf8_decode("Estado: " . $oestado), 1, 'L', 1);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(186, 4, utf8_decode("Si deseas recibir notificaciones tales como: información de becas de posgrado, bolsa de trabajo, seguimiento de egresados, congreso, cursos de actualización y capacitaciones, proporcione la forma de contacto a través de redes sociales:"), 1, 'J', 1);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(35, 4, utf8_decode("Celular: " . $cel), 1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(40);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(75, 4, utf8_decode("E-Mail Institucional: " . $emaili), 1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(115);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(76, 4, utf8_decode("E-Mail Personal: " . $emailp), 1, 'L', 1);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(186, 4, utf8_decode("Facebook: " . $face), 1, 'L', 1);

$pdf->Ln(5);
$pdf->Cell(5);
$pdf->SetFont('times', 'B', '10');
$pdf->MultiCell(186, 4, utf8_decode("PARTE II: SOBRE LA FORMACIÓN PROPORCIONADA"), 0, 'L', 1);

// Heder de la tabla
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(143, 4, utf8_decode("Para desempeñarte exitosamente en el trabajo/posgrado/autoempleo, consideras que la carrera te proporcionó:"),  1, 'L', 1);
$pdf->Ln(-8);
$pdf->Cell(148);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(10, 8, utf8_decode("Sí"),  1, 'C', 1);
$pdf->Ln(-8);
$pdf->Cell(158);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(10, 8, utf8_decode("No"),  1, 'C', 1);
$pdf->Ln(-8);
$pdf->Cell(168);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(23, 8, utf8_decode("Parcialmente"),  1, 'C', 1);

// Pregunta 1
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(143, 4, utf8_decode("Conocimientos suficientes o actualizados."),  1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(148);
if ($prt2p1 == "SI") {
    $pdf->Cell(10, 4, "X", 1, 0, 'C');
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(23, 4, " ", 1, 0, 'C');
} else  if ($prt2p1 == "NO") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(10, 4, "X", 1, 0, 'C');
    $pdf->Cell(23, 4, " ", 1, 0, 'C');
} else {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(23, 4, "X", 1, 0, 'C');
}

// Pregunta 2
$pdf->Ln(4);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(143, 4, utf8_decode("Valores fundamentales y codigo de ética"),  1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(148);
if ($prt2p2 == "SI") {
    $pdf->Cell(10, 4, "X", 1, 0, 'C');
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(23, 4, " ", 1, 0, 'C');
} else  if ($prt2p2 == "NO") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(10, 4, "X", 1, 0, 'C');
    $pdf->Cell(23, 4, " ", 1, 0, 'C');
} else {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(23, 4, "X", 1, 0, 'C');
}

// Pregunta 3
$pdf->Ln(4);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(143, 4, utf8_decode("Habilidades intelectuales (describir, argumentar, comparar, clasificar, analizar, inferir, sintetizar, inducir, razonamiento lógico-matemático, expresión oral y escrita, etc.)."),  1, 'L', 1);
$pdf->Ln(-8);
$pdf->Cell(148);
if ($prt2p3 == "SI") {
    $pdf->Cell(10, 8, "X", 1, 0, 'C');
    $pdf->Cell(10, 8, " ", 1, 0, 'C');
    $pdf->Cell(23, 8, " ", 1, 0, 'C');
} else  if ($prt2p3 == "NO") {
    $pdf->Cell(10, 8, " ", 1, 0, 'C');
    $pdf->Cell(10, 8, "X", 1, 0, 'C');
    $pdf->Cell(23, 8, " ", 1, 0, 'C');
} else {
    $pdf->Cell(10, 8, " ", 1, 0, 'C');
    $pdf->Cell(10, 8, " ", 1, 0, 'C');
    $pdf->Cell(23, 8, "X", 1, 0, 'C');
}

// Pregunta 4
$pdf->Ln(8);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(143, 4, utf8_decode("Habilidades interpersonales (trabajo en equipo, comunicación asertiva, empatía, liderazgo, etc.)."),  1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(148);
if ($prt2p4 == "SI") {
    $pdf->Cell(10, 4, "X", 1, 0, 'C');
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(23, 4, " ", 1, 0, 'C');
} else  if ($prt2p4 == "NO") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(10, 4, "X", 1, 0, 'C');
    $pdf->Cell(23, 4, " ", 1, 0, 'C');
} else {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(23, 4, "X", 1, 0, 'C');
}

// Pregunta 5
$pdf->Ln(4);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(143, 4, utf8_decode("Hábitos de trabajo y disciplina."),  1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(148);
if ($prt2p5 == "SI") {
    $pdf->Cell(10, 4, "X", 1, 0, 'C');
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(23, 4, " ", 1, 0, 'C');
} else  if ($prt2p5 == "NO") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(10, 4, "X", 1, 0, 'C');
    $pdf->Cell(23, 4, " ", 1, 0, 'C');
} else {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(23, 4, "X", 1, 0, 'C');
}

// Pregunta 6
$pdf->Ln(4);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(186, 4, utf8_decode("¿De lo contrario, que conocimientos, valores, códigos de ética, habilidades intelectuales, habilidades interpersonales y hábitos, consideras necesarios proporcionar y fomentar?\n" . $prt2p6),  1, 'L', 1);

// PARTE III: SOBRE LOS SERVICIOS PROPORCIONADOS
$pdf->Ln(5);
$pdf->Cell(5);
$pdf->SetFont('times', 'B', '10');
$pdf->MultiCell(186, 4, utf8_decode("PARTE III: SOBRE LOS SERVICIOS PROPORCIONADOS"), 0, 'L', 1);

// Heder de la tabla
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(116, 4, utf8_decode("Como evalúas los servicios/procesos/información que se te proporcionaron en cuanto a:"),  1, 'J', 1);

$pdf->Ln(-8);
$pdf->Cell(121);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(10, 8, utf8_decode("Malo"),  1, 'C', 1);
$pdf->Ln(-8);
$pdf->Cell(131);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(14, 8, utf8_decode("Regular"),  1, 'C', 1);
$pdf->Ln(-8);
$pdf->Cell(145);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(12, 8, utf8_decode("Bueno"),  1, 'C', 1);
$pdf->Ln(-8);
$pdf->Cell(157);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(19, 8, utf8_decode("Muy Bueno"),  1, 'C', 1);
$pdf->Ln(-8);
$pdf->Cell(176);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(15, 8, utf8_decode("Exelente"),  1, 'C', 1);

// Pregunta 1
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(116, 4, utf8_decode("Bolsa de trabajo."),  1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(121);
if ($prt3p1 == "Malo") {
    $pdf->Cell(10, 4, "X", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p1 == "Regular") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, "X", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p1 == "Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, "X", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p1 == "Muy Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, "X", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, "X", 1, 0, 'C');
}

// Pregunta 2
$pdf->Ln(4);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(116, 4, utf8_decode("Emprendimiento de empresa propia."),  1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(121);
if ($prt3p2 == "Malo") {
    $pdf->Cell(10, 4, "X", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p2 == "Regular") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, "X", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p2 == "Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, "X", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p2 == "Muy Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, "X", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, "X", 1, 0, 'C');
}

// Pregunta 3
$pdf->Ln(4);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(116, 4, utf8_decode("Opcioes de titulacion."),  1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(121);
if ($prt3p3 == "Malo") {
    $pdf->Cell(10, 4, "X", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p3 == "Regular") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, "X", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p3 == "Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, "X", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p3 == "Muy Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, "X", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, "X", 1, 0, 'C');
}

// Pregunta 4
$pdf->Ln(4);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(116, 4, utf8_decode("Recidencias profecionales."),  1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(121);
if ($prt3p4 == "Malo") {
    $pdf->Cell(10, 4, "X", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p4 == "Regular") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, "X", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p4 == "Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, "X", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p4 == "Muy Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, "X", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, "X", 1, 0, 'C');
}

// Pregunta 5
$pdf->Ln(4);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(116, 4, utf8_decode("Aprendizaje de lenguas extangeras."),  1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(121);
if ($prt3p5 == "Malo") {
    $pdf->Cell(10, 4, "X", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p5 == "Regular") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, "X", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p5 == "Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, "X", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p5 == "Muy Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, "X", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, "X", 1, 0, 'C');
}

// Pregunta 6
$pdf->Ln(4);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(116, 4, utf8_decode("Servicio Social."),  1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(121);
if ($prt3p6 == "Malo") {
    $pdf->Cell(10, 4, "X", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p6 == "Regular") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, "X", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p6 == "Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, "X", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p6 == "Muy Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, "X", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, "X", 1, 0, 'C');
}

// Pregunta 7
$pdf->Ln(4);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(116, 4, utf8_decode("Programas de formación integral."),  1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(121);
if ($prt3p7 == "Malo") {
    $pdf->Cell(10, 4, "X", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p7 == "Regular") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, "X", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p7 == "Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, "X", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p7 == "Muy Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, "X", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, "X", 1, 0, 'C');
}

// Pregunta 8
$pdf->Ln(4);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(116, 4, utf8_decode("Asesorias académicas."),  1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(121);
if ($prt3p8 == "Malo") {
    $pdf->Cell(10, 4, "X", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p8 == "Regular") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, "X", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p8 == "Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, "X", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p8 == "Muy Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, "X", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, "X", 1, 0, 'C');
}

// Pregunta 9
$pdf->Ln(4);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(116, 4, utf8_decode("Programa de tutorias."),  1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(121);
if ($prt3p9 == "Malo") {
    $pdf->Cell(10, 4, "X", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p9 == "Regular") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, "X", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p9 == "Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, "X", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p9 == "Muy Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, "X", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, "X", 1, 0, 'C');
}

// Pregunta 10
$pdf->Ln(4);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(116, 4, utf8_decode("Visitas a empresas."),  1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(121);
if ($prt3p10 == "Malo") {
    $pdf->Cell(10, 4, "X", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p10 == "Regular") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, "X", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p10 == "Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, "X", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p10 == "Muy Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, "X", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, "X", 1, 0, 'C');
}

// Pregunta 11
$pdf->Ln(4);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(116, 4, utf8_decode("Practicas de laboratorios."),  1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(121);
if ($prt3p11 == "Malo") {
    $pdf->Cell(10, 4, "X", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p11 == "Regular") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, "X", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p11 == "Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, "X", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p11 == "Muy Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, "X", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, "X", 1, 0, 'C');
}

$pdf->AddPage();

// Heder de la tabla
$pdf->Ln(-15);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(116, 4, utf8_decode("Como evalúas los servicios/procesos/información que se te proporcionaron en cuanto a:"),  1, 'J', 1);

$pdf->Ln(-8);
$pdf->Cell(121);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(10, 8, utf8_decode("Malo"),  1, 'C', 1);
$pdf->Ln(-8);
$pdf->Cell(131);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(14, 8, utf8_decode("Regular"),  1, 'C', 1);
$pdf->Ln(-8);
$pdf->Cell(145);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(12, 8, utf8_decode("Bueno"),  1, 'C', 1);
$pdf->Ln(-8);
$pdf->Cell(157);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(19, 8, utf8_decode("Muy Bueno"),  1, 'C', 1);
$pdf->Ln(-8);
$pdf->Cell(176);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(15, 8, utf8_decode("Exelente"),  1, 'C', 1);

// Pregunta 12
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(116, 4, utf8_decode("Recursos didácticos (salones equipados, cañones, paquetes computacionales)."),  1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(121);
if ($prt3p12 == "Malo") {
    $pdf->Cell(10, 4, "X", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p12 == "Regular") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, "X", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p12 == "Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, "X", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p12 == "Muy Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, "X", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, "X", 1, 0, 'C');
}

// Pregunta 13
$pdf->Ln(4);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(116, 4, utf8_decode("Material de consulta y bibliografia."),  1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(121);
if ($prt3p13 == "Malo") {
    $pdf->Cell(10, 4, "X", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p13 == "Regular") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, "X", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p13 == "Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, "X", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p13 == "Muy Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, "X", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, "X", 1, 0, 'C');
}

// Pregunta 14
$pdf->Ln(4);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(116, 4, utf8_decode("Salas de computos y acceso a Internet."),  1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(121);
if ($prt3p14 == "Malo") {
    $pdf->Cell(10, 4, "X", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p14 == "Regular") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, "X", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p14 == "Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, "X", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p14 == "Muy Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, "X", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, "X", 1, 0, 'C');
}

// Pregunta 15
$pdf->Ln(4);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(116, 4, utf8_decode("Eventos academicos."),  1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(121);
if ($prt3p15 == "Malo") {
    $pdf->Cell(10, 4, "X", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p15 == "Regular") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, "X", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p15 == "Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, "X", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p15 == "Muy Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, "X", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, "X", 1, 0, 'C');
}

// Pregunta 16
$pdf->Ln(4);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(116, 4, utf8_decode("Actividades extraescolares."),  1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(121);
if ($prt3p16 == "Malo") {
    $pdf->Cell(10, 4, "X", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p16 == "Regular") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, "X", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p16 == "Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, "X", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else  if ($prt3p16 == "Muy Bueno") {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, "X", 1, 0, 'C');
    $pdf->Cell(15, 4, " ", 1, 0, 'C');
} else {
    $pdf->Cell(10, 4, " ", 1, 0, 'C');
    $pdf->Cell(14, 4, " ", 1, 0, 'C');
    $pdf->Cell(12, 4, " ", 1, 0, 'C');
    $pdf->Cell(19, 4, " ", 1, 0, 'C');
    $pdf->Cell(15, 4, "X", 1, 0, 'C');
}

// Pregunta 17
$pdf->Ln(4);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(186, 4, utf8_decode("¿Cuáles son las sugerencias, propuestas o ideas que puedes aportar para la mejora de los servicios/procesos/información?\n" . $prt3p17),  1, 'L', 1);

// Pregunta 18
$pdf->Ln(4);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(90, 4, utf8_decode("Del 1 al 10, ¿Que calificación otorgarías a los maestros en cuanto a su dominio del tema y metodologías de enseñanza?"), 1, 'L', 1);
$pdf->Ln(-8);
$pdf->Cell(95);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(96, 8, utf8_decode("  " . $prt3p18), 1, 'L', 1);

// Pregunta 19
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(90, 4, utf8_decode("Enuncia una oportunidad de mejora:"), 1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(95);
$pdf->SetFont('Arial', '', '8');
$pdf->MultiCell(96, 4, utf8_decode($prt3p19), 1, 'L', 1);

// Pregunta 20
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(90, 4, utf8_decode("¿Recomendarias a otras personas estudiar esta carrera?"), 1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(95);
if ($prt3p20 == "SI") {
    $pdf->Cell(32, 4,  utf8_decode("Sí (X)"), 1, 0, 'C');
    $pdf->Cell(32, 4,  utf8_decode("No ( )"), 1, 0, 'C');
    $pdf->Cell(32, 4,  utf8_decode("Parcialmente ( )"), 1, 0, 'C');
} else  if ($prt3p20 == "NO") {
    $pdf->Cell(32, 4,  utf8_decode("Sí ( )"), 1, 0, 'C');
    $pdf->Cell(32, 4,  utf8_decode("No (X)"), 1, 0, 'C');
    $pdf->Cell(32, 4,  utf8_decode("Parcialmente ( )"), 1, 0, 'C');
} else {
    $pdf->Cell(32, 4,  utf8_decode("Sí ( )"), 1, 0, 'C');
    $pdf->Cell(32, 4,  utf8_decode("No ( )"), 1, 0, 'C');
    $pdf->Cell(32, 4,  utf8_decode("Parcialmente (X)"), 1, 0, 'C');
}

// Pregunta 21
$pdf->Ln(4);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(90, 4, utf8_decode("¿Por qué?"), 1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(95);
$pdf->SetFont('Arial', '', '8');
$pdf->MultiCell(96, 4, utf8_decode($prt3p21), 1, 'L', 1);

// Pregunta 22
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '8.5');
$pdf->MultiCell(90, 4, utf8_decode("Del 1 al 10, ¿Que calificación otorgarías al Instituto Tecnológico de Iguala de acuerdo a la formación integral que te proporcionó?"), 1, 'L', 1);
$pdf->Ln(-8);
$pdf->Cell(95);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(96, 8, utf8_decode("  " . $prt3p22), 1, 'L', 1);


// Pregunta 23
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '8.5');
$pdf->MultiCell(90, 4, utf8_decode("Enuncia las oportunidades de mejoras: "), 1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(95);
$pdf->SetFont('Arial', '', '8.5');
$pdf->MultiCell(96, 4, utf8_decode($prt3p23), 1, 'L', 1);

// PARTE IV: SOBRE TU OBJETIVOS
$pdf->Ln(5);
$pdf->Cell(5);
$pdf->SetFont('times', 'B', '10');
$pdf->MultiCell(186, 4, utf8_decode("PARTE IV: SOBRE TU OBJETIVOS"), 0, 'L', 1);

// Pregunta 1
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '8.5');
$pdf->MultiCell(90, 4, utf8_decode("¿Cuáles son tus próximos objetivos?"), 1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(95);
$pdf->SetFont('Arial', '', '8.5');
$pdf->MultiCell(96, 4, utf8_decode($prt4p1), 1, 'L', 1);

// Pregunta 2
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(90, 4, utf8_decode("¿Qué actividades vas a realizar para lograr tus objetivos inmediatos?"), 1, 'L', 1);
$pdf->Ln(-8);
$pdf->Cell(95);
$pdf->SetFont('Arial', '', '8.5');
$pdf->MultiCell(96, 8, utf8_decode($prt4p2), 1, 'L', 1);

// Pregunta 3
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(90, 4, utf8_decode("Actualmente, ¿tienes empleo relacionado con tu carrera?"), 1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(95);
if ($prt4p3 == "SI") {
    $pdf->Cell(48, 4,  utf8_decode("Sí (X)"), 1, 0, 'C');
    $pdf->Cell(48, 4,  utf8_decode("No ( )"), 1, 0, 'C');

    // Pregunta 4
    $pdf->Ln(4);
    $pdf->Cell(5);
    $pdf->SetFont('Arial', '', '9');
    $pdf->MultiCell(90, 4, utf8_decode("En caso afirmativo, ¿en donde laboras?"), 1, 'L', 1);
    $pdf->Ln(-4);
    $pdf->Cell(95);
    $pdf->SetFont('Arial', '', '9');
    $pdf->MultiCell(96, 4, utf8_decode($prt4p4), 1, 'L', 1);
} else {
    $pdf->Cell(48, 4,  utf8_decode("Sí ( )"), 1, 0, 'C');
    $pdf->Cell(48, 4,  utf8_decode("No (X)"), 1, 0, 'C');
    $pdf->Ln(4);
}


// Pregunta 5
// $prt4p5="NO";
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(90, 4, utf8_decode("Actualmente, ¿tienes oferta(s) laboral(es) relacionadas a tu carrera?"), 1, 'L', 1);
$pdf->Ln(-8);
$pdf->Cell(95);
if ($prt4p5 == "SI") {
    $pdf->Cell(48, 8,  utf8_decode("Sí (X)"), 1, 0, 'C');
    $pdf->Cell(48, 8,  utf8_decode("No ( )"), 1, 0, 'C');

    // Pregunta 6
    $pdf->Ln(8);
    $pdf->Cell(5);
    $pdf->SetFont('Arial', '', '9');
    $pdf->MultiCell(90, 4, utf8_decode("En caso afirmativo, ¿con cuál(es) empresa(s)?"), 1, 'L', 1);
    $pdf->Ln(-4);
    $pdf->Cell(95);
    $pdf->SetFont('Arial', '', '9');
    $pdf->MultiCell(96, 4, utf8_decode($prt4p6), 1, 'L', 1);
    $pdf->Ln(8);
} else {
    $pdf->Cell(48, 8,  utf8_decode("Sí ( )"), 1, 0, 'C');
    $pdf->Cell(48, 8,  utf8_decode("No (X)"), 1, 0, 'C');
    $pdf->Ln(8);
}

// Pregunta 7
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(90, 4, utf8_decode("En tu proyecto de vida de largo plazo ¿cómo te gustaria desarrollarte profesionalmente (lider en la empresa, negocio propio, investigación, decencia, consultora, otros)? Especifica"), 1, 'L', 1);
if (strlen($prt4p7) <= 66) {
    $pdf->Ln(-12);
    $pdf->Cell(95);
    $pdf->SetFont('Arial', '', '9');
    $pdf->MultiCell(96, 4, utf8_decode($prt4p7), 1, 'L', 1);

    // Pregunta 8
    $pdf->Ln(8);
    $pdf->Cell(5);
    $pdf->SetFont('Arial', '', '9');
    $pdf->MultiCell(90, 4, utf8_decode("¿En qué ciudad(es) te gustaría trabajar?"), 1, 'L', 1);
    $pdf->Ln(-4);
    $pdf->Cell(95);
    $pdf->SetFont('Arial', '', '9');
    $pdf->MultiCell(96, 4, utf8_decode($prt4p8), 1, 'L', 1);
} else if (strlen($prt4p7) >= 67 && strlen($prt4p7) <= 125) {
    $pdf->Ln(-12);
    $pdf->Cell(95);
    $pdf->SetFont('Arial', '', '9');
    $pdf->MultiCell(96, 4, utf8_decode($prt4p7), 1, 'L', 1);

    // Pregunta 8
    $pdf->Ln(4);
    $pdf->Cell(5);
    $pdf->SetFont('Arial', '', '9');
    $pdf->MultiCell(90, 4, utf8_decode("¿En qué ciudad(es) te gustaría trabajar?"), 1, 'L', 1);
    $pdf->Ln(-4);
    $pdf->Cell(95);
    $pdf->SetFont('Arial', '', '9');
    $pdf->MultiCell(96, 4, utf8_decode($prt4p8), 1, 'L', 1);
} else if (strlen($prt4p7) >= 126 && strlen($prt4p7) <= 190) {
    $pdf->Ln(-12);
    $pdf->Cell(95);
    $pdf->SetFont('Arial', '', '9');
    $pdf->MultiCell(96, 4, utf8_decode($prt4p7), 1, 'L', 1);

    // Pregunta 8
    $pdf->Cell(5);
    $pdf->SetFont('Arial', '', '9');
    $pdf->MultiCell(90, 4, utf8_decode("¿En qué ciudad(es) te gustaría trabajar?"), 1, 'L', 1);
    $pdf->Ln(-4);
    $pdf->Cell(95);
    $pdf->SetFont('Arial', '', '9');
    $pdf->MultiCell(96, 4, utf8_decode($prt4p8), 1, 'L', 1);
} else if (strlen($prt4p7) >= 191) {
    $pdf->Ln(-12);
    $pdf->Cell(95);
    $pdf->SetFont('Arial', '', '9');
    $pdf->MultiCell(96, 4, utf8_decode($prt4p7), 1, 'L', 1);

    // Pregunta 8
    $pdf->Cell(5);
    $pdf->SetFont('Arial', '', '9');
    $pdf->MultiCell(90, 4, utf8_decode("¿En qué ciudad(es) te gustaría trabajar?"), 1, 'L', 1);
    $pdf->Ln(-4);
    $pdf->Cell(95);
    $pdf->SetFont('Arial', '', '9');
    $pdf->MultiCell(96, 4, utf8_decode($prt4p8), 1, 'L', 1);
}

// Pregunta 9
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(90, 4, utf8_decode("¿Te gustaría estudiar algún posgrado?"), 1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(95);
if ($prt4p9 == "SI") {
    $pdf->Cell(48, 4,  utf8_decode("Sí (X)"), 1, 0, 'C');
    $pdf->Cell(48, 4,  utf8_decode("No ( )"), 1, 0, 'C');
    // Pregunta 10
    $pdf->Ln(4);
    $pdf->Cell(5);
    $pdf->SetFont('Arial', '', '9');
    $pdf->MultiCell(90, 4, utf8_decode("En caso afirmativo espesifica."), 1, 'L', 1);
    $pdf->Ln(-4);
    $pdf->Cell(95);
    $pdf->SetFont('Arial', '', '9');
    $pdf->MultiCell(96, 4, utf8_decode($prt4p10), 1, 'L', 1);
} else {
    $pdf->Cell(48, 4,  utf8_decode("Sí ( )"), 1, 0, 'C');
    $pdf->Cell(48, 4,  utf8_decode("No (X)"), 1, 0, 'C');
    $pdf->Ln(4);
}

// PARTE V: SOBRE LA FORMACION COMPLEMENTARIA
$pdf->Ln(5);
$pdf->Cell(5);
$pdf->SetFont('times', 'B', '10');
$pdf->MultiCell(186, 4, utf8_decode("PARTE V: SOBRE LA FORMACION COMPLEMENTARIA"), 0, 'L', 1);

// Pregunta 1
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(90, 4, utf8_decode("¿Cuáles cursos has tomado en los ultimos 3 años?"), 1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(95);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(96, 4, utf8_decode($prt5p1), 1, 'L', 1);

$pdf->SetDrawColor(255, 255, 255);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFillColor(255, 255, 255);
$pdf->Ln(0);
$pdf->Cell(192);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(100, 4, utf8_decode("ofjjvhnmdgihvj sdvvwfet"), 1, 'L', 1);
$pdf->SetDrawColor(0, 0, 0);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(255, 255, 255);

// Pregunta 2
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(90, 4, utf8_decode("¿En qué instituciones o centros de capacitación te has actualizado?"), 1, 'L', 1);
$pdf->Ln(-8);
$pdf->Cell(95);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(96, 8, utf8_decode($prt5p2), 1, 'L', 1);

$pdf->SetDrawColor(255, 255, 255);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFillColor(255, 255, 255);
$pdf->Ln(0);
$pdf->Cell(192);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(100, 8, utf8_decode("ofjjvhnmdgihvj sdvvwfet"), 1, 'L', 1);
$pdf->SetDrawColor(0, 0, 0);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(255, 255, 255);

// Pregunta 3
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(90, 4, utf8_decode("¿Cuentas con alguna certificación? Espesifica."), 1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(95);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(96, 4, utf8_decode($prt5p3), 1, 'L', 1);

$pdf->SetDrawColor(255, 255, 255);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFillColor(255, 255, 255);
$pdf->Ln(0);
$pdf->Cell(192);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(100, 4, utf8_decode("ofjjvhnmdgihvj sdvvwfet"), 1, 'L', 1);
$pdf->SetDrawColor(0, 0, 0);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(255, 255, 255);

// PARTE VI: SOBRE LA CAPACITACIÓN CONTÍNUA
$pdf->Ln(5);
$pdf->Cell(5);
$pdf->SetFont('times', 'B', '10');
$pdf->MultiCell(186, 4, utf8_decode("PARTE VI: SOBRE LA CAPACITACIÓN CONTÍNUA"), 0, 'L', 1);

// Pregunta 1
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(90, 4, utf8_decode("¿Consideras importante capacitarte continuamente?"), 1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(95);
if ($prt6p1 == "SI") {
    $pdf->Cell(32, 4,  utf8_decode("Sí (X)"), 1, 0, 'C');
    $pdf->Cell(32, 4,  utf8_decode("No ( )"), 1, 0, 'C');
    $pdf->Cell(32, 4,  utf8_decode("Parcialmente ( )"), 1, 0, 'C');
} else  if ($prt6p1 == "NO") {
    $pdf->Cell(32, 4,  utf8_decode("Sí ( )"), 1, 0, 'C');
    $pdf->Cell(32, 4,  utf8_decode("No (X)"), 1, 0, 'C');
    $pdf->Cell(32, 4,  utf8_decode("Parcialmente ( )"), 1, 0, 'C');
} else {
    $pdf->Cell(32, 4,  utf8_decode("Sí ( )"), 1, 0, 'C');
    $pdf->Cell(32, 4,  utf8_decode("No ( )"), 1, 0, 'C');
    $pdf->Cell(32, 4,  utf8_decode("Parcialmente (X)"), 1, 0, 'C');
}

// Pregunta 2
$pdf->Ln(4);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(90, 4, utf8_decode("¿Por qué?"), 1, 'L', 1);
$pdf->Ln(-4);
$pdf->Cell(95);
$pdf->SetFont('Arial', '', '8');
$pdf->MultiCell(96, 4, utf8_decode($prt6p2), 1, 'L', 1);

if ($prt6p1 == "SI") {
    // Pregunta 3
    $pdf->Cell(5);
    $pdf->SetFont('Arial', '', '9');
    $pdf->MultiCell(90, 4, utf8_decode("En caso afirmativo, ¿en qué temas o conocimientos crees que debas actualizarte?"), 1, 'L', 1);

    $pdf->Ln(-8);
    $pdf->Cell(95);
    $pdf->SetFont('Arial', '', '8');
    $pdf->MultiCell(96, 4, utf8_decode($prt6p3), 1, 'L', 1);
}

$pdf->Ln(8);
$pdf->Cell(5);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(186, 4, utf8_decode("Gracia a tu apoyo queremos realizar cambios en tú Instituto, por tal motivo te comvocamos que en 2 años nos ayudes con otra encuesta, que te haremos llegar por correo electronico"), 0, 'C', 1);
$pdf->Ln(5);
$pdf->Cell(162);
$pdf->SetFont('Arial', '', '9');
$pdf->MultiCell(30, 4, utf8_decode("Fecha: " . $fecha), 0, 'C', 1);

$pdf->Output('I', 'ENCUESTA DEL EGRESADO ' . $control . '.pdf', 'D');
//------------------------------------------------------------------------------------------


// INSERT INTO `encuestaegresados`(`id`, `nombre`, `añoing`, `ncontrol`, `carrera`, `planestu`, `anoegre`, `semestre`, `especialidad`, `pciudad`, `pmunicipio`, `pestado`, `ociudad`, `omunicipio`, `oestado`, `cel`, `emaili`, `emailp`, `face`, `prt2p1`, 20000`prt2p2`, `prt2p3`, `prt2p4`, `prt2p5`, `prt2p6`, `prt3p1`, `prt3p2`, `prt3p3`, `prt3p4`, `prt3p5`, `prt3p6`, `prt3p7`, `prt3p8`, `prt3p9`, `prt3p10`, `prt3p11`, `prt3p12`, `prt3p13`, `prt3p14`, `prt3p15`, 4000000`prt3p16`, `prt3p17`, `prt3p18`, `prt3p19`, `prt3p20`, `prt3p21`, `prt3p22`, `prt3p23`, `prt4p1`, `prt4p2`, `prt4p3`, `prt4p4`, `prt4p5`, `prt4p6`, `prt4p7`, `prt4p8`, `prt4p9`, `prt4p10`, `prt5p1`, `prt5p2`, `prt5p3`, `prt6p1`, `prt6p2`, `prt6p3`, `fecha`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]','[value-12]','[value-13]','[value-14]','[value-15]','[value-16]','[value-17]','[value-18]','[value-19]','[value-20]','[value-21]','[value-22]','[value-23]','[value-24]','[value-25]','[value-26]','[value-27]','[value-28]','[value-29]','[value-30]','[value-31]','[value-32]','[value-33]','[value-34]','[value-35]','[value-36]','[value-37]','[value-38]','[value-39]','[value-40]','[value-41]','[value-42]','[value-43]','[value-44]','[value-45]','[value-46]','[value-47]','[value-48]','[value-49]','[value-50]','[value-51]','[value-52]','[value-53]','[value-54]','[value-55]','[value-56]','[value-57]','[value-58]','[value-59]','[value-60]','[value-61]','[value-62]','[value-63]','[value-64]','[value-65]')


// (nombre, anoing, ncontrol) VALUES (:nombre, :anoing, :ncontrol)")
$stmt = Conexion::conectar()->prepare("INSERT INTO encuestaegresados 
(nombre, anoing, ncontrol, carrera, planestu, anoegre, semestre, especialidad, pciudad, pmunicipio, pestado, ociudad, omunicipio, oestado, cel, emaili, emailp, face, prt2p1, prt2p2, prt2p3, prt2p4, prt2p5, prt2p6, prt3p1, prt3p2, prt3p3, prt3p4, prt3p5, prt3p6, prt3p7, prt3p8, prt3p9, prt3p10, prt3p11, prt3p12, prt3p13, prt3p14, prt3p15, prt3p16, prt3p17, prt3p18, prt3p19, prt3p20, prt3p21, prt3p22, prt3p23, prt4p1, prt4p2, prt4p3, prt4p4, prt4p5, prt4p6, prt4p7, prt4p8, prt4p9, prt4p10, prt5p1, prt5p2, prt5p3, prt6p1, prt6p2, prt6p3, fecha) 
VALUES 
(:nombre, :anoing, :ncontrol, :carrera, :planestu, :anoegre, :semestre, :especialidad, :pciudad, :pmunicipio, :pestado, :ociudad, :omunicipio, :oestado, :cel, :emaili, :emailp, :face, :prt2p1, :prt2p2, :prt2p3, :prt2p4, :prt2p5, :prt2p6, :prt3p1, :prt3p2, :prt3p3, :prt3p4, :prt3p5, :prt3p6, :prt3p7, :prt3p8, :prt3p9, :prt3p10, :prt3p11, :prt3p12, :prt3p13, :prt3p14, :prt3p15, :prt3p16, :prt3p17, :prt3p18, :prt3p19, :prt3p20, :prt3p21, :prt3p22, :prt3p23, :prt4p1, :prt4p2, :prt4p3, :prt4p4, :prt4p5, :prt4p6, :prt4p7, :prt4p8, :prt4p9, :prt4p10, :prt5p1, :prt5p2, :prt5p3, :prt6p1, :prt6p2, :prt6p3, :fecha)");

$stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
$stmt->bindParam(":anoing", $añoing, PDO::PARAM_STR);
$stmt->bindParam(":ncontrol", $control, PDO::PARAM_STR);
$stmt->bindParam(":carrera", $carrera, PDO::PARAM_STR);
$stmt->bindParam(":planestu", $planestu, PDO::PARAM_STR);
$stmt->bindParam(":anoegre", $añoegre, PDO::PARAM_STR);
$stmt->bindParam(":semestre", $semestre, PDO::PARAM_STR);
$stmt->bindParam(":especialidad", $especialidad, PDO::PARAM_STR);
$stmt->bindParam(":pciudad", $pciudad, PDO::PARAM_STR);
$stmt->bindParam(":pmunicipio", $pmunicipio, PDO::PARAM_STR);
$stmt->bindParam(":pestado", $pestado, PDO::PARAM_STR);
$stmt->bindParam(":ociudad", $ociudad, PDO::PARAM_STR);
$stmt->bindParam(":omunicipio", $omunicipio, PDO::PARAM_STR);
$stmt->bindParam(":oestado", $oestado, PDO::PARAM_STR);
$stmt->bindParam(":cel", $cel, PDO::PARAM_STR);
$stmt->bindParam(":emaili", $emaili, PDO::PARAM_STR);
$stmt->bindParam(":emailp", $emailp, PDO::PARAM_STR);
$stmt->bindParam(":face", $face, PDO::PARAM_STR);
$stmt->bindParam(":prt2p1", $prt2p1, PDO::PARAM_STR);
$stmt->bindParam(":prt2p2", $prt2p2, PDO::PARAM_STR);
$stmt->bindParam(":prt2p3", $prt2p3, PDO::PARAM_STR);
$stmt->bindParam(":prt2p4", $prt2p4, PDO::PARAM_STR);
$stmt->bindParam(":prt2p5", $prt2p5, PDO::PARAM_STR);
$stmt->bindParam(":prt2p6", $prt2p6, PDO::PARAM_STR);
$stmt->bindParam(":prt3p1", $prt3p1, PDO::PARAM_STR);
$stmt->bindParam(":prt3p2", $prt3p2, PDO::PARAM_STR);
$stmt->bindParam(":prt3p3", $prt3p3, PDO::PARAM_STR);
$stmt->bindParam(":prt3p4", $prt3p4, PDO::PARAM_STR);
$stmt->bindParam(":prt3p5", $prt3p5, PDO::PARAM_STR);
$stmt->bindParam(":prt3p6", $prt3p6, PDO::PARAM_STR);
$stmt->bindParam(":prt3p7", $prt3p7, PDO::PARAM_STR);
$stmt->bindParam(":prt3p8", $prt3p8, PDO::PARAM_STR);
$stmt->bindParam(":prt3p9", $prt3p9, PDO::PARAM_STR);
$stmt->bindParam(":prt3p10", $prt3p10, PDO::PARAM_STR);
$stmt->bindParam(":prt3p11", $prt3p11, PDO::PARAM_STR);
$stmt->bindParam(":prt3p12", $prt3p12, PDO::PARAM_STR);
$stmt->bindParam(":prt3p13", $prt3p13, PDO::PARAM_STR);
$stmt->bindParam(":prt3p14", $prt3p14, PDO::PARAM_STR);
$stmt->bindParam(":prt3p15", $prt3p15, PDO::PARAM_STR);
$stmt->bindParam(":prt3p16", $prt3p16, PDO::PARAM_STR);
$stmt->bindParam(":prt3p17", $prt3p17, PDO::PARAM_STR);
$stmt->bindParam(":prt3p18", $prt3p18, PDO::PARAM_STR);
$stmt->bindParam(":prt3p19", $prt3p19, PDO::PARAM_STR);
$stmt->bindParam(":prt3p20", $prt3p20, PDO::PARAM_STR);
$stmt->bindParam(":prt3p21", $prt3p21, PDO::PARAM_STR);
$stmt->bindParam(":prt3p22", $prt3p22, PDO::PARAM_STR);
$stmt->bindParam(":prt3p23", $prt3p23, PDO::PARAM_STR);
$stmt->bindParam(":prt4p1", $prt4p1, PDO::PARAM_STR);
$stmt->bindParam(":prt4p2", $prt4p2, PDO::PARAM_STR);
$stmt->bindParam(":prt4p3", $prt4p3, PDO::PARAM_STR);
$stmt->bindParam(":prt4p4", $prt4p4, PDO::PARAM_STR);
$stmt->bindParam(":prt4p5", $prt4p5, PDO::PARAM_STR);
$stmt->bindParam(":prt4p6", $prt4p6, PDO::PARAM_STR);
$stmt->bindParam(":prt4p7", $prt4p7, PDO::PARAM_STR);
$stmt->bindParam(":prt4p8", $prt4p8, PDO::PARAM_STR);
$stmt->bindParam(":prt4p9", $prt4p9, PDO::PARAM_STR);
$stmt->bindParam(":prt4p10", $prt4p10, PDO::PARAM_STR);
$stmt->bindParam(":prt5p1", $prt5p1, PDO::PARAM_STR);
$stmt->bindParam(":prt5p2", $prt5p2, PDO::PARAM_STR);
$stmt->bindParam(":prt5p3", $prt5p3, PDO::PARAM_STR);
$stmt->bindParam(":prt6p1", $prt6p1, PDO::PARAM_STR);
$stmt->bindParam(":prt6p2", $prt6p2, PDO::PARAM_STR);
$stmt->bindParam(":prt6p3", $prt6p3, PDO::PARAM_STR);
$stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);

if ($stmt->execute()) {

    echo "<script>
Swal.fire({
type: 'success',
title: '¡Muchas gracias por participar en la encuesta!<br>{$nombre}',
showConfirmButton: true,
timer: 100000,
confirmButtonText: 'Aceptar',
closeOnConfirm: false
}).then((result)=>{
if(result.value){
   window.location = 'Encuestainicio';
}
});
</script>";

} else {

    echo "kdhvdfgfhgjhjgfdgrdthfyjguhijfbd";
}




























//--------------------------------------------------------------------------------------------------------------------------------
