<br>
<div class="col-12 mt-1">
    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-4">
                    <br><br><br><br><br>
                        <div class="card align-self-start  mt-3 border-1">
                            <h1 class="header-title mb-3 ">Total de registros
                                <?php
                                $item = 0;
                                $stmt = Conexion::conectar()->prepare("SELECT SUM(cantidad) AS suma FROM  laboratorios");
                                // $stmt->bindParam(":id", $item, PDO::PARAM_INT);
                                $stmt->execute();
                                foreach ($stmt->fetchAll() as $key => $value) {
                                    echo $value['suma'];
                                }
                                ?> </h1>
                        </div>
                        <!--Sección de laboratorios-->
                        <li class="list-group-item border-0 mb-1 shadow-sm  justify-content-between d-flex text-white" style="background-color: #5499C7">
                            <span><i class="fa fa-desktop fa-lg"></i> Laboratorio de Aplicaciones </span><span>
                                <?php
                                $item1 = "Laboratorio de Aplicaciones";
                                $stmt1 = Conexion::conectar()->prepare("SELECT * FROM laboratorios WHERE laboratorio = :laboratorio");
                                $stmt1->bindParam(":laboratorio", $item1, PDO::PARAM_STR);
                                $stmt1->execute();
                                foreach ($stmt1->fetchAll() as $key => $value) {
                                    echo $value['cantidad'];
                                    $pasa1 = $value['cantidad'];
                                }
                                ?></span>
                        </li>
                        <li class="list-group-item border-0 mb-1 shadow-sm  justify-content-between d-flex text-white" style="background-color: #F1C40F">
                            <span><i class="fa fa-desktop fa-lg"></i> Laboratorio de Sistemas Embebidos </span><span>
                                <?php
                                $item2 = "Laboratorio de Sistemas Embebidos";
                                $stmt2 = Conexion::conectar()->prepare("SELECT * FROM laboratorios WHERE laboratorio = :laboratorio");
                                $stmt2->bindParam(":laboratorio", $item2, PDO::PARAM_STR);
                                $stmt2->execute();
                                foreach ($stmt2->fetchAll() as $key => $value) {
                                    echo $value['cantidad'];
                                    $pasa2 = $value['cantidad'];
                                }

                                ?></span>
                        </li>
                        <li class="list-group-item border-0 mb-1 shadow-sm  justify-content-between d-flex text-white" style="background-color: #27AE60">
                            <span><i class="fa fa-desktop fa-lg"></i> Laboratorio de Redes </span><span>
                                <?php
                                $item3 = "Laboratorio de Redes";
                                $stmt3 = Conexion::conectar()->prepare("SELECT * FROM laboratorios WHERE laboratorio = :laboratorio");
                                $stmt3->bindParam(":laboratorio", $item3, PDO::PARAM_STR);
                                $stmt3->execute();
                                foreach ($stmt3->fetchAll() as $key => $value) {
                                    echo $value['cantidad'];
                                    $pasa3 = $value['cantidad'];
                                }
                                ?></span>
                        </li>
                        <li class="list-group-item bg-red border-0 mb-1 shadow-sm  justify-content-between d-flex text-white" style="background-color: #8E44AD">
                            <span><i class="fa fa-desktop fa-lg"></i> Laboratorio de Programación </span><span>
                                <?php
                                $item4 = "Laboratorio de Programación";
                                $stmt4 = Conexion::conectar()->prepare("SELECT * FROM laboratorios WHERE laboratorio = :laboratorio");
                                $stmt4->bindParam(":laboratorio", $item4, PDO::PARAM_STR);
                                $stmt4->execute();
                                foreach ($stmt4->fetchAll() as $key => $value) {
                                    echo $value['cantidad'];
                                    $pasa4 = $value['cantidad'];
                                }
                                ?></span>
                        </li>
                        <li class="list-group-item border-0 mb-1 shadow-sm  justify-content-between d-flex text-white" style="background-color: #D35400">
                            <span><i class="fa fa-desktop fa-lg"></i> Laboratorio de Electronica </span><span>
                                <?php
                                $item5 = "Laboratorio de Electronica";
                                $stmt5 = Conexion::conectar()->prepare("SELECT * FROM laboratorios WHERE laboratorio = :laboratorio");
                                $stmt5->bindParam(":laboratorio", $item5, PDO::PARAM_STR);
                                $stmt5->execute();
                                foreach ($stmt5->fetchAll() as $key => $value) {
                                    echo $value['cantidad'];
                                    $pasa5 = $value['cantidad'];
                                }
                                ?></span>
                        </li>
                        <li class="list-group-item border-0 mb-1 shadow-sm  justify-content-between d-flex text-white" style="background-color: #7F8C8D">
                            <span><i class="fa fa-desktop fa-lg"></i> Laboratorio de Telecomunicaciones </span><span>
                                <?php
                                $item6 = "Laboratorio de Telecomunicaciones";
                                $stmt6 = Conexion::conectar()->prepare("SELECT * FROM laboratorios WHERE laboratorio = :laboratorio");
                                $stmt6->bindParam(":laboratorio", $item6, PDO::PARAM_STR);
                                $stmt6->execute();
                                foreach ($stmt6->fetchAll() as $key => $value) {
                                    echo $value['cantidad'];
                                    $pasa6 = $value['cantidad'];
                                }
                                ?></span>
                        </li>

                        <li class="list-group-item border-0 mb-1 shadow-sm  justify-content-between d-flex text-white" style="background-color: #E74C3C">
                            <span><i class="fa fa-desktop fa-lg"></i> Laboratorio de Diseño</span><span>
                                <?php

                                $item7 = "Laboratorio de Diseño";
                                $stmt7 = Conexion::conectar()->prepare("SELECT * FROM laboratorios WHERE laboratorio = :laboratorio");
                                $stmt7->bindParam(":laboratorio", $item7, PDO::PARAM_STR);
                                $stmt7->execute();
                                foreach ($stmt7->fetchAll() as $key => $value) {
                                    echo $value['cantidad'];
                                    $pasa7 = $value['cantidad'];
                                }
                                ?></span>
                        </li>
                    </div>
                    <!-- Grafica -->
                
                        <div class="col-lg-7 align-self-start">
                            <div class="card mt-3 border-0">
                                <h1 class="header-title ">Grafica de registros </h1>
                                <canvas id="myChart" ></canvas>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
        <!--Formulario generacion de reporte-->

    </div>
    <br>
</div>
<!--script generar grafica-->
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Laboratorio de Aplicaciones', ' Laboratorio de Sistemas Embebidos', 'Laboratorio de Redes', 'Laboratorio de Programación', 'Laboratorio de Electronica', 'Laboratorio de Telecomunicaciones', 'Laboratorio de Diseño'],
            datasets: [{
                label: "Personas",
                data: [
                    <?php echo $pasa1; ?>,
                    <?php echo $pasa2; ?>,
                    <?php echo $pasa3; ?>,
                    <?php echo $pasa4; ?>,
                    <?php echo $pasa5; ?>,
                    <?php echo $pasa6; ?>,
                    <?php echo $pasa7; ?>
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