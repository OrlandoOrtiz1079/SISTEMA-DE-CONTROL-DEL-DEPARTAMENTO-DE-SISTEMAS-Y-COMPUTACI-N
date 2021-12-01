<?php
class ControladorAlumnos
{
    /*=============================================
    REGISTRO DE ALUMNOS
    =============================================*/
    public static function ctrCrearAlumno()
    {
        if (empty($_POST['nombre']) && empty($_POST['nocontrol']) && empty($_POST['carrera'])) {

        } else {

            $Object = new DateTime();
            $Object->setTimezone(new DateTimeZone('America/Mexico_City'));
            $DateEntrada = $Object->format("d-m-Y");
            $TimeEntrada = $Object->format("h:i:s a");
            $TimeSalida = $Object->format("h:i:s a");
            $control = $_POST["nocontrol"];

            $tabla = "alumnos";

            $validarAlumno = ModeloAlumnos::MdlMostrarAlumnos($tabla, $DateEntrada, $control);
            if ($validarAlumno == 'ok') {
                
                $actualizarAlumno = ModeloAlumnos::mdlActualizarAlumons($tabla, $TimeSalida, $control, $DateEntrada);
                if ($actualizarAlumno == 'ok') {
                    echo "Se actualizo";
                } else {
                    echo "No se actualizo";
                }

                echo '<script>
                         if(result.value){
                            window.location = "Registro";
                        }
                    </script>';
            } else {
                $datos = array(
                    "nombre" => $_POST["nombre"],
                    "nocontrol" => $_POST["nocontrol"],
                    "carrera" => $_POST["carrera"],
                    "entrada" => $DateEntrada,
                    "enhora" => $TimeEntrada,
                );
                $respuesta = ModeloAlumnos::mdlIngresarAlumnos($tabla, $datos);

                if ($respuesta == 'ok') {
                    echo '<script>
                            if(result.value){
                              window.location = "Registro";
                            }
                        </script>';
                }
            }
        }
    }
}
