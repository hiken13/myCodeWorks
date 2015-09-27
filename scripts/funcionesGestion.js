/*
 * Funcion para validar los datos de inicio de sesion
 * **/


function verificarInicioSesion() {
    var input_pass = document.getElementById("contraseña");
    console.log("Este es el pass: " + input_pass.value);
    input_pass.value = btoa(input_pass.value);//encriptar la contraseña

    var input_user = document.getElementById("correoElectronico");


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
                console.log(peticion.responseText);
                window.location.href = "/home.php";
            }
            if (peticion.responseText === "false") {
                console.log("mal");
            }
        }
    };
    peticion.send(null);
}



var edita = true;
/**
 * Función para habilitar la edición y guardar cambios en el perfil del usuario
 * se encarga de obtener los datos, de los text fields y enviarlos a la base de datos
 * también verifica que se desee cambiar contraseñas
 * @returns {undefined}
 */
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
        document.getElementById("passTF").disabled = false;
        document.getElementById("newPassTF").disabled = false;
        document.getElementById("labelTextoLock").innerHTML = "Guardar cambios";

        edita = false;
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
        document.getElementById("passTF").disabled = true;
        document.getElementById("newPassTF").disabled = true;
        document.getElementById("labelTextoLock").innerHTML = "Habilitar cambios";

        //tomar los valores para actualizar
        var nombre = document.getElementById("nombreTF").value;
        var apellido1 = document.getElementById("apellido1TF").value;
        var apellido2 = document.getElementById("apellido2TF").value;
        var genero = document.getElementById("generoTF").value;
        var empresa = document.getElementById("empresaTF").value;
        var fechaIng = document.getElementById("fechaIngTF").value;
        var pass = document.getElementById("passTF").value;
        var newPass = document.getElementById("newPassTF").value;

        if (pass !== "" && newPass !== "") {
            pass = btoa(pass);//encriptar la contraseña
            newPass = btoa(newPass);
            
            verificarPass(nombre, apellido1, apellido2, empresa, fechaIng, genero, pass, newPass);// verificar que el password sea correcto, de ser así ejecuta el query
        }
        else {
            updateUsuario(nombre, apellido1, apellido2, empresa, fechaIng, genero, "false", "false");
        }
        document.getElementById("passTF").value="";
        document.getElementById("newPassTF").value="";
        edita = true;
    }
}

/*
 * Función que invoca a un documento php, encargado de ejecutar un query para actualizar los datos en la 
 * base de datos
 * @param {type} nombre Nombre del usuario
 * @param {type} apellido1 primera apellido
 * @param {type} apellido2 segundo apellido
 * @param {type} empresa empresa en la que labora
 * @param {type} fecha fecha de ingreso al tec
 * @param {type} genero genero de la persona
 * @param {type} pass contraseña actual
 * @param {type} newPass nueva contraseña
 * @returns {undefined}
 */
function updateUsuario(nombre, apellido1, apellido2, empresa, fecha, genero, pass, newPass) {

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

function verificarPass(nombre, apellido1, apellido2, empresa, fechaIng, genero, pass, newPass) {
    var llamada = "/home/verificarPass.php?pass=" + pass;
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
                updateUsuario(nombre, apellido1, apellido2, empresa, fechaIng, genero, pass, newPass);                   
            }
            else
            {                
                return false;
            }
        }
    };   
    peticion.send(null);    
}