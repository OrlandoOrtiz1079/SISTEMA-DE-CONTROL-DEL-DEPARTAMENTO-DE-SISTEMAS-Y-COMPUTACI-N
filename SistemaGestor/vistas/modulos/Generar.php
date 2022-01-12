  <!--========== SECCION CONTENIDO ==========-->
  <div style="position: relative;" style="color: red;">
      <div style="width: 80%; position: absolute; top: 20px; left: 10%; ">

          <h2 style="background-color: #007BFF; padding: 10px;color: white;" class=" text-center">REGISTRO DE DATOS DEL ALUMNO</h2>

          <div style="  border-width: 1px; border-style: solid; border-color: black;">
              <form id="formulario" method="post" target="_blank" action="pdf/tesis/Genera.php">

                  <div class="modal-body">
                      <div class="box-body">
                          <!--========== ENTRADA PARA EL NOMBRE ==========-->
                          <div class="form-group">
                              <label for="example-text-input" class="col-form-label">Nombre(s):</label>
                              <input class="form-control" type="text" name="txtNombre" placeholder="Nombre's de Alumno" autocomplete="on" onkeyup="mayus(this);" required>
                          </div>

                          <!--========== ENTRADA PARA EL APELLIDO PATERNO ==========-->
                          <div class="form-group">
                              <label for="example-text-input" class="col-form-label">Apellido Paterno:</label>
                              <input class="form-control" type="text" name="txtAP" placeholder="Apellido Paterno" autocomplete="on" onkeyup="mayus(this);" required>
                          </div>

                          <!--========== ENTRADA PARA EL APELLIDO MATERNO ==========-->
                          <div class="form-group">
                              <label for="example-text-input" class="col-form-label">Apellido Materno:</label>
                              <input class="form-control" type="text" name="txtAM" placeholder="Apellido Materno" autocomplete="on" onkeyup="mayus(this);" required>
                          </div>

                          <!--========== ES ENTRADA O MUESTRA DE TABLA ==========-->
                          <input name="tabla_constancia" type="hidden" value="2" />

                          <!--========== ENTRADA PARA EL NUMERO DE CONTROL ==========-->
                          <div class="form-group">
                              <label for="example-text-input" class="col-form-label">Numero de Control:</label>
                              <input class="form-control" type="text" name="txtNC" placeholder="Numero de Control" maxlength="8" minlength="8" autocomplete="on" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                          </div>

                          <!--========== SELECCION DE LA CARRERA ==========-->
                          <div class="form-group">
                              <label class="col-form-label">Carrera:</label>
                              <select style="cursor: pointer;" class="custom-select" name="txtCarrera">
                                  <option value="INGENIERÍA EN SISTEMAS COMPUTACIONALES">ING. EN SISTEMAS COMPUTACIONALES</option>
                                  <option value="INGENIERÍA INFORMÁTICA">ING. INFORMÁTICA</option>
                                  <option value="INGENIERÍA INDUSTRIAL">ING. INDUSTRIAL</option>
                                  <option value="INGENIERÍA EN GESTIÓN EMPRESARIAL">ING. EN GESTIÓN EMPRESARIAL</option>
                                  <option value="CONTADOR PÚBLICO">CONTADOR PÚBLICO</option>
                              </select>
                          </div>

                          <!--========== SELECCION DE CREDITOS ==========-->
                          <div class="form-group">
                              <label class="col-form-label">Número de Creditos:</label>
                              <select style="cursor: pointer;" class="custom-select" name="txtNumCred">
                                  <option value="0.5">0.5</option>
                                  <option value="1" selected>1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                              </select>
                          </div>

                          <!--========== ENTRADA PARA EL VALOR NUMERICO ==========-->
                          <label for="example-text-input" class="col-form-label">Valor Numérico:</label><br>
                          <div class="form-check">
                              <input style="cursor: pointer; -webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;" class="form-check-input" type="radio" name="txtVal" id="flexRadioDefault1" value="4" checked>
                              <label style="cursor: pointer; -webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;" class="form-check-label" for="flexRadioDefault1">
                                  4 - Excelente
                              </label>
                          </div>

                          <div class="form-check">
                              <input style="cursor: pointer; -webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;" class="form-check-input" type="radio" name="txtVal" id="flexRadioDefault2" value="3">
                              <label style="cursor: pointer; -webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;" class="form-check-label" for="flexRadioDefault2">
                                  3 - Bueno
                              </label>
                          </div>

                          <div class="form-check">
                              <input style="cursor: pointer; -webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;" class="form-check-input" type="radio" name="txtVal" id="flexRadioDefault3" value="2">
                              <label style="cursor: pointer; -webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;" class="form-check-label" for="flexRadioDefault3">
                                  2 - Regular
                              </label>
                          </div>

                          <div class="form-check">
                              <input style="cursor: pointer; -webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;" class="form-check-input" type="radio" name="txtVal" id="flexRadioDefault4" value="1">
                              <label style="cursor: pointer; -webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;" class="form-check-label" for="flexRadioDefault4">
                                  1 - Deficiente
                              </label>
                          </div>

                          <!--========== ENTRADA PARA EL NOMBRE DEL EVENTO ==========-->
                          <div class="form-group">
                              <label for="example-text-input" class="col-form-label">Nombre del evento:</label>
                              <input class="form-control" type="text" name="txtEven" placeholder="Nombre del Evento" autocomplete="on" onkeyup="mayus(this);" required>
                          </div>

                          <!--========== ENTRADA PARA EL PERIODO ==========-->
                          <div class="form-group">
                              <label for="example-text-input" class="col-form-label">Periodo:</label>
                              <input class="form-control" type="text" name="txtPer" placeholder="Ciclo Escolar en que Realizo" autocomplete="on" onkeyup="mayus(this);" required>
                          </div>

                          <!--========== ENTRADA PARA DE EFECHA==========-->
                          <div class="form-group">
                              <label for="example-text-input" class="col-form-label">Fecha de Elaboracion:</label>
                              <br>
                              <input style="padding-left: 10px; cursor:pointer; height: 37px; outline: none; border-radius: 5px; border: 1px solid #dadada" type="date" id="fecha" name="fecha" required="">
                          </div>
                      </div>

                      <!--========== PIE DEL MODAL ==========-->

                  </div>
                  <div align="end" style="margin-right: 50px;">
                      <button type="reset" class="btn btn-danger"><i class="fa fa-trash"></i> Reset</button>
                      <button type="submit" name="Enviar" value="Enviar" class="btn btn-primary "><i class="fas fa-file-pdf "></i> Generar Constancia</button>
                  </div>
                  <br><br><br>
              </form>
          </div>
          <br></br>
      </div>
  </div>