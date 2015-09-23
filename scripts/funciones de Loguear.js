/*
 * Funcion para validar los datos de inicio de sesion
 * **/

function verificarInicioSesion() {
   var input_pass = document.getElementById("pass");
   var input_user = document.getElementById("user");
   input_pass.value = btoa(input_pass.value);
    var llamada = "consultarBD.php?usuario=" + input_user.value+
            "&password=" + input_pass.value;

    var conectado = false;

    var peticion = new XMLHttpRequest();
    peticion.open("GET", llamada, true);
    console.log(llamada);
    peticion.onreadystatechange = function ()
    {
        if (peticion.readyState === 4)
        {
            console.log(peticion.responseText);

            if (peticion.responseText !== "false") {                
                document.getElementById("errorL").innerHTML="";
                var labelError = document.createElement("button");
                labelError.setAttribute("class","bien");
                labelError.appendChild(document.createTextNode("Correcto"));               
                document.getElementById("errorL").appendChild(labelError);
            }
            if(peticion.responseText === "false") {
                document.getElementById("errorL").innerHTML="";
                var labelError = document.createElement("button");
                labelError.setAttribute("class","error");
                labelError.appendChild(document.createTextNode("Error, contraseña o usuario inválido"));               
                document.getElementById("errorL").appendChild(labelError);
            }
        }
    };
    peticion.send(null);
}