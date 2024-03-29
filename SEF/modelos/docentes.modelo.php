<?php
require_once "conexion.php";
 
class ModeloDocentes
{
    /*=============================================
	MOSTRAR DOCENTES
	=============================================*/
    static public function MdlMostrarDocentes($tabla, $item, $valor)
    {

        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        $stmt->close();
        $stmt = null;
    }
    /*=============================================
	REGISTRO DE DOCENTES
    =============================================*/
    static public function mdlIngresarDocente($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, estado) VALUES (:nombre, :estado)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
    /*=============================================
	ACTUALIZAR DOCENTE
    =============================================*/
    static public function mdlActualizarDocente($tabla, $item1, $valor1, $item2, $valor2)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt->bindParam(":" .$item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":" .$item2, $valor2, PDO::PARAM_STR);
        
        if ($stmt->execute()) {
			return "ok";
		} else {
			return "error";
		}
		$stmt->close();
		$stmt = null;
    }
}
 