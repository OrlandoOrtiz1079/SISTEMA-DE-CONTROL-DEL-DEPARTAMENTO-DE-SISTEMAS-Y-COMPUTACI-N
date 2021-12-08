<?php
require_once "controladores/plantilla.controlador.php";
require_once "controladores/jerarquia.controlador.php";

require_once "modelos/jerarquia.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();
