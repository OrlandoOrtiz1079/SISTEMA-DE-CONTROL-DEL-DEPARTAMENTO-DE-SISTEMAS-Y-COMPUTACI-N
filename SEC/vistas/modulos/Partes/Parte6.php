<h1 style="color: #F3F8FB; background-color:#F3F8FB;">CAPACITACIÓN CONTÍNUA</h1>

<div class="card mt-3">
    <div class="card-body">
        <h5><strong>PARTE VI: SOBRE LA CAPACITACIÓN CONTÍNUA</strong></h5>
        <br>

        <p>¿Consideras importante capacitarte continuamente?</p>
        <div class="form-check form-check-inline">
            <input required style="cursor: pointer;" class="form-check-input" type="radio" name="prt6p1" id="inlineRadio6_1" value="SI">
            <label style="cursor: pointer;" class="form-check-label" for="inlineRadio6_1">Sí</label>
        </div>
        <div class="form-check form-check-inline">
            <input required style="cursor: pointer;" class="form-check-input" type="radio" name="prt6p1" id="inlineRadio6_2" value="NO">
            <label style="cursor: pointer;" class="form-check-label" for="inlineRadio6_2">No</label>
        </div>
        <div class="form-check form-check-inline">
            <input required style="cursor: pointer;" class="form-check-input" type="radio" name="prt6p1" id="inlineRadio6_3" value="Parcialmente">
            <label style="cursor: pointer;" class="form-check-label" for="inlineRadio6_3">Parcialmente</label>
        </div>
        <br><br>

        <div class="form-group ">
            <p for="prt6p2">¿Por qué? </p>
            <input type="text" class="form-control" name="prt6p2" required>
        </div>

        <div class="form-group ">
            <p for="prt6p3" id="pprt6p3">En caso afirmativo, ¿en qué temas o conocimientos crees que debas actualizarte?</p>
            <input type="text" class="form-control" name="prt6p3" id="prt6p3" >
        </div>

    </div>
</div>

<script>
    var discounted3 = document.getElementById('inlineRadio6_1');
    var no_discounted3 = document.getElementById('inlineRadio6_2');
    var Parcialmente = document.getElementById('inlineRadio6_3');
    var discount_percentage3 = document.getElementById('prt6p3');
    var discount_percentagep3 = document.getElementById('pprt6p3');

    function updateStatus() {
        if (no_discounted3.checked) {
            discount_percentage3.hidden = true;
            discount_percentage3.required = false;
            discount_percentagep3.hidden = true;

        } else if (Parcialmente.checked) {
            discount_percentage3.hidden = true;
            discount_percentage3.required = false;
            discount_percentagep3.hidden = true;

        } else {
            discount_percentage3.hidden = false;
            discount_percentage3.required = true;
            discount_percentagep3.hidden = false;
        }
    }

    discounted3.addEventListener('change', updateStatus);
    no_discounted3.addEventListener('change', updateStatus);
    Parcialmente.addEventListener('change', updateStatus);
</script>