<?php
session_start();
if(isset($_SESSION['loggedUsuario'][0])){
    $text = $_POST['text'];
     echo "si entro";
    $fp = fopen("log.html", 'a');
    fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".$_SESSION['name']."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
    fclose($fp);
}
?>