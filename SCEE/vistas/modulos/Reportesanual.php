<?php

$mes = "";
if (isset($_POST['periodo']) and isset($_POST['año'])) {

    if ($_POST['periodo'] == 1) {
        $mes = "Enero";
    }
    if ($_POST['periodo'] == 2) {
        $mes = "Febrero";
    }
    if ($_POST['periodo'] == 3) {
        $mes = "Marzo";
    }
    if ($_POST['periodo'] == 4) {
        $mes = "Abril";
    }
    if ($_POST['periodo'] == 5) {
        $mes = "Mayo";
    }
    if ($_POST['periodo'] == 6) {
        $mes = "Junio";
    }
    if ($_POST['periodo'] == 7) {
        $mes = "Julio";
    }
    if ($_POST['periodo'] == 8) {
        $mes = "Agosto";
    }
    if ($_POST['periodo'] == 9) {
        $mes = "Septiembre";
    }
    if ($_POST['periodo'] == 10) {
        $mes = "Octubre";
    }
    if ($_POST['periodo'] == 11) {
        $mes = "Noviembre";
    }
    if ($_POST['periodo'] == 12) {
        $mes = "Diciembre";
    }
}
?>
<br>
<div class="col-12 mt-1">
    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card align-self-start  mt-3 border-0">
                            <h1 class="header-title mb-3 ">Total de registros de
                                <?php
                                echo $mes . " " . $_POST['año'] . ": ";

                                $fecha = "%" . $_POST['periodo'] . "-" . $_POST['año'];
                                $item = 0;
                                $stmt = Conexion::conectar()->prepare("SELECT  * FROM registro WHERE id >= :id AND fecha LIKE :fecha");
                                $stmt->bindParam(":id", $item, PDO::PARAM_INT);
                                $stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
                                $stmt->execute();
                                if ($stmt->rowCount() == 0) {
                                    echo "
                                        <script>
                                        Swal.fire({
                                        title: '¡No hay registros!',
                                        text: 'Intenta con otro mes o año',
                                        confirmButtonText: 'Cerrar',
                                        icon: 'info'
                                    });
                                    </script>";
                                    echo $stmt->rowCount();
                                } else {
                                    echo $stmt->rowCount();
                                }
                                ?> </h1>
                        </div>
                        <!--Sección de laboratorios-->
                        <li class="list-group-item border-0 mb-1 shadow-sm  justify-content-between d-flex text-white" style="background-color: #5499C7">
                            <span><i class="fa fa-desktop fa-lg"></i> Laboratorio de Aplicaciones </span><span>
                                <?php
                                $fecha = "%" . $_POST['periodo'] . "-" . $_POST['año'];
                                $item1 = "Laboratorio de Aplicaciones";
                                $stmt1 = Conexion::conectar()->prepare("SELECT * FROM registro WHERE laboratorio = :laboratorio AND fecha LIKE :fecha");
                                $stmt1->bindParam(":laboratorio", $item1, PDO::PARAM_STR);
                                $stmt1->bindParam(":fecha", $fecha, PDO::PARAM_STR);
                                $stmt1->execute();
                                echo $stmt1->rowCount();
                                ?></span>
                        </li>
                        <li class="list-group-item border-0 mb-1 shadow-sm  justify-content-between d-flex text-white" style="background-color: #F1C40F">
                            <span><i class="fa fa-desktop fa-lg"></i> Laboratorio de Sistemas Embebidos </span><span>
                                <?php
                                $fecha = "%" . $_POST['periodo'] . "-" . $_POST['año'];
                                $item2 = "Laboratorio de Sistemas Embebidos";
                                $stmt2 = Conexion::conectar()->prepare("SELECT * FROM registro WHERE laboratorio = :laboratorio AND fecha LIKE :fecha");
                                $stmt2->bindParam(":laboratorio", $item2, PDO::PARAM_STR);
                                $stmt2->bindParam(":fecha", $fecha, PDO::PARAM_STR);
                                $stmt2->execute();
                                echo $stmt2->rowCount();

                                ?></span>
                        </li>
                        <li class="list-group-item border-0 mb-1 shadow-sm  justify-content-between d-flex text-white" style="background-color: #27AE60">
                            <span><i class="fa fa-desktop fa-lg"></i> Laboratorio de Redes </span><span>
                                <?php
                                $fecha = "%" . $_POST['periodo'] . "-" . $_POST['año'];
                                $item3 = "Laboratorio de Redes";
                                $stmt3 = Conexion::conectar()->prepare("SELECT * FROM registro WHERE laboratorio = :laboratorio AND fecha LIKE :fecha");
                                $stmt3->bindParam(":laboratorio", $item3, PDO::PARAM_STR);
                                $stmt3->bindParam(":fecha", $fecha, PDO::PARAM_STR);
                                $stmt3->execute();
                                echo $stmt3->rowCount();
                                ?></span>
                        </li>
                        <li class="list-group-item bg-red border-0 mb-1 shadow-sm  justify-content-between d-flex text-white" style="background-color: #8E44AD">
                            <span><i class="fa fa-desktop fa-lg"></i> Laboratorio de Programación </span><span>
                                <?php
                                $fecha = "%" . $_POST['periodo'] . "-" . $_POST['año'];
                                $item4 = "Laboratorio de Programación";
                                $stmt4 = Conexion::conectar()->prepare("SELECT * FROM registro WHERE laboratorio = :laboratorio AND fecha LIKE :fecha");
                                $stmt4->bindParam(":laboratorio", $item4, PDO::PARAM_STR);
                                $stmt4->bindParam(":fecha", $fecha, PDO::PARAM_STR);
                                $stmt4->execute();
                                echo $stmt4->rowCount();
                                ?></span>
                        </li>
                        <li class="list-group-item border-0 mb-1 shadow-sm  justify-content-between d-flex text-white" style="background-color: #D35400">
                            <span><i class="fa fa-desktop fa-lg"></i> Laboratorio de Electronica </span><span>
                                <?php
                                $fecha = "%" . $_POST['periodo'] . "-" . $_POST['año'];
                                $item5 = "Laboratorio de Electronica";
                                $stmt5 = Conexion::conectar()->prepare("SELECT * FROM registro WHERE laboratorio = :laboratorio AND fecha LIKE :fecha");
                                $stmt5->bindParam(":laboratorio", $item5, PDO::PARAM_STR);
                                $stmt5->bindParam(":fecha", $fecha, PDO::PARAM_STR);
                                $stmt5->execute();
                                echo $stmt5->rowCount();
                                ?></span>
                        </li>
                        <li class="list-group-item border-0 mb-1 shadow-sm  justify-content-between d-flex text-white" style="background-color: #7F8C8D">
                            <span><i class="fa fa-desktop fa-lg"></i> Laboratorio de Telecomunicaciones </span><span>
                                <?php
                                $fecha = "%" . $_POST['periodo'] . "-" . $_POST['año'];
                                $item6 = "Laboratorio de Telecomunicaciones";
                                $stmt6 = Conexion::conectar()->prepare("SELECT * FROM registro WHERE laboratorio = :laboratorio AND fecha LIKE :fecha");
                                $stmt6->bindParam(":laboratorio", $item6, PDO::PARAM_STR);
                                $stmt6->bindParam(":fecha", $fecha, PDO::PARAM_STR);
                                $stmt6->execute();
                                echo $stmt6->rowCount();
                                ?></span>
                        </li>

                        <li class="list-group-item border-0 mb-1 shadow-sm  justify-content-between d-flex text-white" style="background-color: #E74C3C">
                            <span><i class="fa fa-desktop fa-lg"></i> Laboratorio de Diseño</span><span>
                                <?php
                                $fecha = "%" . $_POST['periodo'] . "-" . $_POST['año'];
                                $item7 = "Laboratorio de Diseño";
                                $stmt7 = Conexion::conectar()->prepare("SELECT * FROM registro WHERE laboratorio = :laboratorio AND fecha LIKE :fecha");
                                $stmt7->bindParam(":laboratorio", $item7, PDO::PARAM_STR);
                                $stmt7->bindParam(":fecha", $fecha, PDO::PARAM_STR);
                                $stmt7->execute();
                                echo $stmt7->rowCount();
                                ?></span>
                        </li>

                    </div>
                    <!-- Grafica -->
                    <div class="col-lg-5 align-self-start">
                        <div class="card mt-3 border-0">
                            <h1 class="header-title ">Grafica de registros </h1>
                            <canvas id="myChart" width="200" height="140"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form class="py-3 px-4" action="Reportes" method="POST">
            <button type="submit" class="btn btn-primary">Regresar</button>
        </form>
    </div>
    <br>

