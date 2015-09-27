<link type="text/css" rel="stylesheet" href="chat/style.css"/>
<div>
    <table>
        <tr>
            <td>
                <div style="border:2px solid #ACD8F0;overflow:auto;padding:10px;margin-bottom:25px;height:420px; width:150px; background-color: white; margin-right: 0px;"></div>
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

            </td>
            <td>
                <div style="overflow:auto;padding:10px;margin-bottom:25px;height:420px; width:150px; background-color: transparent; margin-left: 0px;"></div>
            </td>

        </tr>
        <tr>
            <td colspan="3">
        <center>
            <div>
                <input name="usermsg" type="text" id="usermsg" size="63" />
                <button name="submitmsg" id="submitmsg" onclick="enviarMensaje()">Enviar</button>
            </div>
        </center>
        </td>

        </tr>


    </table>
    <!--div style="height:50px"></div-->

</div>