<!doctype html>
<head>
    <meta charset="utf-8">

    <title>My Code Works?</title>
    <meta name="viewport" content="width=device-width">
    <!--<meta name="description" content="My Parse App">-->
    <link rel="stylesheet" href="css/index.css">
    <script type="text/javascript" src="scripts/funciones de Loguear.js"></script>
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
                if (!error)
                    alert("Usuario ya existe");
                else
                {
                    // guardo
                    var str = document.getElementById("nombreCompleto").value;
                    var res = str.split(" ");
                }
            }
        }
        else {
            var campo = document.getElementById("correoElectronico").value;

            if (campo === "") {
                alert("Espacio Vacio correoElectronico");
            }
            else
                error = validarEmail(campo);

            campo = document.getElementById("contraseña").value;
            if (campo === "") {
                alert("Espacio Vacio contraseña");
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

    function

</script>
</html>
