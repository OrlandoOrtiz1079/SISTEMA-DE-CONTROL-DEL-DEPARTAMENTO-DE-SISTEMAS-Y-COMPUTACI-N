<!-- main header area start -->
<div class="mainheader-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-3 d-none d-md-block">
                <div class="logo">


                    <a><img src="../assets/images/logos/TecNM_logo.png" alt="logo"></a>
                    <a class="ml-3"><img src="../assets/images/logoR.png" alt="logo"></a>
                </div>
            </div>
            <div class="col-12 d-block d-md-none pt-2 pb-2">
                <div class="col clearfix">
                    <div class="logo d-flex justify-content-center">
                        <a class="m-2"><img src="../assets/images/logos/TecNM_logo.png" alt="logo"></a>
                        <a><img src="../assets/images/logoR.png" alt="logo"></a>
                    </div>
                </div>
            </div>
            <div class="col-md-9 clearfix text-right">
                <div class="clearfix d-md-inline-block d-block">
                    <div class="user-profile m-0">
                        <img class="avatar user-thumb" src="../assets/images/logos/avatar.png" alt="avatar">
                        <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['nombre']; ?> <i class="fa fa-angle-down"></i></h4>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="Regresar">Regresar</a>
                            <a class="dropdown-item" href="CerrarSesion">Cerrar Sesión</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>