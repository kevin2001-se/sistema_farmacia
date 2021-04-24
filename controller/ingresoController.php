<?php

class IngresoController{

    static public function ctrLogin()
    {
        $tabla = "usuario";

        $user = $_POST["user"];

        $passw = $_POST["passw"];

        if (isset($_POST["recordar"])) {
            echo '<script>document.cookie = "usu_r='.$user.'";</script>';
            echo '<script>document.cookie = "pass_r='.$passw.'";</script>';
        }else{

            echo '<script>document.cookie = "usu_r=";</script>';
            echo '<script>document.cookie = "pass_r=";</script>';

        }

        $respuesta = IngresoModelo::mdlLogin($tabla, $user);

        if (!empty($respuesta) && $user == $respuesta["nom_usuario"] && password_verify($passw, $respuesta["pasw_usuario"])) {

            if($respuesta["estado_usuario"] != "Habilitado"){
                return "no-acceso";
            }

            $_SESSION["admin"] = $respuesta["cod_usuario"];
        
            return "ok-ingresar";

        }else{

            return "error-login";

        }
    }

    static public function ctrUsuarioListar()
    {
        $tabla = "usuario";

        $tabla2 = "tipo_area";

        $respuesta = IngresoModelo::mdlUsuarioListar($tabla, $tabla2);

        return $respuesta;
    }

    static public function ctrListarArea()
    {
        $tabla = "tipo_area";

        $respuesta = IngresoModelo::mdlAreaListar($tabla);

        return $respuesta;
    }

    static public function ctrRegistrarUsuario($datos)
    {
        $codigo = autogenera_codigo("USU", "usuario");

        $estado = "Habilitado";

        $tabla = "usuario";

        if (!empty($datos["usuario"]) && !empty($datos["nombre_usu"]) && !empty($datos["rol_usu"]) && !empty($datos["passw_usu"]) && !empty($datos["conpass_usu"])) {

            if (!empty($datos["correo_usu"])) {
                if (preg_match('/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/', $datos["correo_usu"])) {
                    $correo = $datos["correo_usu"];
                }else{
                    return "campos-malos";
                }
            }else{
                $correo = "";
            }
        
            if (preg_match("/^[A-Za-z0-9_=?!@:.,-]*$/", $datos["usuario"]) && preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $datos["nombre_usu"])) {

                if ($datos["passw_usu"] == $datos["conpass_usu"]) {
                    $passwoard = password_hash($datos["passw_usu"], PASSWORD_DEFAULT);
                }else{
                    return "passw-malo";
                }
            
                
                $data = array(
                    "codigo_usu" => $codigo,
                    "usuario" => $datos["usuario"],
                    "nombre_usu" => $datos["nombre_usu"],
                    "rol_usu" => $datos["rol_usu"],
                    "passw_usu" => $passwoard,
                    "correo_usu" => $correo,
                    "estado_usu" => $estado
                );

                $respuesta = IngresoModelo::mdlRegistrarUsuario($tabla, $data);

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

    static public function ctrListarUnUsuario($codigo)
    {
        $tabla = "usuario";

        $tabla2 = "tipo_area";

        $respuesta = IngresoModelo::mdlListarUnUsuario($tabla, $tabla2, $codigo, null);

        return $respuesta;
    }

    static public function ctrActualizarUsuario($datos)
    {
        $tabla = "usuario";

        $tabla2 = "tipo_area";

        $respuesta = IngresoModelo::mdlListarUnUsuario($tabla, $tabla2, null, $datos["codigo_usu"]);

        if (!empty($datos["codigo_usu"]) && !empty($datos["usuario"]) && !empty($datos["nombre_usu"]) && !empty($datos["rol_usu"])) {

            if ($respuesta["pasw_usuario"] != $datos["pass_actual"]) {
                return "error";
            }

            if (!empty($datos["passw_usu"])) {
                
                if (empty($datos["pass_actual"])) {
                    return "error";
                }else{

                    if ($datos["passw_usu"] == $datos["conpass_usu"]) {
                    
                        $passwoard = password_hash($datos["passw_usu"], PASSWORD_DEFAULT);

                    }else{
                        return "passw-malo";
                    }

                }  
            }else{
                if (empty($datos["pass_actual"])) {
                    return "error";
                }else{
                    $passwoard = $datos["pass_actual"];
                }
            }

            if (preg_match("/^[A-Za-z0-9_=?!@:.,-]*$/", $datos["usuario"]) && preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $datos["nombre_usu"])) {

                if (!empty($datos["correo_usu"])) {
                    if (preg_match('/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/', $datos["correo_usu"])) {
                        $correo = $datos["correo_usu"];
                    }else{
                        return "campos-malos";
                    }
                }else{
                    $correo = "";
                }

                $data = array(
                    "codigo_usu" => $datos["codigo_usu"],
                    "usuario" => $datos["usuario"],
                    "nombre_usu" => $datos["nombre_usu"],
                    "rol_usu" => $datos["rol_usu"],
                    "passw_usu" => $passwoard,
                    "correo_usu" => $correo,
                    "estado_usu" => $datos["estado_usu"]
                );

                $response = IngresoModelo::mdlActualizarUsuario($tabla, $data);

                if ($response == "success") {
                    return "ok-update";
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

    static public function ctrEliminarUsuario($data)
    {
        if (empty($data)) {
            return "error";
        }

        $tabla = "usuario";

        $response = IngresoModelo::mdlEliminarUsuario($tabla, $data);

        if ($response == "success") {
            return "ok-eliminar";
        }else{
            return "error";
        }

    }
    
}