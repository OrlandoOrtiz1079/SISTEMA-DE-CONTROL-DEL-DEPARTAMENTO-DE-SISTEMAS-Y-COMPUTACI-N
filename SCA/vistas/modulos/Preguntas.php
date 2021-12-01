<?php
$NombreEstudiante = "";
$NumeroControlEstudiante = "";
$CarreraEstuduante = "";
$NombreEstudiante2 = "";

$item = $_POST['control'];
$stmt = Conexion::conectar()->prepare("SELECT * FROM alumnos WHERE nocontrol = :nocontrol ");
$stmt->bindParam(":nocontrol", $item, PDO::PARAM_STR);


if ($stmt->execute()) {
    foreach ($stmt as $key => $value) {
        if ($value["nombre"] != "NA") {
            $NombreEstudiante = $value['nombre'];
            $NumeroControlEstudiante = $value['nocontrol'];
            $CarreraEstuduante = $value['carrera'];
        }
        $stmt2 = Conexion::conectar()->prepare("SELECT * FROM encuesta WHERE nombre = :nombre ");
        $stmt2->bindParam(":nombre", $NombreEstudiante, PDO::PARAM_STR);

        if ($stmt2->execute()) {
            foreach ($stmt2 as $key => $value2) {
                if ($value2["nombre"] != "NA") {
                    $NombreEstudiante2 = $value2['nombre'];
                }
                break;
            }
        }

        if ($NombreEstudiante == $NombreEstudiante2) {
            echo '<script>
            Swal.fire({
            type: "success",
            title: "Ya fue realizada tu encuesta",
            showConfirmButton: true,
            timer: 10000,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
            }).then((result)=>{
            if(result.value){
               window.location = "Encuestainicio";
            }
            });
            </script>';
        } else {
?>
            <div class="container-fluid ">
                <div class="row">
                    <div class="py-5 col-12 col-sm col-lg-6 mx-auto">
                        <form class="bg-white py-3 px-4" action="CargarRespuestas" method="POST">
                            <div class="card">
                                <div class="card-body">
                                    <!--Inicio formulario encuesta-->
                                    <h1 class=" text-center">ENCUESTA DE SERVICIOS</h1>
                                    <p class="text-justify">Estimados estudiantes, esta encuesta tiene como propósito obtener información para una mejora continua de los servicios que el Instituto Tecnológico de Iguala brinda a través de las diferentes ventanillas de atención. Recuerda que los servicios que te brinda el instituto son de un horario de 7:00 am a 8:00 pm.</p>
                                </div>
                            </div>
                            <div class="card mt-3">
                                <div class="card-body">
                                    <div class="form-group ">
                                        <label for="correo">Dirección de correo electrónico</label>
                                        <input style="cursor: no-drop;" type="text" class="form-control" name="correo" value="<?php echo $NumeroControlEstudiante ?>@iguala.tecnm.mx" readonly required>
                                    </div>

                                    <div class="form-group ">
                                        <label for="nombre">Nombre completo</label>
                                        <input style="cursor: no-drop;" type="text" class="form-control" name="nombre" value="<?php echo $NombreEstudiante ?>" readonly required>
                                    </div>

                                    <div class="form-group">
                                        <label for="carrera">Carrera</label>
                                        <input style="cursor: no-drop;" type="text" class="form-control" name="carrera" value="<?php echo $CarreraEstuduante ?>" readonly required>
                                    </div>
                                </div>
                            </div>
                            <?php
                            include "PreguntasSecciones/Seccion1.php";
                            include "PreguntasSecciones/Seccion2.php";
                            include "PreguntasSecciones/Seccion3.php";
                            include "PreguntasSecciones/Seccion4.php";
                            ?>
                            <button type="submit" class="btn btn-primary mt-2">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
<?php
        }
        break;
    }
    if ($stmt->rowCount() == 0) {
        echo '<script>
                    Swal.fire({
                    type: "error",
                    title: "Numero de control inexistente",
                    showConfirmButton: true,
                    timer: 10000,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                    }).then((result)=>{
                    if(result.value){
                       window.location = "Encuestainicio";
                    }
                    });
                    </script>';
    }
}
// echo $NombreEstudiante . "<br>";
// echo $NumeroControlEstudiante . "<br>";
// echo $CarreraEstuduante . "<br>";
?>