$('document').ready(function(){

    var exprNom = /^[A-Za-z]{1}(\w|\_|[-]){3,9}$/
    var exprMac = /^([\w]{2}([-]|[:])){3}([\w]{2})$/
    var exprIp = /^((\d){1,3}\.){3}((\d){1,3})$/
    

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