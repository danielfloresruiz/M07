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
            $('#errorNom').fadeIn(10)
        }else{
            $('#errorNom').fadeOut(10)
        }

        if (age == "" || exprAge.test(age)){
            $('#errorAge').fadeIn(10)
        }else{
            $('#errorAge').fadeOut(10)
        }

        if (mail == "" || !exprMail.test(mail)){
            $('#errorMail').fadeIn(10)
        }else{
            $('#errorMail').fadeOut(10)
        }

        if (textArea == "" || !exprArea.test(textArea)){
            $('#errorTextArea').fadeIn(10)
        }else if (textArea == "" || exprArea2.test(textArea)){
            $('#errorTextArea').fadeIn(10)
        }else{
            $('#errorTextArea').fadeOut(10)
        }
    });






    $('#delCamps').click(function() {
        $('#nom').val("");
        $('#age').val("");
        $('#mail').val("");
        $('#textArea').val("");
    });

});