<?php

/*--=====================================================
AUTOGENERAR CODIGO
======================================================-*/

function autogenera_codigo($letras,$table)
{
	$stmt = Conexion::Conectar()->prepare("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'sistema_farmacia' AND TABLE_NAME = '".$table."'");

    $stmt->execute();

    $rows = $stmt->fetch();

	$cont = $rows["AUTO_INCREMENT"];
	$num = sprintf("%'.05d", $cont);
	$codigo = $letras . $num; 

	return $codigo;

}

/*--=====================================================
VALIDAR CAMPOS VACIOS
======================================================-*/

function validaramposVacios($array) {

	$num = count($array);

	for ($i=0; $i < $num; $i++) { 
		if (empty($array[$i])) {
			return "vacio";
			break;
		}
	}

	return "ok";

}