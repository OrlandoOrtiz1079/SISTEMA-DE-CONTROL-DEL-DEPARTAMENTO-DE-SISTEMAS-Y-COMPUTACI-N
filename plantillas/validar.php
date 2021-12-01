<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>;
<?php

include "db.php";
$link = conectarse();

//INICIA EL BOTON DE ENTRAR - INICIO DE SESION
if (isset($_POST['entrar'])) {

	//invocas la funcion Conectarse que se encuentra en Conexion.php
	$nombre = $_POST['username'];
	$password = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

	if ($nombre == NULL || $password == NULL) {
		echo '<script language = javascript>
			alert("Faltan datos por llenar en el Formularion")
			self.location="loggin.php"
			</script>';
	} else {
		//Realizamos la Consulta a la Base de Datos Tabla Usuarios
		$QUERY = mysqli_query($link, "SELECT * FROM usuarios WHERE usuario = '$nombre' AND password= '$password'");
		$RT = mysqli_affected_rows($link);

		if ($RT > 0) {
			session_start();
			$row = mysqli_fetch_array($QUERY);
			$_SESSION["id"] = $row['id'];
			$_SESSION['nombre'] = $row['nombre'];
			$_SESSION["usuario"] = $row['usuario'];
			$_SESSION['perfil'] = $row['perfil'];
			$_SESSION["estado"] = $row['estado'];
			$_SESSION['iniciarSesion'] = "ok";

			echo '<script languaje =javascript>
						self.location="principal.php";
				  </script>';
		} else {
			echo '<script >
						swal({
								title: "Acceso Denegado",
								text: "Los datos introducidos son incorrectos",
								icon: "warning",
								dangerMode: true,
			 				 }).then((willDelete) => {
								if (willDelete) {
									self.location="../index.php";
								} else {
									self.location="../index.php";
								}
							});
				</script>';
		}
	}
}

?>