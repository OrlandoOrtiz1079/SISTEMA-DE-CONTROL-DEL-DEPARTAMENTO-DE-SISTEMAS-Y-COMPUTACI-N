<?php
class ControladorSugerencia
{

    /*=============================================
    MOSTRAR Sugerencia EN TABLA 
    =============================================*/
    public static function ctrMostrarSugerencia($item, $valor)
    {
        $tabla = "encuesta";
        $respuesta = ModeloSugerencia::MdlMostrarSugerencia($tabla, $item, $valor);
        return $respuesta;
    }


    /*=============================================
    BORRAR Sugerencia 
    =============================================*/
    public static function ctrborrarSugerencia()
    {
        if (isset($_GET["idJerarquia"])) {
            $tabla = "encuesta";
            $datos = $_GET["idJerarquia"];

            $respuesta = ModeloSugerencia::MdlBorrarSugerencia($tabla, $datos);
            if ($respuesta == "ok") {
                echo "<script>
                Swal.fire({
                    position: 'center',
                    type: 'success',
                    title: '¡Exito!',
                    text: '¡Se elimino correctamente!',
                    showConfirmButton: false,
                    timer: 1500
                }).then((result)=>{
                    window.location = 'Jerarquia';
                    });
                </script>";
            } else {
                echo "<script>
                Swal.fire({
                    position: 'center',
                    type: 'error',
                    title: '¡ERROR!',
                    text: '¡No se pudo eliminar!',
                    showConfirmButton: false,
                    timer: 1500
                }).then((result)=>{
                    window.location = 'Jerarquia';
                    });
                </script>";
            }
        }
    }

    /*=============================================
    MOSTRAR HISTORIAL EN TABLA 
    =============================================*/
    public static function ctrMostrarHistorial($item, $valor)
    {
        $tabla = "registro";
        $respuesta = ModeloSugerencia::MdlMostrarHistorial($tabla, $item, $valor);
        return $respuesta;
    }
}
