/*
 * Funcion para validar los datos de inicio de sesion
 * **/

function verificarInicioSesion() {
    var input_pass = document.getElementById("contraseña");
    var input_user = document.getElementById("correoElectronico");
    input_pass.value = btoa(input_pass.value);
    var llamada = "consultarBD.php?usuario=" + input_user.value +
            "&password=" + input_pass.value;

    var peticion = new XMLHttpRequest();
    peticion.open("GET", llamada, true);
    console.log(llamada);
    peticion.onreadystatechange = function ()
    {
        if (peticion.readyState === 4)
        {
            if (peticion.responseText !== "false") {
                window.location.href = "home.php";
            }
            if (peticion.responseText === "false") {
                console.log("mal");
            }
        }
    };
    peticion.send(null);
}



var edita = true;

//Funcion para habilitar la edicion de informacion en el perfil
function cambiar() {    
    if (edita === true) {        
        var candado = document.getElementById("locker");
        candado.setAttribute("src", "/Imagenes/unlock.png");
        document.getElementById("nombreTF").disabled = false;
        document.getElementById("apellido1TF").disabled = false;
        document.getElementById("apellido2TF").disabled = false;
        document.getElementById("generoTF").disabled = false;
        document.getElementById("empresaTF").disabled = false;
        document.getElementById("fechaIngTF").disabled = false;
        document.getElementById("labelTextoLock").innerHTML="Guardar cambios";
        edita=false;
    }
    else {
        var candado = document.getElementById("locker");
        candado.setAttribute("src", "/Imagenes/lock.png");
        document.getElementById("nombreTF").disabled = true;
        document.getElementById("apellido1TF").disabled = true;
        document.getElementById("apellido2TF").disabled = true;
        document.getElementById("generoTF").disabled = true;
        document.getElementById("empresaTF").disabled = true;
        document.getElementById("fechaIngTF").disabled = true;
        document.getElementById("labelTextoLock").innerHTML="Habilitar cambios";
        edita=true;
    }
}