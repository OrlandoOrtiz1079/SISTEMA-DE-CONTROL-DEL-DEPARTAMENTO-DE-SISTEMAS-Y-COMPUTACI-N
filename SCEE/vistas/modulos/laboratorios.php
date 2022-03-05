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
                                
                                 <A href="#vermas">
                                     ver mas</A>
                             
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
                               <A href="#vermas2">
                                     ver mas</A>
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
                                   <A href="#vermas3">
                                     ver mas</A>
                              
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
                                  <A href="#vermas4">
                                     ver mas</A>
                                
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
                                 <A href="#vermas5">
                                     ver mas</A>
                              
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
                                 <A href="#vermas6">
                                     ver mas</A>
                                
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
                                  <A href="#vermas7">
                                     ver mas</A>
                                
                                
                                
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



                        <!--APLICACIONES-->
                        <A name="vermas"></A>
<div class="col-12 mt-4">
    <div class="card">
        <h2 class="ml-4">Alumnos en el laboratorio de Aplicaciones </h2>
        <div class="card-body">
            <div class="data-tables datatable-primary">
                <table class="text-center tablaES" >
                    <thead class="text-capitalize" style="background-color: #5499C7" >
                        <tr>
                            <th>#</th>
                            <th>Alumno</th>
                            <th>Laboratorio</th>
                            <th>fecha</th>
                            
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $item = null;
                        $valor = null;
                        // SE LLAMA AL LOS ALUMNOS QUE ESNTEN DENTRO DE ESESE ENCUENTRA EN EL ARCHIVO DE SUGERENCIAS.CONTROLADOR
                        $docentes = ControladorSugerencia::ctrMostrarHistorial($item, $valor);
                        $c = 0;
                        foreach ($docentes as $key => $value) {
                            if ($value["laboratorio"] == "Laboratorio de Aplicaciones" && $value<=40) {
                                $c++;
                                echo '<tr>
                                        <td width="2%">' . $c . '</td>
                                        <td width="40%">' . $value["alumno"] . '</td>
                                        <td width="40%">' . $value["laboratorio"] . '</td>
                                        <td width="20%">' . $value["fecha"] . '</td>
                                        
                                     
                                       
                                        <td>
                                        
                                        </td>
                                    </tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


  <!--SISTEMAS EMBEBIDOS-->
  <A name="vermas2"></A>
<div class="col-12 mt-4">
    <div class="card">
        <h2 class="ml-4">Alumnos en el laboratorio de Sistemas Embebidos</h2>
        <div class="card-body">
            <div class="data-tables datatable-primary">
                <table class="text-center tablaES">
                    <thead class="text-capitalize" style="background-color: #F1C40F" >
                        <tr>
                            <th>#</th>
                            <th>Alumno</th>
                            <th>Laboratorio</th>
                            <th>fecha</th>
                            
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $item = null;
                        $valor = null;
                        // SE LLAMA AL LOS ALUMNOS QUE ESNTEN DENTRO DE ESESE ENCUENTRA EN EL ARCHIVO DE SUGERENCIAS.CONTROLADOR
                        $docentes = ControladorSugerencia::ctrMostrarHistorial($item, $valor);
                        $c = 0;
                        foreach ($docentes as $key => $value) {
                            if ($value["laboratorio"] == "Laboratorio de Sistemas Embebidos") {
                                $c++;
                                echo '<tr>
                                        <td width="2%">' . $c . '</td>
                                        <td width="40%">' . $value["alumno"] . '</td>
                                        <td width="40%">' . $value["laboratorio"] . '</td>
                                        <td width="20%">' . $value["fecha"] . '</td>
                                        
                                     
                                       
                                        <td></td>
                                    </tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




  <!--REDES-->
  <A name="vermas3"></A>
<div class="col-12 mt-4">
    <div class="card">
        <h2 class="ml-4">Alumnos en el laboratorio de Redes</h2>
        <div class="card-body">
            <div class="data-tables datatable-primary">
                <table class="text-center tablaES">
                    <thead class="text-capitalize"  style="background-color: #27AE60" >
                        <tr>
                            <th>#</th>
                            <th>Alumno</th>
                            <th>Laboratorio</th>
                            <th>fecha</th>
                            
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $item = null;
                        $valor = null;
                        // SE LLAMA AL LOS ALUMNOS QUE ESNTEN DENTRO DE ESESE ENCUENTRA EN EL ARCHIVO DE SUGERENCIAS.CONTROLADOR
                        $docentes = ControladorSugerencia::ctrMostrarHistorial($item, $valor);
                        $c = 0;
                        foreach ($docentes as $key => $value) {
                            if ($value["laboratorio"] == "Laboratorio de Redes") {
                                $c++;
                                echo '<tr>
                                        <td width="2%">' . $c . '</td>
                                        <td width="40%">' . $value["alumno"] . '</td>
                                        <td width="40%">' . $value["laboratorio"] . '</td>
                                        <td width="20%">' . $value["fecha"] . '</td>
                                        
                                     
                                       
                                        <td></td>
                                    </tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

 

  <!--PROGRAMACION-->
  <A name="vermas4"></A>
<div class="col-12 mt-4">
    <div class="card">
        <h2 class="ml-4">Alumnos en el laboratorio de Programacion</h2>
        <div class="card-body">
            <div class="data-tables datatable-primary">
                <table class="text-center tablaES">
                    <thead class="text-capitalize" style="background-color: #8E44AD">
                        <tr>
                            <th>#</th>
                            <th>Alumno</th>
                            <th>Laboratorio</th>
                            <th>fecha</th>
                            
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $item = null;
                        $valor = null;
                        // SE LLAMA AL LOS ALUMNOS QUE ESNTEN DENTRO DE ESESE ENCUENTRA EN EL ARCHIVO DE SUGERENCIAS.CONTROLADOR
                        $docentes = ControladorSugerencia::ctrMostrarHistorial($item, $valor);
                        $c = 0;
                        foreach ($docentes as $key => $value) {
                            if ($value["laboratorio"] == "Laboratorio de Programacion") {
                                $c++;
                                echo '<tr>
                                        <td width="2%">' . $c . '</td>
                                        <td width="40%">' . $value["alumno"] . '</td>
                                        <td width="40%">' . $value["laboratorio"] . '</td>
                                        <td width="20%">' . $value["fecha"] . '</td>
                                        
                                     
                                       
                                        <td></td>
                                    </tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



  <!--electronica-->
  <A name="vermas5"></A>
<div class="col-12 mt-4">
    <div class="card">
        <h2 class="ml-4">Alumnos en el laboratorio de Electronica</h2>
        <div class="card-body">
            <div class="data-tables datatable-primary">
                <table class="text-center tablaES">
                    <thead class="text-capitalize" style="background-color: #D35400">
                        <tr>
                            <th>#</th>
                            <th>Alumno</th>
                            <th>Laboratorio</th>
                            <th>fecha</th>
                            
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $item = null;
                        $valor = null;
                        // SE LLAMA AL LOS ALUMNOS QUE ESNTEN DENTRO DE ESESE ENCUENTRA EN EL ARCHIVO DE SUGERENCIAS.CONTROLADOR
                        $docentes = ControladorSugerencia::ctrMostrarHistorial($item, $valor);
                        $c = 0;
                        foreach ($docentes as $key => $value) {
                            if ($value["laboratorio"] == "Laboratorio de Electronica") {
                                $c++;
                                echo '<tr>
                                        <td width="2%">' . $c . '</td>
                                        <td width="40%">' . $value["alumno"] . '</td>
                                        <td width="40%">' . $value["laboratorio"] . '</td>
                                        <td width="20%">' . $value["fecha"] . '</td>
                                        
                                     
                                       
                                        <td></td>
                                    </tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




  <!--TELECOMUNICACIONES-->
  <A name="vermas6"></A>
<div class="col-12 mt-4">
    <div class="card">
        <h2 class="ml-4">Alumnos en el laboratorio de Telecomunicaciones</h2>
        <div class="card-body">
            <div class="data-tables datatable-primary">
                <table class="text-center tablaES">
                    <thead class="text-capitalize" style="background-color: #7F8C8D">
                        <tr>
                            <th>#</th>
                            <th>Alumno</th>
                            <th>Laboratorio</th>
                            <th>fecha</th>
                            
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $item = null;
                        $valor = null;
                        // SE LLAMA AL LOS ALUMNOS QUE ESNTEN DENTRO DE ESESE ENCUENTRA EN EL ARCHIVO DE SUGERENCIAS.CONTROLADOR
                        $docentes = ControladorSugerencia::ctrMostrarHistorial($item, $valor);
                        $c = 0;
                        foreach ($docentes as $key => $value) {
                            if ($value["laboratorio"] == "Laboratorio de Telecomunicaciones") {
                                $c++;
                                echo '<tr>
                                        <td width="2%">' . $c . '</td>
                                        <td width="40%">' . $value["alumno"] . '</td>
                                        <td width="40%">' . $value["laboratorio"] . '</td>
                                        <td width="20%">' . $value["fecha"] . '</td>
                                        
                                     
                                       
                                        <td></td>
                                    </tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


  <!--DISEÑO-->
  <A name="vermas7"></A>
<div class="col-12 mt-4">
    <div class="card">
        <h2 class="ml-4">Alumnos en el laboratorio de Diseño</h2>
        <div class="card-body">
            <div class="data-tables datatable-primary">
                <table class="text-center tablaES">
                    <thead class="text-capitalize" style="background-color: #E74C3C">
                        <tr>
                            <th>#</th>
                            <th>Alumno</th>
                            <th>Laboratorio</th>
                            <th>fecha</th>
                            
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $item = null;
                        $valor = null;
                        // SE LLAMA AL LOS ALUMNOS QUE ESNTEN DENTRO DE ESESE ENCUENTRA EN EL ARCHIVO DE SUGERENCIAS.CONTROLADOR
                        $docentes = ControladorSugerencia::ctrMostrarHistorial($item, $valor);
                        $c = 0;
                        foreach ($docentes as $key => $value) {
                            if ($value["laboratorio"] == "Laboratorio de Diseño") {
                                $c++;
                                echo '<tr>
                                        <td width="2%">' . $c . '</td>
                                        <td width="40%">' . $value["alumno"] . '</td>
                                        <td width="40%">' . $value["laboratorio"] . '</td>
                                        <td width="20%">' . $value["fecha"] . '</td>
                                        
                                     
                                       
                                        <td></td>
                                    </tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>