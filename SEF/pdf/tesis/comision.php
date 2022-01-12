<?php
session_start();

require '../FPDF/fpdf.php';
require '../../controladores/jerarquia.controlador.php';
require '../../modelos/jerarquia.modelo.php';
class PDF extends FPDF
{
    public $docente;
    //Cabecera
    public function Header()
    {
      
        $this->Image('../img/membrete1c.png', 10, 15, 185, 27, 'PNG');
        $this->Ln(35); //NOTE no borrar
    }
    public function Footer()
    {
        $this->Image('../img/membrete2c.png', 0, 250, 210, 25, 'PNG');
    }
}


$tabla = "jerarquia";
$puestosistemas = "JEFE DEL DEPTO. DE SISTEMAS Y COMPUTACIÓN";
$puestosubdirector = "SUBDIRECTOR ACADÉMICO";
$puestoacademia = "PRESIDENTE DE ACADEMIA";
$jefesistemas = ControladorJerarquia::ctrMostrarDocentesJerarquia2($tabla, $puestosistemas);
$subdirector = ControladorJerarquia::ctrMostrarDocentesJerarquia2($tabla, $puestosubdirector);
$presidenteacademia = ControladorJerarquia::ctrMostrarDocentesJerarquia2($tabla, $puestoacademia);

$puestofinancieros = "DEPARTAMENTO DE RECURSOS FINANCIEROS";
$puestohumanos = "DEPARTAMENTO DE RECURSOS HUMANOS";
$tabla2 = "directorio";
$res5 = ControladorJerarquia::ctrMostrarDocentesDirectorio($tabla2, $puestofinancieros);
$res6 = ControladorJerarquia::ctrMostrarDocentesDirectorio($tabla2, $puestohumanos);


$puestodirecgtor = "DIRECTOR";
$director = ControladorJerarquia::ctrMostrarDocentesJerarquia2($tabla, $puestodirecgtor);

$numof = $_POST['numof'];
$fecha = $_POST['fecha'];
$docente = $_POST['docente'];
$cargo = $_POST['cargo'];
$traslado = $_POST['traslado'];
$lugar = $_POST['lugar'];
$objetivo = $_POST['objetivo'];
$diasem = $_POST['diasem'];
$dia = $_POST['dia'];
$mes2 = $_POST['mes2'];
$año = $_POST['año'];
$hora = $_POST['hora'];
$checkbox2 = 0;
$checkbox3 = 0;
$checkbox4 = 0;
$checkbox5 = 0;
$checkbox6 = 0;
if (isset($_POST['checkbox2'])) {
    $checkbox2 = "X";
} else {
    $checkbox2 = " ";
}
if (isset($_POST['checkbox3'])) {
    $checkbox3 = "X";
} else {
    $checkbox3 = "";
}
if (isset($_POST['checkbox4'])) {
    $checkbox4 = "X";
} else {
    $checkbox4 = " ";
}
if (isset($_POST['checkbox5'])) {
    $checkbox5 = "X";
} else {
    $checkbox5 = " ";
}
if (isset($_POST['checkbox6'])) {
    $checkbox6 = "X";
} else {
    $checkbox6 = " ";
}

$clavep = $_POST['clavep'];
$rfc = $_POST['rfc'];
$puesto = $_POST['puesto'];
$destino = $_POST['destino'];


$pdf = new PDF('P', 'mm', 'Letter');
$pdf->AddPage();
$pdf->AddFont('helvetica');
$h = $pdf->GetPageHeight();
$w = $pdf->GetPageWidth();
$pdf->SetTitle(utf8_decode('CONSTANCIA DE COMISIONES ACADÉMICAS ' . $docente));

