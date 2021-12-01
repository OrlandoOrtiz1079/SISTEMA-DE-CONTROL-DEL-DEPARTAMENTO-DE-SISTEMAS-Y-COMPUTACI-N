<?php

require_once "conexion.php";

class ModeloAlumnos
{

	/*=============================================
	MOSTRAR Alumnos
	=============================================*/

	static public function MdlMostrarAlumnos($tabla, $entrada, $control)
	{

		// SELECT * FROM alumnos WHERE nocontrol="17670034" AND entrada="12-10-2021"
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE nocontrol = :nocontrol and  entrada= :entrada");
		$stmt->bindParam(":nocontrol", $control, PDO::PARAM_STR);
		$stmt->bindParam(":entrada", $entrada, PDO::PARAM_STR);

		$stmt->execute();
		if (empty($stmt->fetch())) {
			return "error";
		} else {
			return "ok";
		}
		return $stmt->fetch();

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	ACTUALIZAR Alumnos
	=============================================*/
	static public function mdlActualizarAlumons($tabla, $TimeSalida, $control, $DateEntrada)
	{
		
		//UPDATE alumnos SET sahora="01:00:11 am" WHERE nocontrol="17670004" AND entrada="13-10-2021"
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET sahora = :sahora WHERE nocontrol = :nocontrol AND entrada = :entrada");
		$stmt->bindParam(":sahora", $TimeSalida, PDO::PARAM_STR);
		$stmt->bindParam(":nocontrol", $control, PDO::PARAM_STR);
		$stmt->bindParam(":entrada", $DateEntrada, PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "ok";
		} else {
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}


	/*=============================================
	REGISTRO DE ALUMNOS
	=============================================*/

	static public function mdlIngresarAlumnos($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, nocontrol, carrera, entrada, enhora) VALUES (:nombre, :nocontrol, :carrera, :entrada, :enhora)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":nocontrol", $datos["nocontrol"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $datos["carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":entrada", $datos["entrada"], PDO::PARAM_STR);
		$stmt->bindParam(":enhora", $datos["enhora"], PDO::PARAM_STR);
		/* $stmt->bindParam(" :estado", 1, PDO::PARAM_INT); */

		if ($stmt->execute()) {
			return "ok";
		} else {
			return "error";
		}
		$stmt->close();
	    $stmt = null;
	}
	/*=============================================
	EDITAR USUARIO
	=============================================*/
	static public function mdlEditarUsuario($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, usuario = :usuario, password = :password, perfil = :perfil WHERE usuario = :usuario");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "ok";
		} else {
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/
	static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
		$stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "ok";
		} else {
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
	/*=============================================
	BORRAR USUARIO
	=============================================*/
	static public function mdlBorrarUsuario($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {
			return "ok";
		} else {
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
}
