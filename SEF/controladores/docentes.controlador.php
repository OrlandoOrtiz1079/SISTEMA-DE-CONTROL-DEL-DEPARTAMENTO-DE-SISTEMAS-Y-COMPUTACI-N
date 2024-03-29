<?php
class ControladorDocentes
{
    /*=============================================
        AGREGAR DOCENTE
    =============================================*/
    public static function ctrCrearDocente() 
    {
        if (isset($_POST["nuevoNombre"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/', $_POST["nuevoNombre"])) {
                $tabla = "asesor";
                $datos = array(
                    "nombre" => $_POST["nuevoNombre"],
                    "estado" => $_POST["estado"]
                );

                $respuesta = modeloDocentes::mdlIngresarDocente($tabla, $datos);
                echo $respuesta;
                if ($respuesta == "ok") {
                    echo '<script>
                    Swal.fire({
                    type: "success",
                    title: "¡Registrado Correctamente!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                    }).then((result)=>{
                    if(result.value){
                       window.location = "Docentes";
                    }
                    });
                    </script>';
                }
            } else {
                echo '<script>
				   Swal.fire({
						type: "error",
					   title: "¡El campo nombre no puede estar vacio o llevar caracteres especiales!",
					   showConfirmButton: true,
					   confirmButtonText: "Cerrar",
					   closeOnConfirm: false
				   }).then((result)=>{
					   if(result.value){
						   window.location = "Docentes";
					   }
					   });
				 </script>';
            }
        }
    }
    /*=============================================
    MOSTRAR DOCENTE
    =============================================*/
    public static function ctrMostrarDocentes($item, $valor)
    {
        $tabla = "asesor";
        $respuesta = ModeloDocentes::MdlMostrarDocentes($tabla, $item, $valor);
        return $respuesta;
    }

    
}