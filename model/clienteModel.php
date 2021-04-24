<?php
require_once "conexion.php";

class ClienteModelo{

    static public function mdlListarCliente($tabla)
    {
        $stmt = Conexion::Conectar()->prepare("SELECT * FROM $tabla ORDER BY codigo DESC");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;
    }

    static public function mdlCrearClietne($tabla, $datos)
    {
        
        $stmt = Conexion::Conectar()->prepare("INSERT INTO $tabla(cod_cliente,nom_cliente,dire_cliente,dist_cliente,ruc_cliente,tel_cliente) VALUES(:cod,:nom,:dir,:dis,:ruc,:tel)");

        $stmt->bindParam(":cod", $datos["codigo_cli"],PDO::PARAM_STR);
        $stmt->bindParam(":nom", $datos["nombre_cli"],PDO::PARAM_STR);
        $stmt->bindParam(":dir", $datos["direccion_cli"],PDO::PARAM_STR);
        $stmt->bindParam(":dis", $datos["distrito_cli"],PDO::PARAM_STR);
        $stmt->bindParam(":ruc", $datos["ruc_cli"],PDO::PARAM_STR);
        $stmt->bindParam(":tel", $datos["telefono_cli"],PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "success";
        }
        else{
            return $stmt->errorInfo();
        }

        $stmt = null;

    }

    static public function mdlObtenerCliente($tabla, $dato)
    {
        $stmt = Conexion::Conectar()->prepare("SELECT * FROM $tabla WHERE cod_cliente = :cod");

        $stmt->bindParam(":cod", $dato,PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt = null;
    }

    static public function mdlEditarClietne($tabla, $datos)
    {
        $stmt = Conexion::Conectar()->prepare("UPDATE $tabla SET nom_cliente = :nom,dire_cliente = :dir,dist_cliente = :dis,ruc_cliente = :ruc,tel_cliente = :tel WHERE codigo = :cod");

        $stmt->bindParam(":cod", $datos["codigo_cli"],PDO::PARAM_INT);
        $stmt->bindParam(":nom", $datos["nombre_cli"],PDO::PARAM_STR);
        $stmt->bindParam(":dir", $datos["direccion_cli"],PDO::PARAM_STR);
        $stmt->bindParam(":dis", $datos["distrito_cli"],PDO::PARAM_STR);
        $stmt->bindParam(":ruc", $datos["ruc_cli"],PDO::PARAM_STR);
        $stmt->bindParam(":tel", $datos["telefono_cli"],PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "success";
        }
        else{
            return $stmt->errorInfo();
        }

        $stmt = null;
    }

    static public function mdlEliminarCliente($tabla, $data)
    {
        $stmt = Conexion::Conectar()->prepare("DELETE FROM $tabla WHERE codigo = :cod");

        $stmt->bindParam(":cod", $data, PDO::PARAM_INT);

        if($stmt->execute()){
            return "success";
        }
        else{
            return $stmt->errorInfo();
        }

        $stmt = null;
    }

}