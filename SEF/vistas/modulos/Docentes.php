<div style="margin-left: 10%; margin-right: 10%;">
    <div class="col-12 mt-3">
        <div class="card">
            <h2 class="ml-4">Docentes</h2>
            <div class="card-body">
                <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalAgregarDocente">Agregar Docente</button>
                <div class="data-tables datatable-primary">
                    <table class="text-center tablaES">
                        <thead class="text-capitalize">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $item = null;
                            $valor = null;
                            $docentes = ControladorDocentes::ctrMostrarDocentes($item, $valor);
                            foreach ($docentes as $key => $value) {
                                if ($value["nombre"] != "NA") {
                                    echo '<tr>
                                <td>' . $value["id"] . '</td>
                                        <td>' . $value["nombre"] . '</td>';
                                    if ($value["estado"] != 0) {
                                        echo '<td><button class="btn btn-success btn-xs btnActivarDocente" idDocente="' . $value["id"] . '" estadoDocente="0">Activado</button></td>';
                                    } else {
                                        echo '<td><button class="btn btn-danger btn-xs btnActivarDocente" idDocente="' . $value["id"] . '" estadoDocente="1">Desactivado</button></td>';
                                    }
                                    echo '<td></td>
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
MODAL AGREGAR DOCENTE
======================================-->
<div class="modal fade" id="modalAgregarDocente">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!--=====================================
              CABEZA DEL MODAL
              ======================================-->
            <div class="modal-header  bg-primary text-white">
                <h5 class="modal-tittle">Nuevo docente</h5>
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
                            <input class="form-control" type="text" name="nuevoNombre" placeholder="Ingresar nombre completo" autocomplete="off" required>
                        </div>
                        <!-- ENTRADA PARA RESIDENTES -->
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Estado</label>
                            <input class="form-control" type="number" name="estado" placeholder="1 Activado y 0 Desactivado" autocomplete="off" required>
                        </div>
                    </div>
                    <!--=====================================
                    PIE DEL MODAL
                    ======================================-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    <?php
                    $crearDocente = new ControladorDocentes();
                    $crearDocente->ctrCrearDocente();
                    ?>
                </div>
            </form>
        </div>
    </div>
</div>
?>