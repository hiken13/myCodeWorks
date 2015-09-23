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
                document.getElementById(dondeCargar).innerHTML = "";
                document.getElementById(dondeCargar).innerHTML = peticion.responseText;
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
    peticion.send(null);
}


function existeUsuario(input_user) {
    
    var llamada = "controladorBD.php?usuario=" + input_user;

    var peticion = new XMLHttpRequest();
    peticion.open("GET", llamada, true);
    console.log(llamada);
    
    peticion.onreadystatechange = function ()
    {
        if (peticion.readyState === 4)
        {
            console.log(peticion.responseText);

            if (peticion.responseText === "true") {
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