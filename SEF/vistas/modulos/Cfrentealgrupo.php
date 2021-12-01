<div class="container-fluid">
    <div class="py-5 col-14 col-sm col-lg-10 mx-auto">
        <div class="card">
            <h4 style="background-color: #4336FB; color: white;" class="text-center py-3 "><b>CONSTANCIA DE LIBERACIÓN FRENTE A GRUPO</b></h4>
            <div class="card-body">
                <form action="pdf/tesis/asesor.php" method="POST" target="_blank">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <h6>Fecha</h6>
                            <input title="Fecha" style="padding-left: 10px; cursor: pointer; height: 40px; outline: none; border-radius: 5px; border: 1px solid #dadada" type="date" id="fecha" name="fecha" required>
                        </div>
                        <div class="form-group col-md-6">
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
                        <div class="form-group col-md-3">
                            <h6>Seleccione el periodo</h6>
                            <select style="height: 40px;  cursor: pointer;" title="Periodo" id="periodos" class="form-control" name="periodo" required>
                                <!-- <option aria-disabled="true"></option> -->
                                <option id="periodo1">Enero-Junio</option>
                                <option id="periodo2">Agosto-Diciembre</option>
                            </select>
                        </div>
                    </div>
                    <h5 align="justify"><b>A continuación se evaluara el cumplimiento de las actividades docentes:</b></h5>
                    <br>

                    <!-- --Pregunta 1-- -->
                    <h6 align="justify">1.-La elaboración y entrega de la dosificación de la planeación del curso y avance
                        programático de las materias impartidas.</h6>
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

                    <!-- --Pregunta 2-- -->
                    <h6 align="justify">2.-La elaboración y entrega de la instrumentación didáctica.</h6>
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

                    <!-- --Pregunta 3-- -->
                    <h6 align="justify">3.-El 100% del contenido de los programas de estudio.</h6>
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

                    <!-- --Pregunta 4-- -->
                    <h6 align="justify">4.-La entrega en tiempo y forma de calificaciones parciales y finales.</h6>
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

                    <!-- --Pregunta 5-- -->
                    <h6 align="justify">5.-La entrega en tiempo y forma del reporte final.</h6>
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

                    <!-- --Pregunta 6-- -->
                    <h6 align="justify">6.-La entrega del informe de los proyectos individuales / Horas de apoyo
                        a la docencia del programa de trabajo académico realizados en horas de apoyo a la docencia.
                        (Cumplimiento de las actividades declaradas como apoyo a la docencia en el formato).</h6>
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

                    <!-- --Pregunta 7-- -->
                    <h6 align="justify">7.-Entrega de índices de reprobación y deserción mensuales y finales.</h6>
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

                    <!-- --Pregunta Final-- -->
                    <h6 align="justify"><b>Se otorga liberación de actividades</b></h6>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox81" name="p8" value="SI">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox81">SI</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required style="cursor: pointer;" class="form-check-input" type="radio" id="inlineCheckbox82" name="p8" value="NO">
                        <label style="cursor: pointer;" class="form-check-label" for="inlineCheckbox82">NO</label>
                    </div>
                    <br><br>
                    <div align="end">
                        <a href="Inicio" class="btn btn-info" style="background-color: #0069D9; color: white;" title="Ver constancias"><i class="fas fa-file  fa-lg"></i> Ver constancias </a>
                        <a href="Cfrentealgrupo" class="btn btn-danger" title="Cancelar"><i class="fas fa-window-close"></i> Reset</a>
                        <button type="submit" class="btn btn-info" style="background-color: #0069D9; color: white;" title="Generar PDF"><i class="fas fa-file-pdf"></i> Generar PDF</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>