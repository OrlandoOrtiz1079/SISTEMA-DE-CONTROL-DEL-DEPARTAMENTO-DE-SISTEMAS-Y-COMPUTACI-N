
<div class="col-12 mt-3">
    <div class="card">
        <h2 class="ml-4">Historial de visitas</h2>
        <div class="card-body">
     
<?php 
        ?>
            <div class="data-tables datatable-primary">
                <table class="text-center tablaES">
                    <thead class="text-capitalize">
                        <tr>
                            <th>#</th> 
                            <th>No control</th>
                            <th>Alumno</th>
                            <th>Laboratorio</th>
                            <th>fecha</th>
                            <th>Hora En</th>   
                            <th>Carrera</th>  
                            <th>Acciones</th> 
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
                            if ($value["alumno"] != "NA") {
                                $c++;
                                echo '<tr>
                                
                                        <td width="5%">' . $c . '</td> 
                                        <td width="15%">' . $value["nocontrol"] . '</td>
                                        <td width="40%">' . $value["alumno"] . '</td>
                                        <td width="20%">' . $value["laboratorio"] . '</td>
                                        <td width="10%">' . $value["fecha"] . '</td>
                                        <td width="10%">' . $value["hora"] . '</td>
                                        <td width="10%">' . $value["carrera"] . '</td>
                                        <td>
                       


                                        <div class="btn-group">';

                                 if (isset($_SESSION['perfil']) && $_SESSION['perfil'] = "Administrador") {
                    echo '<button class="btn btn-danger  btnEliminarResidente" idResidenteelim="' . $value["id"] . '""><i class="fa fa-trash-alt"></i></button>';
                  
                   // se necesotan crear los controladores y un modelo $borrarDocente = new ControladorResidentes();
                  /// $borrarDocente->ctrBorrarResidente();
                }
                echo '
                
                        </div>
                       
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