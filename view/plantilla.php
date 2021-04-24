<?php

include_once "doc/include/header.php";

if (isset($_GET["pagina"])) {

    $ruta = explode("/",$_GET["pagina"]);

    if ($ruta[0] == "dashboard" ||
        $ruta[0] == "logout" ||
        $ruta[0] == "usuariosSitema" ||
        $ruta[0] == "clientes" ||
        $ruta[0] == "laboratorio" ||
        $ruta[0] == "generico" ||
        $ruta[0] == "productos") {
    
        include_once "view/doc/".$ruta[0].".php";

    }else{

        include_once "view/doc/error/error404.php";

    }

}else{

    include_once "view/doc/dashboard.php";

}

include_once "doc/include/footer.php";