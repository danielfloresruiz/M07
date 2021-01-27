$(".buttonAdd").click(function(){
    var newEvent = '<tr>    <td class="date border">'+$('.inputDate').val()+'</td>    <td class="event border">'+$('.inputEvent').val()+'</td>    <td class="del border"><button class="buttonDel">DEL</button></td>    </tr>';
    $(newEvent).prependTo($('.viewBlock'))
})

$('.viewBlock').on('click', '.buttonDel', function(){
    var parent = $(this).parent().parent().remove();
})

$('.buttonSearch').click(function(){
    for (var i=0;i<($("td.event").length);i++){
        if (($("td.event").eq(i).text())==$('.searchEvent').val()){
            $("td.event").eq(i).parent().css("background-color","lime")
        }
        else {
            $("td.event").eq(i).parent().css("background-color","white")
        }
    }
})