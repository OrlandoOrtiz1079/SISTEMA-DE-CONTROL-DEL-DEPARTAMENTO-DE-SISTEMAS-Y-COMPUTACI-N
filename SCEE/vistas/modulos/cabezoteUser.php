<!-- main header area start -->
<div class="mainheader-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-3 d-none d-md-block">
                <div class="logo">
                    <a href="Inicio"><img src="vistas/assets/images/icon/logo.png" alt="logo"></a>
                    <a href="Inicio" class="ml-3"><img src="vistas/assets/images/icon/LogoDSC.svg" alt="logo"></a>
                </div>
            </div>
            <div class="col-12 d-block d-md-none pt-2 pb-2">
                <div class="col clearfix">
                    <div class="logo d-flex justify-content-center">
                        <a href="Inicio" class="m-2"><img src="vistas/assets/images/icon/logo.png" alt="logo"></a>
                        <a href="Inicio"><img src="vistas/assets/images/icon/LogoDSC.svg" alt="logo"></a>
                    </div>
                </div>
            </div>
            <div class="col-md-9 clearfix text-right">
                <div class="clearfix d-md-inline-block d-block">
                    <div class="user-profile m-0">
                        <img class="avatar user-thumb" src="vistas/assets/images/author/avatar.png" alt="avatar">
                        <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['nombre']; ?>
                            <i class="fa fa-angle-down"></i>
                        </h4>
                        <div class="dropdown-menu">
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
                                <a href="Inicio"><i class="fa fa-address-card fa-2x" style="color: #845ef7;"></i><span><strong>Registro</strong></span></a>
                            </li>
                            <li>
                                <a href="Reporteencuesta"><i class="fa fa-users fa-2x" style="color: #845ef7;"></i><span><strong>Residentes</strong></span></a>
                            </li>
                            <li>
                                <a href="Sugerencias"><i class="fa fa-comments fa-2x" style="color: #845ef7;"></i><span><strong> sugerencias</strong></span></a>
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

<!--=====================================
MODAL EDITAR USUARIO
======================================-->
<div class="modal fade" id="modalCambiarPassword">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!--=====================================
            CABEZA DEL MODAL
            ======================================-->
            <div class="modal-header">
                <h5 class="modal-title">Cambiar Contraseña</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form role="form" method="post" enctype="multipart/form-data">
                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <!-- ENTRADA PARA EL NOMBRE -->
                        <input type="hidden" id="editarMiNombre" name="editarMiNombre">
                        <!-- ENTRADA PARA EL USUARIO -->
                        <input type="hidden" id="editarMiUsuario" name="editarMiUsuario">
                        <!-- ENTRADA PARA LA CONTRASEÑA -->
                        <div class="form-group">
                            <label class="">Contraseña</label>
                            <input type="password" class="form-control editarComprobarMiPassword" name="editarMiPassword" id="editarMiPassword" placeholder="Escriba la nueva contraseña">
                            <input type="hidden" id="miPasswordActual" name="miPasswordActual">
                        </div>
                        <!-- ENTRADA PARA CONFIRMAR CONTRASEÑA -->
                        <div class="form-group">
                            <label class="">Confirmar La Contraseña</label>
                            <input type="password" class="form-control editarComprobarMiPassword" name="confirmarMiPassword" id="editarConfirmarMiPassword" placeholder="Confirme La contraseña">
                        </div>
                        <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->
                        <input type="hidden" id="editarMiPerfil" name="editarMiPerfil">
                    </div>
                    <!--=====================================
                    PIE DEL MODAL
                    ======================================-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                        <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
                    </div>
                    <?php
                    $editarUsuario = new ControladorUsuarios();
                    $editarUsuario->ctrEditarUsuario("editarMiUsuario", "editarMiNombre", "editarMiPassword", "confirmarMiPassword", "miPasswordActual", "editarMiPerfil");
                    ?>
                </div>
            </form>
        </div>
    </div>
</div>