<?php
class ControladorRegistro
{

    /*=============================================
        AGREGAR Registro
    =============================================*/
    public static function ctrCrearRegistros()
    {
        if (isset($_POST["nocontrol"]) && isset($_POST['acceso'])) { 
            $laboratorio = $_POST['laboratorio'];
            $acceso = $_POST['acceso'];
            $carrera = $_POST['carrera'];
            $Object = new DateTime();
            $Object->setTimezone(new DateTimeZone('America/Mexico_City'));
            $DateEntrada = $Object->format("d-m-Y");
            $TimeEntrada = $Object->format("h:i:s a");

            $tabla = "registro";
            $datos = array(
                "nocontrol" => $_POST["nocontrol"],
                "alumno" => $_POST["nombre"],
                "laboratorio" =>  $laboratorio,
                "fecha" => $DateEntrada,
                "hora" => $TimeEntrada,
                "carrera" => $carrera,
            );
            $respuesta = modeloRegistro::mdlIngresarRegistro($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                                Swal.fire({
                                type: "success",
                                title: "¡Registrado Correctamente!",
                                showConfirmButton: false,
                                timer: 1000,
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false
                                }).then((result)=>{
                                if(result.value){
                                   window.location = "Registro";
                                }
                                });
                                </script>';
            } else {
                echo '<script>
                                Swal.fire({
                                type: "error",
                                title: "Oops...",
                                timer: 1000,
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false
                                }).then((result)=>{
                                if(result.value){
                                   window.location = "Inicio";
                                }
                                });
                                </script>';
            }
            if ($acceso == "Entrada") {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM laboratorios");
                $stmt->execute();
                foreach ($stmt->fetchAll() as $key => $value) {

                    if ($value['laboratorio'] == $laboratorio) {
                        $cantidad = $value['cantidad'] + 1;
                        $stmt = Conexion::conectar()->prepare("UPDATE laboratorios SET cantidad = :cantidad WHERE laboratorio = :laboratorio");
                        $stmt->bindParam(":cantidad", $cantidad, PDO::PARAM_STR);
                        $stmt->bindParam(":laboratorio", $laboratorio, PDO::PARAM_STR);
                        $stmt->execute();
                        break;
                    }
                }
                
            }
            if ($acceso == "Salida") {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM laboratorios");
                
                $stmt->execute();
                foreach ($stmt->fetchAll() as $key => $value) {

                    if ($value['laboratorio'] == $laboratorio) {
                        $cantidad = $value['cantidad'] - 1;

                        if ($cantidad >= 0) {
                            $stmt = Conexion::conectar()->prepare("UPDATE laboratorios SET cantidad = :cantidad, hora = :hora WHERE laboratorio = :laboratorio");
                            $stmt->bindParam(":cantidad", $cantidad, PDO::PARAM_STR);
                            $stmt->bindParam(":hora", $TimeEntrada, PDO::PARAM_STR);
                            $stmt->bindParam(":laboratorio", $laboratorio, PDO::PARAM_STR);
                            $stmt->execute();
                            break;
                            if ($cantidad >= 0) {
                                $stmt = Conexion::conectar()->prepare("DELETE FROM laboratorios  WHERE alumno = :laboratorio");
                                $stmt->bindParam(":cantidad", $cantidad, PDO::PARAM_STR);
                                $stmt->bindParam(":hora", $TimeEntrada, PDO::PARAM_STR);
                                $stmt->bindParam(":laboratorio", $laboratorio, PDO::PARAM_STR);
                                $stmt->execute();
                                break;
                            }
                            
                        }
                    }
                }
            }
        }
    }
}