$pdf->Ln(10);
$pdf->Cell(19);
$pdf->SetFont('helvetica','', '10');
$pdf->Cell(20, 5, utf8_decode('DEPT. DE SISTEMAS Y COMPUTACIÓN'), 0, 1, 'L');
$pdf->Cell(19);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(20, 5, utf8_decode('No. DSC-ITI/' . $numof . "/" . $año), 0, 1, 'L');
$pdf->Cell(19);
$pdf->Cell(20, 4, utf8_decode('Iguala, Gro. ' . $fecha), 0, 1, 'L');
$pdf->Ln(5);
$pdf->Cell(19);
$pdf->Cell(20, 4, utf8_decode($docente), 0, 1, 'L');
$pdf->SetFont('helvetica','B', '10');
$pdf->Cell(19);
$pdf->Cell(20, 4, utf8_decode($cargo), 0, 1, 'L');
$pdf->Cell(19);
$pdf->Cell(20, 4, utf8_decode("PRESENTE."), 0, 1, 'L');
$pdf->SetFont('helvetica','', '9');

$pdf->Ln(5);
$pdf->Cell(19);
$pdf->Cell(20, 4, utf8_decode("Por este conducto me es grato saludarle e informar a usted que ha sido"), 0, 1, 'L');

$pdf->Ln(-2);
$pdf->Cell(128);
$pdf->SetFont('helvetica','B', '10');
$pdf->Cell(20, 0, utf8_decode("COMISIONADO"), 0, 1, 'L');

$pdf->Cell(159);
$pdf->SetFont('helvetica','', '9');
$pdf->Cell(20, -1, utf8_decode("para  el"), 0, 1, 'L');
$pdf->Ln(3);
$pdf->Cell(19);
$pdf->MultiCell(153, 4, utf8_decode($traslado . " para asistir al " . $lugar . " en donde se " . $objetivo . "  misma que se llevará a cabo el próximo " . $diasem . " " . $dia . " de " . $mes2 . " de " . $año . " en punto de las " . $hora . " horas."), 0, 'J', 1);

$pdf->Ln(5);
$pdf->Cell(19);
$pdf->MultiCell(153, 4, utf8_decode("Asimismo, deberá pasar al Departamento de Recursos Financieros a solicitar sus viáticos correspondientes."), 0, 'J', 1);

$pdf->Ln(5);
$pdf->Cell(19);
$pdf->MultiCell(153, 4, utf8_decode("En la inteligencia de que una vez terminada la comisión informe a más tardar en 5 días hábiles al término de ésta el resultado de la misma, entregando la comprobación e informe correspondiente."), 0, 'J', 1);

$pdf->Ln(5);
$pdf->Cell(19);
$pdf->MultiCell(153, 4, utf8_decode("Con la confianza de que sabrá poner su mayor esfuerzo y dedicación a esta encomienda, reitero a usted las seguridades de mi más alta y distinguida consideración."), 0, 'J', 1);

$pdf->Ln(5);
$pdf->SetFont('helvetica','B', '10');
$pdf->Cell(19);
$pdf->MultiCell(153, 5, utf8_decode("A T E N T A M E N T E"), 0, 'C', 1);
$pdf->SetFont('helvetica','', '9');
$pdf->Cell(19);
$pdf->MultiCell(153, 5, utf8_decode('"Tecnología como Sinónimo de Independencia"'), 0, 'C', 1);

$pdf->Ln(15);
$pdf->SetFont('helvetica','B', '10');
$pdf->Cell(19);
$pdf->MultiCell(153, 5, utf8_decode($presidenteacademia['nombre']), 0, 'C', 1);
$pdf->SetFont('helvetica','', '10');
$pdf->Cell(19);
if ($presidenteacademia['sexo'] == 'F') {
    $pdf->MultiCell(153, 5, utf8_decode("PRESIDENTA DE ACADEMIA"), 0, 'C', 1);
} else {
    $pdf->MultiCell(153, 5, utf8_decode("PRESIDENTE DE ACADEMIA"), 0, 'C', 1);
}
$pdf->Ln(10);

