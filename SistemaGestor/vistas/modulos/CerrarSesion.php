<?php

$_SESSION["iniciarSesion"] = "";
$_SESSION["id"] = "";
$_SESSION["nombre"] = "";
$_SESSION["usuario"] = "";
$_SESSION["perfil"] = "";
$_SESSION["estado"] = "";

session_destroy();
$_SESSION = array();

echo '<script> window.location = "../index.php"; </script>';
?>
<script>
    function preventBack() {
      window.history.forward();
    }
    setTimeout("preventBack()", 0);
    window.onunload = function() {
      null
    };
  </script>