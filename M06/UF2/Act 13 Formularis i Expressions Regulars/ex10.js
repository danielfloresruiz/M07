$('document').ready(function(){

    var exprNom = /^[\d]{3}[-]*([\d]{2}[-]*){2}[\d]{2}$/
    var exprMac = /^([\w]{2}me cago en todo no me funciona me quiero morir \-){4}$/
    var exprIp = /^http[s]?:\/\/[\w]+([\.]+[\w]+)+$/
    

    $('#submit').click(function() {
        var inputName = $('#nom').val();
        var inputMac = $('#mac').val();
        var inputId = $('#ip').val();

        if (inputName == "" ||!exprNom.test(inputName)){
            $('#errorNom').show();
        }else{
            $('#errorNom').hide();
        }

        if (inputMac == "" ||!exprMac.test(inputMac)){
            $('#errorMac').show();
            console.log("mal")
        }else{
            $('#errorMac').hide();
            console.log("OK")
        }

        if (inputId == "" ||!exprIp.test(inputId)){
            $('#errorIp').show();
        }else{
            $('#errorIp').hide();
        }
    });    
});