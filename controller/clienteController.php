<?php

class ClienteController{

    static public function ctrListarCliente()
    {
        $tabla = "clientes";

        $respuesta = ClienteModelo::mdlListarCliente($tabla);

        return $respuesta;
    }

    static public function ctrCrearCliente($datos)
    {
        $tabla = "clientes";

        $codigo = autogenera_codigo("CLI", $tabla);

        if (!empty($datos["nombre_cli"]) && !empty($datos["direccion_cli"]) && !empty($datos["distrito_cli"]) && !empty($datos["ruc_cli"]) && !empty($datos["telefono_cli"])) {

            if (preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $datos["nombre_cli"]) && preg_match("/^[\+0-9\-\(\)\s]*$/", $datos["telefono_cli"])) {

                if (strlen($datos["telefono_cli"]) == 7 || strlen($datos["telefono_cli"]) == 9) {
                    $telefono = $datos["telefono_cli"];
                }else{
                    return "telefono-mal";
                }

                $data = array(
                    "codigo_cli" => $codigo,
                    "nombre_cli" => $datos["nombre_cli"],
                    "direccion_cli" => $datos["direccion_cli"],
                    "distrito_cli" => $datos["distrito_cli"],
                    "ruc_cli" => $datos["ruc_cli"],
                    "telefono_cli" => $telefono
                );

                $respuesta = ClienteModelo::mdlCrearClietne($tabla, $data);
                
                if ($respuesta == "success") {
                    return "ok-registro";
                }else{
                    return "error";
                }

            }else{
                return "campos-malos";
            }
            
        }else{
            return "campos-vacios";
        }
    }

    static public function ctrObtenerCliente($dato)
    {
        $tabla = "clientes";

        $respuesta = ClienteModelo::mdlObtenerCliente($tabla, $dato);

        return $respuesta;
    }

    static public function ctrEditarCliente($datos)
    {
        $tabla = "clientes";

        if (!empty($datos["nombre_cli"]) && !empty($datos["direccion_cli"]) && !empty($datos["distrito_cli"]) && !empty($datos["ruc_cli"]) && !empty($datos["telefono_cli"])) {

            if (preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $datos["nombre_cli"]) && preg_match("/^[\+0-9\-\(\)\s]*$/", $datos["telefono_cli"])) {

                if (strlen($datos["telefono_cli"]) == 7 || strlen($datos["telefono_cli"]) == 9) {
                    $telefono = $datos["telefono_cli"];
                }else{
                    return "telefono-mal";
                }

                $data = array(
                    "codigo_cli" => $datos["codigo"],
                    "nombre_cli" => $datos["nombre_cli"],
                    "direccion_cli" => $datos["direccion_cli"],
                    "distrito_cli" => $datos["distrito_cli"],
                    "ruc_cli" => $datos["ruc_cli"],
                    "telefono_cli" => $telefono
                );

                $respuesta = ClienteModelo::mdlEditarClietne($tabla, $data);
                
                if ($respuesta == "success") {
                    return "ok-editar";
                }else{
                    return "error";
                }

            }else{
                return "campos-malos";
            }
            
        }else{
            return "campos-vacios";
        }
    }

    static public function ctrElimarCliente($data)
    {
        if (empty($data)) {
            return "error";
        }

        $tabla = "clientes";

        $response = ClienteModelo::mdlEliminarCliente($tabla, $data);

        if ($response == "success") {
            return "ok-eliminar";
        }else{
            return "error";
        }
    }

}