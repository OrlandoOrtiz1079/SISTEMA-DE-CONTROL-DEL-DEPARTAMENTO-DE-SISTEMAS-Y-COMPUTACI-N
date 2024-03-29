<?php
require_once "../controladores/docentes.controlador.php";
require_once "../modelos/docentes.modelo.php";
class AjaxDocentes
{
    /*<!--=====================================
    EDITAR DOCENTE
    ======================================-->*/
    public $idDocente;
    public function ajaxEditarDocente()
    {
        $item = "id";
        $valor = $this->idDocente;
        $respuesta = ControladorDocentes::ctrMostrarDocentes($item, $valor);
        echo json_encode($respuesta);
    }
    /*<!--=====================================
    ACTIVAR DOCENTE
    ======================================-->*/
    public $activarDocente;
    public $activarId;

    public function ajaxActivarDocente()
    {
        $tabla = "asesor";
        $item1 = "estado";
        $valor1 = $this->activarDocente;
        $item2 = "id";
        $valor2 = $this->activarId;
        $respuesta = ModeloDocentes::mdlActualizarDocente($tabla, $item1, $valor1, $item2, $valor2);
    }
}
/*<!--=====================================
    EDITAR DOCENTE
    ======================================-->*/
if (isset($_POST["idDocente"])) {
    $editar = new AjaxDocentes();
    $editar->idDocente = $_POST["idDocente"];
    $editar->ajaxEditarDocente();
}
/*<!--=====================================
ACTIVAR DOCENTE
======================================-->*/
if (isset($_POST["activarDocente"])) {
    $activarDocente = new AjaxDocentes();
    $activarDocente->activarDocente = $_POST["activarDocente"];
    $activarDocente->activarId = $_POST["activarId"];
    $activarDocente->ajaxActivarDocente();
}
