<?php $fecha = "%" . $_POST['periodo'] . "-" . $_POST['año']; ?><br>
<div class="col-12 mt-1">
    <div class="card">
        <div class="card-body">
            <div class="container">
                <!-- Pregunta no 1 -->
                <div style="padding-bottom: 50px;" class="row">
                    <div class="col-md-6"> <br>
                        <h1 class="header-title ">Total de respuestas</h1>
                        <div class="data-tables datatable-primary">
                            <table class="text-center tablaES">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th width="2%">No.</th>
                                        <th>Pregunta</th>
                                        <th>si</th>
                                        <th>no</th>
                                        <th>Desconozco</th>
                                        <th>No aplica</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>¿Has participado en las actividades y conferencias, talleres de formación integral tales como salud reproductiva, bullying, drogadicción, etc.?</td>
                                        <td><?php $item = "pri1";
                                            $Comparacion = "si";
                                            $RespuestaP1_1 = ModeloPreguntas::MdlMostrarPregnutas($fecha, $item, $Comparacion);
                                            ?></td>
                                        <td><?php $item = "pri1";
                                            $Comparacion = "no";
                                            $RespuestaP1_2 = ModeloPreguntas::MdlMostrarPregnutas($fecha, $item, $Comparacion);
                                            ?></td>
                                        <td><?php $item = "pri1";
                                            $Comparacion = "Desconozco";
                                            $RespuestaP1_3 = ModeloPreguntas::MdlMostrarPregnutas($fecha, $item, $Comparacion);
                                            ?></td>
                                        <td><?php $item = "pri1";
                                            $Comparacion = "No aplica";
                                            $RespuestaP1_4 = ModeloPreguntas::MdlMostrarPregnutas($fecha, $item, $Comparacion);
                                            ?></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Grafica -->
                    <div class="col-lg-6 align-self-start">
                        <div class="card mt-3 border-0">
                            <h1 class="header-title ">Grafica de registros </h1>
                            <canvas id="myChart" width="500" height="300"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Pregunta no 2 -->
                <hr style="border: 0 ; border-top: 4px double blue; width: 100%;">
                <div style="padding-bottom: 50px;" class="row">
                    <div class="col-md-6">
                        <div style="width: 100%;" class="data-tables datatable-primary">
                            <table class="text-center tablaES">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th width="1%">No.</th>
                                        <th>Pregunta</th>
                                        <th>Excelente</th>
                                        <th>Muy bueno</th>
                                        <th>Bueno</th>
                                        <th>Regular</th>
                                        <th>Deficiente</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2</td>
                                        <td>¿Cómo calificas el equipo de cómputo que se encuentra en el laboratorio?</td>
                                        <td><?php $item = "pri2";
                                            $Comparacion = "Excelente";
                                            $RespuestaP2_1 = ModeloPreguntas::MdlMostrarPregnutas($fecha, $item, $Comparacion);
                                            ?></td>
                                        <td><?php $item = "pri2";
                                            $Comparacion = "Muy bueno";
                                            $RespuestaP2_2 = ModeloPreguntas::MdlMostrarPregnutas($fecha, $item, $Comparacion);
                                            ?></td>
                                        <td><?php $item = "pri2";
                                            $Comparacion = "Bueno";
                                            $RespuestaP2_3 = ModeloPreguntas::MdlMostrarPregnutas($fecha, $item, $Comparacion);
                                            ?></td>
                                        <td><?php $item = "pri2";
                                            $Comparacion = "Regular";
                                            $RespuestaP2_4 = ModeloPreguntas::MdlMostrarPregnutas($fecha, $item, $Comparacion);
                                            ?></td>
                                        <td><?php $item = "pri2";
                                            $Comparacion = "Deficiente";
                                            $RespuestaP2_5 = ModeloPreguntas::MdlMostrarPregnutas($fecha, $item, $Comparacion);
                                            ?></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Grafica -->
                    <div class="col-lg-6 align-self-start">
                        <div class="card mt-3 border-0">
                            <canvas id="myChart2" width="500" height="300"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Pregunta no 3 -->
                <hr style="border: 0 ; border-top: 4px double blue; width: 100%;">
                <div style="padding-bottom: 50px;" class="row">
                    <div class="col-md-6">
                        <div style="width: 100%;" class="data-tables datatable-primary">
                            <table class="text-center tablaES">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th width="1%">No.</th>
                                        <th>Pregunta</th>
                                        <th>Excelente</th>
                                        <th>Muy bueno</th>
                                        <th>Bueno</th>
                                        <th>Regular</th>
                                        <th>Deficiente</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>3</td>
                                        <td>¿Cómo calificarías la conectividad de Internet en las diferentes áreas de la Institución?</td>
                                        <td><?php $item = "pri3";
                                            $Comparacion = "Excelente";
                                            $RespuestaP3_1 = ModeloPreguntas::MdlMostrarPregnutas($fecha, $item, $Comparacion);
                                            ?></td>
                                        <td><?php $item = "pri3";
                                            $Comparacion = "Muy bueno";
                                            $RespuestaP3_2 = ModeloPreguntas::MdlMostrarPregnutas($fecha, $item, $Comparacion);
                                            ?></td>
                                        <td><?php $item = "pri3";
                                            $Comparacion = "Bueno";
                                            $RespuestaP3_3 = ModeloPreguntas::MdlMostrarPregnutas($fecha, $item, $Comparacion);
                                            ?>
                                        </td>
                                        <td><?php
                                            $item = "pri3";
                                            $Comparacion = "Regular";
                                            $RespuestaP3_4 = ModeloPreguntas::MdlMostrarPregnutas($fecha, $item, $Comparacion);
                                            ?></td>
                                        <td><?php $item = "pri3";
                                            $Comparacion = "Deficiente";
                                            $RespuestaP3_5 = ModeloPreguntas::MdlMostrarPregnutas($fecha, $item, $Comparacion);
                                            ?></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Grafica -->
                    <div class="col-lg-6 align-self-start">
                        <div class="card mt-3 border-0">
                            <canvas id="myChart3" width="500" height="300"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Pregunta no 4 -->
                <hr style="border: 0 ; border-top: 4px double blue; width: 100%;">
                <div style="padding-bottom: 50px;" class="row">
                    <div class="col-md-6">
                        <div style="width: 100%;" class="data-tables datatable-primary">
                            <table class="text-center tablaES">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th width="1%">No.</th>
                                        <th>Pregunta</th>
                                        <th>Muy rápida</th>
                                        <th>Rápida</th>
                                        <th>Normal</th>
                                        <th>Lenta</th>
                                        <th>Limitada</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>4</td>
                                        <td>¿Cómo calificarías la velocidad de la conectividad de Internet en las diferentes áreas de la institución?</td>
                                        <td><?php $item = "pri4";
                                            $Comparacion = "Muy rápida";
                                            $RespuestaP4_1 = ModeloPreguntas::MdlMostrarPregnutas($fecha, $item, $Comparacion);
                                            ?></td>
                                        <td><?php $item = "pri4";
                                            $Comparacion = "Rápida";
                                            $RespuestaP4_2 = ModeloPreguntas::MdlMostrarPregnutas($fecha, $item, $Comparacion);
                                            ?></td>
                                        <td><?php $item = "pri4";
                                            $Comparacion = "Normal";
                                            $RespuestaP4_3 = ModeloPreguntas::MdlMostrarPregnutas($fecha, $item, $Comparacion);
                                            ?></td>
                                        <td><?php $item = "pri4";
                                            $Comparacion = "Lenta";
                                            $RespuestaP4_4 = ModeloPreguntas::MdlMostrarPregnutas($fecha, $item, $Comparacion);
                                            ?></td>
                                        <td><?php $item = "pri4";
                                            $Comparacion = "Limitada";
                                            $RespuestaP4_5 = ModeloPreguntas::MdlMostrarPregnutas($fecha, $item, $Comparacion);
                                            ?></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Grafica -->
                    <div class="col-lg-6 align-self-start">
                        <div class="card mt-3 border-0">
                            <canvas id="myChart4" width="500" height="300"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Pregunta no 5 -->
                <hr style="border: 0 ; border-top: 4px double blue; width: 100%;">
                <div style="padding-bottom: 50px;" class="row">
                    <div class="col-md-6">
                        <div style="width: 100%;" class="data-tables datatable-primary">
                            <table class="text-center tablaES">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th width="1%">No.</th>
                                        <th>Pregunta</th>
                                        <th>Muy actualizadoa</th>
                                        <th>Actualizado</th>
                                        <th>Funcional</th>
                                        <th>Obsoleto</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>5</td>
                                        <td>¿Cómo calificas el software que se ofrece para tu formación Académica?</td>
                                        <td><?php $item = "pri5";
                                            $Comparacion = "Muy actualizado";
                                            $RespuestaP5_1 = ModeloPreguntas::MdlMostrarPregnutas($fecha, $item, $Comparacion);
                                            ?></td>
                                        <td><?php $item = "pri5";
                                            $Comparacion = "Actualizado";
                                            $RespuestaP5_2 = ModeloPreguntas::MdlMostrarPregnutas($fecha, $item, $Comparacion);
                                            ?></td>
                                        <td><?php $item = "pri5";
                                            $Comparacion = "Funcional";
                                            $RespuestaP5_3 = ModeloPreguntas::MdlMostrarPregnutas($fecha, $item, $Comparacion);
                                            ?></td>
                                        <td><?php $item = "pri5";
                                            $Comparacion = "Obsoleto";
                                            $RespuestaP5_4 = ModeloPreguntas::MdlMostrarPregnutas($fecha, $item, $Comparacion);
                                            ?></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Grafica -->
                    <div class="col-lg-6 align-self-start">
                        <div class="card mt-3 border-0">
                            <canvas id="myChart5" width="500" height="300"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Pregunta no 6 -->
                <hr style="border: 0 ; border-top: 4px double blue; width: 100%;">
                <div style="padding-bottom: 50px;" class="row">
                    <div class="col-md-6">
                        <div style="width: 100%;" class="data-tables datatable-primary">
                            <table class="text-center tablaES">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th width="1%">No.</th>
                                        <th>Pregunta</th>
                                        <th>Excelente</th>
                                        <th>Muy bueno</th>
                                        <th>Bueno</th>
                                        <th>Regular</th>
                                        <th>Deficiente</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>6</td>
                                        <td>¿Cómo calificas el soporte técnico que te brindan en los Laboratorios de Cómputo?</td>
                                        <td><?php $item = "pri6";
                                            $Comparacion = "Excelente";
                                            $RespuestaP6_1 = ModeloPreguntas::MdlMostrarPregnutas($fecha, $item, $Comparacion);
                                            ?></td>
                                        <td><?php $item = "pri6";
                                            $Comparacion = "Muy bueno";
                                            $RespuestaP6_2 = ModeloPreguntas::MdlMostrarPregnutas($fecha, $item, $Comparacion);
                                            ?></td>
                                        <td><?php $item = "pri6";
                                            $Comparacion = "Bueno";
                                            $RespuestaP6_3 = ModeloPreguntas::MdlMostrarPregnutas($fecha, $item, $Comparacion);
                                            ?></td>
                                        <td><?php $item = "pri6";
                                            $Comparacion = "Regular";
                                            $RespuestaP6_4 = ModeloPreguntas::MdlMostrarPregnutas($fecha, $item, $Comparacion);
                                            ?></td>
                                        <td><?php $item = "pri6";
                                            $Comparacion = "Deficiente";
                                            $RespuestaP6_5 = ModeloPreguntas::MdlMostrarPregnutas($fecha, $item, $Comparacion);
                                            ?></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </table>
                    </div>
                    <!-- Grafica -->
                    <div class="col-lg-6 align-self-start">
                        <div class="card mt-3 border-0">
                            <canvas id="myChart6" width="500" height="300"></canvas>
                        </div>
                    </div>
                </div>
                <hr style="border: 0 ; border-top: 4px double blue; width: 100%;">
                <h2 class="ml-4">Sugerencias para mejorar el servicio de Recursos Informáticos</h2>
                <br>
                <div class="data-tables datatable-primary">
                    <table class="text-center tablaES">
                        <thead class="text-capitalize">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Carrera</th>
                                <th>Sugerencia</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $item = 'fecha';
                            $valor = '%' . $_POST['periodo'] . '-' . $_POST['año'];
                            $docentes = ControladorPreguntas::ctrMostrarRespuestas($item, $valor);
                            $c = 0;
                            foreach ($docentes as $key => $value) {
                                if ($value["nombre"] != "NA") {
                                    $c++;
                                    echo '<tr>
                                        <td>' . $c . '</td>';
                                    echo '<td>' . $value["nombre"] . '</td>';
                                    echo '<td>' . $value["carrera"] . '</td>';
                                    echo '<td>' . $value["pri7"] . '</td>';
                                    echo '<td>' . $value["fecha"] . '</td>
                                    </tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <form class="py-3 px-4" action="Reporteencuestas" method="POST">
            <button type="submit" class="btn btn-primary">Regresar</button>
        </form>
    </div>
    <br>
</div>
<!--script generar grafica pregunta 1-->
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Si', 'No', 'Desconozco', 'No Aplica'],
            datasets: [{
                label: 'Valor',
                data: [<?php echo $RespuestaP1_1 ?>, <?php echo  $RespuestaP1_2 ?>, <?php echo $RespuestaP1_3 ?>, <?php echo $RespuestaP1_4 ?>],
                backgroundColor: ['rgba(84, 153, 199,0.2)', 'rgba(241, 196, 15,0.2)', 'rgba(39, 174, 96,0.2)', 'rgba(142, 68, 173,0.2)', 'rgba(238, 24, 24,0.2 )'],
                borderColor: ['rgba(84, 153, 199,1)', 'rgba(241, 196, 15,1)', 'rgba(39, 174, 96,1)', 'rgba(142, 68, 173,1)', 'rgba(238, 24, 24,1 )'],
                borderWidth: 1,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    });

    // script generar grafica pregunta 2
    const ctx2 = document.getElementById('myChart2').getContext('2d');
    const myChart2 = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['Excelente', 'Muy bueno', 'Bueno', 'Regular', 'Deficiente'],
            datasets: [{
                label: 'Valor ',
                data: [<?php echo $RespuestaP2_1 ?>, <?php echo $RespuestaP2_2 ?>, <?php echo $RespuestaP2_3 ?>, <?php echo $RespuestaP2_4 ?>, <?php echo $RespuestaP2_5 ?>],
                backgroundColor: ['rgba(84, 153, 199,0.2)', 'rgba(241, 196, 15,0.2)', 'rgba(39, 174, 96,0.2)', 'rgba(142, 68, 173,0.2)', 'rgba(238, 24, 24,0.2 )'],
                borderColor: ['rgba(84, 153, 199,1)', 'rgba(241, 196, 15,1)', 'rgba(39, 174, 96,1)', 'rgba(142, 68, 173,1)', 'rgba(238, 24, 24,1 )'],
                borderWidth: 1,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },

    });

    // script generar grafica pregunta 3
    const ctx3 = document.getElementById('myChart3').getContext('2d');
    const myChart3 = new Chart(ctx3, {
        type: 'bar',
        data: {
            labels: ['Excelente', 'Muy bueno', 'Bueno', 'Regular', 'Deficiente'],
            datasets: [{
                label: 'Valor',
                data: [<?php echo  $RespuestaP3_1 ?>, <?php echo  $RespuestaP3_2 ?>, <?php echo  $RespuestaP3_3 ?>, <?php echo  $RespuestaP3_4 ?>, <?php echo  $RespuestaP3_5 ?>],
                backgroundColor: ['rgba(84, 153, 199,0.2)', 'rgba(241, 196, 15,0.2)', 'rgba(39, 174, 96,0.2)', 'rgba(142, 68, 173,0.2)', 'rgba(238, 24, 24,0.2 )'],
                borderColor: ['rgba(84, 153, 199,1)', 'rgba(241, 196, 15,1)', 'rgba(39, 174, 96,1)', 'rgba(142, 68, 173,1)', 'rgba(238, 24, 24,1 )'],
                borderWidth: 1,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },

    });

    // script generar grafica pregunta 4
    const ctx4 = document.getElementById('myChart4').getContext('2d');
    const myChart4 = new Chart(ctx4, {
        type: 'bar',
        data: {
            labels: ['Muy rápida', 'Rápida', 'Normal', 'Lenta', 'Limitada'],
            datasets: [{
                label: 'Valor',
                data: [<?php echo $RespuestaP4_1 ?>, <?php echo $RespuestaP4_2 ?>, <?php echo $RespuestaP4_3 ?>, <?php echo $RespuestaP4_4 ?>, <?php echo $RespuestaP4_5 ?>],
                backgroundColor: ['rgba(84, 153, 199,0.2)', 'rgba(241, 196, 15,0.2)', 'rgba(39, 174, 96,0.2)', 'rgba(142, 68, 173,0.2)', 'rgba(238, 24, 24,0.2 )'],
                borderColor: ['rgba(84, 153, 199,1)', 'rgba(241, 196, 15,1)', 'rgba(39, 174, 96,1)', 'rgba(142, 68, 173,1)', 'rgba(238, 24, 24,1 )'],
                borderWidth: 1,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    });

    // script generar grafica pregunta 5
    const ctx5 = document.getElementById('myChart5').getContext('2d');
    const myChart5 = new Chart(ctx5, {
        type: 'bar',
        data: {
            labels: ['Muy actualizado', 'Actualizado', 'Funcional', 'Obsoleto'],
            datasets: [{
                label: 'Valor',
                data: [<?php echo $RespuestaP5_1 ?>, <?php echo $RespuestaP5_2 ?>, <?php echo $RespuestaP5_3 ?>, <?php echo $RespuestaP5_4 ?>],
                backgroundColor: ['rgba(84, 153, 199,0.2)', 'rgba(241, 196, 15,0.2)', 'rgba(39, 174, 96,0.2)', 'rgba(142, 68, 173,0.2)', 'rgba(238, 24, 24,0.2 )'],
                borderColor: ['rgba(84, 153, 199,1)', 'rgba(241, 196, 15,1)', 'rgba(39, 174, 96,1)', 'rgba(142, 68, 173,1)', 'rgba(238, 24, 24,1 )'],
                borderWidth: 1,

            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },

    });

    // script generar grafica pregunta 6
    const ctx6 = document.getElementById('myChart6').getContext('2d');
    const myChart6 = new Chart(ctx6, {
        type: 'bar',
        data: {
            labels: ['Excelente', 'Muy bueno', 'Bueno', 'Regular', 'Deficiente'],
            datasets: [{
                label: ['Valor'],
                data: [<?php echo $RespuestaP6_1 ?>, <?php echo $RespuestaP6_2 ?>, <?php echo $RespuestaP6_3 ?>, <?php echo $RespuestaP6_4 ?>, <?php echo $RespuestaP6_5 ?>],
                backgroundColor: ['rgba(84, 153, 199,0.2)', 'rgba(241, 196, 15,0.2)', 'rgba(39, 174, 96,0.2)', 'rgba(142, 68, 173,0.2)', 'rgba(238, 24, 24,0.2 )'],
                borderColor: ['rgba(84, 153, 199,1)', 'rgba(241, 196, 15,1)', 'rgba(39, 174, 96,1)', 'rgba(142, 68, 173,1)', 'rgba(238, 24, 24,1 )'],
                borderWidth: 1,
            }, ]
        },
        options: {
            responsive: true,
            legend: {
                position: 'top',
            },
            title: {
                display: false,
                text: 'Preguntas de Recursos Informaticos'
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>