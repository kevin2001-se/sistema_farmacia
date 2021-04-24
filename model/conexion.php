<?php

class Conexion{

    static public function Conectar()
    {
        try {
            $con = new PDO("mysql:host=localhost;dbname=sistema_farmacia","root","");

            $con->exec("set name utf8");
    
            return $con;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}