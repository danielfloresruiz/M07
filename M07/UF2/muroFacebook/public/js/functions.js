window.onload = function() { init(); init2(); };


function init(){
    var script_tag = document.getElementById('functions')
    var user_id = script_tag.getAttribute("user-id");

    //Echo.channel('user.'+user_id)
    Echo.channel('user.'+0)

    .listen('NewPostNotification', (e) => {
        //alert(e.post.post)
        $("#muro").load(" #muro");
        console.log("post public recived")
    });
}



function init2(){
    var script_tag = document.getElementById('functions')
    var user_id = script_tag.getAttribute("user-id");

    //Echo.channel('user.'+user_id)
    Echo.private('user.'+user_id)

    .listen('NewWhisperingNotification', (e) => {
        //alert(e.post.post)
        $("#muro").load(" #muro");
        console.log("post private recived")
    });
}

$('input').on('keydown', function(){
    let channel = Echo.private('chat')
    alert("hola");
  
    setTimeout( () => {
        channel.whisper('typing', {
            user: userid,
            typing: true
        })
    }, 300)
})