$pdf->Cell(10);
$pdf->SetFont('helvetica','B', '10');
$pdf->MultiCell(95, 5, utf8_decode("Vo. Bo"), 0, 'C', 1);
$pdf->Ln(-5);
$pdf->Cell(105);
$pdf->MultiCell(80, 5, utf8_decode("Vo. Bo"), 0, 'C', 1);
$pdf->Ln(15);

if($docente==$jefesistemas['nombre']){

    $pdf->Cell(10);
    $pdf->MultiCell(95, 5, utf8_decode($director['nombre']), 0, 'C', 1);
    $pdf->SetFont('helvetica','', '10');
    $pdf->Cell(10);
    if ($jefesistemas['sexo'] == 'F') {
        $pdf->MultiCell(95, 5, utf8_decode("DIRECTORA"), 0, 'C', 1);
    } else {
        $pdf->MultiCell(95, 5, utf8_decode("DIRECTOR"), 0, 'C', 1);
    }

}else{
    $pdf->Cell(10);
    $pdf->MultiCell(95, 5, utf8_decode($jefesistemas['nombre']), 0, 'C', 1);
    $pdf->SetFont('helvetica','', '10');
    $pdf->Cell(10);
    if ($jefesistemas['sexo'] == 'F') {
        $pdf->MultiCell(95, 5, utf8_decode("JEFA DEL DEPTO. DE SISTEMAS Y COMPUTACIÓN"), 0, 'C', 1);
    } else {
        $pdf->MultiCell(95, 5, utf8_decode("JEFE DEL DEPTO. DE SISTEMAS Y COMPUTACIÓN"), 0, 'C', 1);
    }
}




$pdf->Ln(-10);
$pdf->SetFont('helvetica','B', '10');
$pdf->Cell(105);
$pdf->MultiCell(80, 5, utf8_decode($subdirector['nombre']), 0, 'C', 1);
$pdf->SetFont('helvetica','', '10');
$pdf->Cell(105);

if ($subdirector['sexo'] == 'F') {
    $pdf->MultiCell(80, 5, utf8_decode("SUBDIRECTORA ACADÉMICA"), 0, 'C', 1);
} else {
    $pdf->MultiCell(80, 5, utf8_decode("SUBDIRECTOR ACADÉMICO"), 0, 'C', 1);
}

$pdf->Ln(7);
$pdf->SetFont('Courier', '', '6');
$pdf->Cell(19);
$pdf->MultiCell(153, 3, utf8_decode($res5['responsable'] . " - " . $res5['depto'] . " - Para su conocimiento"), 0, 'L', 1);
$pdf->Cell(19);
$pdf->MultiCell(153, 3, utf8_decode($res6['responsable'] . " - " . $res6['depto']  . " - Para su efectos correspondientes"), 0, 'L', 1);
$pdf->Cell(19);
$pdf->MultiCell(153, 3, utf8_decode("C.C.C. Archivo."), 0, 'L', 1);
$pdf->Cell(19);
$pdf->MultiCell(153, 3, utf8_decode("ABN*/SRZB/JEOL*ere"), 0, 'L', 1);

// Pagina 2
$pdf->AddPage();
$pdf->SetFont('helvetica','B', '10');
$pdf->Cell(19);
$pdf->MultiCell(153, 5, utf8_decode("SOLICITUD DE VIÁTICOS Y PASAJE"), 0, 'C', 1);
$pdf->Ln(5);
$pdf->SetFont('helvetica','', '10');
$pdf->Cell(19);
$pdf->MultiCell(153, 5, utf8_decode("Iguala, Gro. {$fecha}"), 0, 'R', 1);

$pdf->Ln(5);
$pdf->SetFont('helvetica','B', '10');
$pdf->Cell(19);
$pdf->MultiCell(153, 5, utf8_decode($director['nombre']), 0, 'L', 1);
$pdf->Cell(19);
$pdf->MultiCell(153, 5, utf8_decode("PRESENTE."), 0, 'L', 1);

