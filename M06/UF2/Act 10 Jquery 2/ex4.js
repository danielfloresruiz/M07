$(document).ready(function() {

    //Comprova si existeix en el LocalStorage l'string de event
    if (localStorage.getItem("event") === null){
        var array = ["Entregar activitat"];
        var array2 = ["18-12-2020"];

        localStorage.setItem('event', JSON.stringify(array))
        localStorage.setItem('date', JSON.stringify(array2))
    }

    //Guarda les string en variables
    var arrEvent = localStorage.getItem('event');
    var arrDate = localStorage.getItem('date');

    //Transforma les strings en arrays
    arrEvent = JSON.parse(arrEvent);
    arrDate = JSON.parse(arrDate);

    //Les escriu en l'HTML
    for (var i=0;i<arrDate.length;i++){
        var newEvent = '<tr>    <td class="date border">'+arrDate[i]+'</td>    <td class="event border">'+arrEvent[i]+'</td>    <td class="del border"><button class="buttonDel">DEL</button></td>    </tr>';
        $(newEvent).prependTo($('.viewBlock'))
    }


    /* En prémer el boto amb classe "buttonAdd" escriu a l'HTML el contingut dels 
    inputs, els guarda en l'array i copia l'array en el LocalStorage */
    $(".buttonAdd").click(function(){
        var newEvent = '<tr>    <td class="date border">'+$('.inputDate').val()+'</td>    <td class="event border">'+$('.inputEvent').val()+'</td>    <td class="del border"><button class="buttonDel">DEL</button></td>    </tr>';
        $(newEvent).prependTo($('.viewBlock'))

        arrEvent.push($('.inputEvent').val())
        arrDate.push($('.inputDate').val())
        
        localStorage.setItem('event', JSON.stringify(arrEvent))
        localStorage.setItem('date', JSON.stringify(arrDate))
    })

    /* Dintre de la classe "viewBlock", en prémer el boto amb classe "buttonDel" 
    esborra de l'HTML el contingut, esborra el contingut de l'array i la torna a 
    omplir amb els esdeveniments que queden. */
    $('.viewBlock').on('click', '.buttonDel', function(){
        var parent = $(this).parent().parent().remove();

        arrEvent = []
        arrDate = []

        for (var i=(($("td.date").length)-1);i>0;i--){
            arrEvent.push($("td.event").eq(i).text())
            arrDate.push($("td.date").eq(i).text())
        }

        localStorage.setItem('event', JSON.stringify(arrEvent))
        localStorage.setItem('date', JSON.stringify(arrDate))
    })

    //Recorre tots els esdeveniments, i els que són iguals a l'introduït canvia els fons a verd, si no, el fica amb blanc.
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
})

