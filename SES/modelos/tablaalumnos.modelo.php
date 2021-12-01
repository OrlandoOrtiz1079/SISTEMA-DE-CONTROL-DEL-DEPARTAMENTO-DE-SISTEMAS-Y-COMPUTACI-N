<?php

require_once "conexion.php";

class ModeloMostrarAlumnos
{

    /*=============================================
	MOSTRAR ALUMNOS EN TABLA PRINCIPAL
	=============================================*/

    static public function MdlMostrarAlumnos($tabla, $item, $valor, $DateEntrada)
    {
      
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT id, nocontrol, nombre, carrera, entrada ,enhora, sahora FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            // SELECT id,nocontrol,nombre,carrera, entrada ,enhora,sahora FROM alumnos WHERE entrada="13-10-2021"13-10-2021
            $stmt = Conexion::conectar()->prepare("SELECT id, nocontrol, nombre, carrera, entrada ,enhora, sahora FROM $tabla WHERE entrada = :entrada");
            $stmt->bindParam(":entrada", $DateEntrada, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        $stmt = null;
    }
}
