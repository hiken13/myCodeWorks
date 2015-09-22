<?php
//Funcion para encriptar y desencriptar los datos de la bd
function cifrarDescifrar($cifrar, $string) {
    $salida = false;

    $encrypt_method = "AES-256-CBC";
    $llaveSecreta = '500c74ddc7ea174bbea9310addc1e421'; //llave para desencriptar los datos no sensibles de la bd
    $ivSecreto = '596b84bfe0238e3128b99f14e80ad1c3 '; //iv para descifrar los datos de la bd
    // hash
    $key = hash('sha256', $llaveSecreta);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $ivSecreto), 0, 16);

    if ($cifrar == true) {//descifrar
        $salida = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $salida = base64_encode($salida);
    } else if ($cifrar == false) {//descifrar
        $salida = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $salida;
}

?>