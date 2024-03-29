<?php
class ControladorRegistro
{

    /*=============================================
        AGREGAR Registro
    =============================================*/
    public static function ctrCrearRegistro()
    {
        if (isset($_POST["nocontrol"])) {
            $laboratorio = $_POST['laboratorio'];

            $Object = new DateTime();
            $Object->setTimezone(new DateTimeZone('America/Mexico_City'));
            $DateEntrada = $Object->format("d-m-Y");
            $TimeEntrada = $Object->format("h:i:s a");

            // Se ase el llamado al numero de contro y si se encuentra se registra si no manda el mensaje de que no se encontro
            $item = $_POST['nocontrol'];
            $stmt = Conexion::conectar()->prepare("SELECT * FROM alumnos WHERE nocontrol = :nocontrol ");
            $stmt->bindParam(":nocontrol", $item, PDO::PARAM_STR);

            if ($stmt->execute()) {
                foreach ($stmt as $key => $value) {
                    if ($value["nombre"] != "NA") {
                        $tabla = "registro";
                        $datos = array(
                            "alumno" => $value["nombre"],
                            "laboratorio" =>  $laboratorio,
                            "fecha" => $DateEntrada,
                            "hora" => $TimeEntrada
                        );
                        $respuesta = modeloRegistro::mdlIngresarRegistro($tabla, $datos);
                    
                        if ($respuesta == "ok") {
                            echo '<script>
                                Swal.fire({
                                type: "success",
                                title: "¡Registrado Correctamente!",
                                showConfirmButton: true,
                                timer: 1000,
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false
                                }).then((result)=>{
                                if(result.value){
                                   window.location = "Inicio";
                                }
                                });
                                </script>';
                            break;
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
                            break;
                        }
                        break;
                    }
                }
                if ($stmt->rowCount() == 0) {
                    echo '<script>
                                Swal.fire({
                                type: "error",
                                title: "Numero de control inexistente",
                                showConfirmButton: true,
                                timer: 1000,
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false
                                }).then((result)=>{
                                if(result.value){
                                   window.location = "Inicio";
                                }
                                });
                                </script>';
                }
            }
        }
    }
}
