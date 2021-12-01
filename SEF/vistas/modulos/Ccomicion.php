 <div class="container-fluid">
     <div class="py-5 col-14 col-sm col-lg-10 mx-auto">
         <div class="card">
             <h4 class="text-center py-3" style="background-color: #FFC107; color: white;"><b>CONSTANCIA DE COMISIONES ACADÉMICAS</b></h4>
             <div class="card-body">
                 <form action="pdf/tesis/comision.php" method="POST" target="_blank">
                     <div class="form-row">
                         <div class="form-group col-md-5">
                             <h6>Introduzca el numero de oficio:</h6>
                             <input style="height: 40px;" type="number" min="1" class="form-control" name="numof" value="1" title="Oficio" required>
                         </div>
                         <div class="form-group col-md-2">
                             <h6>Fecha:</h6>
                             <input style="padding-left: 9px; cursor: pointer; height: 40px; outline: none; border-radius: 5px; border: 1px solid #dadada" title="Fecha" type="date" id="fecha" name="fecha" required>
                         </div>
                         <div class="form-group col-md-5">
                             <h6>Nombre del(la) comisionado(a):</h6>
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
                     </div>
                     <div class="form-row">
                         <div class="form-group col-md-8">
                             <h6>Seleccione en caso de que el docente cuente con algun cargo</h6>
                             <select style="height: 40px; cursor: pointer;" id="nomdoc" class="form-control" name="cargo" title="Cargo">
                                 <?php
                                    $item = null;
                                    $valor = null;
                                    $docentes = ControladorJerarquia::ctrMostrarDocentesJerarquia($item, $valor);
                                    foreach ($docentes as $key => $value) {
                                        if ($value["nombre"] != "NA") {
                                            echo '<option>' . $value["cargo"] . '</option>';
                                        }
                                    }
                                    ?>
                             </select>
                         </div>
                         <div class="form-group col-md-4">
                             <h6>Seleccione la forma de traslado</h6>
                             <select style="cursor: pointer; height: 40px;" id="periodos" class="form-control" name="traslado" title="Traslado" required>
                                 <!-- <option aria-disabled="true"></option> -->
                                 <option>vehiculo oficial</option>
                                 <option>vehiculo particular</option>
                                 <option>avión</option>
                                 <option>autobús</option>
                                 <option> </option>
                             </select>
                         </div>
                     </div>
                     <div class="form-row">
                         <div class="form-group col-md-12">
                             <h6>Lugar:</h6>
                             <input type="text" class="form-control" name="lugar" title="Lugar" required>
                         </div>
                     </div>
                     <div class="form-row">
                         <div class="form-group col-md-12">
                             <h6>Objetivo de la comisión:</h6>
                             <textarea class="form-control" name="objetivo" title="Objetivo" required></textarea>
                         </div>
                     </div>
                     <br>
                     <h6><b>Fecha en la que se llevará a cabo:</b></h6>
                     <br>
                     <div class="form-row">
                         <div class="form-group col-md-3">
                             <h6>Día de la semana:</h6>
                             <select style="height: 40px; cursor: pointer;" class="form-control" name="diasem" title="Día de la semana" required>
                                 <!-- <option aria-disabled="true"></option> -->
                                 <option>lunes</option>
                                 <option>martes</option>
                                 <option>miércoles</option>
                                 <option>jueves</option>
                                 <option>viernes</option>
                             </select>
                         </div>
                         <div class="form-group col-md-2">
                             <h6>Día:</h6>
                             <select style="height: 40px;cursor: pointer;" class="form-control" name="dia" title="Día" required>
                                 <!-- <option aria-disabled="true"></option> -->
                                 <option>01</option>
                                 <option>02</option>
                                 <option>03</option>
                                 <option>04</option>
                                 <option>05</option>
                                 <option>06</option>
                                 <option>07</option>
                                 <option>08</option>
                                 <option>09</option>
                                 <option>10</option>
                                 <option>11</option>
                                 <option>12</option>
                                 <option>13</option>
                                 <option>14</option>
                                 <option>15</option>
                                 <option>16</option>
                                 <option>17</option>
                                 <option>18</option>
                                 <option>19</option>
                                 <option>20</option>
                                 <option>21</option>
                                 <option>22</option>
                                 <option>23</option>
                                 <option>24</option>
                                 <option>25</option>
                                 <option>26</option>
                                 <option>27</option>
                                 <option>28</option>
                                 <option>29</option>
                                 <option>30</option>
                                 <option>31</option>
                             </select>
                         </div>
                         <div class="form-group col-md-3">
                             <h6>Mes:</h6>
                             <select style="height: 40px;cursor: pointer;" class="form-control" name="mes2" title="Mes" require>
                                 <!-- <option aria-disabled="true"></option>-->
                                 <option>enero</option>
                                 <option>febrero</option>
                                 <option>marzo</option>
                                 <option>abril</option>
                                 <option>mayo</option>
                                 <option>junio</option>
                                 <option>julio</option>
                                 <option>agosto</option>
                                 <option>septiembre</option>
                                 <option>octubre</option>
                                 <option>noviembre</option>
                                 <option>diciembre</option>
                             </select>
                         </div>
                         <div class="form-group col-md-3">
                             <h6>Año:</h6>
                             <select style="height: 40px;cursor: pointer;" class="form-control" name="año" title="Año" required>
                                 <!-- <option aria-disabled="true"></option> -->
                                 <option>2019</option>
                                 <option>2020</option>
                                 <option>2021</option>
                                 <option>2022</option>
                                 <option>2023</option>
                                 <option>2024</option>
                                 <option>2025</option>
                             </select>
                         </div>
                     </div>
                     <div class="form-row">
                         <div class="form-group col-md-4">
                             <h6>Hora:</h6>
                             <input style="padding-left: 10px; cursor: pointer; height: 40px; outline: none; border-radius: 5px; border: 1px solid #dadada" type="time" name="hora" title="Hora" required>
                         </div>
                     </div>
                     <h6 style="background-color: #FFC107; color: white;" class="text-center py-2" width="50"><b>SOLICITUD DE VIÁTICOS Y PASAJE</b></h6>
                     
                     <br>

                     <h6 align="justify"><b>Solicita:</b></h6>
                     <div align="center">
                         <div class="form-check form-switch form-check-inline">
                             <input style="cursor: pointer;" class="form-check-input" name="checkbox2[]" value="2" type="checkbox" id="checkbox2">
                             <label style="cursor: pointer;" class="form-check-label" for="checkbox2">
                                 VIÁTICOS
                             </label>
                         </div>
                         <div class="form-check form-switch form-check-inline">
                             <input style="cursor: pointer;" class="form-check-input" name="checkbox3[]" value="2" type="checkbox" id="checkbox3">
                             <label style="cursor: pointer;" class="form-check-label" for="checkbox3">
                                 PAGO DE<br />COMBUSTIBLE
                             </label>
                         </div>
                         <div class="form-check form-switch form-check-inline">
                             <input style="cursor: pointer;" class="form-check-input" name="checkbox4[]" value="2" type="checkbox" id="checkbox4">
                             <label style="cursor: pointer;" class="form-check-label" for="checkbox4">
                                 PASAJE DE<br />AUTOBÚS
                             </label>
                         </div>
                         <div class="form-check form-switch form-check-inline">
                             <input style="cursor: pointer;" class="form-check-input" name="checkbox5[]" value="2" type="checkbox" id="checkbox5">
                             <label style="cursor: pointer;" class="form-check-label" for="checkbox5">
                                 PAGO DE<br />PEAJE
                             </label>
                         </div>
                         <div class="form-check form-switch form-check-inline">
                             <input style="cursor: pointer;" class="form-check-input" name="checkbox6[]" value="2" type="checkbox" id="checkbox6">
                             <label style="cursor: pointer;" class="form-check-label" for="checkbox6">
                                 BOLETO DE<br />AVIÓN
                             </label>
                         </div>
                     </div>
                     <br><br>
                     <div class="form-row">
                         <div class="form-group col-md-6">
                             <h6>Clave Presupuestal:</h6>
                             <input type="text" class="form-control" name="clavep" title="Clave" required>
                         </div>
                         <div class="form-group col-md-6">
                             <h6>R.F.C:</h6>
                             <input type="text" class="form-control" name="rfc" title="RFC" required>
                         </div>
                     </div>
                     <div class="form-row">
                         <div class="form-group col-md-12">
                             <h6>Puesto:</h6>
                             <input type="text" class="form-control" name="puesto" title="Puesto" required>
                         </div>
                     </div>
                     <div class="form-row">
                         <div class="form-group col-md-12">
                             <h6>Destino:</h6>
                             <input type="text" class="form-control" name="destino" title="Destino" required>
                         </div>
                     </div>

    
                   
                     <br><br>
                     <div align="end">
                         <a href="/" class="btn btn-danger"><i class="fas fa-window-close"></i> Cancelar</a>
                         <button type="submit" class="btn btn-warning" style="background-color: #FFC107; color: white;"><i class="fas fa-file-pdf"></i> Generar PDF</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>