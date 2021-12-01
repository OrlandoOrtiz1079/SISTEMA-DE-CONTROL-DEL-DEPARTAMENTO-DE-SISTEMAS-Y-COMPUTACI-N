<?php
require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/residentes.controlador.php";
require_once "controladores/registro.controlador.php";
require_once "controladores/sugerencia.controlador.php";
require_once "controladores/preguntas.controlador.php";
require_once "controladores/config.controlador.php";
require_once "controladores/inicio.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/residentes.modelo.php";
require_once "modelos/registro.modelo.php";
require_once "modelos/sugerencia.modelo.php";
require_once "modelos/preguntas.modelo.php";
require_once "modelos/config.modelo.php";
require_once "modelos/inicio.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();