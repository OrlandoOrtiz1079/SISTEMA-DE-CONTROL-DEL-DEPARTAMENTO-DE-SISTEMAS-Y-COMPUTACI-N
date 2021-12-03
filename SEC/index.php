<?php
require_once "controladores/plantilla.controlador.php";
require_once "controladores/registro.controlador.php";
require_once "controladores/preguntas.controlador.php";
require_once "controladores/config.controlador.php";

require_once "modelos/registro.modelo.php";
require_once "modelos/preguntas.modelo.php";
require_once "modelos/config.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();