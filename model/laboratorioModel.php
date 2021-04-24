<?php
require_once "conexion.php";

class LaboratorioModelo{

    static public function mdlListarLaboratorio($tabla)
    {
        $stmt = Conexion::Conectar()->prepare("SELECT * FROM $tabla");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;
    }

    static public function mdlRegistrarLaboratorio($tabla, $data)
    {
        $stmt = Conexion::Conectar()->prepare("INSERT INTO $tabla(cod_lab,nom_lab,direc_lab,dist_lab,ruc_lab,tele_lab) VALUES(:cod, :nom, :dir, :dis, :ruc, :tel)");

        $stmt->bindParam(":cod", $data["codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":nom", $data["nom_lab"], PDO::PARAM_STR);
        $stmt->bindParam(":dir", $data["direc_lab"], PDO::PARAM_STR);
        $stmt->bindParam(":dis", $data["dist_lab"], PDO::PARAM_STR);
        $stmt->bindParam(":ruc", $data["ruc_lab"], PDO::PARAM_INT);
        $stmt->bindParam(":tel", $data["tele_lab"], PDO::PARAM_INT);

        if($stmt->execute()){
            return "success";
        }else{
            return $stmt->errorInfo();
        }

        $stmt = null;
    }

    static public function mdlObtenerLaboratorio($tabla, $dato)
    {
        $stmt = Conexion::Conectar()->prepare("SELECT * FROM $tabla WHERE cod_lab = :cod");

        $stmt->bindParam(":cod", $dato, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt = null;
    }

    static public function mdlEliminarLaboratorio($tabla, $dato)
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

    static public function mdlModificarLaboratorio($tabla, $data)
    {
        $stmt = Conexion::Conectar()->prepare("UPDATE $tabla SET nom_lab = :nom, direc_lab = :dir, dist_lab = :dis, ruc_lab = :ruc, tele_lab = :tel WHERE codigo = :cod");

        $stmt->bindParam(":cod", $data["codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":nom", $data["nom_lab"], PDO::PARAM_STR);
        $stmt->bindParam(":dir", $data["direc_lab"], PDO::PARAM_STR);
        $stmt->bindParam(":dis", $data["dist_lab"], PDO::PARAM_STR);
        $stmt->bindParam(":ruc", $data["ruc_lab"], PDO::PARAM_INT);
        $stmt->bindParam(":tel", $data["tele_lab"], PDO::PARAM_INT);

        if($stmt->execute()){
            return "success";
        }else{
            return $stmt->errorInfo();
        }

        $stmt = null;
    }

}