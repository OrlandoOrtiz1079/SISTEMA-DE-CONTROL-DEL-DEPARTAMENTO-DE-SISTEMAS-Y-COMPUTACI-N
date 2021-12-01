<?php

$_SESSION["iniciarSesion"] = "";
$_SESSION["id"] = "";
$_SESSION["nombre"] = "";
$_SESSION["usuario"] = "";
$_SESSION["perfil"] = "";
$_SESSION["estado"] = "";

session_destroy();
$_SESSION = array();

echo '<script> location.href="../index.php"; </script>';
