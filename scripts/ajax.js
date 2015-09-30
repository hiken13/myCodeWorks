function obtenerXHR()
{
    req = false;
    if (window.XMLHttpRequest)
    {
        req = new XMLHttpRequest();
    }
    else
    {
        if (ActiveXObject)
        {
            var vectorVersiones = ["MSXML2.XMLHttp.5.0", "MSXML2.XMLHttp.4.0", "MSXML2.XMLHttp.3.0", "MSXML2.XMLHttp", "Microsoft.XMLHttp"];
            for (var i = 0; i < vectorVersiones.lengt; i++)
            {
                try
                {
                    req = new ActiveXObject(vectorVersiones[i]);
                    return req;
                }
                catch (e)
                {
                }
            }
        }
    }
    return req;
}



function cargarAjax(metodo, queCargar, sync, dondeCargar)
{


    var peticion = obtenerXHR();
    peticion.open(metodo, queCargar, sync);
    peticion.onreadystatechange = function ()
    {
        if (peticion.readyState === 4)
        {
            if (peticion.status === 200)
            {
                var a = document.getElementById(dondeCargar).innerHTML;
                if (a!==null){
                    document.getElementById(dondeCargar).innerHTML = "";
                    document.getElementById(dondeCargar).innerHTML = peticion.responseText;
                }
            }
            /*
             else
             {
             console.log("Error de la petición: "+peticion.status);
             }*/
        }
        /*
         else 
         {
         document.getElementById(capaAviso).innerHTML="Cargando...";             
         console.log("Estado de la Petición: "+peticion.readyState); 
         }*/
    };
    if (queCargar === "/home/verPerfil.php") {
        document.getElementById("formImagen").style.display = 'block';
    }
    else {
        document.getElementById("formImagen").style.display = 'none';
    }
    peticion.send(null);
}


/**
 * Funcion para corroborar la existencia de un usuario, si existe retorna true,
 *  caso contrario false
 * @param {type} usuario a buscar
 * @returns {undefined}console.log(peticion.responseText);
 */
function existeUsuario(input_user) {

    var llamada = "existeUsuario.php?usuario=" + input_user;
    var peticion = new XMLHttpRequest();
    peticion.open("GET", llamada, true);
    console.log(llamada);
    peticion.onreadystatechange = function ()
    {
        if (peticion.readyState === 4)
        {
            if (peticion.responseText === "true")
            {
                console.log("error el usuario existe");
                return true;
            }
            else
            {//guardar registro
                console.log("registro guardado");
                return false;
            }
        }
    };
    peticion.send(null);
}

function guardarUsuario(nombre, apellido1, apellido2, correo, contraseña, fecha, genero) {
    var llamada = "guardarUsuario.php?nombre=" + nombre + "&apellido1=" + apellido1 + "&apellido2=" + apellido2 + "&correo=" + correo + "&contraseña=" + contraseña + "&fechaIng=" + fecha + "&genero=" + genero;
    var peticion = new XMLHttpRequest();
    peticion.open("GET", llamada, true);
    console.log(llamada);
    peticion.onreadystatechange = function ()
    {
        if (peticion.readyState === 4)
        {
            if (peticion.responseText === "true")
            {
                console.log("usuario guardado");
                return true;
            }
            else
            {//guardar registro
                console.log("error al agregar usuario");
                return false;
            }
        }
    };
    peticion.send(null);
}