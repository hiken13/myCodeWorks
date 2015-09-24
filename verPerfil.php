<?php
session_start();
?>
<div id="registro" class="divs">
    <?php
    $session = $_SESSION["loggedUsuario"];
    ?>
    <center>
        <table>
            <tr>
            <center>
                <img  style="width: 80px; height: 100px" src='<?php echo $session[9]?>'>
            </center>
            </tr>
            <tr>
                <td><strong>Nombre</strong></td>         

                <td><input id="nombre" type="text" name="nombre" disabled="true" value="<?php echo $session[0] ?>"></td>
            </tr>
            <tr>
                <td><strong>Primer Apellido</strong></td>                
                <td><input id="apellido1" type="text" name="apellido2" disabled="true" value="<?php echo $session[1] ?>"></td>
            </tr>
            <tr>
                <td><strong>Segundo Apellido</strong></td>                
                <td><input id="apellido2" type="text" name="apellido2" disabled="true" value="<?php echo $session[2] ?>"></td>
            </tr>
            <tr>
                <td><strong>Género</strong></td>                
                <td><input id="genero" type="text" name="genero" disabled="true" value="<?php if($session[5]=='m')echo "Masculino";if($session[5]=='f')echo"Femenino" ?>"></td>
            </tr>
            <tr>
                <td><strong>Ingreso al TEC</strong></td>                
                <td><input id="fechaIng" type="text" name="fechaIng" disabled="true" value="<?php echo $session[6] ?>"></td>
            </tr>
            <tr>
                <td><strong>Empresa</strong></td>                
                <td><input id="empresa" type="text" name="empresa" disabled="true" value="<?php if ($session[7] == "") echo"No tiene empresa registrada";
    if ($session[7] != "") echo $session[7] ?>"></td>
            </tr>

    </center>
</div>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

