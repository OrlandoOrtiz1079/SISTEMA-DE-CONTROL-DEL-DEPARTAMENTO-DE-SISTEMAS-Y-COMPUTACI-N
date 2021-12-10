<?php
session_start();

require '../FPDF/fpdf.php';
require '../FPDF/font/montserrat-regular.php';
require '../FPDF/font/montserrat-bold.php';
require '../../controladores/jerarquia.controlador.php';
require '../../modelos/jerarquia.modelo.php';
class PDF_FlowingBlock  extends FPDF
{

    var $flowingBlockAttr;
    public function Header()
    {
        $this->SetFont('Arial', 'B', '10');
        $this->Image('../img/Encabezado.png', 15, 14, 180, 0, 'PNG');
        $this->Ln(35); //NOTE no borrar
    }
    public function Footer()
    {
        $this->Image('../img/Piedepagina.png', 15, 260, 180, 0, 'PNG');
    }
    function saveFont()
    {

        $saved = array();

        $saved['family'] = $this->FontFamily;
        $saved['style'] = $this->FontStyle;
        $saved['sizePt'] = $this->FontSizePt;
        $saved['size'] = $this->FontSize;
        $saved['curr'] = &$this->CurrentFont;

        return $saved;
    }

    function restoreFont($saved)
    {

        $this->FontFamily = $saved['family'];
        $this->FontStyle = $saved['style'];
        $this->FontSizePt = $saved['sizePt'];
        $this->FontSize = $saved['size'];
        $this->CurrentFont = &$saved['curr'];

        if ($this->page > 0)
            $this->_out(sprintf('BT /F%d %.2F Tf ET', $this->CurrentFont['i'], $this->FontSizePt));
    }

    function newFlowingBlock($w, $h, $b = 0, $a = 'J', $f = 0)
    {
        // largo,ancho,lineCount,align,fill
        // cell width in points
        $this->flowingBlockAttr['width'] = $w * $this->k;

        // line height in user units
        $this->flowingBlockAttr['height'] = $h;

        $this->flowingBlockAttr['lineCount'] = 0;

        $this->flowingBlockAttr['border'] = $b;
        $this->flowingBlockAttr['align'] = $a;
        $this->flowingBlockAttr['fill'] = $f;

        $this->flowingBlockAttr['font'] = array();
        $this->flowingBlockAttr['content'] = array();
        $this->flowingBlockAttr['contentWidth'] = 0;
    }

    function finishFlowingBlock()
    {

        $maxWidth = &$this->flowingBlockAttr['width'];

        $lineHeight = &$this->flowingBlockAttr['height'];

        $border = &$this->flowingBlockAttr['border'];
        $align = &$this->flowingBlockAttr['align'];
        $fill = &$this->flowingBlockAttr['fill'];

        $content = &$this->flowingBlockAttr['content'];
        $font = &$this->flowingBlockAttr['font'];

        // set normal spacing
        $this->_out(sprintf('%.3F Tw', 0));

        // print out each chunk

        // the amount of space taken up so far in user units
        $usedWidth = 0;

        foreach ($content as $k => $chunk) {

            $b = '';

            if (is_int(strpos($border, 'B')))
                $b .= 'B';

            if ($k == 0 && is_int(strpos($border, 'L')))
                $b .= 'L';

            if ($k == count($content) - 1 && is_int(strpos($border, 'R')))
                $b .= 'R';

            $this->restoreFont($font[$k]);

            // if it's the last chunk of this line, move to the next line after
            if ($k == count($content) - 1)
                $this->Cell(($maxWidth / $this->k) - $usedWidth + 2 * $this->cMargin, $lineHeight, $chunk, $b, 1, $align, $fill);
            else
                $this->Cell($this->GetStringWidth($chunk), $lineHeight, $chunk, $b, 0, $align, $fill);

            $usedWidth += $this->GetStringWidth($chunk);
        }
    }

