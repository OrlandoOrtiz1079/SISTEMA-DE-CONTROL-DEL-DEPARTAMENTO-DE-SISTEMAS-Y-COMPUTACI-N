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

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE nocontrol = :nocontrol AND entrada = :entrada");
            $stmt->bindParam(":nocontrol", $control, PDO::PARAM_STR);
            $stmt->bindParam(":entrada", $DateEntrada, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() < 1) {
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
                        Swal.fire({
                            if(result.value){
                                window.location = "Registro";
                            }
                        });
                    </script>';
                }
            } else {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE nocontrol = :nocontrol AND entrada = :entrada ORDER BY sahora ASC");
                $stmt->bindParam(":nocontrol", $control, PDO::PARAM_STR);
                $stmt->bindParam(":entrada", $DateEntrada, PDO::PARAM_STR);
                $stmt->execute();

                foreach ($stmt->fetchAll() as $key => $value) {

                    if (!empty($value['sahora']) || $value['sahora'] != null) {
                        $datos2 = array(
                            "nombre" => $_POST["nombre"],
                            "nocontrol" => $_POST["nocontrol"],
                            "carrera" => $_POST["carrera"],
                            "entrada" => $DateEntrada,
                            "enhora" => $TimeEntrada,
                        );
                        $respuesta2 = ModeloAlumnos::mdlIngresarAlumnos($tabla, $datos2);
                        if ($respuesta2 == 'ok') {
                            echo '<script>
                                Swal.fire({
                                    if(result.value){
                                        window.location = "Registro";
                                    }
                                });
                            </script>';
                            break;
                        }
                    } else {

                        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET sahora = :sahora WHERE nocontrol = :nocontrol AND entrada = :entrada AND enhora = :enhora");
                        $stmt->bindParam(":sahora", $TimeSalida, PDO::PARAM_STR);
                        $stmt->bindParam(":nocontrol", $control, PDO::PARAM_STR);
                        $stmt->bindParam(":entrada", $value['entrada'], PDO::PARAM_STR);
                        $stmt->bindParam(":enhora", $value['enhora'], PDO::PARAM_STR);
                        $stmt->execute();
                        break;
                    }
                }
            }
        }
    }
}
