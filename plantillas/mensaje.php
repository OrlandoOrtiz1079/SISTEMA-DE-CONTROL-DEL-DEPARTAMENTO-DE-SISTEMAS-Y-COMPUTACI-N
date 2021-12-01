<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>;

<?php

echo '<script >
            swal({
                title: "Si has olvidado tu contraseña",
                text: "Favor  de  pasar al Departamento de Sistemas y Computacion para mas informacion",
                icon: "info",
                
                }).then((willDelete) => {
                if (willDelete) {
                self.location="../index.php";
                } else {
                self.location="../index.php";
                }
                });
    </script>';

?>