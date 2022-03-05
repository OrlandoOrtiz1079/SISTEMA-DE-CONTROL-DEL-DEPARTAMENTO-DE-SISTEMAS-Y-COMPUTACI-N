<div class="col-12 mt-3">
    <div class="card">
        <h2 class="ml-4">Lista de Sugerencias</h2>
        <div class="card-body">
            <!-- <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalAgregarJerarquia">Agregar Jerarquia</button> -->
            <div class="data-tables datatable-primary">
                <table class="text-center tablaES">
                    <thead class="text-capitalize">
                        <tr>
                            <th width="2%">#</th>
                            <th width="10%">Nombre</th>
                            <th width="20%">Recursos Informaticos</th>
                            <th width="20%">Asesorias</th>
                            <th width="20%">Formacion integral</th>
                            <th width="20%">Subdireccion Academica</th>
                            <th width="10%">Fecha</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $item = null;
                        $valor = null;
                        $docentes = ControladorSugerencia::ctrMostrarSugerencia($item, $valor);
                        $c = 0;
                        foreach ($docentes as $key => $value) {
                            if ($value["nombre"] != "NA") {
                                $c++;
                                echo '<tr>
                                        <td width="2%">' . $c . '</td>
                                        <td width="10%">' . $value["nombre"] . '</td>
                                        <td width="20%">' . $value["pri7"] . '</td>
                                        <td width="20%">' . $value["pa4"] . '</td>
                                        <td width="20%">' . $value["pfi3"] . '</td>
                                        <td width="20%">' . $value["psa5"] . '</td>
                                        <td width="10%">' . $value["fecha"] . '</td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-danger btnEliminarJerarquia" idJerarquia="' . $value["nombre"] . '"><i class="fa fa-times"></i></button>
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



<?php
$borrarJerarquia = new ControladorSugerencia();
$borrarJerarquia->ctrborrarSugerencia();
?>