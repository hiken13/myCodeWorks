<link rel="stylesheet" href="amigos/style.css">
<table>
    <tr>
        <br>
        <label class="lblAmigos" onclick="cargarAjax('GET', '/home/verPerfil.php', true, 'panel')">Buscar Amigos</label>
        <label class="lblAmigos" onclick="getAllUser()">Mis Amigos</label>
    </tr>

    <tr>
        <td> 
            <div id="contenedorAmigos" class="contenedores">
                <div  id="search">
                    <input name="q" type="text" size="40" placeholder="Buscar..." />
                </div>
                <hr>
                <div id="contenedor">
                    
                </div>
            </div>
        </td>

        <td>
            <div id="muro" class="contenedores">
            </div>
        </td>
    </tr>
</table>