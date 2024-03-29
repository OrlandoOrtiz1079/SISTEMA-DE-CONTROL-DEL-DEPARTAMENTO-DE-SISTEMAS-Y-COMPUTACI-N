<?php
session_start();

require '../FPDF/fpdf.php';
require '../../controladores/residentes.controlador.php';
require '../../modelos/residentes.modelo.php';
require '../../controladores/jerarquia.controlador.php';
require '../../modelos/jerarquia.modelo.php';
class PDF extends FPDF
{
    public $docente;
    //Cabecera
    public function Header()
    {
        $this->SetFont('Arial', 'B', '10');
        $this->Image('../img/Enca.jpg', 24, 14, 90, 0);
        $this->Ln(40);//NOTE no borrar
    }
    public function Footer()
    {
        $this->Image('../img/Piedepagina.png', 24, 235, 170, 40, 'PNG');
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
if (isset($_SESSION['iniciarSesion']) && $_SESSION['iniciarSesion'] == "ok") {

    $item = "id";
    $valor = $_GET['id'];
    $tabla = "jerarquia";
    $puesto = "JEFE DEL DEPTO. DE SISTEMAS Y COMPUTACIÓN";
    $res = ControladorResidentes::ctrMostrarInfoResidentes($item, $valor);
    $res2 = ControladorJerarquia::ctrMostrarDocentesDictamen($tabla, $puesto);

    // $leyenda = '"2020, Año de Leona Vicario, Benemérita Madre de la Patria"';

    $pdf = new PDF('P', 'mm', 'Letter');
    $pdf->AddPage();
    $h = $pdf->GetPageHeight();
    $w = $pdf->GetPageWidth();
    // $pdf->Image('../img/fondo_membrete_R.jpg', '0', '38', '220', '243', 'JPG');

    //OTRO
    // $pdf->AddPage();
    $h = $pdf->GetPageHeight();
    $w = $pdf->GetPageWidth();
    // $pdf->Image('../img/fondo_membrete_R.jpg', '0', '38', '220', '243', 'JPG');
    $pdf->SetFont('Helvetica', '', '7');
    // $pdf->Cell(0, 4, utf8_decode($leyenda), 0, 1, 'C');
    $pdf->Ln(-15);


    $pdf->SetFont('Helvetica', '', '8');
    $pdf->SetTextColor(90,90,90);
    $pdf->Cell(305,0,utf8_decode('Instituto Tecnológico de Iguala'),0,0,'C');
    $pdf->Ln(4);
    
    $pdf->SetFont('Helvetica', '', '8');
    $pdf->SetTextColor(150,150,150);
    $pdf->Cell(289,0,utf8_decode('Departamento de Sistemas y Computación'),0,0,'C');
    $pdf->Ln(15);
    $pdf->SetTextColor(0,0,0);

    $pdf->SetFont('Helvetica', '', '9');
    $pdf->Cell(107);
    $pdf->Cell(25, 4, 'IGUALA, GRO., ', 0, 0, 'L');
    $pdf->SetFont('Helvetica', 'B', '9');
    $pdf->Cell(50, 4, $_GET['fecha'], 0, 1, 'L');

    $pdf->SetFont('Helvetica', '', '9');
    $pdf->Cell(107);
    $pdf->SetFont('Helvetica', 'B', '9');
    $pdf->Cell(20, 4, utf8_decode('DEPARTAMENTO DE SISTEMAS Y COMPUTACIÓN'), 0, 1, 'L');
    $pdf->Cell(107);
    $pdf->SetFont('Helvetica', '', '9');
    $pdf->Cell(80, 4, 'OF. No. DSC-ITI/' . $_GET['folio1'] . '/' . date("Y"), 0, 1, 'L');
    $pdf->Cell(107);
    $pdf->Cell(15, 4, 'ASUNTO: ', 0, 0, 'L');
    $pdf->SetFont('Helvetica', 'BUI', '9');
    $pdf->Cell(15, 4, utf8_decode('JURADO DE TITULACIÓN.'), 0, 1, 'L');
    $pdf->Ln(5); //CELDA DE ESPACIO

    $pdf->SetFont('Helvetica', 'B', '9');
    $pdf->Cell(11);
    $pdf->Cell(80, 4, utf8_decode($res['asesorInt']), 0, 1, 'L');
    $pdf->Cell(11);
    $pdf->Cell(80, 4, utf8_decode('DOCENTE DE ESTA INSTITUCIÓN'), 0, 1, 'L');
    $pdf->Cell(11);
    $pdf->Cell(80, 4, 'P R E S E N T E.', 0, 1, 'L');
    $pdf->Ln(5);
    $pdf->SetFont('Helvetica', '', '9');

    $pdf->SetLeftMargin(25);
    $pdf->SetRightMargin(25);

    // $pdf->Cell(10);
    $text1 = 'Por medio del presente, me permito hacer de su conocimiento que ha sido comisionado (a) para fungir como <PRESIDENTE>, en el Acto de Recepción Profesional de él (la) <C.' . $res['nombre'] . '>, que realiza su protocolo para su <TITULACIÓN INTEGRAL "INFORME TÉCNICO DE RESIDENCIA PROFESIONAL">, defendiendo su proyecto (promedio ' . $_GET['pro'] . '), el día <' . utf8_decode(mb_strtoupper($_GET['fechaT'])) . ' del año en curso>,  a las <' . $_GET['horaT'] . ' HRS.>, a través de la plataforma <ZOOM.>';
    $text2 = 'Por medio del presente, me permito hacer de su conocimiento que ha sido comisionado (a) para fungir como <PRESIDENTE>, en el Acto de Recepción Profesional de él (la) <C.' . $res['nombre'] . '>, que realiza su protocolo para su <TITULACIÓN INTEGRAL "INFORME TÉCNICO DE RESIDENCIA PROFESIONAL">, el día <' . utf8_decode(mb_strtoupper($_GET['fechaT'])) . ' del año en curso>,  a las <' . $_GET['horaT'] . ' HRS.>, a través de la plataforma <ZOOM.>';
    if ($_GET['defiende'] == 'si') {
        $pdf->WriteText(utf8_decode($text1));
    } else {
        $pdf->WriteText(utf8_decode($text2));
    }

    $pdf->SetLeftMargin(10);
    $pdf->SetRightMargin(10);

    $pdf->Ln(10);
    $pdf->SetFont('Helvetica', '', '9');
    $pdf->Cell(19);
    $text = "Así mismo le comunico que dicho evento será celebrado puntualmente en la fecha, hora y aula especificadas, por lo
            que le pido a usted confirmar en un plazo no mayor a un día, < además deberá conectarse 10 minutos antes del evento>.";
    $pdf->WriteText(utf8_decode($text));
    $pdf->Ln(10);
    $pdf->SetFont('Helvetica', '', '9');
    $pdf->Cell(19);
    $pdf->Cell(150, 4, utf8_decode('También le notifico que por ser el acto de Recepción Profesional de Titulación una ceremonia especial, es requisito'), 0, 1, 'L');
    $pdf->Cell(11);
    $pdf->Cell(150, 4, utf8_decode('para los miembros del jurado, presentarse de manera apropiada para ello. '), 0, 1, 'L');
    $pdf->Ln(5);
    $pdf->SetFont('Helvetica', '', '9');
    $pdf->Cell(19);
    $pdf->MultiCell(163, 4, utf8_decode('Hombres: Saco y corbata.
Mujeres: Vestir de manera formal (traje sastre o de acuerdo al evento).'), 1, 'L');
    $pdf->Ln(10);
    $pdf->Cell(11);
    $pdf->SetFont('Arial', 'B', '9');
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 7, utf8_decode('PRESIDENTE'), 1, 'C');
    $pdf->SetXY($x + 43, $y);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 7, utf8_decode('SECRETARIO'), 1, 'C');
    $pdf->SetXY($x + 43, $y);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 7, utf8_decode('VOCAL'), 1, 'C');
    $pdf->SetXY($x + 43, $y);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 7, utf8_decode('VOCAL SUPLENTE'), 1, 'C');

