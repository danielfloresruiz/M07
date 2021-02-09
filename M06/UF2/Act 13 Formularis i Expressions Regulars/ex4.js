$('#submit').click(function() {
    if ($('#prov').val() == ""){
        $("#codiProvincia").val("");
        $("#provincia").val("");
    }
    else if ($('#prov').val() == "a_coruna"){
        $("#codiProvincia").val("50");
        $("#provincia").val("A Coruña");
    }
    else if ($('#prov').val() == "zamora"){
        $("#codiProvincia").val("49");
        $("#provincia").val("Zamora");
    }
    else if ($('#prov').val() == "zaragoza"){
        $("#codiProvincia").val("50");
        $("#provincia").val("Zaragoza");
    }
    else if ($('#prov').val() == "albacete"){
        $("#codiProvincia").val("02");
        $("#provincia").val("Albacete");
    }
});