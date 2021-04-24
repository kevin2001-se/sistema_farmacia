<?php
require_once "../function/funciones.php";
require_once "../controller/ingresoController.php";
require_once "../model/ingresoModel.php";

class AjaxUsuario{

    public $datos;

    public function ajaxRegistrarUsuario()
    {
        $data = $this->datos;

        $response = IngresoController::ctrRegistrarUsuario($data);

        echo $response;
    }

    public function ajaxListarUsuario()
    {
        $codigo = $this->datos;

        $response = IngresoController::ctrListarUnUsuario($codigo);

        if (!empty($response)) {
            echo json_encode($response);
        }else{
            echo "error";
        }

    }

    public function ajaxListarRol()
    {
        $response = IngresoController::ctrListarArea();

        echo json_encode($response);
    }

    public function ajaxActualizarUsuario()
    {
        $data = $this->datos;

        $response = IngresoController::ctrActualizarUsuario($data);

        echo $response;
    }

    public function ajaxEliminarUsuario()
    {
        $data = $this->datos;

        $response = IngresoController::ctrEliminarUsuario($data);

        echo $response;
    }

    public function ajaxListarUsuariot()
    {
        $response = IngresoController::ctrUsuarioListar();

        echo json_encode($response,JSON_UNESCAPED_UNICODE);
    }

}

if (isset($_POST["usuario"])) {

    $user = new AjaxUsuario();
    
    $datos = array(
        "usuario" => $_POST["usuario"],
        "nombre_usu" => $_POST["nombre_usu"],
        "rol_usu" => $_POST["rol_usu"],
        "passw_usu" => $_POST["passw_usu"],
        "conpass_usu" => $_POST["conpass_usu"],
        "correo_usu" => $_POST["correo_usu"]
    );

    $user->datos = $datos;

    $user->ajaxRegistrarUsuario();

}

else if (isset($_POST["codUsu"])) {

    $user = new AjaxUsuario();

    $user->datos = $_POST["codUsu"];

    $user->ajaxListarUsuario();
}

else if (isset($_POST["selectE"])) {

    $user = new AjaxUsuario();

    $user->ajaxListarRol();
}

else if (isset($_POST["codigo_usuE"])) {

    $user = new AjaxUsuario();

    if (empty($_POST["estado_usuE"])) {
        $estado = "Deshabilitado";
    }else{
        $estado = $_POST["estado_usuE"];
    }

    $user->datos = array(
        "codigo_usu" => $_POST["codigo_usuE"],
        "usuario" => $_POST["usuarioE"],
        "nombre_usu" => $_POST["nombre_usuE"],
        "rol_usu" => $_POST["rol_usuE"],
        "passw_usu" => $_POST["passw_usuE"],
        "pass_actual" => $_POST["passw_actual"],
        "conpass_usu" => $_POST["conpass_usuE"],
        "correo_usu" => $_POST["correo_usuE"],
        "estado_usu" => $estado
    );

    $user->ajaxActualizarUsuario();
}

else if (isset($_POST["codEli"])) {

    $user = new AjaxUsuario();

    $user->datos = $_POST["codEli"];

    $user->ajaxEliminarUsuario();
}
else{

    $list = new AjaxUsuario();

    $list->ajaxListarUsuariot();

}