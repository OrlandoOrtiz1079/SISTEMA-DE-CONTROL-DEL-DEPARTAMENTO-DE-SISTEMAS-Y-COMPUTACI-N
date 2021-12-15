<div class="container-fluid">
    <div class="row">
        <div class="py-5 col-12 col-sm col-lg-6 mx-auto">
            <!--Formulario de registro de visitas-->
            <form action="Registro" role="form" method="post" enctype="multipart/form-data" class="bg-white py-3 px-4">
              
                <h1 style="background-color: #007BFF; padding: 10px;color: white;" class=" text-center">Seleccionar el laboratorio</h1>
                <br><br>
                <div class="form-group">
                    <!-- <label for="exampleFormControlSelect1">Seleccionar el laboratorio</label> -->
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


                <div class="form-group">
                    <!-- <label for="exampleFormControlSelect1">Seleccionar el laboratorio</label> -->
                    <select title="acceso" name="acceso" style="cursor: pointer; height: 40px;" class="form-control" aria-label="Default select example">
                        <option value="Entrada">Entrada</option>
                        <option value="Salida">Salida</option>
                    </select>
                </div>


                <div align="end">
                    <!-- <button type="reset" class="btn btn-danger">Cancelar</button> -->
                    <button type="submit" class="btn btn-primary">Siguente</button>
                </div>

            </form>
        </div>
    </div>
</div>