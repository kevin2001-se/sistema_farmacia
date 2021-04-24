<?php

class LaboratorioController{

    static public function ctrListarLaboratorio()
    {
        $tabla = 'laboratorio';

        $response = LaboratorioModelo::mdlListarLaboratorio($tabla);

        return $response;

    }

    static public function ctrRegistrarLaboratorio($datos)
    {
        $tabla = 'laboratorio';

        $array = array($datos["ruc_lab"],$datos["nom_lab"],$datos["direc_lab"],$datos["dist_lab"]);

        if (validaramposVacios($array) == "vacio") {
            return "campos-vacio";
        }

        if (is_numeric($datos["ruc_lab"]) == false) {
            return "ruc_invalido";
        }

        if (strlen($datos["ruc_lab"]) != 11) {
            return "ruc_mal";
        }

        if (!empty($datos["telfono_lab"])) {
            if (is_numeric($datos["telfono_lab"]) == false) {
                return "tel_invalido";
            }else{
                if (strlen($datos["telfono_lab"]) == 7 || strlen($datos["telfono_lab"]) == 9) {
                    $telefono = $datos["telfono_lab"];
                }else{
                    return "telefono-mal";
                }
            }
        }else{
            $telefono = null;
        }

        $codigo = autogenera_codigo("LAB", $tabla);

        $data = array(
            "codigo" => $codigo,
            "nom_lab" => $datos["nom_lab"],
            "direc_lab" => $datos["direc_lab"],
            "dist_lab" => $datos["dist_lab"],
            "ruc_lab" => $datos["ruc_lab"],
            "tele_lab" => $telefono
        );

        $response = LaboratorioModelo::mdlRegistrarLaboratorio($tabla, $data);

        if ($response == "success") {
            return "ok-registro";
        }else{
            return "error";
        }
    }

    static public function ctrObtenerLaboratorio($dato)
    {
        $tabla = "laboratorio";

        $response = LaboratorioModelo::mdlObtenerLaboratorio($tabla, $dato);

        return $response;
    }

    static public function ctrEliminarLaboratorio($data)
    {
        if (empty($data)) {
            return "error";
        }

        $tabla = "laboratorio";

        $response = LaboratorioModelo::mdlEliminarLaboratorio($tabla, $data);

        if ($response == "success") {
            return "ok-eliminar";
        }else{
            return "error";
        }
    }

    static public function ctrModificarLaboratorio($datos)
    {
        $tabla = 'laboratorio';

        $codigo = $datos["codigo"];

        $array = array($datos["ruc_lab"],$datos["nom_lab"],$datos["direc_lab"],$datos["dist_lab"]);

        if (validaramposVacios($array) == "vacio") {
            return "campos-vacio";
        }

        if (is_numeric($datos["ruc_lab"]) == false) {
            return "ruc_invalido";
        }

        if (strlen($datos["ruc_lab"]) != 11) {
            return "ruc_mal";
        }

        if (!empty($datos["telfono_lab"])) {
            if (is_numeric($datos["telfono_lab"]) == false) {
                return "tel_invalido";
            }else{
                if (strlen($datos["telfono_lab"]) == 7 || strlen($datos["telfono_lab"]) == 9) {
                    $telefono = $datos["telfono_lab"];
                }else{
                    return "telefono-mal";
                }
            }
        }else{
            $telefono = null;
        }

        $data = array(
            "codigo" => $codigo,
            "nom_lab" => $datos["nom_lab"],
            "direc_lab" => $datos["direc_lab"],
            "dist_lab" => $datos["dist_lab"],
            "ruc_lab" => $datos["ruc_lab"],
            "tele_lab" => $telefono
        );

        $response = LaboratorioModelo::mdlModificarLaboratorio($tabla, $data);

        if ($response == "success") {
            return "ok-registro";
        }else{
            return "error";
        }
    }

}