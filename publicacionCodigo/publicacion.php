<link rel="stylesheet" href="../publicacionCodigo/style.css">

<meta charset="utf-8">

<table style="width: 550px">
    <tr>
        <td style="height: 350px" id="seccionPublicar" class="contenedores">            
            <textarea name="title" id="descripcion" cols="45" rows="5" placeholder="Descripción"></textarea><br>
            <textarea name="language" id="lenguaje" cols="45" rows="1" placeholder="Lenguaje"></textarea><br>
            <textarea name="publicacion" id="publicacion" cols="45" rows="25" placeholder="Escriba su código, si funciona..."></textarea>            
    <center>
        <button class="boton" onclick="verificarPublicacion()">Publicar</button>        
    </center>
</td>        

<td class="contenedores">
<center>
    <button id="publicar" class="boton" onclick="getAllPosts()">Cargar publicaciones</button>        
</center>
<div id = "muro" class="contenedor" style="width: 450px">        
</div>
</td>

</tr>

</table>