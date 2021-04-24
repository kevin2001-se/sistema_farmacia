<?php

require_once "../function/funciones.php";
require_once "../controller/laboratorioController.php";
require_once "../model/laboratorioModel.php";

class AjaxLaboratorio{

    public $data;

    public function ajaxRegistroLaboratorio()
    {
        $dato = $this->data;

        $response = LaboratorioController::ctrRegistrarLaboratorio($dato);

        echo $response;
    }

    public function ajaxObtenerLaboratorio()
    {
        $dato = $this->data;

        $response = LaboratorioController::ctrObtenerLaboratorio($dato);

        if (!empty($response)) {
            echo json_encode($response);
        }else{
            echo "error";
        }
    }

    public function ajaxEliminarLaboratorio()
    {
        $dato = $this->data;

        $response = LaboratorioController::ctrEliminarLaboratorio($dato);

        echo $response;
    }

    public function ajaxModificarLaboratorio()
    {
        $dato = $this->data;

        $response = LaboratorioController::ctrModificarLaboratorio($dato);

        echo $response;
    }

    public function ajaxListarLaboratorio()
    {
        $response = LaboratorioController::ctrListarLaboratorio();

        echo json_encode($response,JSON_UNESCAPED_UNICODE);
    }

}

if (isset($_POST["accion"]) && $_POST["accion"] == "reg") {

    $new = new AjaxLaboratorio();

    $new->data = array(
        "nom_lab" => $_POST["nombre_lab"],
        "direc_lab" => $_POST["direccion_lab"],
        "dist_lab" => $_POST["distrito_lab"],
        "ruc_lab" => $_POST["ruc_lab"],
        "telfono_lab" => $_POST["telefono_lab"]
    );

    $new->ajaxRegistroLaboratorio();
}

else if (isset($_POST["codigoL"])) {

    $codigo = new AjaxLaboratorio();

    $codigo->data = $_POST["codigoL"];

    $codigo->ajaxObtenerLaboratorio();
}

else if (isset($_POST["codEli"])) {

    $codigo = new AjaxLaboratorio();

    $codigo->data = $_POST["codEli"];

    $codigo->ajaxEliminarLaboratorio();
}

else if (isset($_POST["accion"]) && $_POST["accion"] == "mod") {

    $new = new AjaxLaboratorio();

    $new->data = array(
        "codigo" => $_POST["codigo"],
        "nom_lab" => $_POST["nombre_labE"],
        "direc_lab" => $_POST["direccion_labE"],
        "dist_lab" => $_POST["distrito_labE"],
        "ruc_lab" => $_POST["ruc_labE"],
        "telfono_lab" => $_POST["telefono_labE"]
    );

    $new->ajaxModificarLaboratorio();
}
else{

    $list = new AjaxLaboratorio();

    $list->ajaxListarLaboratorio();

}