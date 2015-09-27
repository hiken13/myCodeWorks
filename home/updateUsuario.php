<?php

session_start();

include '../procesar.php';

$strconn = "host=localhost port=5432 dbname=webBD user=postgres password=12345";
$conn = pg_connect($strconn) or die("<strong> Ha ocurrido un error en el acceso a la base de datos. </strong>");

$strNombre = $_GET["nombre"]; //nombre
$strApellido1 = $_GET["apellido1"]; //Primer Apellido
$strApellido2 = $_GET["apellido2"]; //Segundo Apellido
$strEmpresa = $_GET["empresa"]; // empresa
$strFechaIng = $_GET["fechaIng"]; // fecha de ingreso al TEC
$strGenero = $_GET["genero"]; // Genero
$strPass = $_GET["pass"]; //constraseña actual
$strNewPass = $_GET["newPass"]; //contraseña nuevo 
//los pass llegan cifrados en 64 bits, por lo que se van a decifrar para aplicarle el md5 y posteriormente
//interactuar con la base de datos
$strPass = base64_decode($strPass);
$strNewPass = base64_decode($strNewPass);
//aplicar el md5:

if ($strPass != "false" && $strNewPass != "false") {    
    $cifPass = md5($strPass);
    $cifNewPass = md5($strNewPass);
}



$session = $_SESSION["loggedUsuario"];
$strCorreo = $session[3];

//cifrar los datos

$cifNombre = cifrarDescifrar(true, $strNombre);
$cifApellido1 = cifrarDescifrar(true, $strApellido1);
$cifApellido2 = cifrarDescifrar(true, $strApellido2);
$cifCorreo = cifrarDescifrar(true, $strCorreo);


// fin de cifrar datos
//insertar una persona
if ($strPass != "false" && $strNewPass != "false") {
    $queryInsert = "UPDATE personas SET nombre='$cifNombre', apellido1='$cifApellido1', apellido2='$cifApellido2', genero='$strGenero', \"fechaIngreso\" ='$strFechaIng', empresa='$strEmpresa',password='$cifNewPass' WHERE usuario = '$cifCorreo' and password='$cifPass'";
    $result = pg_query($conn, $queryInsert);
    
} else {
    $queryInsert = "UPDATE personas SET nombre='$cifNombre', apellido1='$cifApellido1', apellido2='$cifApellido2', genero='$strGenero', \"fechaIngreso\" ='$strFechaIng', empresa='$strEmpresa' WHERE usuario = '$cifCorreo'";
    $result = pg_query($conn, $queryInsert);
}
//$result = pg_query($conn, $queryInsert);
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
           