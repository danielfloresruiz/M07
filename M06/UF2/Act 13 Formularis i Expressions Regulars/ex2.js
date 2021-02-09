$('#submit').click(function() {
    $("#grup1Text").val($('input:radio[name=grup1]:checked').val());
    $("#grup2Text").val($('input:radio[name=grup2]:checked').val());
});