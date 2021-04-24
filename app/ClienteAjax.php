<?php
require_once "../function/funciones.php";
require_once "../controller/clienteController.php";
require_once "../model/clienteModel.php";

class AjaxCliente{

    public $datos;

    public function ajaxCrearCliente()
    {
        $data = $this->datos;

        $respuesta = ClienteController::ctrCrearCliente($data);

        echo $respuesta;
    }

    public function ajaxObtenerCliente()
    {
        $data = $this->datos;

        $respuesta = ClienteController::ctrObtenerCliente($data);

        if (!empty($respuesta)) {
            echo json_encode($respuesta);
        }else{
            echo "error";
        }
    }

    public function ajaxEditarCliente()
    {
        $data = $this->datos;

        $respuesta = ClienteController::ctrEditarCliente($data);

        echo $respuesta;
    }

    public function ajaxEliminarCliente()
    {
        $data = $this->datos;

        $respuesta = ClienteController::ctrElimarCliente($data);

        echo $respuesta;
    }

    public function ajaxListarCliente()
    {
        $response = ClienteController::ctrListarCliente();

        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }

}

if (isset($_POST["nombre_cli"])) {

    $new = new AjaxCliente();

    $new->datos = array(
        "nombre_cli" => $_POST["nombre_cli"],
        "direccion_cli" => $_POST["direccion_cli"],
        "distrito_cli" => $_POST["distrito_cli"],
        "ruc_cli" => $_POST["ruc_cli"],
        "telefono_cli" => $_POST["telefono_cli"]
    );

    $new->ajaxCrearCliente();
}
else if (isset($_POST["codigoCli"])) {

    $obtener = new AjaxCliente();

    $obtener->datos = $_POST["codigoCli"];

    $obtener->ajaxObtenerCliente();
}
else if (isset($_POST["codigo"])) {

    $new = new AjaxCliente();

    $new->datos = array(
        "codigo" => $_POST["codigo"],
        "nombre_cli" => $_POST["nombre_cliE"],
        "direccion_cli" => $_POST["direccion_cliE"],
        "distrito_cli" => $_POST["distrito_cliE"],
        "ruc_cli" => $_POST["ruc_cliE"],
        "telefono_cli" => $_POST["telefono_cliE"]
    );

    $new->ajaxEditarCliente();
}
else if (isset($_POST["codEli"])) {

    $user = new AjaxCliente();

    $user->datos = $_POST["codEli"];

    $user->ajaxEliminarCliente();
}
else{

    $list = new AjaxCliente();

    $list->ajaxListarCliente();

}