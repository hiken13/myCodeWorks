<?php
session_start();
?>
<!doctype html>
<head>
    <meta charset="utf-8">

    <title>My Code Works</title>

    <meta name="viewport" content="width=device-width">
    <!--<meta name="description" content="My Parse App">-->
    <link rel="stylesheet" href="css/home.css">
    <script type="text/javascript" src="scripts/funciones de Loguear.js"></script>
    <script type="text/javascript" src="scripts/ajax.js"></script>        
</head>
<body>
<center>
    <div>
        <div class="mainMenu" >       
            <ul>            
                <label>Foros</label>
                <label onclick="cargarAjax('GET', 'verPerfil.php', true, 'panel')">Perfil</label>                
                <label>Amigos</label>
                <label>Chat</label>                
                <input class="btn" type="image"  src="Imagenes/notification.png">
                <input class="btn" type="image" src="Imagenes/exit.png" style="margin-left: 150px;">
            </ul>            
        </div>
        <div class="panel" id="panel">
        </div>
    </div>
</center>
</body>

</html>
