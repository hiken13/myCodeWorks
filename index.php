<?php
session_start();
?>
<!doctype html>
<head>
    <meta charset="utf-8">

    <title>My Code Works?</title><!--  bat@gmail.com<-->
    <meta name="viewport" content="width=device-width">
    <!--<meta name="description" content="My Parse App">-->
    <link rel="stylesheet" href="css/index.css">
    <script type="text/javascript" src="scripts/funciones gestion.js"></script>
    <script type="text/javascript" src="scripts/ajax.js"></script>    

</head>

<body>
    <div id="main">
        <div id="entrar" class="divs">
            <center>          
                <font>Iniciar Sesión</font>
                <input  id ="correoElectronico" type="text" name="correoElectronico" placeholder="Correo electrónico">                
                <br>
                <input id ="contraseña" type="password" name="contraseña" placeholder="Contraseña">                                
                <br>                    
                <button  class="btn" onclick="validarFormulario(true)">Ingresar</button>
                <br>
                <font>¿No tienes cuenta? </font>
                <a href="javascript:cargarInicio('registro.html', 'main');">Regístrate</a>
            </center>
        </div>

    </div>
</body>
<script>
    function cargarInicio(queCargar, dondeCargar) {
        cargarAjax('GET', queCargar, true, dondeCargar);
    }

    function validarFormulario(formulario) {
       
        if (!formulario)// Es el formulario registro
        {
            var error = false;
            var campo = document.getElementById("nombreCompleto").value;
            if (campo === "") {
                alert("Espacio Vacio nombreCompleto");
                error = true;
            }
            else {
                var res = campo.split(" ");
                if (res.length > 3)
                    alert("nombre muy largo. nombre apellido1 apellido2");
            }

            campo = document.getElementById("correoElectronico").value;
            if (campo === "") {
                alert("Espacio Vacio correoElectronico");
                error = true;
            }
            else
                error = validarEmail(campo);

            campo = document.getElementById("contraseña").value;
            if (campo === "") {
                alert("Espacio Vacio contraseña");
                error = true;
            }

            if (!(document.getElementById('male').checked) && !(document.getElementById('female').checked)) {
                alert("Espacio Vacio genero");
                error = true;
            }
            if (!error) {
                var input_user = document.getElementById("correoElectronico").value;
                error = existeUsuario(input_user);
                if (error)
                    alert("Usuario ya existe");
                else
                {
                    // guardado
                    var str = document.getElementById("nombreCompleto").value;
                    var res = str.split(" ");

                    var nombre, apellido1, apellido2;

                    if (res.length === 3) {
                        nombre = res[0];
                        apellido1 = res[1];
                        apellido2 = res[2];
                    }
                    else if (res.length === 2) {
                        nombre = res[0];
                        apellido1 = res[1];
                        apellido2 = "";
                    }
                    else if (res.length === 1) {
                        nombre = res[0];
                        apellido1 = "";
                        apellido2 = "";
                    }


                    console.log(res);
                    var correo = document.getElementById("correoElectronico").value;
                    var contraseña = document.getElementById("contraseña").value;
                    contraseña = btoa(contraseña);
                    var genero;
                    if (document.getElementById('male').checked)
                        genero = 'm';
                    else
                        genero = 'f';

                    var dia = document.getElementById("dia");
                    dia = dia.options[dia.selectedIndex].value;

                    var mes = document.getElementById("mes");
                    mes = mes.options[mes.selectedIndex].value;

                    var año = document.getElementById("año");
                    año = año.options[año.selectedIndex].value;

                    var fecha = año + "-" + mes + "-" + dia;
                    guardarUsuario(nombre, apellido1, apellido2, correo, contraseña, fecha, genero);
                }
            }
        }
        else {
            var pos;
            var campo = document.getElementById("correoElectronico").value;

            if (campo === "") {

                pos = getPosicion("correoElectronico");
                console.log(pos.top, pos.right, pos.bottom, pos.left);
                alert("Espacio Vacio correoElectronico");
                error = true;

            }
            else {
                error = validarEmail(campo);
                error = true;
            }

            campo = document.getElementById("contraseña").value;
            if (campo === "") {
                alert("Espacio Vacio contraseña");
                error = true;
            }
            if (error === true) {
                verificarInicioSesion();
            }

        }
    }

    function validarEmail(email) {
        expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!expr.test(email)) {
            alert("Error: La dirección de correo " + email + " es incorrecta.");
            return true;
        }
        else
            return false;
    }

    function getPosicion(nombre) {
        var elemento = document.getElementById(nombre);
        var localizacion = elemento.getBoundingClientRect();
        return localizacion;
    }


</script>
</html>
