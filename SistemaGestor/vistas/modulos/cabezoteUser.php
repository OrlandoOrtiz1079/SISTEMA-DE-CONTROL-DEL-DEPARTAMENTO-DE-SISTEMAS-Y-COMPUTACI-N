<!-- main header area start -->
<div class="mainheader-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-3 d-none d-md-block">
                <div class="logo">
                    <a href="Inicio"><img src="vistas/assets/images/icon/logo-1.svg" alt="logo"></a>
                    <a href="Inicio" class="ml-3"><img src="vistas/assets/images/icon/LogoDSC.svg" alt="logo"></a>
                </div>
            </div>
            <div class="col-12 d-block d-md-none pt-2 pb-2">
                <div class="col clearfix">
                    <div class="logo d-flex justify-content-center">
                        <a href="Inicio" class="m-2"><img src="vistas/assets/images/icon/logo-1.svg" alt="logo"></a>
                        <a href="Inicio"><img src="vistas/assets/images/icon/LogoDSC.svg" alt="logo"></a>
                    </div>
                </div>
            </div>
            <div class="col-md-9 clearfix text-right">
                <div class="clearfix d-md-inline-block d-block">
                    <div class="user-profile m-0">
                        <img class="avatar user-thumb" src="vistas/assets/images/author/avatar.png" alt="avatar">
                        <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['nombre']; ?> <i class="fa fa-angle-down"></i></h4>
                        <div class="dropdown-menu">
                            <a class="dropdown-item  btnEditarMiUsuario" idUsuario=" <?php echo $_SESSION["id"]; ?>" data-toggle="modal" data-target="#modalCambiarPassword" href="#">Cambiar Contraseña</a>
                            <a class="dropdown-item" href="CerrarSesion">Cerrar Sesion</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main header area end -->
<!-- header area start -->
<div class="header-area header-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12  d-none d-lg-block">
                <div class="horizontal-menu">
                    <nav>
                        <ul id="nav_menu">
                            <li>
                            <a href="Regresar"><i class="fas fa-reply fa-2x" style="color: #845ef7;"></i><span><strong>menu principal</strong></span></a>
                                <!-- fas fa-share-square -->
                                <!-- fas fa-reply -->
                            </li>
                            <li>
                                <a href="Inicio"><i class="fa fa-home fa-2x" style="color: #845ef7;"></i><span><strong>Inicio</strong></span></a>
                            </li>
                            <li>
                                <a href="Generar"><i class="fas fa-file-alt fa-2x" style="color: #845ef7;"></i><span><strong>Generar constancias</strong></span></a>
                            </li>
                            <li>
                                <a href="Registro"><i class="fas fa-file-pdf fa-2x" style="color: #845ef7;"></i><span><strong>Registro de constancias</strong></span></a>
                            </li>
                            <li>
                                <a href="CerrarSesion"><i class="fas fa-sign-out-alt fa-2x" style="color: #845ef7;"></i><span><strong>CerrarSesion</strong></span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- mobile_menu -->
            <div class="col-12 d-block d-lg-none">
                <div id="mobile_menu"></div>
            </div>
        </div>
    </div>
</div>
<!-- header area end -->
