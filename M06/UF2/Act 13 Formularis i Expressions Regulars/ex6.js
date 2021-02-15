$('document').ready(function(){
    var exprNom = /^[A-Z][a-z]+ [A-Z][a-z]+/ 
    var exprAge = /^[18-99]/;
    var exprMail = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var exprArea = /#/
    var exprArea2 = /(bobo)|(tonto)/

    $('#submit').click(function() {
        

        var nom = $('#nom').val()
        var age = $('#age').val();
        var mail = $('#mail').val();
        var textArea = $('#textArea').val();

        if (nom == "" || !exprNom.test(nom)){
            $('#errorNom').show();
        }else{
            $('#errorNom').hide();
        }

        if (age == "" || exprAge.test(age)){
            $('#errorAge').show()
        }else{
            $('#errorAge').hide()
        }

        if (mail == "" || !exprMail.test(mail)){
            $('#errorMail').show()
        }else{
            $('#errorMail').hide()
        }

        if (textArea == "" || !exprArea.test(textArea)){
            $('#errorTextArea').show()
        }else if (textArea == "" || exprArea2.test(textArea)){
            $('#errorTextArea').show()
        }else{
            $('#errorTextArea').hide()
        }
    });






    $('#delCamps').click(function() {
        $('#nom').val("");
        $('#age').val("");
        $('#mail').val("");
        $('#textArea').val("");
    });

});