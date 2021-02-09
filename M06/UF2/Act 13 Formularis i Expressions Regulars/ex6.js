//var exprNom = 
var exprAge = /^[18-99]/;

$('#submit').click(function() {
    var nom = $('#nom').val("");
    var age = $('#age').val("");
    var mail = $('#mail').val("");
    var textArea = $('#textArea').val("");

    if (!exprAge.test(age)){
        console.log("hola")
    }
});






$('#delCamps').click(function() {
    $('#nom').val("");
    $('#age').val("");
    $('#mail').val("");
    $('#textArea').val("");
});