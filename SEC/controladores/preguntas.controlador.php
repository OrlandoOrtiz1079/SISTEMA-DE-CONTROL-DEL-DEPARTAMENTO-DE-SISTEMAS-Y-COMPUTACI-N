<?php
class ControladorPreguntas
{

    /*=============================================
    MOSTRAR PREGUNTAS 7 EN TABLA
    =============================================*/
    public static function ctrMostrarRespuestas($item, $valor)
    {

        $tabla = "encuesta";
        $respuesta = ModeloPreguntas::MdlMostrarRespuestas($tabla, $item, $valor);
        return $respuesta;
    }
}
