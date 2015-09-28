
// Funciones del modulo de chat

// Envia el mensaje del usuario
function enviarMensaje() {
    console.log("enviarMensaje");
    var clientmsg = $("#usermsg").val();
    $.post("chat/post.php", {text: clientmsg});
    $("#usermsg").attr("value", "");
    return false;
}
function loadLog() {
    var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
    $.ajax({
        url: "chat/log.html",
        cache: false,
        success: function (html) {
            $("#chatbox").html(html);
            var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
            if (newscrollHeight > oldscrollHeight) {
                $("#chatbox").animate({scrollTop: newscrollHeight}, 'normal');
            }
        }
    });
}

setInterval(loadLog, 500);

/*
$(document).ready(function () {
});*/