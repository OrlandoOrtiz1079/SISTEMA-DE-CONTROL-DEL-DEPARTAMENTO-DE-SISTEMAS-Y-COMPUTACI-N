<h1 style="color: #F3F8FB; background-color:#F3F8FB;">43535</h1>

<div class="card mt-3">
    <div class="card-body">
        <h5><strong>PARTE IV: SOBRE TU OBJETIVOS</strong></h5>
        <br>

        <div class="form-group ">
            <p class="text-justify" for="prt4p1">¿Cuáles son tus próximos objetivos?</p>
            <input type="text" class="form-control" name="prt4p1" required>
        </div>

        <div class="form-group ">
            <p class="text-justify" for="prt4p2">¿Qué actividades vas a realizar para lograr tus objetivos inmediatos?</p>
            <input type="text" class="form-control" name="prt4p2" required>
        </div>

        <p>Actualmente, ¿tienes empleo relacionado con tu carrera?</p>
        <div class="form-check form-check-inline">
            <input required style="cursor: pointer;" class="form-check-input" type="radio" name="prt4p3" id="inlineRadio31_1" value="SI">
            <label style="cursor: pointer;" class="form-check-label" for="inlineRadio31_1">Sí</label>
        </div>
        <div class="form-check form-check-inline">
            <input required style="cursor: pointer;" class="form-check-input" type="radio" name="prt4p3" id="inlineRadio31_2" value="NO">
            <label style="cursor: pointer;" class="form-check-label" for="inlineRadio31_2">No</label>
        </div>
        <br><br>

        <div class="form-group ">
            <p class="text-justify" for="prt4p4" id="pprt4p4">En caso afirmativo, ¿en donde laboras?</p>
            <input type="text" class="form-control" name="prt4p4" id="prt4p4">
        </div>

        <p>Actualmente, ¿tienes oferta(s) laboral(es) relacionadas a tu carrera?</p>
        <div class="form-check form-check-inline">
            <input required style="cursor: pointer;" class="form-check-input" type="radio" name="prt4p5" id="inlineRadio32_1" value="SI">
            <label style="cursor: pointer;" class="form-check-label" for="inlineRadio32_1">Sí</label>
        </div>
        <div class="form-check form-check-inline">
            <input required style="cursor: pointer;" class="form-check-input" type="radio" name="prt4p5" id="inlineRadio32_2" value="NO">
            <label style="cursor: pointer;" class="form-check-label" for="inlineRadio32_2">No</label>
        </div>
        <br><br>

        <div class="form-group ">
            <p class="text-justify" for="prt4p6" id="pprt4p6">En caso afirmativo, ¿con cuál(es) empresa(s)?</p>
            <input type="text" class="form-control" name="prt4p6" id="prt4p6">
        </div>


        <div class="form-group ">
            <p class="text-justify" for="prt4p7">En tu proyecto de vida de largo plazo ¿cómo te gustaria desarrollarte profesionalmente (lider en la empresa, negocio propio, investigación, docencia, consultora, otros)? Especifica</p>
            <input type="text" class="form-control" name="prt4p7" required>
        </div>

        <div class="form-group ">
            <p class="text-justify" for="prt4p8">¿En qué ciudad(es) te gustaría trabajar?</p>
            <input type="text" class="form-control" name="prt4p8" required>
        </div>

        <p>¿Te gustaría estudiar algún posgrado?</p>
        <div class="form-check form-check-inline">
            <input required style="cursor: pointer;" class="form-check-input" type="radio" name="prt4p9" id="inlineRadio33_1" value="SI">
            <label style="cursor: pointer;" class="form-check-label" for="inlineRadio33_1">Sí</label>
        </div>
        <div class="form-check form-check-inline">
            <input required style="cursor: pointer;" class="form-check-input" type="radio" name="prt4p9" id="inlineRadio33_2" value="NO">
            <label style="cursor: pointer;" class="form-check-label" for="inlineRadio33_2">No</label>
        </div>
        <br><br>

        <div class="form-group ">
            <p class="text-justify" for="prt4p10" id="pprt4p10">En caso afirmativo espesifica.</p>
            <input type="text" class="form-control" name="prt4p10" id="prt4p10">
        </div>
    </div>
</div>


<script>
    var discountedd = document.getElementById('inlineRadio31_1');
    var no_discountedd = document.getElementById('inlineRadio31_2')
    var discount_percentagee = document.getElementById('prt4p4')
    var discount_percentageep = document.getElementById('pprt4p4');

    function updateStatus() {
        if (no_discountedd.checked) {
            discount_percentagee.hidden = true;
            discount_percentagee.required = false;
            discount_percentageep.hidden = true;
        } else {
            discount_percentagee.hidden = false;
            discount_percentagee.required = true;
            discount_percentageep.hidden = false;
        }
    }

    discountedd.addEventListener('change', updateStatus)
    no_discountedd.addEventListener('change', updateStatus)
</script>

<script>
    var discounted2 = document.getElementById('inlineRadio33_1');
    var no_discounted2 = document.getElementById('inlineRadio33_2');
    var discount_percentage2 = document.getElementById('prt4p10');
    var discount_percentagep2 = document.getElementById('pprt4p10');

    function updateStatus() {
        if (no_discounted2.checked) {
            discount_percentage2.hidden = true;
            discount_percentage2.required = false;
            discount_percentagep2.hidden = true;
        } else {
            discount_percentage2.hidden = false;
            discount_percentage2.required = true;
            discount_percentagep2.hidden = false;
        }
    }

    discounted2.addEventListener('change', updateStatus)
    no_discounted2.addEventListener('change', updateStatus)
</script>



<script>
    var discounted = document.getElementById('inlineRadio32_1');
    var no_discounted = document.getElementById('inlineRadio32_2')
    var discount_percentage = document.getElementById('prt4p6')
    var discount_percentagep = document.getElementById('pprt4p6');

    function updateStatus() {
        if (no_discounted.checked) {
            discount_percentage.hidden = true;
            discount_percentage.required = false;
            discount_percentagep.hidden = true;
        } else {
            discount_percentage.hidden = false;
            discount_percentage.required = true;
            discount_percentagep.hidden = false;
        }
    }

    discounted.addEventListener('change', updateStatus)
    no_discounted.addEventListener('change', updateStatus)
</script>