<br>
<div class="col-12 mt-1">
    <div class="card">

        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card align-self-start  mt-3 border-0">
                            <h1 class="header-title mb-3 ">Total de registros
                                <?php
                                $item = 0;
                                $stmt = Conexion::conectar()->prepare("SELECT * FROM registro WHERE id >= :id");
                                $stmt->bindParam(":id", $item, PDO::PARAM_INT);
                                $stmt->execute();
                                echo $stmt->rowCount();
                                ?> </h1>
                        </div>
                        <!--Sección de laboratorios-->
                        <li class="list-group-item border-0 mb-1 shadow-sm  justify-content-between d-flex text-white" style="background-color: #5499C7">
                            <span><i class="fa fa-desktop fa-lg"></i> Laboratorio de Aplicaciones </span><span>
                                <?php
                                $item1 = "Laboratorio de Aplicaciones";
                                $stmt1 = Conexion::conectar()->prepare("SELECT * FROM registro WHERE laboratorio = :laboratorio");
                                $stmt1->bindParam(":laboratorio", $item1, PDO::PARAM_STR);
                                $stmt1->execute();
                                echo $stmt1->rowCount();
                                ?></span>
                                  
                        </li>
                        <li class="list-group-item border-0 mb-1 shadow-sm  justify-content-between d-flex text-white" style="background-color: #F1C40F">
                            <span><i class="fa fa-desktop fa-lg"></i> Laboratorio de Sistemas Embebidos </span><span>
                                <?php
                                $item2 = "Laboratorio de Sistemas Embebidos";
                                $stmt2 = Conexion::conectar()->prepare("SELECT * FROM registro WHERE laboratorio = :laboratorio");
                                $stmt2->bindParam(":laboratorio", $item2, PDO::PARAM_STR);
                                $stmt2->execute();
                                echo $stmt2->rowCount();

                                ?></span>
                                 
                        </li>
                        <li class="list-group-item border-0 mb-1 shadow-sm  justify-content-between d-flex text-white" style="background-color: #27AE60">
                            <span><i class="fa fa-desktop fa-lg"></i> Laboratorio de Redes </span><span>
                                <?php
                                $item3 = "Laboratorio de Redes";
                                $stmt3 = Conexion::conectar()->prepare("SELECT * FROM registro WHERE laboratorio = :laboratorio");
                                $stmt3->bindParam(":laboratorio", $item3, PDO::PARAM_STR);
                                $stmt3->execute();
                                echo $stmt3->rowCount();
                                ?></span>
                              
                        </li>
                        <li class="list-group-item bg-red border-0 mb-1 shadow-sm  justify-content-between d-flex text-white" style="background-color: #8E44AD">
                            <span><i class="fa fa-desktop fa-lg"></i> Laboratorio de Programación </span><span>
                                <?php
                                $item4 = "Laboratorio de Programación";
                                $stmt4 = Conexion::conectar()->prepare("SELECT * FROM registro WHERE laboratorio = :laboratorio");
                                $stmt4->bindParam(":laboratorio", $item4, PDO::PARAM_STR);
                                $stmt4->execute();
                                echo $stmt4->rowCount();
                                ?></span>
                               
                        </li>
                        <li class="list-group-item border-0 mb-1 shadow-sm  justify-content-between d-flex text-white" style="background-color: #D35400">
                            <span><i class="fa fa-desktop fa-lg"></i> Laboratorio de Electronica </span><span>
                                <?php
                                $item5 = "Laboratorio de Electronica";
                                $stmt5 = Conexion::conectar()->prepare("SELECT * FROM registro WHERE laboratorio = :laboratorio");
                                $stmt5->bindParam(":laboratorio", $item5, PDO::PARAM_STR);
                                $stmt5->execute();
                                echo $stmt5->rowCount();
                                ?></span>
                                
                        </li>
                        <li class="list-group-item border-0 mb-1 shadow-sm  justify-content-between d-flex text-white" style="background-color: #7F8C8D">
                            <span><i class="fa fa-desktop fa-lg"></i> Laboratorio de Telecomunicaciones </span><span>
                                <?php
                                
                                $item6 = "Laboratorio de Telecomunicaciones";
                                $stmt6 = Conexion::conectar()->prepare("SELECT * FROM registro WHERE laboratorio = :laboratorio");
                                $stmt6->bindParam(":laboratorio", $item6, PDO::PARAM_STR);
                                $stmt6->execute();
                                echo $stmt6->rowCount();
                                ?></span>
                               
                              

                        </li>

                        <li class="list-group-item border-0 mb-1 shadow-sm  justify-content-between d-flex text-white" style="background-color: #E74C3C">
                            <span><i class="fa fa-desktop fa-lg"></i> Laboratorio de Diseño</span><span>
                                <?php

                                $item7 = "Laboratorio de Diseño";
                                $stmt7 = Conexion::conectar()->prepare("SELECT * FROM registro WHERE laboratorio = :laboratorio");
                                $stmt7->bindParam(":laboratorio", $item7, PDO::PARAM_STR);
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
        <!--Formulario generacion de reporte-->
        <form class="py-3 px-4" action="Reportesanual" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="exampleFormControlSelect1">Seleccionar el mes o semestre</label>
                    <select style="cursor: pointer; height: 40px;" class="form-control" id="example" name="periodo">
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="nombre">Introducir año</label>
                    <input style="height: 40px;" maxlength="4" type="text" class="form-control" name="año" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Generar reporte</button>
        </form>
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

