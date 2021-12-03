<?php
$NombreEstudiante = "";
$NumeroControlEstudiante = "";
$CarreraEstuduante = "";
$NombreEstudiante2 = "";
$Celular = "";
$Plan = "";

$item = $_POST['control'];
$stmt = Conexion::conectar()->prepare("SELECT * FROM residentes WHERE noControl = :nocontrol ");
$stmt->bindParam(":nocontrol", $item, PDO::PARAM_STR);


if ($stmt->execute()) {
    foreach ($stmt as $key => $value) {

        if ($value["nombre"] != "NA") {
            $NombreEstudiante = $value['nombre'] . ' ' . $value['apellidoP'] . ' ' . $value['apellidoM'];
            $NumeroControlEstudiante = $value['noControl'];
            $CarreraEstuduante = $value['carrera'];

            if ($CarreraEstuduante == "Ingeniería en Sistemas Computacionales") {
                $Plan = "ISIC - 2010-224";
            } else {
                $Plan = "IINF - 2010-220";
            }
            $Celular = $value['telefono'];
        }


        $stmt2 = Conexion::conectar()->prepare("SELECT * FROM encuestaegresados WHERE nombre = :nombre ");
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
            title: "¡Ya fue realizada tu encuesta!",
            showConfirmButton: true,
            timer: 10000,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
            }).then((result)=>{
            if(result.value){
               window.location = "Inicio";
            }
            });
            </script>';
        } else {
?>
            <div class="container-fluid ">
                <div class="row">
                    <div class="py-5 col-12 col-sm col-lg-6 mx-auto">
                        <form class="bg-white py-3 px-4" action="pdf/tesis/revision.php" method="POST" target="_blank">
                            <div class="card mt-3">
                                <div style="background-color: #845EF7; color: white;" class="card-header">
                                    <h1 class=" text-center">ENCUESTA DE SALIDA PARA RECIÉN EGRESADOS DE NIVEL LICENCIATURA </h1>
                                </div>

                                <div class="card-body">
                                    
                                    <p class="text-justify">Con el propósito de mejorar los servicios que ofrece el Instituto Tecnológico de Iguala te pedimos responder la siguiente encuesta.</p><br><br>

                                    <h5><strong>PARTE I: DATOS PERSONALES</strong></h5>
                                    <div class="form-group ">
                                        <p for="nombre">Nombre Completo</label>
                                            <input style="cursor: no-drop;" type="text" class="form-control" name="nombre" value="<?php echo $NombreEstudiante ?>" readonly required>
                                    </div>

                                    <div class="form-group">
                                        <p for="añoing">Año de Ingreso</label>
                                            <input style="cursor: pointer;" type="month" class="form-control" name="añoing" autofocus required autocomplete="on">
                                    </div>

                                    <div class="form-group ">
                                        <p for="control">Numero de Control</label>
                                            <input style="cursor: no-drop;" type="text" class="form-control" name="control" value="<?php echo $NumeroControlEstudiante ?>" readonly required>
                                    </div>

                                    <div class="form-group">
                                        <p for="carrera">Carrera</label>
                                            <input style="cursor: no-drop;" type="text" class="form-control" name="carrera" value="<?php echo $CarreraEstuduante ?>" readonly required>
                                    </div>

                                    <div class="form-group">
                                        <p for="carrera">Plan de Estudios</label>
                                            <input style="cursor: no-drop;" type="text" class="form-control" name="planestu" value="<?php echo $Plan ?>" readonly required>
                                    </div>

                                    <div class="form-group">
                                        <p for="añoegre">Año de Egreso</label>
                                            <input style="cursor: pointer;" type="month" class="form-control" name="añoegre" autofocus required autocomplete="on">
                                    </div>

                                    <div class="form-group">
                                        <p for="semestre">Semestre</label>
                                            <select style="cursor: pointer;" class="form-select" name="semestre" aria-label="Default select example">
                                                <option value="Enero-Junio">Enero-Junio</option>
                                                <option value="Agosto-Diciembre">Agosto-Diciembre</option>
                                            </select>
                                    </div>

                                    <div class="form-group">
                                        <p for="especialidad">Especialidad</label>
                                            <input type="text" class="form-control" name="especialidad" required>
                                            
                                    </div>

                                    <h6 class="text-center"><strong>Recidencia Permanente </strong></h6> <br>

                                    <div class="form-group">
                                        <p for="pciudad">Ciudad/Localidad</label>
                                            <input type="text" class="form-control" name="pciudad" required>
                                    </div>

                                    <div class="form-group">
                                        <p for="pmunicipio">Municipio</label>
                                            <input type="text" class="form-control" name="pmunicipio" required>
                                    </div>

                                    <div class="form-group">
                                        <p for="pestado">Estado</label>
                                            <input type="text" class="form-control" name="pestado" required>
                                    </div>

                                    <h6 class="text-center"><strong>Lugar de Origen</strong></h6> <br>

                                    <div class="form-group">
                                        <p for="ociudad">Ciudad/Localidad</label>
                                            <input type="text" class="form-control" name="ociudad" required>
                                    </div>

                                    <div class="form-group">
                                        <p for="omunicipio">Municipio</label>
                                            <input type="text" class="form-control" name="omunicipio" required>
                                    </div>

                                    <div class="form-group">
                                        <p for="oestado">Estado</label>
                                            <input type="text" class="form-control" name="oestado" required>
                                    </div>

                                    <p class="text-justify">Si deseas recibir notificaciones tales como: información de becas de posgrado, bolsa de trabajo, seguimiento de egresados, congreso, cursos de actualización y capacitaciones, proporcione la forma de contacto a través de redes sociales:</p><br>

                                    <div class="form-group">
                                        <p for="cel">Celular</label>
                                            <input style="cursor: no-drop;" type="text" class="form-control" name="cel" value="<?php echo $Celular ?>" readonly required>
                                    </div>

                                    <div class="form-group ">
                                        <p for="emaili">E-Mail Institucional</label>
                                            <input style="cursor: no-drop;" type="text" class="form-control" name="emaili" value="<?php echo $NumeroControlEstudiante ?>@iguala.tecnm.mx" readonly required>
                                    </div>

                                    <div class="form-group ">
                                        <p for="emailp">E-Mail Personal</label>
                                            <input type="email" class="form-control" name="emailp" required>
                                    </div>

                                    <div class="form-group ">
                                        <p for="face">Facebook</label>
                                            <input type="text" class="form-control" name="face" required>
                                    </div>

                                </div>
                            </div>

                            <?php
                            include "Partes/Parte2.php";
                            include "Partes/Parte3.php";
                            include "Partes/Parte4.php";
                            include "Partes/Parte5.php";
                            include "Partes/Parte6.php";
                            ?>
                            <div align="end">
                                <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-paper-plane"></i> Enviar</button>
                                <button type="reset" class="btn btn-danger mt-2"><i class="fas fa-window-close"></i> Reset</button>
                            </div>
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
                    title: "¡Aun no tienes acceso a la encuesta!",
                    showConfirmButton: true,
                    timer: 10000,
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
// echo $NombreEstudiante . "<br>";
// echo $NumeroControlEstudiante . "<br>";
// echo $CarreraEstuduante . "<br>";
?>