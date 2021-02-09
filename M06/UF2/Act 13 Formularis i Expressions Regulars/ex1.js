$('#submit').click(function() {
    var mensage = "";
    if ($('#majorEdat').is(":checked"))
    {
        mensage = "Vosté és: adult\n";
    }else {
        mensage = "Vosté no és: adult\n";
    }

    if ($('#solter').is(":checked"))
    {
        mensage += "Vosté és: solter\n";
    }else {
        mensage += "Vosté no és: solter\n";
    }

    if ($('#uni').is(":checked"))
    {
        mensage += "Vosté és: universitari\n";
    }else {
        mensage += "Vosté no és: universitari\n";
    }

    $("#textArea").val(mensage);
});