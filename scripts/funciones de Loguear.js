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
                document.getElementById("main").innerHTML="";
                cargarAjax('GET','home.php',true,'main');
            }
            if (peticion.responseText === "false") {
                console.log("mal");
            }
        }
    };
    peticion.send(null);
}