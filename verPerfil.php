<?php
session_start();
?>
<link rel="stylesheet" href="css/home.css">
<div id="registro" class="divs">
    <?php
    $session = $_SESSION["loggedUsuario"];
    ?>
    <center>
        <table>
            <tr>
            <center>
                <img  style="border-radius: 10px;width: 80px; height: 100px" src='<?php if ($session[9] != "") echo $session[9];if ($session[9] == "") echo "profilePictures/profile"; ?>'><!--Foto-->                
                <form method = "POST" action = "insertar.php" enctype="multipart/form-data">                    
                    <input type = "file" name = "imagen">
                    <br>            
                    <input type="submit" value = "Guardar">
                </form>
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
                <td><input id="generoTF" type="text" name="genero" disabled="true" value="<?php if ($session[5] == 'm') echo "Masculino";if ($session[5] == 'f') echo"Femenino" ?>"></td><!--Genero-->
            </tr>
            <tr>
                <td><strong>Ingreso al TEC</strong></td>                
                <td><input id="fechaIngTF" type="text" name="fechaIng" disabled="true" value="<?php echo $session[6] ?>"></td><!--Fecha de ingreso al TEC-->
            </tr>
            <tr>
                <td><strong>Empresa</strong></td>                
                <td><input id="empresaTF" type="text" name="empresa" disabled="true" value="<?php if ($session[7] == "") echo"No tiene empresa registrada";if ($session[7] != "") echo $session[7] ?>"></td><!--Empresa actual-->
            </tr>
        </table>
    </center>

    <img src="/Imagenes/lock.png"onclick="cambiar()"id="locker" class="btnLock">
    <a id="labelTextoLock">Habilitar cambios</a>



</div>
<?php

/* 
 * 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