    function WriteFlowingBlock($s)
    {

        // width of all the content so far in points
        $contentWidth = &$this->flowingBlockAttr['contentWidth'];

        // cell width in points
        $maxWidth = &$this->flowingBlockAttr['width'];

        $lineCount = &$this->flowingBlockAttr['lineCount'];

        // line height in user units
        $lineHeight = &$this->flowingBlockAttr['height'];

        $border = &$this->flowingBlockAttr['border'];
        $align = &$this->flowingBlockAttr['align'];
        $fill = &$this->flowingBlockAttr['fill'];

        $content = &$this->flowingBlockAttr['content'];
        $font = &$this->flowingBlockAttr['font'];

        $font[] = $this->saveFont();
        $content[] = '';

        $currContent = &$content[count($content) - 1];

        // where the line should be cutoff if it is to be justified
        $cutoffWidth = $contentWidth;

        // for every character in the string
        for ($i = 0; $i < strlen($s); $i++) {

            // extract the current character
            $c = $s[$i];

            // get the width of the character in points
            $cw = $this->CurrentFont['cw'][$c] * ($this->FontSizePt / 1000);

            if ($c == ' ') {

                $currContent .= ' ';
                $cutoffWidth = $contentWidth;

                $contentWidth += $cw;

                continue;
            }

            // try adding another char
            if ($contentWidth + $cw > $maxWidth) {

                // won't fit, output what we have
                $lineCount++;

                // contains any content that didn't make it into this print
                $savedContent = '';
                $savedFont = array();

                // first, cut off and save any partial words at the end of the string
                $words = explode(' ', $currContent);

                // if it looks like we didn't finish any words for this chunk
                if (count($words) == 1) {

                    // save and crop off the content currently on the stack
                    $savedContent = array_pop($content);
                    $savedFont = array_pop($font);

                    // trim any trailing spaces off the last bit of content
                    $currContent = &$content[count($content) - 1];

                    $currContent = rtrim($currContent);
                }

                // otherwise, we need to find which bit to cut off
                else {

                    $lastContent = '';

                    for ($w = 0; $w < count($words) - 1; $w++)
                        $lastContent .= "{$words[$w]} ";

                    $savedContent = $words[count($words) - 1];
                    $savedFont = $this->saveFont();

                    // replace the current content with the cropped version
                    $currContent = rtrim($lastContent);
                }

                // update $contentWidth and $cutoffWidth since they changed with cropping
                $contentWidth = 0;

                foreach ($content as $k => $chunk) {

                    $this->restoreFont($font[$k]);

                    $contentWidth += $this->GetStringWidth($chunk) * $this->k;
                }

                $cutoffWidth = $contentWidth;

                // if it's justified, we need to find the char spacing
                if ($align == 'J') {

                    // count how many spaces there are in the entire content string
                    $numSpaces = 0;

                    foreach ($content as $chunk)
                        $numSpaces += substr_count($chunk, ' ');

                    // if there's more than one space, find word spacing in points
                    if ($numSpaces > 0)
                        $this->ws = ($maxWidth - $cutoffWidth) / $numSpaces;
                    else
                        $this->ws = 0;

                    $this->_out(sprintf('%.3F Tw', $this->ws));
                }

                // otherwise, we want normal spacing
                else
                    $this->_out(sprintf('%.3F Tw', 0));

                // print out each chunk
                $usedWidth = 0;

                foreach ($content as $k => $chunk) {

                    $this->restoreFont($font[$k]);

                    $stringWidth = $this->GetStringWidth($chunk) + ($this->ws * substr_count($chunk, ' ') / $this->k);

                    // determine which borders should be used
                    $b = '';

                    if ($lineCount == 1 && is_int(strpos($border, 'T')))
                        $b .= 'T';

                    if ($k == 0 && is_int(strpos($border, 'L')))
                        $b .= 'L';

                    if ($k == count($content) - 1 && is_int(strpos($border, 'R')))
                        $b .= 'R';

                    // if it's the last chunk of this line, move to the next line after
                    if ($k == count($content) - 1)
                        $this->Cell(($maxWidth / $this->k) - $usedWidth + 2 * $this->cMargin, $lineHeight, $chunk, $b, 1, $align, $fill);
                    else {

                        $this->Cell($stringWidth + 2 * $this->cMargin, $lineHeight, $chunk, $b, 0, $align, $fill);
                        $this->x -= 2 * $this->cMargin;
                    }

                    $usedWidth += $stringWidth;
                }

                // move on to the next line, reset variables, tack on saved content and current char
                $this->restoreFont($savedFont);

                $font = array($savedFont);
                $content = array($savedContent . $s[$i]);

                $currContent = &$content[0];

                $contentWidth = $this->GetStringWidth($currContent) * $this->k;
                $cutoffWidth = $contentWidth;
            }

            // another character will fit, so add it on
            else {

                $contentWidth += $cw;
                $currContent .= $s[$i];
            }
        }
    }
}

