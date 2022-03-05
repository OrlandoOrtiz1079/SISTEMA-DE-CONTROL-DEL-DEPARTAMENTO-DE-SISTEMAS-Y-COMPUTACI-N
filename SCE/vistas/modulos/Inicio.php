
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