</div>
<!--Mensaje al no tener visitas en la ocnsulta-->
<!-- <script>
    Swal.fire({
    title: "¡No hay registros!",
    text: 'Intenta con otro mes o año',
    confirmButtonText: "Cerrar",
    icon: 'info'
});
</script> -->

<!--script generar grafica-->
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Laboratorio de Aplicaciones', ' Laboratorio de Sistemas Embebidos', 'Laboratorio de Redes', 'Laboratorio de Programación', 'Laboratorio de Electronica', 'Laboratorio de Telecomunicaciones', 'Laboratorio de Diseño'],
            datasets: [{
                label: "valores",
                data: [
                    <?php echo $stmt1->rowCount() ?>,
                    <?php echo $stmt2->rowCount() ?>,
                    <?php echo $stmt3->rowCount() ?>,
                    <?php echo $stmt4->rowCount() ?>,
                    <?php echo $stmt5->rowCount() ?>,
                    <?php echo $stmt6->rowCount() ?>,
                    <?php echo $stmt7->rowCount() ?>
                ],
                backgroundColor: [
                    'rgba(84, 153, 199)',
                    'rgba(241, 196, 15)',
                    'rgba(39, 174, 96)',
                    'rgba(142, 68, 173)',
                    'rgba(211, 84, 0)',
                    'rgba(127, 140, 141)',
                    'rgba(231, 76, 60)'
                ],
                borderColor: [
                    'rgba(84, 153, 199)',
                    'rgba(241, 196, 15)',
                    'rgba(39, 174, 96)',
                    'rgba(142, 68, 173)',
                    'rgba(211, 84, 0)',
                    'rgba(127, 140, 141)',
                    'rgba(231, 76, 60)'
                ],
                background: [
                    'rgba(84, 153, 199)',
                    'rgba(241, 196, 15)',
                    'rgba(39, 174, 96)',
                    'rgba(142, 68, 173)',
                    'rgba(211, 84, 0)',
                    'rgba(127, 140, 141)',
                    'rgba(231, 76, 60)'
                ]

            }]
        },

    });
</script>