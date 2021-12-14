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

            $tabla = "registro";
            $datos = array(
                "alumno" => $_POST["nombre"],
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
        }
    }
}
