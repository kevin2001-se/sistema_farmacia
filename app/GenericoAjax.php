<?php
require_once "../function/funciones.php";
require_once "../controller/genericoController.php";
require_once "../model/genericoModel.php";

class AjaxGenerico{

    public $dato;

    public function ajaxRegistrarGenerico()
    {
        $data = $this->dato;

        $respuesta = GenericoController::ctrRegistrarGenerico($data);

        echo $respuesta;
    }

    public function ajaxObtenerGenerico()
    {
        $data = $this->dato;

        $respuesta = GenericoController::ctrObtenerGenerico($data);

        if (!empty($respuesta)) {
            echo json_encode($respuesta);
        }else{
            echo "error";
        }
    }

    public function ajaxModificarGenerico()
    {
        $data = $this->dato;

        $respuesta = GenericoController::ctrModificarGenerico($data);

        echo $respuesta;
    }

    public function ajaxEliminarGenerico()
    {
        $data = $this->dato;

        $respuesta = GenericoController::ctrEliminarGenerico($data);

        echo $respuesta;
    }

    public function ajaxListarGenerico()
    {
        $respuesta = GenericoController::ctrListarGenerico();

        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }
}

if (isset($_POST["nom_ge"])) {

    $new = new AjaxGenerico();

    $new->dato = array(
        "nom_gen" => $_POST["nom_ge"]
    );

    $new->ajaxRegistrarGenerico();

}

else if (isset($_POST["cod_ge"])) {

    $new = new AjaxGenerico();

    $new->dato = $_POST["cod_ge"];

    $new->ajaxObtenerGenerico();

}

else if (isset($_POST["accion"]) && $_POST["accion"] == "mod") {

    $new = new AjaxGenerico();

    $new->dato = array(
        "codigo" => $_POST["codigo"],
        "nom_gen" => $_POST["nombre_genE"]
    );

    $new->ajaxModificarGenerico();

}

else if (isset($_POST["cod_el"])) {

    $new = new AjaxGenerico();

    $new->dato = $_POST["cod_el"];

    $new->ajaxEliminarGenerico();

}
else{

    $list = new AjaxGenerico();

    $list->ajaxListarGenerico();

}