    $pdf->SetFont('Arial', '', '9');
    $pdf->Cell(11);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 5, utf8_decode(mb_strtoupper($res['asesorInt'])), 1, 'C');
    $pdf->SetXY($x + 43, $y);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 5, utf8_decode(mb_strtoupper($res['revisor1'])), 1, 'C');
    $pdf->SetXY($x + 43, $y);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 5, utf8_decode(mb_strtoupper($res['revisor2'])), 1, 'C');
    $pdf->SetXY($x + 43, $y);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 5, utf8_decode(mb_strtoupper($res['suplente'])), 1, 'C');

    $pdf->Ln(4);
    $pdf->Cell(0, 4, utf8_decode('Sin más por el momento y agradeciendo de antemano la atención prestada al presente quedo de usted.'), 0, 1, 'C');
    $pdf->Ln(4);
    $pdf->SetFont('Helvetica', 'B', '9');
    $pdf->Cell(0, 4, utf8_decode('A T E N T A M E N T E'), 0, 1, 'C');
    $pdf->Cell(0, 4, utf8_decode('"TECNOLOGÍA COMO SINÓNIMO DE INDEPENDENCIA"'), 0, 1, 'C');
    $pdf->Ln(15);
    $pdf->SetFont('Helvetica', 'B', '9');
    $pdf->Cell(0, 4, utf8_decode($res2['nombre']), 0, 1, 'C');
    if ($res2['sexo'] == 'F') {
        $pdf->Cell(0, 4, utf8_decode('JEFA DEL DEPTO. DE SISTEMAS Y COMPUTACIÓN'), 0, 1, 'C');
    } else {
        $pdf->Cell(0, 4, utf8_decode('JEFE DEL DEPTO. DE SISTEMAS Y COMPUTACIÓN'), 0, 1, 'C');
    }
    $pdf->Ln(5);
    $pdf->SetFont('Helvetica', '', '7');
    $pdf->Cell(20);
    $pdf->Cell(0, 4, utf8_decode('C.c.p. archivo.'), 0, 1, 'L');
    $pdf->SetFont('Helvetica', '', '6');
    $pdf->Cell(20);
    $pdf->Cell(20, 4, utf8_decode('JEOL*ere'), 0, 1, 'R');

    //OTRO DOCUMENTO
    $pdf->AddPage();
    $h = $pdf->GetPageHeight();
    $w = $pdf->GetPageWidth();
    // $pdf->Image('../img/fondo_membrete_R.jpg', '0', '38', '220', '243', 'JPG');
    $pdf->SetFont('Helvetica', '', '7');
    // $pdf->Cell(0, 4, utf8_decode($leyenda), 0, 1, 'C');
   $pdf->Ln(-15);


    $pdf->SetFont('Helvetica', '', '8');
    $pdf->SetTextColor(90,90,90);
    $pdf->Cell(305,0,utf8_decode('Instituto Tecnológico de Iguala'),0,0,'C');
    $pdf->Ln(4);
    
    $pdf->SetFont('Helvetica', '', '8');
    $pdf->SetTextColor(150,150,150);
    $pdf->Cell(289,0,utf8_decode('Departamento de Sistemas y Computación'),0,0,'C');
    $pdf->Ln(15);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Helvetica', '', '9');
    $pdf->Cell(107);
    $pdf->Cell(25, 4, 'IGUALA, GRO., ', 0, 0, 'L');
    $pdf->SetFont('Helvetica', 'B', '9');
    $pdf->Cell(50, 4, $_GET['fecha'], 0, 1, 'L');
    $pdf->SetFont('Helvetica', '', '9');
    $pdf->Cell(107);
    $pdf->SetFont('Helvetica', 'B', '9');
    $pdf->Cell(20, 4, utf8_decode('DEPARTAMENTO DE SISTEMAS Y COMPUTACIÓN'), 0, 1, 'L');
    $pdf->Cell(107);
    $pdf->SetFont('Helvetica', '', '9');
    $pdf->Cell(80, 4, 'OF. No. DSC-ITI/' . $_GET['folio2'] . '/' . date("Y"), 0, 1, 'L');
    $pdf->Cell(107);
    $pdf->Cell(15, 4, 'ASUNTO: ', 0, 0, 'L');
    $pdf->SetFont('Helvetica', 'BUI', '9');
    $pdf->Cell(15, 4, utf8_decode('JURADO DE TITULACIÓN.'), 0, 1, 'L');
    $pdf->Ln(5); //CELDA DE ESPACIO
    $pdf->SetFont('Helvetica', 'B', '9');
    $pdf->Cell(11);
    $pdf->Cell(80, 4, utf8_decode($res['revisor1']), 0, 1, 'L');
    $pdf->Cell(11);
    $pdf->Cell(80, 4, utf8_decode('DOCENTE DE ESTA INSTITUCIÓN'), 0, 1, 'L');
    $pdf->Cell(11);
    $pdf->Cell(80, 4, 'P R E S E N T E.', 0, 1, 'L');
    $pdf->Ln(5);
    $pdf->SetFont('Helvetica', '', '9');

    $pdf->SetLeftMargin(25);
    $pdf->SetRightMargin(25);

    // $pdf->Cell(19);
    $text1 = 'Por medio del presente, me permito hacer de su conocimiento que ha sido comisionado (a) para fungir como <SECRETARIO (A)>, en el Acto de Recepción Profesional de él (la) <C. ' . $res['nombre'] . '>, que realiza su protocolo para su <TITULACIÓN INTEGRAL "INFORME TÉCNICO DE RESIDENCIA PROFESIONAL">, defendiendo su proyecto (promedio ' . $_GET['pro'] . '), el día <' . utf8_decode(mb_strtoupper($_GET['fechaT'])) . ' del año en curso>,  a las <' . $_GET['horaT'] . ' HRS.>, a través de la plataforma <ZOOM.>';
    $text2 = 'Por medio del presente, me permito hacer de su conocimiento que ha sido comisionado (a) para fungir como <SECRETARIO (A)>, en el Acto de Recepción Profesional de él (la) <C. ' . $res['nombre'] . '>, que realiza su protocolo para su <TITULACIÓN INTEGRAL "INFORME TÉCNICO DE RESIDENCIA PROFESIONAL">, el día <' . utf8_decode(mb_strtoupper($_GET['fechaT'])) . ' del año en curso>,  a las <' . $_GET['horaT'] . ' HRS.>, a través de la plataforma <ZOOM.>';
    if ($_GET['defiende'] == 'si') {
        $pdf->WriteText(utf8_decode($text1));
    } else {
        $pdf->WriteText(utf8_decode($text2));
    }

    $pdf->SetLeftMargin(10);
    $pdf->SetRightMargin(10);

    $pdf->Ln(10);
    $pdf->SetFont('Helvetica', '', '9');
    $pdf->Cell(19);
    $text = "Así mismo le comunico que dicho evento será celebrado puntualmente en la fecha, hora y aula especificadas, por lo
        que le pido a usted confirmar en un plazo no mayor a un día, < además deberá conectarse 10 minutos antes del evento>.";
    $pdf->WriteText(utf8_decode($text));
    $pdf->Ln(10);
    $pdf->SetFont('Helvetica', '', '9');
    $pdf->Cell(19);
    $pdf->Cell(150, 4, utf8_decode('También le notifico que por ser el acto de Recepción Profesional de Titulación una ceremonia especial, es requisito'), 0, 1, 'L');
    $pdf->Cell(11);
    $pdf->Cell(150, 4, utf8_decode('para los miembros del jurado, presentarse de manera apropiada para ello. '), 0, 1, 'L');
    $pdf->Ln(5);
    $pdf->SetFont('Helvetica', '', '9');
    $pdf->Cell(19);
    $pdf->MultiCell(163, 4, utf8_decode('Hombres: Saco y corbata.
Mujeres: Vestir de manera formal (traje sastre o de acuerdo al evento).'), 1, 'L');
    $pdf->Ln(10);
    $pdf->Cell(11);
    $pdf->SetFont('Arial', 'B', '9');
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 7, utf8_decode('PRESIDENTE'), 1, 'C');
    $pdf->SetXY($x + 43, $y);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 7, utf8_decode('SECRETARIO'), 1, 'C');
    $pdf->SetXY($x + 43, $y);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 7, utf8_decode('VOCAL'), 1, 'C');
    $pdf->SetXY($x + 43, $y);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 7, utf8_decode('VOCAL SUPLENTE'), 1, 'C');

    $pdf->SetFont('Arial', '', '9');
    $pdf->Cell(11);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 5, utf8_decode(mb_strtoupper($res['asesorInt'])), 1, 'C');
    $pdf->SetXY($x + 43, $y);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 5, utf8_decode(mb_strtoupper($res['revisor1'])), 1, 'C');
    $pdf->SetXY($x + 43, $y);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 5, utf8_decode(mb_strtoupper($res['revisor2'])), 1, 'C');
    $pdf->SetXY($x + 43, $y);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 5, utf8_decode(mb_strtoupper($res['suplente'])), 1, 'C');

    $pdf->Ln(4);
    $pdf->Cell(0, 4, utf8_decode('Sin más por el momento y agradeciendo de antemano la atención prestada al presente quedo de usted.'), 0, 1, 'C');
    $pdf->Ln(4);
    $pdf->SetFont('Helvetica', 'B', '9');
    $pdf->Cell(0, 4, utf8_decode('A T E N T A M E N T E'), 0, 1, 'C');
    $pdf->Cell(0, 4, utf8_decode('"TECNOLOGÍA COMO SINÓNIMO DE INDEPENDENCIA"'), 0, 1, 'C');
    $pdf->Ln(15);
    $pdf->SetFont('Helvetica', 'B', '9');
    $pdf->Cell(0, 4, utf8_decode($res2['nombre']), 0, 1, 'C');
    if ($res2['sexo'] == 'F') {
        $pdf->Cell(0, 4, utf8_decode('JEFA DEL DEPTO. DE SISTEMAS Y COMPUTACIÓN'), 0, 1, 'C');
    } else {
        $pdf->Cell(0, 4, utf8_decode('JEFE DEL DEPTO. DE SISTEMAS Y COMPUTACIÓN'), 0, 1, 'C');
    }
    $pdf->Ln(5);
    $pdf->SetFont('Helvetica', '', '7');
    $pdf->Cell(20);
    $pdf->Cell(0, 4, utf8_decode('C.c.p. archivo.'), 0, 1, 'L');
    $pdf->SetFont('Helvetica', '', '6');
    $pdf->Cell(20);
    $pdf->Cell(20, 4, utf8_decode('JEOL*ere'), 0, 1, 'R');

    //OTRO DOCUMENTO
    $pdf->AddPage();
    $h = $pdf->GetPageHeight();
    $w = $pdf->GetPageWidth();
    // $pdf->Image('../img/fondo_membrete_R.jpg', '0', '38', '220', '243', 'JPG');
    $pdf->SetFont('Helvetica', '', '7');
    // $pdf->Cell(0, 4, utf8_decode($leyenda), 0, 1, 'C');
    $pdf->Ln(-15);


    $pdf->SetFont('Helvetica', '', '8');
    $pdf->SetTextColor(90,90,90);
    $pdf->Cell(305,0,utf8_decode('Instituto Tecnológico de Iguala'),0,0,'C');
    $pdf->Ln(4);
    
    $pdf->SetFont('Helvetica', '', '8');
    $pdf->SetTextColor(150,150,150);
    $pdf->Cell(289,0,utf8_decode('Departamento de Sistemas y Computación'),0,0,'C');
    $pdf->Ln(15);
    $pdf->SetTextColor(0,0,0);

    $pdf->SetFont('Helvetica', '', '9');
    $pdf->Cell(107);
    $pdf->Cell(25, 4, 'IGUALA, GRO., ', 0, 0, 'L');
    $pdf->SetFont('Helvetica', 'B', '9');
    $pdf->Cell(50, 4, $_GET['fecha'], 0, 1, 'L');
    $pdf->SetFont('Helvetica', '', '9');
    $pdf->Cell(107);
    $pdf->SetFont('Helvetica', 'B', '9');
    $pdf->Cell(20, 4, utf8_decode('DEPARTAMENTO DE SISTEMAS Y COMPUTACIÓN'), 0, 1, 'L');
    $pdf->Cell(107);
    $pdf->SetFont('Helvetica', '', '9');
    $pdf->Cell(80, 4, 'OF. No. DSC-ITI/' . $_GET['folio3'] . '/' . date("Y"), 0, 1, 'L');
    $pdf->Cell(107);
    $pdf->Cell(15, 4, 'ASUNTO: ', 0, 0, 'L');
    $pdf->SetFont('Helvetica', 'BUI', '9');
    $pdf->Cell(15, 4, utf8_decode('JURADO DE TITULACIÓN.'), 0, 1, 'L');
    $pdf->Ln(5); //CELDA DE ESPACIO
    $pdf->SetFont('Helvetica', 'B', '9');
    $pdf->Cell(11);
    $pdf->Cell(80, 4, utf8_decode($res['revisor2']), 0, 1, 'L');
    $pdf->Cell(11);
    $pdf->Cell(80, 4, utf8_decode('DOCENTE DE ESTA INSTITUCIÓN'), 0, 1, 'L');
    $pdf->Cell(11);
    $pdf->Cell(80, 4, 'P R E S E N T E.', 0, 1, 'L');
    $pdf->Ln(5);
    $pdf->SetFont('Helvetica', '', '9');

    $pdf->SetLeftMargin(25);
    $pdf->SetRightMargin(25);

    // $pdf->Cell(19);
    $text1 = 'Por medio del presente, me permito hacer de su conocimiento que ha sido comisionado (a) para fungir como <VOCAL>, en el Acto de Recepción Profesional de él (la) <C. ' . $res['nombre'] . '>, que realiza su protocolo para su <TITULACIÓN INTEGRAL "INFORME TÉCNICO DE RESIDENCIA PROFESIONAL">, defendiendo su proyecto (promedio ' . $_GET['pro'] . '), el día <' . utf8_decode(mb_strtoupper($_GET['fechaT'])) . ' del año en curso>,  a las <' . $_GET['horaT'] . ' HRS.>, a través de la plataforma <ZOOM.>';
    $text2 = 'Por medio del presente, me permito hacer de su conocimiento que ha sido comisionado (a) para fungir como <VOCAL>, en el Acto de Recepción Profesional de él (la) <C. ' . $res['nombre'] . '>, que realiza su protocolo para su <TITULACIÓN INTEGRAL "INFORME TÉCNICO DE RESIDENCIA PROFESIONAL">, el día <' . utf8_decode(mb_strtoupper($_GET['fechaT'])) . ' del año en curso>,  a las <' . $_GET['horaT'] . ' HRS.>, a través de la plataforma <ZOOM.>';
    if ($_GET['defiende'] == 'si') {
        $pdf->WriteText(utf8_decode($text1));
    } else {
        $pdf->WriteText(utf8_decode($text2));
    }

    $pdf->SetLeftMargin(10);
    $pdf->SetRightMargin(10);

    $pdf->Ln(10);
    $pdf->SetFont('Helvetica', '', '9');
    $pdf->Cell(19);
    $text = "Así mismo le comunico que dicho evento será celebrado puntualmente en la fecha, hora y aula especificadas, por lo
            que le pido a usted confirmar en un plazo no mayor a un día, < además deberá conectarse 10 minutos antes del evento>.";
    $pdf->WriteText(utf8_decode($text));
    $pdf->Ln(10);
    $pdf->SetFont('Helvetica', '', '9');
    $pdf->Cell(19);
    $pdf->Cell(150, 4, utf8_decode('También le notifico que por ser el acto de Recepción Profesional de Titulación una ceremonia especial, es requisito'), 0, 1, 'L');
    $pdf->Cell(11);
    $pdf->Cell(150, 4, utf8_decode('para los miembros del jurado, presentarse de manera apropiada para ello. '), 0, 1, 'L');
    $pdf->Ln(5);
    $pdf->SetFont('Helvetica', '', '9');
    $pdf->Cell(19);
    $pdf->MultiCell(163, 4, utf8_decode('Hombres: Saco y corbata.
Mujeres: Vestir de manera formal (traje sastre o de acuerdo al evento).'), 1, 'L');
    $pdf->Ln(10);
    $pdf->Cell(11);
    $pdf->SetFont('Arial', 'B', '9');
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 7, utf8_decode('PRESIDENTE'), 1, 'C');
    $pdf->SetXY($x + 43, $y);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 7, utf8_decode('SECRETARIO'), 1, 'C');
    $pdf->SetXY($x + 43, $y);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 7, utf8_decode('VOCAL'), 1, 'C');
    $pdf->SetXY($x + 43, $y);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 7, utf8_decode('VOCAL SUPLENTE'), 1, 'C');

    $pdf->SetFont('Arial', '', '9');
    $pdf->Cell(11);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 5, utf8_decode(mb_strtoupper($res['asesorInt'])), 1, 'C');
    $pdf->SetXY($x + 43, $y);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 5, utf8_decode(mb_strtoupper($res['revisor1'])), 1, 'C');
    $pdf->SetXY($x + 43, $y);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 5, utf8_decode(mb_strtoupper($res['revisor2'])), 1, 'C');
    $pdf->SetXY($x + 43, $y);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 5, utf8_decode(mb_strtoupper($res['suplente'])), 1, 'C');

    $pdf->Ln(4);
    $pdf->Cell(0, 4, utf8_decode('Sin más por el momento y agradeciendo de antemano la atención prestada al presente quedo de usted.'), 0, 1, 'C');
    $pdf->Ln(4);
    $pdf->SetFont('Helvetica', 'B', '9');
    $pdf->Cell(0, 4, utf8_decode('A T E N T A M E N T E'), 0, 1, 'C');
    $pdf->Cell(0, 4, utf8_decode('"TECNOLOGÍA COMO SINÓNIMO DE INDEPENDENCIA"'), 0, 1, 'C');
    $pdf->Ln(15);
    $pdf->SetFont('Helvetica', 'B', '9');
    $pdf->Cell(0, 4, utf8_decode($res2['nombre']), 0, 1, 'C');
    if ($res2['sexo'] == 'F') {
        $pdf->Cell(0, 4, utf8_decode('JEFA DEL DEPTO. DE SISTEMAS Y COMPUTACIÓN'), 0, 1, 'C');
    } else {
        $pdf->Cell(0, 4, utf8_decode('JEFE DEL DEPTO. DE SISTEMAS Y COMPUTACIÓN'), 0, 1, 'C');
    }
    $pdf->Ln(5);
    $pdf->SetFont('Helvetica', '', '7');
    $pdf->Cell(20);
    $pdf->Cell(0, 4, utf8_decode('C.c.p. archivo.'), 0, 1, 'L');
    $pdf->SetFont('Helvetica', '', '6');
    $pdf->Cell(20);
    $pdf->Cell(20, 4, utf8_decode('JEOL*ere'), 0, 1, 'R');


    //OTRO DOCUMENTO
    $pdf->AddPage();
    $h = $pdf->GetPageHeight();
    $w = $pdf->GetPageWidth();
    // $pdf->Image('../img/fondo_membrete_R.jpg', '0', '38', '220', '243', 'JPG');
    $pdf->SetFont('Helvetica', '', '7');
    // $pdf->Cell(0, 4, utf8_decode($leyenda), 0, 1, 'C');
    $pdf->Ln(-15);


    $pdf->SetFont('Helvetica', '', '8');
    $pdf->SetTextColor(90,90,90);
    $pdf->Cell(305,0,utf8_decode('Instituto Tecnológico de Iguala'),0,0,'C');
    $pdf->Ln(4);
    
    $pdf->SetFont('Helvetica', '', '8');
    $pdf->SetTextColor(150,150,150);
    $pdf->Cell(289,0,utf8_decode('Departamento de Sistemas y Computación'),0,0,'C');
    $pdf->Ln(15);
    $pdf->SetTextColor(0,0,0);

    $pdf->SetFont('Helvetica', '', '9');
    $pdf->Cell(107);
    $pdf->Cell(25, 4, 'IGUALA, GRO., ', 0, 0, 'L');
    $pdf->SetFont('Helvetica', 'B', '9');
    $pdf->Cell(50, 4, $_GET['fecha'], 0, 1, 'L');
    $pdf->SetFont('Helvetica', '', '9');
    $pdf->Cell(107);
    $pdf->SetFont('Helvetica', 'B', '9');
    $pdf->Cell(20, 4, utf8_decode('DEPARTAMENTO DE SISTEMAS Y COMPUTACIÓN'), 0, 1, 'L');
    $pdf->Cell(107);
    $pdf->SetFont('Helvetica', '', '9');
    $pdf->Cell(80, 4, 'OF. No. DSC-ITI/' . $_GET['folio4'] . '/' . date("Y"), 0, 1, 'L');
    $pdf->Cell(107);
    $pdf->Cell(15, 4, 'ASUNTO: ', 0, 0, 'L');
    $pdf->SetFont('Helvetica', 'BUI', '9');
    $pdf->Cell(15, 4, utf8_decode('JURADO DE TITULACIÓN.'), 0, 1, 'L');
    $pdf->Ln(5); //CELDA DE ESPACIO
    $pdf->SetFont('Helvetica', 'B', '9');
    $pdf->Cell(11);
    $pdf->Cell(80, 4, utf8_decode($res['suplente']), 0, 1, 'L');
    $pdf->Cell(11);
    $pdf->Cell(80, 4, utf8_decode('DOCENTE DE ESTA INSTITUCIÓN'), 0, 1, 'L');
    $pdf->Cell(11);
    $pdf->Cell(80, 4, 'P R E S E N T E.', 0, 1, 'L');
    $pdf->Ln(5);
    $pdf->SetFont('Helvetica', '', '9');
    // $pdf->Cell(19);

    $pdf->SetLeftMargin(25);
    $pdf->SetRightMargin(25);

    $text1 = 'Por medio del presente, me permito hacer de su conocimiento que ha sido comisionado (a) para fungir como <VOCAL SUPLENTE>, en el Acto de Recepción Profesional de él (la) <C. ' . $res['nombre'] . '>, que realiza su protocolo para su <TITULACIÓN INTEGRAL "INFORME TÉCNICO DE RESIDENCIA PROFESIONAL">, defendiendo su proyecto (promedio ' . $_GET['pro'] . '), el día <' . utf8_decode(mb_strtoupper($_GET['fechaT'])) . ' del año en curso>,  a las <' . $_GET['horaT'] . ' HRS.>, a través de la plataforma <ZOOM.>';
    $text2 = 'Por medio del presente, me permito hacer de su conocimiento que ha sido comisionado (a) para fungir como <VOCAL SUPLENTE>, en el Acto de Recepción Profesional de él (la) <C. ' . $res['nombre'] . '>, que realiza su protocolo para su <TITULACIÓN INTEGRAL "INFORME TÉCNICO DE RESIDENCIA PROFESIONAL">, el día <' . utf8_decode(mb_strtoupper($_GET['fechaT'])) . ' del año en curso>,  a las <' . $_GET['horaT'] . ' HRS.>, a través de la plataforma <ZOOM.>';
    if ($_GET['defiende'] == 'si') {
        $pdf->WriteText(utf8_decode($text1));
    } else {
        $pdf->WriteText(utf8_decode($text2));
    }

    $pdf->SetLeftMargin(10);
    $pdf->SetRightMargin(10);

    $pdf->Ln(10);
    $pdf->SetFont('Helvetica', '', '9');
    $pdf->Cell(19);
    $text = "Así mismo le comunico que dicho evento será celebrado puntualmente en la fecha, hora y aula especificadas, por lo
            que le pido a usted confirmar en un plazo no mayor a un día, < además deberá conectrase 10 minutos antes del evento>.";
    $pdf->WriteText(utf8_decode($text));
    $pdf->Ln(10);
    $pdf->SetFont('Helvetica', '', '9');
    $pdf->Cell(19);
    $pdf->Cell(150, 4, utf8_decode('También le notifico que por ser el acto de Recepción Profesional de Titulación una ceremonia especial, es requisito'), 0, 1, 'L');
    $pdf->Cell(11);
    $pdf->Cell(150, 4, utf8_decode('para los miembros del jurado, presentarse de manera apropiada para ello. '), 0, 1, 'L');
    $pdf->Ln(5);
    $pdf->SetFont('Helvetica', '', '9');
    $pdf->Cell(19);
    $pdf->MultiCell(163, 4, utf8_decode('Hombres: Saco y corbata.
Mujeres: Vestir de manera formal (traje sastre o de acuerdo al evento).'), 1, 'L');
    $pdf->Ln(10);
    $pdf->Cell(11);
    $pdf->SetFont('Arial', 'B', '9');
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 7, utf8_decode('PRESIDENTE'), 1, 'C');
    $pdf->SetXY($x + 43, $y);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 7, utf8_decode('SECRETARIO'), 1, 'C');
    $pdf->SetXY($x + 43, $y);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 7, utf8_decode('VOCAL'), 1, 'C');
    $pdf->SetXY($x + 43, $y);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 7, utf8_decode('VOCAL SUPLENTE'), 1, 'C');

    $pdf->SetFont('Arial', '', '9');
    $pdf->Cell(11);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 5, utf8_decode(mb_strtoupper($res['asesorInt'])), 1, 'C');
    $pdf->SetXY($x + 43, $y);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 5, utf8_decode(mb_strtoupper($res['revisor1'])), 1, 'C');
    $pdf->SetXY($x + 43, $y);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 5, utf8_decode(mb_strtoupper($res['revisor2'])), 1, 'C');
    $pdf->SetXY($x + 43, $y);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(43, 5, utf8_decode(mb_strtoupper($res['suplente'])), 1, 'C');

    $pdf->Ln(4);
    $pdf->Cell(0, 4, utf8_decode('Sin más por el momento y agradeciendo de antemano la atención prestada al presente quedo de usted.'), 0, 1, 'C');
    $pdf->Ln(4);
    $pdf->SetFont('Helvetica', 'B', '9');
    $pdf->Cell(0, 4, utf8_decode('A T E N T A M E N T E'), 0, 1, 'C');
    $pdf->Cell(0, 4, utf8_decode('"TECNOLOGÍA COMO SINÓNIMO DE INDEPENDENCIA"'), 0, 1, 'C');
    $pdf->Ln(15);
    $pdf->SetFont('Helvetica', 'B', '9');
    $pdf->Cell(0, 4, utf8_decode($res2['nombre']), 0, 1, 'C');
    if ($res2['sexo'] == 'F') {
        $pdf->Cell(0, 4, utf8_decode('JEFA DEL DEPTO. DE SISTEMAS Y COMPUTACIÓN'), 0, 1, 'C');
    } else {
        $pdf->Cell(0, 4, utf8_decode('JEFE DEL DEPTO. DE SISTEMAS Y COMPUTACIÓN'), 0, 1, 'C');
    }
    $pdf->Ln(5);
    $pdf->SetFont('Helvetica', '', '7');
    $pdf->Cell(20);
    $pdf->Cell(0, 4, utf8_decode('C.c.p. archivo.'), 0, 1, 'L');
    $pdf->SetFont('Helvetica', '', '6');
    $pdf->Cell(20);
    $pdf->Cell(20, 4, utf8_decode('JEOL*ere'), 0, 1, 'R');

    $pdf->Output('I', 'Comisión para titulacion ' . $res['nombre'] . '.pdf', 'D');
} else {
    echo "<script>window.location = '../../Inicio';</script>";
}