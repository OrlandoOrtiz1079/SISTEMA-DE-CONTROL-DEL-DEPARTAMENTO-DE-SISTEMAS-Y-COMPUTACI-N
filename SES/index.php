<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/alumnos.controlador.php";
require_once "controladores/tablaalumnos.controlador.php";
require_once "controladores/tablageneral.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/tablaalumnos.modelo.php";
require_once "modelos/tablageneral.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();