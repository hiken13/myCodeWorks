<?php

session_start();

$strPass = $_GET["pass"];
/*
 * Funcion para verificar que la contraseña introducida, sea igual a la que está usando
 * actualmente
 * @param contraseña a verificar
 * * */

$session = $_SESSION["loggedUsuario"];
$strPass = base64_decode($strPass);
$cifPassword = md5($strPass);


if ($session[4] === $cifPassword) {    
    echo "true";
} else {
    echo "false";
}



