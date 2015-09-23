<?php

include './procesar.php';

$strconn = "host=localhost port=5432 dbname=webBD user=postgres password=12345";
$conn = pg_connect($strconn) or die("<strong> Ha ocurrido un error en el acceso a la base de datos. </strong>");

$strUser = $_GET["usuario"]; //correo electronico

//$cifUser = cifrarDescifrar(true, $strUser);

$queryLogin = "Select * from personas WHERE usuario = '$strUser';";
$result = pg_query($conn, $queryLogin) or die("<strong>Error durante la consulta.</strong>");

$row = pg_fetch_row($result);

if ($row == "") {
    echo "false";
} else {
    echo "true";
}