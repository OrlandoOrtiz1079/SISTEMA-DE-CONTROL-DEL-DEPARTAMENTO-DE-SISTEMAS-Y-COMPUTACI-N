<div class="col-12 mt-1">
    <div class="card">

        <!--Formulario consulta reporte-->
        <form class="py-3 px-4" action="reporteencuesta" method="POST">
        <h1 style="background-color: #007BFF; padding: 10px;color: white;" class=" text-center">Reporte de encuestas</h1>
        <br>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Seleccionar la seccion a consultar</label>
                <select style="cursor: pointer; height: 40px;" class="form-control" id="example" name="sección">
                    <option value="Recursos Informáticos">Recursos Informáticos</option>
                    <option value="Asesorías">Asesorías</option>
                    <option value="Formación Integral">Formación Integral</option>
                    <option value="Subdirección Académica">Subdirección Académica</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Seleccionar el mes o semestre</label>
                <select style="cursor: pointer; height: 40px;" class="form-control" id="example" name="periodo">
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
            </div>
            <div class="form-group">
                <label for="nombre">Introducir año</label>
                <input type="text" class="form-control" name="año" placeholder="Teclear el año" required maxlength="4">
            </div>

            <button type="submit" class="btn btn-primary">Generar reporte</button>

        </form>
    </div>

</div>
