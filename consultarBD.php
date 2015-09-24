<?php
session_start();
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

$queryLogin = "Select * from personas WHERE password = '$md5PassWord' and usuario = '$cifUser';";
$result = pg_query($conn, $queryLogin) or die("<strong>Error durante la consulta.</strong>");



/*
  $resultNombre = cifrarDescifrar(false, $row[0]);
  $resultApellido1 = cifrarDescifrar(false, $row[1]);
  $resultApellido2 = cifrarDescifrar(false, $row[2]);
  $resultCorreo= cifrarDescifrar(false, $row[3]); */
if ($row = pg_fetch_row($result)){
    $row[0] = cifrarDescifrar(false, $row[0]);
    $row[1] = cifrarDescifrar(false, $row[1]);
    $row[2] = cifrarDescifrar(false, $row[2]);
    $row[3] = cifrarDescifrar(false, $row[3]);
    $_SESSION["loggedUsuario"] = $row;
    echo $_SESSION;
}
 else {
        echo "false";
}