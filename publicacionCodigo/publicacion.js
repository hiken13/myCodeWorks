function verificarPublicacion(){
    var publicacion = document.getElementById("publicacion").value;
    var lenguaje =  document.getElementById("lenguaje").value;
    var descripcion = document.getElementById("descripcion").value;
    if(publicacion === "" || lenguaje ==="" || descripcion ==="" || publicacion === " " || lenguaje ===" " || descripcion ===" "){
        alert("Error existen espacios en blanco");
    }
    else{
        
    }
}

function guardarPublicacion(nombre, apellido1, apellido2, empresa, fecha, genero, pass, newPass) {

    var llamada = "/home/updateUsuario.php?nombre=" + nombre + "&apellido1=" + apellido1 + "&apellido2=" + apellido2 + "&empresa=" + empresa + "&fechaIng=" + fecha + "&genero=" + genero + "&pass=" + pass + "&newPass=" + newPass;
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
                console.log("usuario actualizado");
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

