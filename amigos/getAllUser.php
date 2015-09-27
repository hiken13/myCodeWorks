<?php
    include '../procesar.php';
    $conn = pg_connect("host=localhost port=5432 dbname=webBD user=postgres password=12345") or die("<strong> Ha ocurrido un error en el acceso a la base de datos. </strong>");
    $result = pg_query($conn, "select * from personas");
    
    $posicion = 0;
    $arreglo;
    while($row = pg_fetch_row($result))
    {
        $row[0] = cifrarDescifrar(false, $row[0]);//NOmbre
        $row[1] = cifrarDescifrar(false, $row[1]);//Apellido1
        $row[2] = cifrarDescifrar(false, $row[2]);//Apellido2
        $row[3] = cifrarDescifrar(false, $row[3]);//Correo
        // $row[4] contraseña
        //$row[5] Genero
        //$row[6] Fecha Ingreso
        //$row[7] Empresa
        
        
        //echo $row[0].$row[1].$row[2].$row[3];
        $arreglo[$posicion] = $row;
        $posicion++;
    }
    //print json_encode(pg_fetch_all($result));
    print json_encode($arreglo);
?>