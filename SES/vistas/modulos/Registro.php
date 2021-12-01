<div class="container-fluid">
    <div class="row">
        <div class="py-5 col-12 col-sm col-lg-6 mx-auto">

            <!--Formulario de registro de visitas-->
            <form role="form" method="post" enctype="multipart/form-data" class="bg-white py-3 px-4">

                <h1 style="background-color: #007BFF; padding: 10px;color: white;" class=" text-center">Formulario de registro</h1>

                <br>
                <div class="form-floating mb-3">
                    <input onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="8" minlength="8" type="text" class="form-control" id="floatingInput" placeholder="Numero de control" autofocus required autocomplete="on" name="nocontrol">
                    <label for="floatingInput">Numero de control</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" onkeyup="mayus(this);" placeholder="Nombre" required name="nombre">
                    <label for="floatingInput">Nombre</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" onkeyup="mayus(this);" placeholder="Carrera"  required name="carrera">
                    <label for="floatingInput">Carrera</label>
                </div>


                <div align="end">
                    <button type="reset" class="btn btn-danger">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>

                <?php
                $crearRegistro = new ControladorAlumnos();
                $crearRegistro->ctrCrearAlumno();
                ?>


            </form>
        </div>
    </div>
</div>