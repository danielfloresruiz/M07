$('document').ready(function(){

    var expr = /^([a-zA-Z0-9_.+-])+\@+((insjoaquimmir+\.+cat)|(fp+\.+insjoaquimmir+\.+cat)|(bat+\.+insjoaquimmir+\.+cat)|(eso+\.+insjoaquimmir+\.+cat)|(xtec+\.+cat))+$/;

    $('#submit').click(function() {
        var mail = $('#mail').val();

        if (mail == "" ||!expr.test(mail)){
            $("#posEso").val('No Ok');
        }else{
            $("#posEso").val("OK");
        }
    });    
});