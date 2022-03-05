<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SISTEMA CONTROL DE ACCESO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.js" integrity="sha512-CWVDkca3f3uAWgDNVzW+W4XJbiC3CH84P2aWZXj+DqI6PNbTzXbl1dIzEHeNJpYSn4B6U8miSZb/hCws7FnUZA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<!--=====================================
CUERPO DOCUMENTO
======================================-->

<body style="background-color: #F3F8FB;">

    <div id="preloader">
        <div class="loader"></div>
    </div>

    <?php
    if (isset($_SESSION['iniciarSesion']) && $_SESSION['iniciarSesion'] == "ok") {

        echo '<div class="horizontal-main-wrapper">';

        if (isset($_SESSION['perfil']) && $_SESSION['perfil'] == "Administrador") {
            include "modulos/cabezote.php";
            // echo $rutaM."modulos/cabezote.php";
        } 

        //MOSTRAR / OCULTAR EL SEGMENTO DE PRE-REGISTRO
        $cargarConfig = ControladorConfig::ctrCargarConfig("configPreRegistro");
        if ($cargarConfig["valor"] == "on") {
            $cargarPreRegistro = "Pre-Registro";
        } else {
            $cargarPreRegistro = "404";
        }

        // Usuario administrativo
        if (isset($_GET["ruta"]) && $_SESSION['perfil'] == "Administrador") {
            if (
                $_GET["ruta"] == "Regresar" ||
                $_GET["ruta"] == "Inicio" ||
                $_GET["ruta"] == "Reportes" ||
                $_GET["ruta"] == "Reporteencuestas" ||
                $_GET["ruta"] == "Sugerencias" ||
                $_GET["ruta"] == "Encuestainicio" ||
                $_GET["ruta"] == "Reportesanual" ||
                $_GET["ruta"] == "Preguntas" ||
                $_GET["ruta"] == "CargarRespuestas" ||
                $_GET["ruta"] == "reporteencuesta" ||
                $_GET["ruta"] == "laboratorios" ||
                $_GET["ruta"] == "Historial" ||
                $_GET["ruta"] == "Registro" ||
                $_GET["ruta"] == "CerrarSesion"
            ) {

                include "modulos/" . $_GET["ruta"] . ".php";
            } else {
                include "modulos/404.php";
            }
        }

        // Usuario Servicio
        if (isset($_GET["ruta"]) && $_SESSION['perfil'] == "Servicio") {
            if (
                $_GET["ruta"] == "Regresar" ||
                $_GET["ruta"] == "Inicio" ||
                $_GET["ruta"] == "Reportes" ||
                $_GET["ruta"] == "Reporteencuestas" ||
                $_GET["ruta"] == "Sugerencias" ||
                $_GET["ruta"] == "Encuestainicio" ||
                $_GET["ruta"] == "Reportesanual" ||
                $_GET["ruta"] == "Preguntas" ||
                $_GET["ruta"] == "CargarRespuestas" ||
                $_GET["ruta"] == "reporteencuesta" ||
                $_GET["ruta"] == "laboratorios" ||
                $_GET["ruta"] == "Historial" ||
                $_GET["ruta"] == "Registro" ||
                $_GET["ruta"] == "CerrarSesion"
            ) {

                include "modulos/" . $_GET["ruta"] . ".php";
            } else {
                include "modulos/404.php";
            }
        }
        // Usuario Servicio
        if (isset($_GET["ruta"]) && $_SESSION['perfil'] == "Laboratorio") {
            if (
                $_GET["ruta"] == "Regresar" ||
                $_GET["ruta"] == "Inicio" ||
                $_GET["ruta"] == "Reportes" ||
                $_GET["ruta"] == "Reporteencuestas" ||
                $_GET["ruta"] == "Sugerencias" ||
                $_GET["ruta"] == "Encuestainicio" ||
                $_GET["ruta"] == "Reportesanual" ||
                $_GET["ruta"] == "Preguntas" ||
                $_GET["ruta"] == "CargarRespuestas" ||
                $_GET["ruta"] == "reporteencuesta" ||
                $_GET["ruta"] == "laboratorios" ||
                $_GET["ruta"] == "Historial" ||
                $_GET["ruta"] == "Registro" ||
                $_GET["ruta"] == "CerrarSesion"
            ) {

                include "modulos/" . $_GET["ruta"] . ".php";
            } else {
                include "modulos/404.php";
            }
        }


        // // Usuario normal
        // if (isset($_GET["ruta"]) && $_SESSION['perfil'] != "Administrador") {
        //     if (
        //         $_GET["ruta"] == "Regresar" ||
        //         $_GET["ruta"] == "Inicio" ||
        //         $_GET["ruta"] == "Reporteencuesta" ||
        //         $_GET["ruta"] == "Directorio" ||
        //         $_GET["ruta"] == "Reportesanual" ||
        //         $_GET["ruta"] == "Historial" ||
        //         $_GET["ruta"] == "CerrarSesion"
        //     ) {

        //         include "modulos/" . $_GET["ruta"] . ".php";
        //     } else {
        //         include "modulos/404.php";
        //     }
        // }
        // if (!isset($_GET["ruta"])) {
        //     include "modulos/Inicio.php";
        // }

        include "modulos/footer.php";

        echo '</div>';
    } else {
        // include "modulos/login.php";
    }

    ?>


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
</body>

</html>