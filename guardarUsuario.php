<?php

$strNombre = $_GET["nombre"];
$strApellido1 = $_GET["apellido1"];
$strApellido2 = $_GET["apellido2"];
$strFechaIng = $_GET["fechaIng"];
$strGenero = $_GET["genero"];

//cifrar los datos
$cifUser = cifrarDescifrar(true, $strUser);
$cifNombre = cifrarDescifrar(true, $strNombre);
$cifApellido1 = cifrarDescifrar(true, $strApellido1);
$cifApellido2 = cifrarDescifrar(true, $strApellido2);

// fin de cifrar datos
//insertar una persona
$queryInsert = "INSERT INTO personas values('$cifNombre','$cifApellido1', '$cifApellido2', '$cifUser', '$md5PassWord', '$strGenero','$strFechaIng')";
$result = pg_query($conn, $queryInsert);
if (!$result) {
    echo "Query: Un error ha occurido.\n";
} elseif ($result) {
    echo "Se registro correctamente.\n";
}
              // fin insertar una persona
             