$('document').ready(function(){

    var expr = /^[\d]{3}[-]*([\d]{2}[-]*){2}[\d]{2}$/
//3 digits [0-9]    //els guions que vulquis    //2 digits [0-9] i guions 2 vegades //2 digits [0-9]
//Exemple 321-------23--12---43

    var expr2 = /^[9|6]{1}([\d]{2}[-]*){3}[\d]{2}$/
//primer digit 9 o 6    //2 digits [0-9] i guions 3 vegades  //2 digits de 0 al 9
//Exemple 623-----23--54---------23

    var expr3 = /^http[s]?:\/\/[\w]+([\.]+[\w]+)+$/
//escriu http, pot tindre una s, te un :, dos //, caracter alfanumeric, un . + caracter alfanumeric, basicament un link
//exemple https://moodle.insjoaquimmir.cat

    var expr4 = /^([A-ZÁÀÉÈÍÓÒÚ]{1}[a-zñçáàéèíóòú]+[\s]*)+$/
//una lletra majuscula sense o amb accent i les que vulguis minusculess
//exemple Adsadwdññ
    

    $('#submit').click(function() {
        var textInput = $('#mail').val();

        if (textInput == "" ||!expr4.test(textInput)){
            $("#posEso").val('No Ok');
        }else{
            $("#posEso").val("OK");
        }
    });    
});