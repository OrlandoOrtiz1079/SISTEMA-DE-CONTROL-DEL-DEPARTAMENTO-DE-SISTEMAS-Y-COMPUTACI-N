<?php
class ControladorSugerencia
{
 
    /*=============================================
    MOSTRAR HISTORIAL EN TABLA 
    =============================================*/
    public static function ctrMostrarHistorial($item, $valor)
    {
        $tabla = "encuesta";
        $respuesta = ModeloSugerencia::MdlMostrarHistorial($tabla, $item, $valor);
        return $respuesta;
    }
}
