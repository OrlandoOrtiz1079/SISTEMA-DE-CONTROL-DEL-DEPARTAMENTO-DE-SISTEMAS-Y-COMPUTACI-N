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
    // /*=============================================
    // MOSTRAR DOCENTE
    // =============================================*/
    // public static function ctrMostrarDocentes($item, $valor)
    // {
    //     $tabla = "asesor";
    //     $respuesta = ModeloDocentes::MdlMostrarDocentes($tabla, $item, $valor);
    //     return $respuesta;
    // }
    // /*=============================================
    // EDITAR DOCENTE
    // =============================================*/
    // public static function ctrEditarDocente()
    // {
    //     // {
    //     if (isset($_POST["editarNombre"])) {
    //         if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/', $_POST["editarNombre"])) {
    //             $tabla = "asesor";
    //             $datos = array(
    //                 "id" => $_POST["idDocente"],
    //                 "nombre" => $_POST["editarNombre"],
    //                 "setResidentes" => $_POST["editarResidentesM"]
    //             );
    //             $respuesta = modeloDocentes::mdlEditarDocente($tabla, $datos);
    //             /* echo $datos["id"];
    //                 echo $respuesta; */
    //             if ($respuesta == "ok") {
    //                 echo "<script>
    //                     Swal.fire({
    //                         position: 'top',
    //                         type: 'success',
    //                         title: '¡Exito!',
    //                         text: '¡Se actualizo correctamente!',
    //                         showConfirmButton: false,
    //                         timer: 800
    //                     }).then((result)=>{
    //                         window.location = 'Docentes';
    //                         });
    //                     </script>";
    //             }
    //         } else {
    //             echo '<script>
    //                    Swal.fire({
    //                         type: "error",
    //                        title: "¡El campo nombre no puede estar vacio o llevar caracteres especiales!",
    //                        showConfirmButton: true,
    //                        confirmButtonText: "Cerrar",
    //                        closeOnConfirm: false
    //                    }).then((result)=>{
    //                        if(result.value){
    //                            window.location = "Docentes";
    //                        }
    //                        });
    //                  </script>';
    //         }
    //     }
    //     // }
    // }
    // /*=============================================
    // BORRAR DOCENTE
    // =============================================*/
    // public static function ctrBorrarDocente()
    // {
    //     if (isset($_GET["idDocente"])) {
    //         $tabla = "asesor";
    //         $datos = $_GET["idDocente"];

    //         $respuesta = ModeloDocentes::MdlBorrarDocente($tabla, $datos);
    //         if ($respuesta == "ok") {
    //             echo '<script>
    // 		   Swal.fire({
    // 				type: "success",
    // 			   title: "¡Eliminado Correctamente!",
    // 			   showConfirmButton: true,
    // 			   confirmButtonText: "Cerrar"
    // 		   }).then((result)=>{
    // 			   if(result.value){
    // 				   window.location = "Docentes";
    // 			   }
    // 			   });
    // 		 </script>';
    //         }
    //     }
    // }

    // /*=============================================
    // PONER EN CERO LOS DOCENTES
    // =============================================*/
    // public static function ctrCeroDocentes()
    // {
    //     $tabla = "asesor";
    //     $respuesta = ModeloDocentes::mdlEditarCeroDocente($tabla);
    //     if ($respuesta == "ok") {
    //         return $respuesta;
    //     }
    // }

    // /*=============================================
    // MOSTRAR DOCENTE
    // =============================================*/
    // public static function ctrInfoDocentes($valor)
    // {
    //     $tabla = "proyecto";
    //     $respuesta = ModeloDocentes::MdlInfoDocentes($tabla, $valor);
    //     return $respuesta;
    // }
}
