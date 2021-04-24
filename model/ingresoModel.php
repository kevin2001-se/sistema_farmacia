<?php
require_once "conexion.php";

class IngresoModelo{

    static public function mdlLogin($tabla, $user)
    {
        
        $stmt = Conexion::Conectar()->prepare("SELECT * FROM $tabla WHERE nom_usuario = :user");

        $stmt->bindParam(":user", $user, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt = null;

    }

    static public function mdlUsuarioListar($tabla, $tabla2)
    {        
        $stmt = Conexion::Conectar()->prepare("SELECT * FROM $tabla INNER JOIN $tabla2 ON $tabla.id_area = $tabla2.cod_area ORDER BY $tabla.codigo DESC");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;
    }

    static public function mdlAreaListar($tabla)
    {
        $stmt = Conexion::Conectar()->prepare("SELECT * FROM $tabla");

        $stmt->execute();
    
        return $stmt->fetchAll();

        $stmt = null;
    }

    static public function mdlRegistrarUsuario($tabla, $data)
    {
        $stmt = Conexion::Conectar()->prepare("INSERT INTO $tabla(cod_usuario,nom_usuario,nom_persona,correo_usuario,pasw_usuario,estado_usuario,id_area) VALUES(:cod, :usu, :nom, :correo, :pass, :estado, :rol)");

        $stmt->bindParam(":cod", $data["codigo_usu"], PDO::PARAM_STR);
        $stmt->bindParam(":usu", $data["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":nom", $data["nombre_usu"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $data["correo_usu"], PDO::PARAM_STR);
        $stmt->bindParam(":pass", $data["passw_usu"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $data["estado_usu"], PDO::PARAM_STR);
        $stmt->bindParam(":rol", $data["rol_usu"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "success";
        }
        else{
            return $stmt->errorInfo();
        }

        $stmt = null;
    }

    static public function mdlListarUnUsuario($tabla, $tabla2, $codigo, $id)
    {
        if ($id == null && !empty($codigo)) {
            $stmt = Conexion::Conectar()->prepare("SELECT * FROM $tabla INNER JOIN $tabla2 ON $tabla.id_area = $tabla2.cod_area WHERE cod_usuario = :cod");

            $stmt->bindParam(":cod", $codigo, PDO::PARAM_STR);
    
            $stmt->execute();
        
            return $stmt->fetch();
    
            $stmt = null;
        }else{
            $stmt = Conexion::Conectar()->prepare("SELECT * FROM $tabla INNER JOIN $tabla2 ON $tabla.id_area = $tabla2.cod_area WHERE codigo = :id");

            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    
            $stmt->execute();
        
            return $stmt->fetch();
    
            $stmt = null;
        }
    }

    static public function mdlActualizarUsuario($tabla, $data)
    {
        $stmt = Conexion::Conectar()->prepare("UPDATE $tabla SET nom_usuario = :usu, nom_persona = :nom, correo_usuario = :correo, pasw_usuario = :pass, estado_usuario = :estado, id_area = :rol WHERE codigo = :cod");

        $stmt->bindParam(":cod", $data["codigo_usu"], PDO::PARAM_INT);
        $stmt->bindParam(":usu", $data["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":nom", $data["nombre_usu"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $data["correo_usu"], PDO::PARAM_STR);
        $stmt->bindParam(":pass", $data["passw_usu"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $data["estado_usu"], PDO::PARAM_STR);
        $stmt->bindParam(":rol", $data["rol_usu"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "success";
        }
        else{
            return $stmt->errorInfo();
        }

        $stmt = null;
    }

    static public function mdlEliminarUsuario($tabla, $data)
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