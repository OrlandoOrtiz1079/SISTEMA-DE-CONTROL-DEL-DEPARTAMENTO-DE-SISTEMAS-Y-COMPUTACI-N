<?php
require_once "conexion.php";

class ModeloSugerencia
{

    /*=============================================
    MOSTRAR SUGERENCIAS SIIII
    =============================================*/
    public static function MdlMostrarSugerencia($tabla, $item, $valor)
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
	BORRAR SUGERENCIAS SIIII
    =============================================*/
    static public function mdlBorrarSugerencia($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE nombre = :nombre");
        $stmt->bindParam(":nombre", $datos, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }



    /*=============================================
    MOSTRAR HISTORIAL SIIII
    =============================================*/
    public static function MdlMostrarHistorial($tabla, $item, $valor)
    {

        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY fecha DESC");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        $stmt->close();
        $stmt = null;
    }
}
