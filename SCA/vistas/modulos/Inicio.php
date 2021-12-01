<div>
    <div class="container-fluid">
        <div class="row">
            <div style="padding-left: 2%;" class="py-5 col-12 col-sm col-lg-12 mx-auto">
                <!--Formulario de registro de visitas-->

                <form class="bg-white py-3 px-4" method="POST">
                    <h1 style="background-color: #007BFF; padding: 10px;color: white;" class=" text-center">Formulario de registro de visitas</h1>
                    <br>
                    <div class="form-group">
                        <label for="nocontrol">Numero de control</label>
                        <input onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="8" minlength="8" type="text" class="form-control" name="nocontrol" placeholder="Escribe tu numero de control" autofocus autocomplete="on" required title="Numero de control">
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Seleccionar el laboratorio</label>
                        <select title="Laboratorio" name="laboratorio" style="cursor: pointer; height: 40px;" class="form-control" aria-label="Default select example">
                            <option value="Laboratorio de Aplicaciones">Laboratorio de Aplicaciones</option>
                            <option value="Laboratorio de Sistemas Embebidos">Laboratorio de Sistemas Embebidos</option>
                            <option value="Laboratorio de Redes">Laboratorio de Redes</option>
                            <option value="Laboratorio de Programación">Laboratorio de Programación</option>
                            <option value="Laboratorio de Electrónica">Laboratorio de Electrónica</option>
                            <option value="Laboratorio de Telecomunicaciones">Laboratorio de Telecomunicaciones</option>
                            <option value="Laboratorio de Diseño">Laboratorio de Diseño</option>
                        </select>
                    </div>

                    <div align="end">
                        <button type="reset" class="btn btn-danger">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                    <?php
                    $crearRegistro = new ControladorRegistro();
                    $crearRegistro->ctrCrearRegistro();
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>