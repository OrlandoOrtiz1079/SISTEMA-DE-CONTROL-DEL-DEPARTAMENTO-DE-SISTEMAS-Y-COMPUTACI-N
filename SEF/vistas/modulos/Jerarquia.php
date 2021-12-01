<div style="margin-left: 10%; margin-right: 10%;">
    <div class="col-12 mt-3">
        <div class="card">
            <h2 class="ml-4">Jerarquia</h2>
            <div class="card-body">
                <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalAgregarJerarquia">Agregar Jerarquia</button>
                <div class="data-tables datatable-primary">
                    <table class="text-center tablaES">
                        <thead class="text-capitalize">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Cargo</th>
                                <th>Estado</th>
                                <th>Sexo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $item = null;
                            $valor = null;
                            $docentes = ControladorJerarquia::ctrMostrarDocentesJerarquia($item, $valor);
                            $c = 0;
                            foreach ($docentes as $key => $value) {
                                if ($value["nombre"] != "NA") {
                                    $c++;
                                    echo '<tr>
                                        <td>' . $c . '</td>';
                                    echo '<td>' . $value["nombre"] . '</td>';
                                    echo '<td>' . $value["cargo"] . '</td>';
                                    if ($value["estado"] != 0) {
                                        echo '  <td style="background-color: white;"><button style="background-color: rgb(16, 211, 58)" type="button" class="btn">Activo</button></td>';
                                    } else {
                                        echo '<td style="background-color: white;"><button style="background-color: rgb(238, 24, 24)" type="button" class="btn">Desactivado</button></td>';
                                    }
                                    echo '<td>' . $value["sexo"] . '</td>';

                                    echo '<td>
                                            <div class="btn-group">
                                                <button class="btn btn-warning btnEditarJerarquia" idJerarquia="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarJerarquia"><i class="fa fa-edit"></i></button>
                                                <button class="btn btn-danger btnEliminarJerarquia" idJerarquia="' . $value["id"] . '"><i class="fa fa-times"></i></button>
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
</div>



<!--=====================================
MODAL AGREGAR JERARQUIA
======================================-->
<div class="modal fade" id="modalAgregarJerarquia">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!--=====================================
              CABEZA DEL MODAL
              ======================================-->
            <div class="modal-header  bg-primary text-white">
                <h5 class="modal-tittle">Agregar Jerarquia</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form role="form" method="post" enctype="multipart/form-data">
                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <!-- ENTRADA PARA RESIDENTES -->
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Nombre</label>
                            <input class="form-control" type="text" name="nuevoNombreJ" placeholder="Ingresar nombre completo" autocomplete="on" required>
                        </div>
                    </div>
                    <!-- ENTRADA PARA EL NOMBRE -->
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Cargo</label>
                        <input class="form-control" type="text" name="nuevoCargoJ" placeholder="Ingresar cargo" autocomplete="on" required>
                    </div>
                    <!-- ENTRADA PARA ESTADO -->
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Estado</label>
                        <select style="cursor: pointer;" class="custom-select" name="estado" required>
                            <option value="">Selecionar Estado</option>
                            <option value="1">1</option>
                            <option value="0">0</option>
                        </select>
                    </div>
                    <!-- ENTRADA PARA EL GENERO -->
                    <label class="col-form-label">Sexo</label>
                    <select style="cursor: pointer;" class="custom-select" name="nuevoSexoJ" required>
                        <option value="">Selecionar Sexo</option>
                        <option value="F">Femenino</option>
                        <option value="M">Masculino</option>
                    </select>
                </div>
                <!--=====================================
                    PIE DEL MODAL
                    ======================================-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                <?php
                $crearDocente = new ControladorJerarquia();
                $crearDocente->ctrCrearDocente();
                ?>
        </div>
        </form>
    </div>
</div>
</div>
<?php
$borrarJerarquia = new ControladorJerarquia();
$borrarJerarquia->ctrborrarJerarquia();
?>

<!--=====================================
MODAL EDITAR JERARQUIA
======================================-->

<div class="modal fade" id="modalEditarJerarquia">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!--=====================================
              CABEZA DEL MODAL
              ======================================-->
            <div class="modal-header">
                <h5 class="modal-title">Editar Jerarquia</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
              CUERPO DEL MODAL
              ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <!-- ENTRADA PARA EL NOMBRE -->
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Nombre</label>
                            <input class="form-control" type="text" id="editarNombreJ" name="editarNombreJ" autocomplete="off" required>
                        </div>
                        <!-- ENTRADA PARA EL Jerarquia -->
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Cargo</label>
                            <input class="form-control" type="text" id="editarCargoJ" name="editarCargoJ" required>
                        </div>

                        <!-- ENTRADA PARA ESTADO -->
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Estado</label>
                            <select style="cursor: pointer;" class="custom-select" name="estado" required>
                                <option value="">Selecionar Estado</option>
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <!-- ENTRADA PARA EL GENERO -->
                            <label class="col-form-label">Sexo</label>
                            <select style="cursor: pointer;" class="custom-select" name="editarSexoJ" id="editarSexoJ" required>
                                <option value="">Selecionar Sexo</option>
                                <option value="F">Femenino</option>
                                <option value="M">Masculino</option>
                            </select>
                        </div>
                        <!-- ENTRADA PARA EL ID -->
                        <input type="hidden" id="idJerarquia" name="idJerarquia">
                    </div>
                    <!--=====================================
                    PIE DEL MODAL
                    ======================================-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                    <?php
                    $editarJerarquia = new ControladorJerarquia();
                    $editarJerarquia->ctrEditarJerarquia();
                    ?>
                </div>
            </form>
        </div>
    </div>
</div>