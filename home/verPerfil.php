<?php
session_start();
include '../procesar.php';
?>
<link rel="stylesheet" href="../home/home.css">

<div id="registro" class="divs">
    <?php
    $session = $_SESSION["loggedUsuario"];
    $urlImg = cifrarDescifrar(true, $session[3]); //cifrar el contenido del usuario, para acceder a la ruta de la imagen en el server
    $urlImg = "/profilePictures/" . $urlImg;
    ?>

    <center>
        <table>
            <tr>
            <center>
                <img  style="border-radius: 10px;width: 80px; height: 100px" src='<?php echo $urlImg ?>'><!--Foto-->                
                <!--<form id="formImagen" method = "POST" action="guardarFoto.php" enctype="multipart/form-data">                    
                    <input id="imagen" type = "file" name = "imagen" onchange="cambiarImagen()">                                                    
                </form>                
                -->
            </center>
            </tr>
            <tr>
                <td><strong>Nombre</strong></td>         

                <td><input id="nombreTF" type="text" name="nombre" disabled="true" value="<?php echo $session[0] ?>"></td><!--Nombre-->
            </tr>
            <tr>
                <td><strong>Primer Apellido</strong></td>                
                <td><input id="apellido1TF" type="text" name="apellido2" disabled="true" value="<?php echo $session[1] ?>"></td><!--Apellido-->
            </tr>
            <tr>
                <td><strong>Segundo Apellido</strong></td>                
                <td><input id="apellido2TF" type="text" name="apellido2" disabled="true" value="<?php echo $session[2] ?>"></td><!--Segundo apellido-->
            </tr>
            <tr>
                <td><strong>Género</strong></td>                
                <td>
                    <select name="generoTF" id="generoTF" onchange="" size="1" disabled="true">
                        <?php if($session[5] == "m") { ?>
                            <option value="m" selected>Masculino</option>
                            <option value="f">Femenino</option>
                        <?php } else { ?>
                            <option value="m">Masculino</option>
                            <option value="f" selected>Femenino</option>
                        <?php } ?>
                    </select>
                </td><!--Genero-->
            </tr>
            <tr>
                <td><strong>Ingreso al TEC</strong></td>                
                <td>
                    <input name="fechaIngTF" id="fechaIngTF" type="date" disabled="true" value="<?php echo $session[6]?>">
                </td><!--Fecha de ingreso al TEC-->
            </tr>
            <tr>
                <td><strong>Empresa</strong></td>                
                <td><input id="empresaTF" type="text" name="empresa" disabled="true" value="<?php if ($session[7] == "") echo"No tiene empresa registrada";if ($session[7] != "") echo $session[7] ?>"></td><!--Empresa actual-->
            </tr>
        </table>
    </center>

    <img src="../Imagenes/lock.png"onclick="cambiar()"id="locker" class="btnLock">
    <a id="labelTextoLock">Habilitar cambios</a>



</div>

<?php

/* 
 * 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

