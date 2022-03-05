<?php
require_once "../controladores/sugerencia.controlador.php";
require_once "../modelos/sugerencia.modelo.php";
class AjaxSugerencia
{
    /*<!--=====================================
    EDITAR Sugerencia
    ======================================-->*/
    public $idJerarquia;
    public function ajaxEditarJerarquia()
    {
        $item = "id";
        $valor = $this->idJerarquia;
        $respuesta = ControladorSugerencia::ctrMostrarSugerencia($item, $valor);
        echo json_encode($respuesta);
    }
}

/*<!--=====================================
    EDITAR Sugerencia
    ======================================-->*/
if (isset($_POST["idJerarquia"])) {
    $editar = new AjaxSugerencia();
    $editar->idJerarquia = $_POST["idJerarquia"];
    $editar->ajaxEditarJerarquia();
}
