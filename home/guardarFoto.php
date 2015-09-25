<?php
session_start();
include '../procesar.php';
//conexion
$session=$_SESSION["loggedUsuario"];
$strconn = "host=localhost port=5432 dbname=webBD user=postgres password=12345";
$conn = pg_connect($strconn) or die("<strong> Ha ocurrido un error en el acceso a la base de datos. </strong>");
//fin de conexion
//codigo para importar una imgagen al servidor
$ruta = "profilePictures";
$archivo = $_FILES['imagen']['tmp_name'];
$nombreArchivo = $_FILES['imagen']['name'];

$strUsuario = $session[3];

$strUsuario = cifrarDescifrar(true, $strUsuario);

move_uploaded_file($archivo, $ruta . "/" .$strUsuario);

$ruta = $ruta . "/" .$strUsuario;
header("Location: home.php");
die();
        