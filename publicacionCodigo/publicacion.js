/**
 * 
 * función para verificar que la publicación se adapte a las normas de la página
 * @returns {undefined}
 */
function verificarPublicacion() {
    var publicacion = document.getElementById("publicacion").value;
    var lenguaje = document.getElementById("lenguaje").value;
    var descripcion = document.getElementById("descripcion").value;
    if (publicacion === "" || lenguaje === "" || descripcion === "" || publicacion === " " || lenguaje === " " || descripcion === " ") {
        alert("Error existen espacios en blanco");
    }
    else {
        publicacion = publicacion.split('\n');
        console.log(publicacion.length);
        if (publicacion.length > 500) {
            alert("Demasiadas lineas de codigo, el límite es 500");
        }
        else {
            guardarPublicacion(descripcion, publicacion, lenguaje)
        }
    }
}

/**
 * Funcion para llamar al php que guarda la publicacion en la base de datos
 * @param {type} descripcion descripcion del codigo
 * @param {type} publicacion el código
 * @param {type} lenguaje Lenguaje en el que se pogramó
 * @returns {undefined} true si guarda, false si no
 */
function guardarPublicacion(descripcion, codigo, lenguaje) {

    var llamada = "/publicacionCodigo/guardarPublicacion.php?descripcion=" + descripcion + "&lenguaje=" + lenguaje + "&codigo=" + codigo;
    var peticion = new XMLHttpRequest();
    peticion.open("GET", llamada, true);
    console.log(llamada);

    peticion.onreadystatechange = function ()
    {
        if (peticion.readyState === 4)
        {
            console.log(peticion.responseText);

            if (peticion.responseText !== "false")
            {
                //guarda la publicacion
                alert("Su código fue publicado con éxito");
                document.getElementById("publicacion").value="";
                document.getElementById("lenguaje").value="";
                document.getElementById("descripcion").value="";
                return true;
            }
            else
            {//no guarda la publicacion
                alert("Error al publicar el código, lo sentimos");
                return false;
            }
        }
    };
    peticion.send(null);
}

