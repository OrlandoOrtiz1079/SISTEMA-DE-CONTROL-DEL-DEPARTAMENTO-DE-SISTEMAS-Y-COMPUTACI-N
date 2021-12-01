    <!-- ENCABEZADO -->
    <header>
        <table>
            <tr>
                <th> <img width="100%" src="vistas/assets/images/22.png"></th>
                <th>
                    <div class="logoderecho col-sm-6 hidden-xs">
                        <br>
                        <span>CAT-DSC :: Centro de Aplicaciones</span><br />
                        <span style="font-size: 1.5vw">
                            <?php
                            $nombre = $_SESSION['nombre'];
                            echo "<span>$nombre</span><br/>"; ?>
                        </span>
                        <span style="font-size: 1.5vw">
                            <?php
                            $perfil = $_SESSION['perfil'];
                            echo "<span>$perfil</span><br/>"; ?>
                        </span>
                    </div>
                </th>
            </tr>

        </table>
    </header>

    <nav id="w0" class="navbar navbar-default tecnm-navbar">
        <div class="container">
            <div class="colorss" id="w0-collapse">
                <ul id="w2" class="navbar-nav navbar-left nav">
                    <li>
                        <a href="../plantillas/principal.php">
                            <span class="fas fa-reply fa-2x" style="cursor: pointer; margin-right: 10px;"></span>
                            REgresar
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>