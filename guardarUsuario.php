<?php
session_start();

include './procesar.php';

$strconn = "host=localhost port=5432 dbname=webBD user=postgres password=12345";
$conn = pg_connect($strconn) or die("<strong> Ha ocurrido un error en el acceso a la base de datos. </strong>");

$strNombre = $_GET["nombre"];
$strApellido1 = $_GET["apellido1"];
$strApellido2 = $_GET["apellido2"];
$strCorreo = $_GET["correo"];
$strContraseña = $_GET["contraseña"];
$strFechaIng = $_GET["fechaIng"];
$strGenero = $_GET["genero"];

//cifrar los datos

$cifNombre = cifrarDescifrar(true, $strNombre);
$cifApellido1 = cifrarDescifrar(true, $strApellido1);
$cifApellido2 = cifrarDescifrar(true, $strApellido2);
$cifCorreo = cifrarDescifrar(true, $strCorreo);

$md5PassWord = md5($strContraseña);

// fin de cifrar datos
//insertar una persona
$queryInsert = "INSERT INTO personas values('$cifNombre','$cifApellido1', '$cifApellido2', '$cifCorreo', '$md5PassWord', '$strGenero','$strFechaIng')";
$result = pg_query($conn, $queryInsert);
if (!$result) {
    echo "false"; //no agrego
} elseif ($result) {
    echo "true"; //usuario agregado
}
              // fin insertar una persona