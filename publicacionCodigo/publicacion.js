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
                document.getElementById("publicacion").value = "";
                document.getElementById("lenguaje").value = "";
                document.getElementById("descripcion").value = "";                
                return true;
            }
            else
            {//no guarda la publicacion
                alert("Error al publicar el código, lo sentimos");
                return false;
            }            
        }
    };
    getAllPosts();
    peticion.send(null);
}
/***
 * Metodo para obtener todas las publicaciones en un arreglo
 * @returns {undefined}
 */
function getAllPosts() {
    var llamada = "publicacionCodigo/getAllPosts.php";

    var peticion = new XMLHttpRequest();
    peticion.open("GET", llamada, true);

    peticion.onreadystatechange = function ()
    {
        if (peticion.readyState === 4)
        {
            if (peticion.status === 200)
            {
                jsonPosts = eval("(" + peticion.responseText + ")");
                postPublicaciones(jsonPosts);
            }
            else
            {
                console.log("error al recuperar los usuarios");
            }
        }
    };
    peticion.send(null);
}

/**
 * Recorre el arreglo con las publicaciones y las dibuja con DOM en el muro de publicaciones
 * obteniendo los valores de cada publicaicón
 * @param {type} jsonPostsAux arreglo con las publicaciones
 * @returns {undefined}
 */
function postPublicaciones(jsonPostsAux) {
    document.getElementById("muro").innerHTML="";
    for (var i = 0; i < jsonPostsAux.length; i++) {
        var post = jsonPostsAux[i];


        var div = document.createElement("div");
        var descripcion = document.createElement("textarea");
        descripcion.setAttribute("cols", "45");
        descripcion.setAttribute("rows", "5");
        descripcion.setAttribute("disabled","true");
        descripcion.value = jsonPostsAux[i][1];

        var lenguaje = document.createElement("textarea");
        lenguaje.setAttribute("cols", "45");
        lenguaje.setAttribute("rows", "1");        
        lenguaje.setAttribute("disabled","true");
        lenguaje.value = jsonPostsAux[i][2];

        var codigo = document.createElement("textarea");
        codigo.setAttribute("cols", "45");
        codigo.setAttribute("rows", "25");        
        codigo.setAttribute("disabled","true")
        
        codigo.value = jsonPostsAux[i][3];

        div.appendChild(descripcion);
        div.appendChild(lenguaje);
        div.appendChild(codigo);
        div.className = "contenedor";

        console.log(descripcion.value);
        console.log(lenguaje.value);
        console.log(codigo.value);


        var muro = document.getElementById("muro");
        muro.appendChild(div);        
    }
}