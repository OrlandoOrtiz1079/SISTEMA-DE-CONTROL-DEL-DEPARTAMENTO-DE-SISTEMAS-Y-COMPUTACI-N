<?php
 //Diferntes formas de retornar la direccion del servidor
//$ruta = str_replace($_SERVER['DOCUMENT_ROOT'], '', dirname($_SERVER['SCRIPT_FILENAME'])) . "/";
//$ruta = "http://localhost/sdr/";
//$ruta = "C:laragon/www/SDR/";
require_once "controladores/plantilla.controlador.php";
require_once "controladores/alumnos.controlador.php";
require_once "controladores/tablaalumnos.controlador.php";
require_once "controladores/tablageneral.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/tablaalumnos.modelo.php";
require_once "modelos/tablageneral.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();