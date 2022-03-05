<div class="container-fluid">
    <div class="row">
        <div class="py-5 col-12 col-sm col-lg-6 mx-auto">
            <!--Formulario de registro de visitas-->
            <form action="Registro" role="form" method="post" enctype="multipart/form-data" class="bg-white py-3 px-4">
              
                <h1 style="background-color: #007BFF; padding: 10px;color: white;" class=" text-center">Seleccionar el laboratorio</h1>
                <br><br>
                <div class="form-group">
                    <!-- <label for="exampleFormControlSelect1">Seleccionar el laboratorio</label> -->
                    <select title="Laboratorio" name="laboratorio" style="cursor: pointer; height: 40px;" class="form-control" aria-label="Default select example">
                        <option value="Laboratorio de Aplicaciones">Laboratorio de Aplicaciones</option>
                        <option value="Laboratorio de Sistemas Embebidos">Laboratorio de Sistemas Embebidos</option>
                        <option value="Laboratorio de Redes">Laboratorio de Redes</option>
                        <option value="Laboratorio de Programación">Laboratorio de Programación</option>
                        <option value="Laboratorio de Electrónica">Laboratorio de Electrónica</option>
                        <option value="Laboratorio de Telecomunicaciones">Laboratorio de Telecomunicaciones</option>
                        <option value="Laboratorio de Diseño">Laboratorio de Diseño</option>
                    </select>
                </div>


                <div class="form-group">
                    <!-- <label for="exampleFormControlSelect1">Seleccionar el laboratorio</label> -->
                    <select title="acceso" name="acceso" style="cursor: pointer; height: 40px;" class="form-control" aria-label="Default select example">
                        <option value="Entrada">Entrada</option>
                        <option value="Salida">Salida</option>
                    </select>
                </div>


                <div align="end">
                    <!-- <button type="reset" class="btn btn-danger">Cancelar</button> -->
                    <button type="submit" class="btn btn-primary">Siguente</button>
                </div>

            </form>
        </div>
    </div>
</div>



<div class="col-12 mt-3">
    <div class="card">
        <h2 class="ml-4">Historial de encuestas</h2>
        <br>
        <h6 class="ml-4">RI: Recusos Informaticos  A: Asesorias  FI: Formación Integral SA: Subdirección Academica</h6>
        <div class="card-body">
     
<?php 
        ?>
            <div class="data-tables datatable-primary">
                <table class="text-center tablaES">
                    <thead class="text-capitalize">
                        <tr>
                            <th>#</th> 
                            <th>Correo</th>
                            <th>Alumno</th>
                            <th>Carrera</th> 
                            <th>P RI1 </th>
                            <th>P RI2 </th>
                            <th>P RI3 </th>
                            <th>P RI4 </th>
                            <th>P RI5 </th>
                            <th>P RI6 </th>
                            <th>P RI7 </th>
                            <th>P A1 </th>
                            <th>P A2 </th>
                            <th>P A3 </th>
                            <th>P A4 </th>
                            <th>P FI1 </th>
                            <th>P FI2 </th>
                            <th>P FI3 </th>
                            <th>P SA1 </th>
                            <th>P SA2 </th>
                            <th>P SA3 </th>
                            <th>P SA4 </th>
                            <th>P SA5 </th>
                            <th>Realizada</th>
                            <th>fecha</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $item = null;
                        $valor = null;
                        // SE LLAMA AL HISTORIAL SE ENCUENTRA EN EL ARCHIVO DE SUGERENCIAS.CONTROLADOR
                        $docentes = ControladorSugerencia::ctrMostrarHistorial($item, $valor);
                        $c = 0;
                        foreach ($docentes as $key => $value) {
                            if ($value["nombre"] != "NA") {
                                $c++;
                                echo '<tr>
                                
                                        <td width="5%">' . $c . '</td> 
                                        <td width="5%">' . $value["correo"] . '</td>
                                        <td width="20%">' . $value["nombre"] . '</td>
                                        <td width="15%">' . $value["carrera"] . '</td>
                                        <td width="10%">' . $value["pri1"] . '</td>
                                        <td width="10%">' . $value["pri2"] . '</td>
                                        <td width="10%">' . $value["pri3"] . '</td>
                                        <td width="10%">' . $value["pri4"] . '</td>
                                        <td width="10%">' . $value["pri5"] . '</td>
                                        <td width="10%">' . $value["pri6"] . '</td>
                                        <td width="10%">' . $value["pri7"] . '</td>
                                        <td width="10%">' . $value["pa1"] . '</td>
                                        <td width="10%">' . $value["pa2"] . '</td>
                                        <td width="10%">' . $value["pa3"] . '</td>
                                        <td width="10%">' . $value["pa4"] . '</td>
                                        <td width="10%">' . $value["pfi1"] . '</td>
                                        <td width="10%">' . $value["pfi2"] . '</td>
                                        <td width="10%">' . $value["pfi3"] . '</td>
                                        <td width="10%">' . $value["psa1"] . '</td>
                                        <td width="10%">' . $value["psa2"] . '</td>
                                        <td width="10%">' . $value["psa3"] . '</td>
                                        <td width="10%">' . $value["psa4"] . '</td>
                                        <td width="10%">' . $value["psa5"] . '</td>
                                        <td width="10%">' . $value["realizada"] . '</td>
                                        <td width="10%">' . $value["fecha"] . '</td>
                                        
                                        
                                                      
                            
                                      
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

