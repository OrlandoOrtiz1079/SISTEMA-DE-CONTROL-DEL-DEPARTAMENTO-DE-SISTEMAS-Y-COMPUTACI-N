<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SISTEMA DE CONTROL DE E/S</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="vistas/assets/images/icon/favicon.ico">
    <!-- <link rel="stylesheet" href="vistas/assets/css/switch-bootstrap4-toggle.min.css"> -->
    <link rel="stylesheet" href="vistas/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="vistas/assets/css/swichtCSS.css">
    <!-- <link rel="stylesheet" href="vistas/assets/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="vistas/assets/css/Font-Awesome.css">
    <link rel="stylesheet" href="vistas/assets/css/themify-icons.css">
    <link rel="stylesheet" href="vistas/assets/css/metisMenu.css">
    <link rel="stylesheet" href="vistas/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="vistas/assets/css/slicknav.min.css">
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="vistas/assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="vistas/assets/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vistas/assets/css/responsive.jqueryui.min.css">
    <link rel="stylesheet" type="text/css" href="vistas/assets/css/jquery.dataTables.css">
    <!-- others css -->
    <link rel="stylesheet" href="vistas/assets/css/typography.css">
    <link rel="stylesheet" href="vistas/assets/css/default-css.css">
    <link rel="stylesheet" href="vistas/assets/css/styles.css">
    <link rel="stylesheet" href="vistas/assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="vistas/assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- sweetalert2 -->
    <script src="vistas/assets/js/sweetalert2.all.min.js"></script>
    <!-- Bootstrap CSS -->

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        function mayus(e) {
            e.value = e.value.toUpperCase();
        }
    </script>

</head>

<!--=====================================
CUERPO DOCUMENTO
======================================-->

<body style="background-color: #F3F8FB">
    <?php
    if (isset($_SESSION['iniciarSesion']) && $_SESSION['iniciarSesion'] == "ok") {
    } else {
        echo '<script> window.location="../index.php";</script>';
    }
    ?>

    <div id="preloader">
        <div class="loader"></div>
    </div>

    <?php
    echo '<div class="horizontal-main-wrapper">';
    include "modulos/cabezote.php";

    if (isset($_GET["ruta"])) {
        if (
            $_GET["ruta"] == "Inicio" ||
            $_GET["ruta"] == "Registro" ||
            $_GET["ruta"] == "Accesos" ||
            $_GET["ruta"] == "Accesogeneral" ||
            $_GET["ruta"] == "CerrarSesion" ||
            $_GET["ruta"] == "Regresar"
        ) {

            require "modulos/" . $_GET["ruta"] . ".php";
        } else {
            include "modulos/404.php";
        }
    }
    if (!isset($_GET["ruta"])) {
        include "modulos/Inicio.php";
    }
    include "modulos/footer.php";

    echo '</div>';


    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <!-- jquery latest version -->
    <!-- <script src="vistas/assets/js/vendor/jquery-2.2.4.min.js"></script> -->
    <script src="vistas/assets/js/vendor/jquery-3.4.0.min.js"></script>
    <!-- switch bootstrap -->
    <!-- <script src="vistas/assets/js/switch-bootstrap4-toggle.min.js"></script> -->
    <!-- bootstrap 4 js -->
    <script src="vistas/assets/js/popper.min.js"></script>
    <script src="vistas/assets/js/bootstrap.min.js"></script>
    <script src="vistas/assets/js/owl.carousel.min.js"></script>
    <script src="vistas/assets/js/metisMenu.min.js"></script>
    <script src="vistas/assets/js/jquery.slimscroll.min.js"></script>
    <script src="vistas/assets/js/jquery.slicknav.min.js"></script>
    <script src="vistas/assets/js/Chart.min.js"></script>
    <script src="vistas/assets/js/chartInicio.js"></script>

    <!-- Start datatable js -->
    <script src="vistas/assets/js/jquery.dataTables.js"></script>
    <script src="vistas/assets/js/jquery.dataTables.min.js"></script>
    <script src="vistas/assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="vistas/assets/js/dataTables.responsive.min.js"></script>
    <script src="vistas/assets/js/responsive.bootstrap.min.js"></script>

    <!-- others plugins -->
    <script src="vistas/assets/js/jerarquia.js"></script>
    <script src="vistas/assets/js/configSDR.js"></script>
    <script src="vistas/assets/js/pre-registro.js"></script>
    <script src="vistas/assets/js/directorio.js"></script>
    <script src="vistas/assets/js/docentes.js"></script>
    <script src="vistas/assets/js/residentes.js"></script>
    <script src="vistas/assets/js/usuarios.js"></script>
    <script src="vistas/assets/js/plugins.js"></script>
    <script src="vistas/assets/js/scripts.js"></script>
    <script src="vistas/assets/js/table.js"></script>
    <script>
        function preventBack() {
            window.history.forward();
        }
        setTimeout("preventBack()", 0);
        window.onunload = function() {
            null
        };
    </script>
</body>

</html>