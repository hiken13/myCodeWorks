
function loadLog() {
    var oldscrollHeight = $("#contenedor").attr("scrollHeight") - 20;
    $.ajax({
        url: "chat/log.html",
        cache: false,
        success: function (html) {
            $("#contenedor").html(html);
            var newscrollHeight = $("#contenedor").attr("scrollHeight") - 20;
            if (newscrollHeight > oldscrollHeight) {
                $("#contenedor").animate({scrollTop: newscrollHeight}, 'normal');
            }
        }
    });
}

setInterval(loadLog, 250);

var jsonPersonas;

function getAllUser() {
    var llamada = "amigos/getAllUser.php";

    var peticion = new XMLHttpRequest();
    peticion.open("GET", llamada, true);
    console.log(llamada);

    peticion.onreadystatechange = function ()
    {
        if (peticion.readyState === 4)
        {
            if (peticion.status === 200)
            {
                jsonPersonas = eval("(" + peticion.responseText + ")");
                cargarAmigos(jsonPersonas);
                //console.log(jsonPersonas);
                //jsonPersonas = peticion.responseText;
            }
            else
            {
                console.log("error al recuperar los usuarios");
            }
        }
    };
    peticion.send(null);
}

function cargarAmigos(jsonPersonasAux) {


    for (var i = 0; i < jsonPersonasAux.length; i++) {
        var persona = jsonPersonasAux[i];
        
        for (var j = 0; j < persona.length; j++) {
            var s = document.createElment("div");
            var s = '<div class="amigo"><label>' + "hola mundo" + '</label></div>';
            var htmlObject = $(s); // jquery call
            $("#contenedor").html(htmlObject);
            //console.log(reg["nombre"]);
            console.log(jsonPersonasAux[i][j]);
            //document.getElementById("contenedor").appendChild(htmlObject);
            /*document.getElementById("nombre").value = reg.nombre;
             document.getElementById("apellido1").value = reg.apellido1;
             document.getElementById("apellido2").value = reg.apellido2;
             document.getElementById("sexo").value = reg.sexo;*/
        }
    }
}
