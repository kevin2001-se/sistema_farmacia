<?php

class ProductoController{

    static public function ctrListarProducto()
    {
        $tabla = "producto";

        $tabla2 = "laboratorio";

        $respuesta = ProductoModelo::mdlListarProducto($tabla,$tabla2);

        return $respuesta;
    }

}