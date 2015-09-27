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
    <link rel="shortcut icon" href="Imagenes/IconTitle.png" />
    <script type="text/javascript" src="scripts/funcionesGestion.js"></script>
    <script type="text/javascript" src="scripts/ajax.js"></script>
    <script type="text/javascript" src="chat/chat.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
</head>
<body>
    <script>
        //funcion auxiliar para realizar un submit con DOM
        function cambiarImagen() {            
            
            document.getElementById("formImagen").submit();
        }
    </script>
<center>
    <div>
        <div class="mainMenu" >       
            <ul>            
                <form  id="formImagen" method = "POST" action="../home/guardarFoto.php" enctype="multipart/form-data">                    
                    <input <input type="file" class="custom-file-input" name = "imagen" onchange="cambiarImagen()">                                                     
                </form>
                
                <a id="aux" name ="aux" style="visibility: hidden"></a>
                <label>Foros</label>
                <label onclick="cargarAjax('GET', '/home/verPerfil.php', true, 'panel')">Perfil</label>                
                <label>Amigos</label>
                <label onclick="cargarAjax('GET', 'chat/chat.php', true, 'panel')">Chat</label>                
                <input class="btn" type="image"  src="../Imagenes/notification.png">
                <input class="btn" type="image" src="../Imagenes/exit.png" style="margin-left: 150px;">
            </ul>            
        </div>
        <div class="panel" id="panel">
        </div>
    </div>
</center>
</body>

</html>
