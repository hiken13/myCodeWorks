<!doctype html>
<head>
    <meta charset="utf-8">

    <title>Code Share</title>

    <meta name="viewport" content="width=device-width">
    <!--<meta name="description" content="My Parse App">-->
    <link rel="stylesheet" href="index.css">
    <script type="text/javascript" src="scripts/funciones de Loguear.js"></script>
</head>

<body>
    <!--img class="image"-->​
    <img class="imagen" src="Imagenes/share2.jpg" alt="" style="display: block;">
    <div id="main">
        <div id="entrar" class="divs">
            <center>          
                <font>Iniciar Sesión</font>
                
                <input  id ="user" type="text" name="correoElectronico" placeholder="Correo electrónico">                
                <br>
                <input id ="pass" type="password" name="contraseña" placeholder="Contraseña">                                
                <br>                    
                <button  class="btn" onclick="verificarInicioSesion()">Ingresar</button>                
            </center>
        </div>
        <div class="error" id="errorL" > </div>
       
        <br>
        <div id="registro" class="divs">
            <center>
                <font>¿No tienes cuenta? Regístrate</font>
                <input type="text" name="nombreCompleto" placeholder="Nombre completo">
                <br>
                <input type="text" name="correoElectronico" placeholder="Correo electrónico">
                <br>
                <input type="password" name="contraseña" placeholder="Contraseña">
                <br>
                <button class="btn">Registrarse</button>
            </center>
        </div>
    </div>

    <script type="text/javascript">
        //Parse.initialize("I6mq05Dl75tQaCet4kWFOWGzdcOIqxihkKg7kBJA", "401DLUYTJMjqyg6Z1WCtrTTRTEU9wQUPIHpTHTxx");
        //Parse.initialize("APPLICATION_ID", "JAVASCRIPT_KEY");
    </script>
</body>

</html>