$pdf = new PDF_FlowingBlock();

$tabla = "directorio";
$Escolares = "JEFA DEL DEPARTAMENTO DE SERVICIOS ESCOALRES";
$DepEscolares = ControladorJerarquia::ctrMostrarDocentesDirectorio($tabla, $Escolares);


$tabla2 = "jerarquia";
$Sistemas = "JEFE DEL DEPTO. DE SISTEMAS Y COMPUTACIÓN";
$DepSistemas = ControladorJerarquia::ctrMostrarDocentesJerarquia2($tabla2, $Sistemas);

$PuestoSub = "SUBDIRECTOR ACADÉMICO";
$SubDirector = ControladorJerarquia::ctrMostrarDocentesJerarquia2($tabla2, $PuestoSub);




$txtNombre = $_POST['txtNombre'];
$txtAP = $_POST['txtAP'];
$txtAM = $_POST['txtAM'];
$tabla_constancia = $_POST['tabla_constancia'];
$txtNC = $_POST['txtNC'];
$txtCarrera = $_POST['txtCarrera'];
$txtNumCred = $_POST['txtNumCred'];
$txtVal = $_POST['txtVal'];
$txtEven = $_POST['txtEven'];
$txtPer = $_POST['txtPer'];
$fecha = $_POST['fecha'];

if ($txtVal == 4) {
    $txtValR = "Excelente";
}
if ($txtVal == 3) {
    $txtValR = "Bueno";
}
if ($txtVal == 2) {
    $txtValR = "Regular";
}
if ($txtVal == 1) {
    $txtValR = "Deficiente";
}

//construye la nomeclatura de creditos
if ($txtNumCred == 0.5) {
    $txtNumCredR = "0.5 (medio) crédito.";
} elseif ($txtNumCred == 1) {
    $txtNumCredR = "1 (un) crédito.";
} elseif ($txtNumCred == 2) {
    $txtNumCredR = "2 (dos) créditos.";
} elseif ($txtNumCred == 3) {
    $txtNumCredR = "3 (tres) créditos.";
}

if ($_POST['tabla_constancia'] == '1') {
    // 9876543210    
    // 0123456789
    // 2021-06-07;
    // 2021-11-20
    // 20 // 1- // 1-20//
    $dia = substr($fecha, 9, 2); // devuelve "dd"
    $mes = substr($fecha, 6, 2); // devuelve "mm"
    $a = substr($fecha, 1, 4); // devuelve "aaaa"
} else {
    // 2021-11-20
    // 2021-11-04
    $dia = substr($fecha, 9, 2); // devuelve "dd"
    $mes = substr($fecha, 5, 2); // devuelve "mm"
    $a = substr($fecha, 0, 4); // devuelve "aaaa"	

}

if ($mes == '01') {
    $m = "enero";
} elseif ($mes == '02') {
    $m = "febrero";
} elseif ($mes == '03') {
    $m = "marzo";
} elseif ($mes == '04') {
    $m = "abril";
} elseif ($mes == '05') {
    $m = "mayo";
} elseif ($mes == '06') {
    $m = "junio";
} elseif ($mes == '07') {
    $m = "julio";
} elseif ($mes == '08') {
    $m = "agosto";
} elseif ($mes == '09') {
    $m = "septiembre";
} elseif ($mes == '10') {
    $m = "octubre";
} elseif ($mes == '11') {
    $m = "noviembre";
} elseif ($mes == '12') {
    $m = "diciembre";
}

