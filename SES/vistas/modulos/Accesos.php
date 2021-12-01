<div class="col-12 mt-3">
    <div class="card">
        <h1 style="background-color: #007BFF; padding: 10px;color: white;" class=" text-center">Alumnos en acceso del dia</h1>
        <div class="card-body">
            <!-- <h1 class="header-title">Usuarios</h1> -->
            <div class="datatable-primary">
                <table class="text-center tablaES">
                    <thead class="text-capitalize">
                        <tr>
                            <!-- SELECT id,nocontrol,nombre,carrera, entrada ,enhora,sahora FROM alumnos  -->
                            <th>#</th>
                            <th>No. Control</th>
                            <th>Nombre</th>
                            <th>Carrera</th>
                            <th>Fecha</th>
                            <th>Hora entrada</th>
                            <th>Hora de salida: </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $VerResidentes = new ControladorMostrarAlunmos();
                        $VerResidentes->ctrMostrarAlumnos();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>