$('document').ready(function(){

    var exprNom = /^[\d]{3}[-]*([\d]{2}[-]*){2}[\d]{2}$/
    var exprMac = /^([\w]{2}me cago en todo no me funciona me quiero morir \-){4}$/
    var exprIp = /^http[s]?:\/\/[\w]+([\.]+[\w]+)+$/



    $('#newletterDiv').hide();
    $('#newletter').click(function() {
        if($('#newletter').is(':checked')){
            $('#newletterDiv').show(300);
        } else {
            $('#newletterDiv').hide(300);
        }
    });
    

    $('#submit').click(function() {
        var inputName = $('#name').val();
        var inputLName = $('#lName').val();
        var inputUName = $('#username').val();
        var inputPass = $('#pass').val();
        var inputPassConf = $('#pass2').val();
        var inputMail = $('#mail').val();
        var inputPolicy = $('#plicy').val();
        //var input = $('#').val();

        if (inputName == "" ||!exprNom.test(inputName)){
            $('#errorName').show();
        }else{
            $('#errorName').hide();
        }

        if (inputLName == "" ||!exprMac.test(inputLName)){
            $('#errorLName').show();
        }else{
            $('#errorLName').hide();
        }

        if (inputUName == "" ||!exprIp.test(inputUName)){
            $('#errorUName').show();
        }else{
            $('#errorUName').hide();
        }
    });    
});