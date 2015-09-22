<?php

include './procesar.php';
//conexion
$strconn = "host=localhost port=5432 dbname=webBD user=postgres password=12345";
$conn = pg_connect($strconn) or die("<strong> Ha ocurrido un error en el acceso a la base de datos. </strong>");
//fin de conexion

$strUser = $_GET["usuario"];
$encodedPass = $_GET["password"];
$strPass = base64_decode($encodedPass);
$md5PassWord = md5($strPass);
$cifUser = cifrarDescifrar(true, $strUser);

$queryLogin = "Select nombre, apellido1, apellido2, foto from personas WHERE password = '$md5PassWord' and usuario = '$cifUser';";
$result = pg_query($conn, $queryLogin) or die("<strong>Error durante la consulta.</strong>");

$row2 = pg_fetch_row($result);
$resultNombre = cifrarDescifrar(false, $row2[0]);
$resultApellido = cifrarDescifrar(false, $row2[1]);
$resultApellido2 = cifrarDescifrar(false, $row2[2]);
if ($row2 == "") {
    echo "false";
}
else{
    echo $resultNombre." ".$resultApellido." ".$resultApellido2;
}

    