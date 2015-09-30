<?php
    include '../procesar.php';
    $conn = pg_connect("host=localhost port=5432 dbname=webBD user=postgres password=12345") or die("<strong> Ha ocurrido un error en el acceso a la base de datos. </strong>");
    $result = pg_query($conn, "select * from publicaciones");
    
    $posicion = 0;
    $arreglo;
    while($row = pg_fetch_row($result))
    {
        $row[0] = cifrarDescifrar(false, $row[0]);//Usuario que la publicó                               
        $arreglo[$posicion] = $row;
        $posicion++;
    }
    //print json_encode(pg_fetch_all($result));    
    print json_encode($arreglo);
?>