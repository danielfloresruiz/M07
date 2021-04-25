window.onload = function() { init();};

function init(){
    var script_tag = document.getElementById('functions')
    var user_id = script_tag.getAttribute("user-id");

    $('textarea').on('keydown', function(){
        let channel = Echo.private('muro')
        console.log("hola")
      
        setTimeout( () => {
            channel.whisper('typing', {
                user: user_id,
                typing: true
            })
        }, 1500)
      })
}