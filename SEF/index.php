<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/docentes.controlador.php";
require_once "controladores/jerarquia.controlador.php";
require_once "controladores/config.controlador.php";
require_once "controladores/inicio.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/docentes.modelo.php";
require_once "modelos/jerarquia.modelo.php";
require_once "modelos/config.modelo.php";
require_once "modelos/inicio.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();
