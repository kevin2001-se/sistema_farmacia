<?php
require_once "../function/funciones.php";
require_once "../controller/productoController.php";
require_once "../model/productoModel.php";

class AjaxProducto{

    public function ajaxListarProducto()
    {
        $response = ProductoController::ctrListarProducto();

        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }

}

$list = new AjaxProducto();

$list->ajaxListarProducto();