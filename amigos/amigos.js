
var jsonPersonas;
var ejecucion = 0;

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

//setInterval(loadLog, 250);

function getAllUser() {
    var llamada = "amigos/getAllUser.php";

    var peticion = new XMLHttpRequest();
    peticion.open("GET", llamada, true);

    peticion.onreadystatechange = function ()
    {
        if (peticion.readyState === 4)
        {
            if (peticion.status === 200)
            {
                jsonPersonas = eval("(" + peticion.responseText + ")");
                cargarAmigos(jsonPersonas);
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


            var button = document.createElement("button");
            button.type = "button";

            button.id = jsonPersonasAux[i][3];
            //button.onclick = cargarAmigo;
            button.className = "amigo";
            button.style.backgroundImage = "url(profilePictures/" + jsonPersonasAux[i][10] + ")";
            //button.style.background = "profilePictures/" + jsonPersonasAux[i][10]; //btn.style.backgroundImage = "url(path)"; // for image
            var texto = document.createTextNode(jsonPersonasAux[i][j] + " " + jsonPersonasAux[i][j + 1] + " " + jsonPersonasAux[i][j + 2]);
            button.appendChild(texto);

            var table;
            table = document.createElement('table');
            var fila = document.createElement('tr');
            var columna1 = document.createElement('td');
            var columna2 = document.createElement('td');
            /*
             * var i = document.createElement('input'); 
             i.setAttribute('class', 'myclass');
             * elemm.style.position='absolute';
             elemm.style.width=55;
             elemm.style.height=55;
             elemm.style.top=200;
             elemm.style.left=300;
             elemm.style.rotation=200;
             
             BUTTON {
             padding: 8px 8px 8px 32px;
             font-family: Arial, Verdana;   
             background: #f0f0f0 url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABfUlEQVQ4y42TP2tUQRTFf3PnPYiLIAiKiKhIsLbxS9hZaykWNmKjgqT0A6SxslRIFRsRv0QwdZB1YyGipImbzWbfnHst3sZdZF92Bw7D/LmH37nDpL1NAyAlHgDXWW18j+A9QBXTnQhu3H704TXS2aU5s/f2/qvTZeXx78goDdE0Z9anusYDmxn4zMAlYglBMsN9zkAzgxwrGGCGnLzIwELCVZbUG+oicDWoLOtBhZwcAQFUZd6gCC/dBPW5Hr+/7VPaCHci2DU5TJVDBe+Q5cyvwT4ucfdleS7noQdURfMEDd4Rwc04OvzDtfWbjCYTitpG/hehoI4IZhmpjTgcj09jUGmeQAVXB4EypbRxjk5O0JTAvgygOBSnap9xsUJC0/nx4BLFW3p78c7Z6SeOJ2ktvL2wUC7G4zHh4uBgxPEkre30Ewb0NrZ0+XDEeUtGXdULZckYDodYMp59vLD9eZftjS31EnARuPr0Xn6yfoVbq/zlrz/pb37SG+DHXyrMGdFXikHpAAAAAElFTkSuQmCC);
             background-position: 8px 8px;
             background-repeat: no-repeat;
             }
             
             //var div = document.createElement("div");
             //div.setAttribute("id", jsonPersonasAux[i][3]);
             
             var image = document.createElement("img");
             image.setAttribute("id", jsonPersonasAux[i][3]);
             
             image.className = "imagenAmigo";
             image.src = "profilePictures/" + jsonPersonasAux[i][10];
             columna1.appendChild(image);
             fila.appendChild(columna1);
             
             var texto = document.createTextNode(jsonPersonasAux[i][j] + " " + jsonPersonasAux[i][j+1]);
             //texto.setAttribute("id", jsonPersonasAux[i][3]);
             
             columna2.appendChild(texto);
             fila.appendChild(columna2);
             
             //div.className = "amigo";
             //div.onclick = cargarAmigo;
             table.appendChild(fila);
             button.appendChild(table);
             //div.appendChild(table);
             
             //document.getElementById("contenedor").appendChild(div);*/
            document.getElementById("contenedor").appendChild(button);
            j = j + 10;
        }
    }
}

document.addEventListener('click', function (e) {
    /*
     e = e || window.event;
     var target = e.target || e.srcElement,
     text = target.textContent || text.innerText;   
     console.log(target.id);*/
    //console.log(e.srcElement.id);
    if (e.srcElement.id != null)
        cargarInfoAmigo(e.srcElement.id);

    /*$("button").click(function (event)
     {
     ejecucion++;
     var clicked = $(this); // jQuery wrapper for clicked element
     // ... click-specific code goes here ...
     if (ejecucion === 1){
     console.log(event.srcElement.id);
     cargarInfoAmigo(event.srcElement.id);
     ejecucion = 0;
     }
     }
     );*/

}, false);

// Carga informacion personal del amigo 
function cargarInfoAmigo(correo) {
    var jsonPersonasAux = jsonPersonas;
    if (jsonPersonasAux != undefined) {
        for (var i = 0; i < jsonPersonasAux.length; i++) {
            var persona = jsonPersonasAux[i];
            if (persona[3] == correo) {
                crearPortadaAmigo(persona);
                //for (var j = 0; j < persona.length; j++) {
                    
                //}
            }
        }
    }
}

// Crea la portada o pagina principal de la persona seleccionada
function crearPortadaAmigo(persona) {
    
    var div1 = document.createElement("div");
    var div2 = document.createElement("div");
    var div3 = document.createElement("div");
    var divImagen = document.createElement("div");
    
    var img = document.createElement('button');
    img.type = "button";
    
    img.id = "imagenAmigo";
    img.style.backgroundImage = "url(profilePictures/" + persona[10] + ")";   
    
    //img.src = "url(../profilePictures/" + persona[10] + ")";
    console.log(persona[10]);
    

    //divImagen.setAttribute("style", "text-align:center;");


    div1.className = "portada";
    div1.setAttribute("style", "text-align:center;");
    
    div2.className = "arriba";
    
    var color = "#"+((1<<24)*Math.random()|0).toString(16);
    div2.setAttribute("style", "background-color: " + color +  ";");
    color = "#"+((1<<24)*Math.random()|0).toString(16);
    div3.setAttribute("style", "background-color: " + color +  ";");
    div3.className = "abajo";
    //"#"+((1<<24)*Math.random()|0).toString(16)
    
    div1.appendChild(div2);
    //div1.appendChild(divImagen);
    div2.appendChild(img);
    div1.appendChild(div3);
    document.getElementById("muro").appendChild(div1);
    
}