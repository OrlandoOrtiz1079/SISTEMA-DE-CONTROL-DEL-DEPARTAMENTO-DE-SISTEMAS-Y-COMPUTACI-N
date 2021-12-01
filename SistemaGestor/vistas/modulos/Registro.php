<div style="padding-left: 15%; padding-right: 10%; padding-top: 10px;  width: 90%; ">

    <div class="modal-header  bg-primary text-white">
        <h5 class="modal-tittle">BUSQUEDA DE CONSTANCIAS</h5>
        <button type="button" class="close" data-dismiss="modal"><span></span></button>
    </div>

    <div style="  border-width: 2px; border-style: solid; border-color: black;">
        <form id="formulario" method="post" action="Tabla"><br>
            <div class="modal-body">
                <div class="box-body">
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Ingrese Numero de Control:</label>
                        <input class="form-control" type="text" name="txtNC" autocomplete="on" maxlength="8" minlength="8" autofocus placeholder="Numero de Control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                    </div>
                </div>

                <!--========== BOTON ==========-->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="Consultar" value="Consultar">Consultar</button>
                </div>

            </div>
        </form>


    </div>
</div>


