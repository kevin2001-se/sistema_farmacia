<?php

require_once "conexion.php";

class GenericoModel{

    static public function mdlListarGenerico($tabla)
    {
        $stmt = Conexion::Conectar()->prepare("SELECT * FROM $tabla");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;
    }

    static public function mdlObtenerGenerico($tabla, $dato)
    {
        $stmt = Conexion::Conectar()->prepare("SELECT * FROM $tabla WHERE cod_gen = :cod");

        $stmt->bindParam(":cod", $dato, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt = null;
    }

    static public function mdlRegistrarGenerico($tabla, $datos)
    {
        $stmt = Conexion::Conectar()->prepare("INSERT INTO $tabla(cod_gen,nom_gen) VALUES(:cod,:nom)");

        $stmt->bindParam(":cod", $datos["codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":nom", $datos["nom_gen"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "success";
        }else{
            $stmt->errorInfo();
        }

        $stmt = null;
    }

    static public function mdlModificarGenerico($tabla, $datos)
    {
        $stmt = Conexion::Conectar()->prepare("UPDATE $tabla SET nom_gen = :nom WHERE codigo = :cod");

        $stmt->bindParam(":cod", $datos["codigo"], PDO::PARAM_INT);
        $stmt->bindParam(":nom", $datos["nom_gen"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "success";
        }else{
            $stmt->errorInfo();
        }

        $stmt = null;
    }

    static public function mdlEliminarGenerico($tabla, $dato)
    {
        $stmt = Conexion::Conectar()->prepare("DELETE FROM $tabla WHERE codigo = :cod");

        $stmt->bindParam(":cod", $dato, PDO::PARAM_INT);

        if($stmt->execute()){
            return "success";
        }
        else{
            return $stmt->errorInfo();
        }

        $stmt = null;
    }
}