<?php

class GenericoController{

    static public function ctrListarGenerico()
    {
        $tabla = "generico";

        $response = GenericoModel::mdlListarGenerico($tabla);

        return $response;
    }

    static public function ctrObtenerGenerico($dato)
    {
        $tabla = "generico";

        $response = GenericoModel::mdlObtenerGenerico($tabla, $dato);

        return $response;
    }

    static public function ctrRegistrarGenerico($datos)
    {
        $tabla = "generico";

        $codigo = autogenera_codigo("GEN", $tabla);;

        $array = array($datos["nom_gen"]);

        if (validaramposVacios($array) == "vacio") {
            return "campos-vacio";
        }

        $data = array(
            "codigo" => $codigo,
            "nom_gen" => $datos["nom_gen"]
        );

        $response = GenericoModel::mdlRegistrarGenerico($tabla, $data);

        if ($response == "success") {
            return "ok-registro";
        }else{
            return "error";
        }
    }

    static public function ctrModificarGenerico($datos)
    {
        $tabla = "generico";

        $array = array($datos["nom_gen"]);

        if (validaramposVacios($array) == "vacio") {
            return "campos-vacio";
        }

        $data = array(
            "codigo" => $datos["codigo"],
            "nom_gen" => $datos["nom_gen"]
        );

        $response = GenericoModel::mdlModificarGenerico($tabla, $data);

        if ($response == "success") {
            return "ok-registro";
        }else{
            return "error";
        }
    }

    static public function ctrEliminarGenerico($data)
    {
        if (empty($data)) {
            return "error";
        }

        $tabla = "generico";

        $response = GenericoModel::mdlEliminarGenerico($tabla, $data);

        if ($response == "success") {
            return "ok-eliminar";
        }else{
            return "error";
        }
    }
}