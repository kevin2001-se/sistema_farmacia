<?php
session_start();

define("URL", "http://localhost/sistemaFarmacia/");

require_once "controller/plantilla.controller.php";
require_once "controller/ingresoController.php";
require_once "controller/clienteController.php";
require_once "controller/laboratorioController.php";
require_once "controller/genericoController.php";
require_once "controller/productoController.php";

require_once "model/ingresoModel.php";
require_once "model/clienteModel.php";
require_once "model/laboratorioModel.php";
require_once "model/genericoModel.php";
require_once "model/productoModel.php";

require_once "function/funciones.php";

if (isset($_SESSION["admin"])) {

    $plantilla = new PlantillaController();
    $plantilla->ctrPlantillaIndex();

}else{

    $plantilla = new PlantillaController();
    $plantilla->ctrLoginIndex();

}