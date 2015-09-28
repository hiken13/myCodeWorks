<link rel="stylesheet" href="amigos/style.css">
<table>
    <tr>
        <br>
        <label class="lblAmigos" style="width: 50%" onclick="cargarAjax('GET', '/home/verPerfil.php', true, 'panel')">Buscar Amigos</label>
        <label class="lblAmigos" onclick="getAllUser()">Mis Amigos</label>
    </tr>

    <tr style="height: 350px">
        <td id="seccionAmigos">            
        </td>

        <td>
            <div id="muro" class="contenedores">
            </div>
        </td>
    </tr>
</table>