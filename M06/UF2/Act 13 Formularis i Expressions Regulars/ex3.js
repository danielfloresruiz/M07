$('#delete').click(function() {
    $("#nom").val("");
    $("#provincia").val("");
});

$('#disabledCamp').click(function() {
    if ($("#provincia").prop('disabled') == true){
        $("#provincia").prop('disabled', false);
    }else{
        $("#provincia").prop('disabled', true);
    }
});