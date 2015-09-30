<?php
include '../procesar.php';
$conn = pg_connect("host=localhost port=5432 dbname=webBD user=postgres password=12345") or die("<strong> Ha ocurrido un error en el acceso a la base de datos. </strong>");

$correo = $_GET["correo"]; //correo electronico

$queryGet = "select * from publicaciones where usuario='$correo';";
$result = pg_query($conn, $queryGet) or die("<strong>Error durante la consulta.</strong>");

print json_encode(pg_fetch_all($result));
?>