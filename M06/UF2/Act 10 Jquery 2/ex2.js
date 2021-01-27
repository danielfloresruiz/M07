$(".buttonAdd").click(function(){
    var newEvent = '<tr>    <td class="date border">'+$('.inputDate').val()+'</td>    <td class="event border">'+$('.inputEvent').val()+'</td>    <td class="del border"><button class="buttonDel">DEL</button></td>    </tr>';
    $(newEvent).prependTo($('.viewBlock'))
})

$('.viewBlock').on('click', '.buttonDel', function(){
    var parent = $(this).parent().parent().remove();
})