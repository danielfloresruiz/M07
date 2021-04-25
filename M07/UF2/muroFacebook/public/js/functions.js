window.onload = function() { init(); init2(); init3(); };


function init(){
    Echo.channel('muro')

    .listen('NewPostNotification', (e) => {
        $("#muro").load(" #muro");
    });


    
}



function init2(){
    var script_tag = document.getElementById('functions')
    var user_id = script_tag.getAttribute("user-id");

    Echo.private('muro')

    .listen('NewWhisperingNotification', (e) => {
        $("#muro").load(" #muro");
    });


    $("#enviar").click(function (e) {
        e.preventDefault();
        var _token = $('meta[name=csrf-token]').attr('content');
        var post = $("TextArea").val();
        var to = 0;
        var author = user_id;

        $.ajax({
            url: "https://dawjavi.insjoaquimmir.cat/dflores/M07/UF2/muroFacebook/public/okPost",
            type: 'POST',
            data: {_token:_token, post:post, to:to, author:author },
            error: function(data){
                console.log(data)
            }
        })
    })
}



function init3(){
    var script_tag = document.getElementById('functions')
    var user_id = script_tag.getAttribute("user-id");
    Echo.private('muro')
    .listenForWhisper('typing', (e) => {
        console.log("hola");
        e.typing ? $('.typing').show() : $('.typing').hide()
        setTimeout( () => {
            $('.typing').hide()
        }, 5000)
    })

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

// $(".likeButton").click(function() {
//     //alert( $(this).val() );
//     var win = window.open(url, 'likePost/'+$(this).val());
// });
