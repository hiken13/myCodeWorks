<link type="text/css" rel="stylesheet" href="chat/style.css"/>
<link type="text/css" rel="stylesheet" href="../amigos/style.css"/>
<div>
    <table>
        <tr style="height: 350px">
            <td id="seccionAmigos">
                
            </td>   
            <td> 
                <div id="chatbox">
                    <?php
                    if (file_exists("log.html") && filesize("log.html") > 0) {
                        $handle = fopen("log.html", "r");
                        $contents = fread($handle, filesize("log.html"));
                        fclose($handle);
                        echo $contents;
                    }
                    ?>
                </div>
                <div>
                    <input name="usermsg" type="text" id="usermsg" size="63"  style="width: 71%; height: 20%"/>
                    <button name="submitmsg" id="submitmsg" onclick="enviarMensaje()">Enviar</button>
                </div>
            </td>

        </tr>        
    </table>
    <!--div style="height:50px"></div
    
    //<div style="border:2px solid #ACD8F0;overflow:auto;padding:10px;height:100%; width:150px; background-color: white; margin-right: 0px;"></div>
    -->
</div>