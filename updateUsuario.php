<?php

session_start();

include './procesar.php';

$strconn = "host=localhost port=5432 dbname=webBD user=postgres password=12345";
$conn = pg_connect($strconn) or die("<strong> Ha ocurrido un error en el acceso a la base de datos. </strong>");

$strNombre = $_GET["nombre"];
$strApellido1 = $_GET["apellido1"];
$strApellido2 = $_GET["apellido2"];
$strEmpresa = $_GET["empresa"];
$strFechaIng = $_GET["fechaIng"];
$strGenero = $_GET["genero"];
$session = $_SESSION["loggedUsuario"];
$strCorreo = $session[3];

//cifrar los datos

$cifNombre = cifrarDescifrar(true, $strNombre);
$cifApellido1 = cifrarDescifrar(true, $strApellido1);
$cifApellido2 = cifrarDescifrar(true, $strApellido2);
$cifCorreo = cifrarDescifrar(true, $strCorreo);



// fin de cifrar datos
//insertar una persona
$queryInsert = "UPDATE personas SET nombre='$cifNombre', apellido1='$cifApellido1', apellido2='$cifApellido2', genero='$strGenero', empresa='$strEmpresa' WHERE usuario = '$cifCorreo'";
$result = pg_query($conn, $queryInsert);
if (!$result) {
    echo "false"; //no actualizó
} elseif ($result) {
    
    //si el usuario se actualiza, también la sesion activa, por medio de una consulta
    $queryLogin = "Select * from personas WHERE usuario = '$cifCorreo';";
    $result = pg_query($conn, $queryLogin) or die("<strong>Error durante la consulta.</strong>");

    if ($row = pg_fetch_row($result)) {
        $row[0] = cifrarDescifrar(false, $row[0]);
        $row[1] = cifrarDescifrar(false, $row[1]);
        $row[2] = cifrarDescifrar(false, $row[2]);
        $row[3] = cifrarDescifrar(false, $row[3]);
        $_SESSION["loggedUsuario"] = $row;
        echo $_SESSION;        
    }
}
           