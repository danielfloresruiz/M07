$('#list1Alist2').click(function() {
    var canv = $('#list1').val()
    for (var i=0;i<canv.length;i++){
        //console.log(canv[i]);
        var newEvent = '<option value="'+canv[i]+'">alumne '+canv[i]+'</option>'
        $(newEvent).prependTo($('#list2'))


        $('#list1 option').each(function() {
            if ($(this).val() == canv[i]){
                $(this).remove();
            }
        })
    }
});

$('#list2Alist1').click(function() {
    var canv = $('#list2').val()
    for (var i=0;i<canv.length;i++){
        //console.log(canv[i]);
        var newEvent = '<option value="'+canv[i]+'">alumne '+canv[i]+'</option>'
        $(newEvent).prependTo($('#list1'))


        $('#list2 option').each(function() {
            if ($(this).val() == canv[i]){
                $(this).remove();
            }
        })
    }
});