//construye la nomeclatura de dias
if ($dia == '01') {
    $fech = "el primer día del mes de " . $m . " del " . $a . ".";
} else {
    if ($dia == '02') {
        $d = "dos";
    } elseif ($dia == '03') {
        $d = "tres";
    } elseif ($dia == '04') {
        $d = "cuatro";
    } elseif ($dia == '05') {
        $d = "cinco";
    } elseif ($dia == '06') {
        $d = "seis";
    } elseif ($dia == '07') {
        $d = "siete";
    } elseif ($dia == '08') {
        $d = "ocho";
    } elseif ($dia == '09') {
        $d = "nueve";
    } elseif ($dia == '10') {
        $d = "diez";
    } elseif ($dia == '11') {
        $d = "once";
    } elseif ($dia == '12') {
        $d = "doce";
    } elseif ($dia == '13') {
        $d = "trece";
    } elseif ($dia == '14') {
        $d = "catorce";
    } elseif ($dia == '15') {
        $d = "quince";
    } elseif ($dia == '16') {
        $d = "dieciséis";
    } elseif ($dia == '17') {
        $d = "diecisiete";
    } elseif ($dia == '18') {
        $d = "dieciocho";
    } elseif ($dia == '19') {
        $d = "diecinueve";
    } elseif ($dia == '20') {
        $d = "veinte";
    } elseif ($dia == '21') {
        $d = "veintiuno";
    } elseif ($dia == '22') {
        $d = "veintidós";
    } elseif ($dia == '23') {
        $d = "veintitrés";
    } elseif ($dia == '24') {
        $d = "veinticuatro";
    } elseif ($dia == '25') {
        $d = "veinticinco";
    } elseif ($dia == '26') {
        $d = "veintiséis";
    } elseif ($dia == '27') {
        $d = "veintisiete";
    } elseif ($dia == '28') {
        $d = "veintiocho";
    } elseif ($dia == '29') {
        $d = "veintinueve";
    } elseif ($dia == '30') {
        $d = "treinta";
    } elseif ($dia == '31') {
        $d = "treinta y uno";
    }

    $fech = "a los " . $d . " días del mes de " . $m . " del " . $a . ".";
}
$fecha2 = $a . $mes . $dia;


