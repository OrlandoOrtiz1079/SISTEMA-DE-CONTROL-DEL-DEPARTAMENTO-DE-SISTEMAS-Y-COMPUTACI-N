<div class="col-12 mt-3">
    <div class="card">
        <h2 class="ml-4">Historial de visitas</h2>
        <div class="card-body">
            <div class="data-tables datatable-primary">
                <table class="text-center tablaES">
                    <thead class="text-capitalize">
                        <tr>
                            <th>#</th>
                            <th>Alumno</th>
                            <th>Laboratorio</th>
                            <th>fecha</th>
                            <th>Hora</th>
                            <th></th>

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
                                        <td width="2%">' . $c . '</td>
                                        <td width="40%">' . $value["alumno"] . '</td>
                                        <td width="40%">' . $value["laboratorio"] . '</td>
                                        <td width="20%">' . $value["fecha"] . '</td>
                                        <td width="18%">' . $value["hora"] . '</td>
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