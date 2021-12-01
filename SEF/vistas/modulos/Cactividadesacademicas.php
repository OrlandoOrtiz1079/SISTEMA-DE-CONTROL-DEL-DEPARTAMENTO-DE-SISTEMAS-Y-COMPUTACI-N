<div class="container-fluid">
    <div class="py-5 col-14 col-sm col-lg-10 mx-auto">
        <div class="card">
            <h4 class="text-center py-3" style="background-color: #28A745; color: white;"><b>CONSTANCIA DE LIBERACIÓN DE ACTIVIDADES ACADÉMICAS</b></h4>
            <div class="card-body">
                <form action="pdf/tesis/liberacion.php" method="POST" target="_blank">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <h6>Lugar</h6>
                            <input style="cursor: not-allowed;" type="text" class="form-control" name="lugar" value="Iguala, Gro." disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <h6>Fecha</h6>
                            <input style="padding-left: 10px; cursor:pointer; height: 37px; outline: none; border-radius: 5px; border: 1px solid #dadada" type="date" id="fecha" name="fecha" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <h6>Selecciona al docente</h6>
                            <select style="height: 40px; cursor: pointer;" title="Docente" id="nomdoc" class="form-control" name="docente" required>
                                <?php
                                $item = null;
                                $valor = null;
                                $docentes = ControladorDocentes::ctrMostrarDocentes($item, $valor);
                                foreach ($docentes as $key => $value) {
                                    if ($value["nombre"] != "NA") {
                                        echo '<option>' . $value["nombre"] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <h6>Seleccione el periodo</h6>
                            <select style="cursor: pointer; height: 40px;" id="periodos" class="form-control" name="periodo" required>
                                <option id="periodo1">Enero-Junio</option>
                                <option id="periodo2">Agosto-Diciembre</option>
                            </select>
                        </div>
                    </div>
                    <h5 align="justify"><b>A continuación se evaluara el cumplimiento de las siguientes actividades académicas:</b></h5>

                    <!-- Pregunta 1  -->
                    <h6 align="justify">1.-Asistencia a reuniones convocadas.</h6>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox1" name="p1" value="SI">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox1">SI</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox2" name="p1" value="NO">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox2">NO</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox3" name="p1" value="N/A">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox3">N/A</label>
                    </div>
                    <br><br>


                    <!-- Pregunta 2  -->
                    <h6 align="justify">2.-Participación en programas de formación y actualización docente.</h6>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox21" name="p2" value="SI">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox21">SI</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox22" name="p2" value="NO">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox22">NO</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox23" name="p2" value="N/A">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox23">N/A</label>
                    </div>
                    <br><br>

                    <!-- Pregunta 3  -->
                    <h6 align="justify">3.-Asesorías en procesos de titulación integral encomendadas.</h6>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox31" name="p3" value="SI">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox31">SI</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox32" name="p3" value="NO">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox32">NO</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox33" name="p3" value="N/A">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox33">N/A</label>
                    </div>
                    <br><br>

                    <!-- Pregunta 4  -->
                    <h6 align="justify">4.-Propuestas de mejoras en la operación de programas y proyectos académicos.</h6>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox41" name="p4" value="SI">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox41">SI</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox42" name="p4" value="NO">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox42">NO</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox43" name="p4" value="N/A">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox43">N/A</label>
                    </div>
                    <br><br>

                    <!-- Pregunta 5  -->
                    <h6 align="justify">5.-Sinodales en protocolos de titulación.</h6>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox51" name="p5" value="SI">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox51">SI</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox52" name="p5" value="NO">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox52">NO</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox53" name="p5" value="N/A">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox53">N/A</label>
                    </div>
                    <br><br>

                    <!-- Pregunta 6  -->
                    <h6 align="justify">6.-Participación en eventos de la academia.</h6>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox61" name="p6" value="SI">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox61">SI</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox62" name="p6" value="NO">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox62">NO</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox63" name="p6" value="N/A">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox63">N/A</label>
                    </div>
                    <br><br>

                    <!-- Pregunta 7  -->
                    <h6 align="justify">7.-Contribución con propuestas de mejora en los planes y programas de estudio.</h6>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox71" name="p7" value="SI">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox71">SI</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox72" name="p7" value="NO">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox72">NO</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox73" name="p7" value="N/A">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox73">N/A</label>
                    </div>
                    <br><br>

                    <!-- Pregunta 8  -->
                    <h6 align="justify">8.-Desarrollo de materiales de apoyo didáctico.</h6>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox81" name="p8" value="SI">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox81">SI</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox82" name="p8" value="NO">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox82">NO</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox83" name="p8" value="N/A">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox83">N/A</label>
                    </div>
                    <br><br>

                    <!-- Pregunta 9  -->
                    <h6 align="justify">9.-Propuestas para bancos de proyectos.</h6>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox91" name="p9" value="SI">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox91">SI</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox92" name="p9" value="NO">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox92">NO</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox93" name="p9" value="N/A">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox93">N/A</label>
                    </div>
                    <br><br>

                    <!-- Pregunta 10  -->
                    <h6 align="justify">10.-Asesorías académicas.</h6>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox101" name="p10" value="SI">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox101">SI</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox102" name="p10" value="NO">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox102">NO</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox103" name="p10" value="N/A">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox103">N/A</label>
                    </div>
                    <br><br>

                    <!-- Pregunta 11  -->
                    <h6 align="justify">11.-Tutoría.</h6>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox111" name="p11" value="SI">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox111">SI</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox112" name="p11" value="NO">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox112">NO</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox113" name="p11" value="N/A">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox113">N/A</label>
                    </div>
                    <br><br>

                    <!-- Pregunta 12  -->
                    <h6 align="justify">12.-Participación en comisiones académicas (equivalencias, salida lateral, traslado,
                        acreditaciones, certificaciones, diseño especialidades, proyectos integradores, etc.).</h6>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox121" name="p12" value="SI">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox121">SI</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox122" name="p12" value="NO">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox122">NO</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox123" name="p12" value="N/A">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox123">N/A</label>
                    </div>
                    <br><br>

                    <!-- Pregunta 13  -->
                    <h6 align="justify">13.-Otros (especificar):</h6><input type="text" class="form-control" name="otros">
                    <div class="form-check form-check-inline">
                        <input style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox131" name="p13" value="SI">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox131">SI</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox132" name="p13" value="NO">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox132">NO</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox133" name="p13" value="N/A">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox133">N/A</label>
                    </div>
                    <br><br>

                    <!-- Pregunta Final  -->
                    <h6 align="justify"><b>¿Cumplió con las actividades académicas encomendadas al 100%?</b></h6>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox141" name="p14" value="SI">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox141">SI</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox142" name="p14" value="NO">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox142">NO</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox143" name="p14" value="N/A">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox143">N/A</label>
                    </div>
                    <br><br>
                    <div align="end">
                        <a href="Inicio" class="btn btn-success" style="background-color: #28A745; color: white;" title="Ver constancias"><i class="fas fa-file  fa-lg"></i> Ver constancias </a>
                        <a href="Cactividadesacademicas" class="btn btn-danger"><i class="fas fa-window-close"></i> Reset</a>
                        <button type="submit" class="btn btn-success" style="background-color: #28A745; color: white;" title="Generar PDF"><i class="fas fa-file-pdf"></i> Generar PDF</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>