if ($tabla_constancia == 2) {

    $stmt = Conexion::conectar()->prepare("INSERT INTO datos_alumnos 
    (Nombre, Apellido_P, Apellido_M, Numero_C, Carrera, Numero_Creditos, Nombre_Evento, Periodo, Generada_Por, Fecha, Valor_Numerico) 
    VALUES 
    (:Nombre, :Apellido_P, :Apellido_M, :Numero_C, :Carrera, :Numero_Creditos, :Nombre_Evento, :Periodo, :Generada_Por, :Fecha, :Valor_Numerico)");
 
    $stmt->bindParam(":Nombre", $txtNombre, PDO::PARAM_STR);
    $stmt->bindParam(":Apellido_P", $txtAP, PDO::PARAM_STR);
    $stmt->bindParam(":Apellido_M", $txtAM, PDO::PARAM_STR);
    $stmt->bindParam(":Numero_C", $txtNC, PDO::PARAM_INT);
    $stmt->bindParam(":Carrera", $txtCarrera, PDO::PARAM_STR);
    $stmt->bindParam(":Numero_Creditos", $txtNumCred, PDO::PARAM_STR);
    $stmt->bindParam(":Nombre_Evento", $txtEven, PDO::PARAM_STR);
    $stmt->bindParam(":Periodo", $txtPer, PDO::PARAM_STR);
    $stmt->bindParam(":Generada_Por", $DepSistemas['nombre'], PDO::PARAM_STR);
    $stmt->bindParam(":Fecha", $fecha, PDO::PARAM_STR);
    $stmt->bindParam(":Valor_Numerico", $txtVal, PDO::PARAM_INT);
    $stmt->execute();
}

$pdf->AddPage();
$pdf->AddFont('montserrat-bold');
$pdf->AddFont('montserrat-regular');
$h = $pdf->GetPageHeight();
$w = $pdf->GetPageWidth();
$pdf->SetTitle(utf8_decode('CONSTANCIA DE CUMPLIMIENTO DE ACTIVIDAD COMPLEMENTARIA ' . $txtNC));
$pdf->SetFillColor(255, 255, 255);
$pdf->Ln(6);
$pdf->Cell(6);
$pdf->SetFont('montserrat-regular', '', '9');
$pdf->Cell(176, 5, utf8_decode("Constancia de Cumplimiento de Actividad Complementaria."), 0, 0, 'C');

$pdf->Ln(20);
$pdf->Cell(15);
$pdf->SetFont('montserrat-bold', '', '10');
$pdf->Cell(160, 5, utf8_decode($DepEscolares['responsable']), 0, 0, 'L');
$pdf->Ln(5);
$pdf->Cell(15);
$pdf->SetFont('montserrat-bold', '', '10');
$pdf->Cell(160, 5, utf8_decode($DepEscolares['depto']), 0, 0, 'L');
$pdf->Ln(5);
$pdf->Cell(15);
$pdf->SetFont('montserrat-bold', '', '10');
$pdf->Cell(160, 5, "P R E S E N T E.", 0, 0, 'L');

$SexoSistemas = "";
if ($DepSistemas['sexo'] == "F") {
    $SexoSistemas = "JEFA DEL DEPTO. DE SISTEMAS Y COMPUTACIÓN";
} else {
    $SexoSistemas = "JEFE DEL DEPTO. DE SISTEMAS Y COMPUTACIÓN";
}

$pdf->Ln(15);
$pdf->SetMargins(25, 0, 0, 0);
$pdf->Cell(15);
$pdf->newFlowingBlock(158, 5, "", 'J');
$pdf->SetFont('montserrat-regular', '', 9);
$pdf->WriteFlowingBlock(utf8_decode('El que suscribe '));
$pdf->SetFont('montserrat-bold', '', 9);
$pdf->WriteFlowingBlock(utf8_decode($DepSistemas['nombre'] . " "));
$pdf->SetFont('montserrat-regular', '', 9);
$pdf->WriteFlowingBlock(utf8_decode($SexoSistemas . " por este medio se permite hacer de su conocimiento que el(a) estudiante "));
$pdf->SetFont('montserrat-bold', '', 9);
$pdf->WriteFlowingBlock(utf8_decode($txtNombre . " " . $txtAP . " " . $txtAM));
$pdf->SetFont('montserrat-regular', '', 9);
$pdf->WriteFlowingBlock(utf8_decode(' con número de control '));
$pdf->SetFont('montserrat-bold', '', 9);
$pdf->WriteFlowingBlock(utf8_decode($txtNC));
$pdf->SetFont('montserrat-regular', '', 9);
$pdf->WriteFlowingBlock(utf8_decode(" de la carrera de "));
$pdf->SetFont('montserrat-bold', '', 9);
$pdf->WriteFlowingBlock(utf8_decode($txtCarrera));
$pdf->SetFont('montserrat-regular', '', 9);
$pdf->WriteFlowingBlock(utf8_decode(" ha "));
$pdf->SetFont('montserrat-bold', '', 9);
$pdf->WriteFlowingBlock(utf8_decode("CUMPLIDO "));
$pdf->SetFont('montserrat-regular', '', 9);
$pdf->WriteFlowingBlock(utf8_decode(' su actividad complementaria como participante en '));
$pdf->SetFont('montserrat-bold', '', 9);
$pdf->WriteFlowingBlock(utf8_decode($txtEven));
$pdf->SetFont('montserrat-regular', '', 9);
$pdf->WriteFlowingBlock(utf8_decode(" con el nivel de desempeño "));
$pdf->SetFont('montserrat-bold', '', 9);
$pdf->WriteFlowingBlock(utf8_decode($txtValR));
$pdf->SetFont('montserrat-regular', '', 9);
$pdf->WriteFlowingBlock(utf8_decode(" y un valor numérico de "));
$pdf->SetFont('montserrat-bold', '', 9);
$pdf->WriteFlowingBlock(utf8_decode($txtVal));
$pdf->SetFont('montserrat-regular', '', 9);
$pdf->WriteFlowingBlock(utf8_decode(", durante el periodo escolar "));
$pdf->SetFont('montserrat-bold', '', 9);
$pdf->WriteFlowingBlock(utf8_decode($txtPer));
$pdf->SetFont('montserrat-regular', '', 9);
$pdf->WriteFlowingBlock(utf8_decode(" con un valor curricular de "));
$pdf->SetFont('montserrat-bold', '', 9);
$pdf->WriteFlowingBlock(utf8_decode($txtNumCredR));
$pdf->finishFlowingBlock();
$pdf->SetMargins(25, 0, 0, 0);

$pdf->Ln(15);
$pdf->newFlowingBlock(158, 5, "", 'J');
$pdf->SetFont('montserrat-regular', '', 9);
$pdf->WriteFlowingBlock(utf8_decode('Se extiende la presente en la Ciudad de Iguala, Guerrero., '));
$pdf->SetFont('montserrat-bold', '', 9);
$pdf->WriteFlowingBlock(utf8_decode($fech));
$pdf->finishFlowingBlock();
$pdf->Ln(20);
$pdf->SetMargins(0, 0, 0, 0);

$pdf->SetFont('montserrat-bold', '', '9');
$pdf->Cell(160, 5, utf8_decode("ATENTAMENTE"), 0, 0, 'C');
$pdf->Ln(5);
$pdf->Cell(25);
$pdf->SetFont('montserrat-regular', '', '9');
$pdf->Cell(160, 5, utf8_decode("Excelencia en Educación Tecnológica"), 0, 0, 'C');
$pdf->Ln(5);
$pdf->Cell(25);
$pdf->Cell(160, 5, utf8_decode("Tecnología como Sinónimo de Independencia"), 0, 0, 'C');
$pdf->Ln(25);
$pdf->Cell(105);
$pdf->SetFont('montserrat-bold', '', '9');
$pdf->Cell(90, 5, utf8_decode("Vo. Bo. "), 0, 0, 'C');

$pdf->Ln(25);
$pdf->Cell(15);
$pdf->SetFont('montserrat-bold', '', '9');
$pdf->Cell(90, 5, utf8_decode($DepSistemas['nombre']), 0, 0, 'C');

$pdf->SetFont('montserrat-regular', '', '9');
$pdf->Ln(5);
$pdf->Cell(15);
if ($DepSistemas['sexo'] == 'F') {
    $pdf->MultiCell(90, 5, utf8_decode("JEFA DEL DEPTO. DE SISTEMAS Y COMPUTACIÓN"), 0, 'C', 1);
} else {
    $pdf->MultiCell(90, 5, utf8_decode("JEFE DEL DEPTO. DE SISTEMAS Y COMPUTACIÓN"), 0, 'C', 1);
}

$pdf->Ln(-10);
$pdf->Cell(105);
$pdf->SetFont('montserrat-bold', '', '9');
$pdf->Cell(90, 5, utf8_decode($SubDirector['nombre']), 0, 0, 'C');
$pdf->SetFont('montserrat-regular', '', '9');
$pdf->Ln(5);
$pdf->Cell(105);
if ($SubDirector['sexo'] == 'F') {
    $pdf->MultiCell(90, 5, utf8_decode("SUBDIRECTORA ACADÉMICO"), 0, 'C', 1);
} else {
    $pdf->MultiCell(90, 5, utf8_decode("SUBDIRECTOR ACADÉMICO"), 0, 'C', 1);
}
$pdf->Ln(10);
$pdf->Cell(15);
$pdf->SetFont('montserrat-regular', '', '9');
$pdf->Cell(180, 5, utf8_decode("c.c.p. Jefe de Departamento de Sistemas y Computación."), 0, 0, "L");

$pdf->Output('I', 'CONSTANCIA_DE_CUMPLIMIENTO_DE_ACTIVIDAD_COMPLEMENTARIA_' . $txtNC . '.pdf', 'I');
