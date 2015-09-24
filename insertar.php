<?php
session_start();
include 'procesar.php';
echo "Hola";
//conexion
$strconn = "host=localhost port=5432 dbname=webBD user=postgres password=12345";
$conn = pg_connect($strconn) or die("<strong> Ha ocurrido un error en el acceso a la base de datos. </strong>");
//fin de conexion
//codigo para importar una imgagen al servidor
$ruta = "imagenes";
$archivo = $_FILES['imagen']['tmp_name'];
$nombreArchivo = $_FILES['imagen']['name'];
$nombreArchivo = cifrarDescifrar(true, $nombreArchivo);

$strUsuario = $_POST["usuario"];
//echo $strUsuario;
$strUsuario = cifrarDescifrar(true, $strUsuario);

move_uploaded_file($archivo, $ruta . "/" .$strUsuario.$nombreArchivo);



$ruta = $ruta . "/" .$strUsuario.$nombreArchivo;
//echo "RUTA:: ".$ruta;
//echo "<br> <img src='$ruta'>";



guardarImagen($strUsuario,$ruta);
//consultarMifoto($strUsuario);
        
//guardar la imagen en la bd en el resgistro que se envia por parametro
function guardarImagen($id,$ruta) {    
    //conexion
    $strconn = "host=localhost port=5432 dbname=webBD user=postgres password=12345";
    $conn = pg_connect($strconn) or die("<strong> Ha ocurrido un error en el acceso a la base de datos. </strong>");
    //
    
    // verificar si el usuario ya tenia una imagen antes de actualizarla, de ser asi se borra de la bd
    $querySelectFoto = "SELECT foto from personas where usuario = '$id'";
    $oldRuta = pg_query($conn, $querySelectFoto);
    $rutaResultado = pg_fetch_row($oldRuta);
    if($rutaResultado[0]!=""){
        unlink($rutaResultado[0]);
    }
    
    $queryUpdate = "UPDATE personas SET foto='$ruta' WHERE usuario='$id';";
    $result = pg_query($conn, $queryUpdate);
    if ($result) { 
        //echo "insercion exitosa";
    } else {
        echo "Fallo guardando la imagen en la base de datos";
    }
}

//consultarMifoto(79);

function consultarMifoto($Usuario) {
    $strconn = "host=localhost port=5432 dbname=webBD user=postgres password=12345";
    $conn = pg_connect($strconn) or die("<strong> Ha ocurrido un error en el acceso a la base de datos. </strong>");
    $queryInsert = "SELECT foto from personas where usuario = '$Usuario'";
    $rutaN = pg_query($conn, $queryInsert);
    $rutaResultado = pg_fetch_row($rutaN);
    if ($rutaN) {        
        echo "Foto: <img src='$rutaResultado[0]'>";
    }
    else {
        echo "KIA";
    }
}

?>