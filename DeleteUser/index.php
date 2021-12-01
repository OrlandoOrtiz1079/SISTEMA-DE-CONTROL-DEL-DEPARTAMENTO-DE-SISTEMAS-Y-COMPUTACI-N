<?php
require_once "controladores/usuarios.controlador.php";
require_once "modelos/usuarios.modelo.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuarios</title>

    <link rel="shortcut icon" href="vistas/assets/images/icon/favicon.ico" type="image/x-icon">
    <!-- <link href="../assets/951c7ac5/css/bootstrap.css" rel="stylesheet" /> -->
    <link href="../assets/ce6448b4/css/strength-meter.min.css" rel="stylesheet" />
    <link href="../assets/ef7a4106/css/kv-widgets.min.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/responsive.css" rel="stylesheet" />
    <link href="../assets/css/tecnm.css" rel="stylesheet" />
    <link href="../assets/css/tecnm_responsive.css" rel="stylesheet" />
    <link href="../assets/css/cat.css" rel="stylesheet" />
    <link href="https: //cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="vistas/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="vistas/assets/css/Font-Awesome.css">
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
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    if (isset($_SESSION['iniciarSesion']) && $_SESSION['iniciarSesion'] == "ok") {
        include "vistas/modulos/cabezote.php";
        include "vistas/modulos/modaluser.php";
        include "vistas/modulos/footer.php";
    } else {
        echo '<script> window.location="../index.php";</script>';
    }
    ?>

    <script src="vistas/assets/js/vendor/jquery-3.4.0.min.js"></script>
    <!-- switch bootstrap -->
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
    <script src="vistas/assets/js/usuarios.js"></script>
    <script src="vistas/assets/js/plugins.js"></script>
    <script src="vistas/assets/js/table.js"></script>
</body>

</html>