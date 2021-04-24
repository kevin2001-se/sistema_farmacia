<?php
require_once "conexion.php";

class ProductoModelo{

    static public function mdlListarProducto($tabla,$tabla2)
    {
        $stmt = Conexion::Conectar()->prepare("SELECT * FROM $tabla t INNER JOIN $tabla2 d ON t.cod_lab = d.codigo");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;
    }

}