$pdf->SetFont('helvetica','', '9');
$pdf->Cell(19);
$pdf->MultiCell(153, 5, utf8_decode("Por el presente, solicito a usted:"), 0, 'L', 1);

$pdf->Ln(5);
$pdf->Cell(19);
$pdf->MultiCell(76, 5, utf8_decode("VIÁTICOS ( {$checkbox2} )"), 0, 'C', 1);
$pdf->Cell(19);
$pdf->MultiCell(76, 5, utf8_decode("PAGO DE COMBUSTIBLE ( {$checkbox3} )"), 0, 'C', 1);
$pdf->Cell(19);
$pdf->MultiCell(76, 5, utf8_decode("PASAJE DE AUTOBÚS ( {$checkbox4} )"), 0, 'C', 1);

$pdf->Ln(-15);
$pdf->Cell(96);
$pdf->MultiCell(76, 5, utf8_decode("PAGO DE PEAJE ( {$checkbox5} )"), 0, 'C', 1);
$pdf->Cell(96);
$pdf->MultiCell(76, 5, utf8_decode("BOLETO DE AVIÓN ( {$checkbox6} )"), 0, 'C', 1);

$pdf->Ln(10);
$pdf->Cell(19);
$pdf->MultiCell(153, 5, utf8_decode("Para el (la) C. {$docente} con clave presupuestal: {$clavep} y R.F.C: {$rfc}, que ocupa el puesto de: " . $puesto . " DE ESTE INSTITUTO, cuyo gasto afectará la clave presupuestal " . $clavep . "."), 0, 'J', 1);

$pdf->Ln(10);
$pdf->Cell(19);
$pdf->MultiCell(153, 5, utf8_decode("Con el destino a la {$destino}, el día {$dia} de {$mes2} del {$año}"), 0, 'L', 1);

$pdf->Ln(5);
$pdf->Cell(19);
$pdf->MultiCell(153, 5, utf8_decode("Lo anterior con el fin de realizar la comisión siguiente:"), 0, 'L', 1);

$pdf->Ln(5);
$pdf->Cell(19);
$pdf->MultiCell(153, 5, utf8_decode("Con la finalidad de asistir {$objetivo}."), 0, 'L', 1);

$pdf->Ln(25);
$pdf->SetFont('helvetica','B', '10');
$pdf->Cell(19);
$pdf->MultiCell(80, 5, utf8_decode("Vo. Bo"), 0, 'C', 1);

$pdf->Ln(15);
$pdf->Cell(19);
$pdf->MultiCell(80, 5, utf8_decode($director['nombre']), 0, 'C', 1);
$pdf->SetFont('helvetica','', '10');
$pdf->Cell(19);
if ($director['sexo'] == 'F') {
    $pdf->MultiCell(80, 5, utf8_decode("DIRECTORA"), 0, 'C', 1);
} else {
    $pdf->MultiCell(80, 5, utf8_decode("DIRECTOR"), 0, 'C', 1);
}

$pdf->Ln(-10);
$pdf->SetFont('helvetica','B', '10');
$pdf->Cell(99);
$pdf->MultiCell(80, 5, utf8_decode($subdirector['nombre']), 0, 'C', 1);
$pdf->SetFont('helvetica','', '10');
$pdf->Cell(99);
if ($subdirector['sexo'] == 'F') {
    $pdf->MultiCell(80, 5, utf8_decode("SUBDIRECTORA ACADÉMICA"), 0, 'C', 1);
} else {
    $pdf->MultiCell(80, 5, utf8_decode("SUBDIRECTOR ACADÉMICO"), 0, 'C', 1);
}

$pdf->Ln(20);
$pdf->SetFont('helvetica', '', '7');
$pdf->Cell(19);
$pdf->MultiCell(80, 5, utf8_decode("ABN/SRZB/JEOL"), 0, 'L', 1);

$pdf->Output('I', 'CONSTANCIA DE COMISIONES ACADÉMICAS ' . $docente . '.pdf', 'D');
