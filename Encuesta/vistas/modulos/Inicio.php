<div class="container-fluid">
    <div class="row">
        <div class="py-5 col-12 col-sm col-lg-6 mx-auto">
            <form class="bg-white py-3 px-4" action="Preguntas" method="POST">
                <h1 class=" text-center">Iniciar encuesta</h1>
                <div class="form-group">
                    <label for="nocontrol">Numero de control</label>
                    <input onkeypress="return event.charCode > 47 && event.charCode < 58;" pattern="[0-9]{8}" maxlength="8" type="text" class="form-control" name="control" placeholder="Numero de control" autofocus required autocomplete="on">
                </div>
                <center>
                    <button type="submit" class="btn btn-primary">Realizar Encuesta</button>
                </center>
            </form>
        </div>
    </div>
</div>