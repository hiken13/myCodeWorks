<?php
include '../procesar.php';
session_start();
$session = $_SESSION["loggedUsuario"];



$strconn = "host=localhost port=5432 dbname=webBD user=postgres password=12345";
$conn = pg_connect($strconn) or die("<strong> Ha ocurrido un error en el acceso a la base de datos. </strong>");



$correo = cifrarDescifrar(ture, $session[3]);
$strDescripcion = $_GET["descripcion"];
$strLenguaje = $_GET["lenguaje"];
$strCodigo = $_GET["codigo"];

// fin de cifrar datos
//insertar una persona
$queryInsert = "INSERT INTO publicaciones values('$correo','$strDescripcion', '$strLenguaje', '$strCodigo')";
$result = pg_query($conn, $queryInsert);
if (!$result) {
    echo "false"; //no agrego
} elseif ($result) {
    echo "true"; //usuario agregado
}
              // fin insertar una persona