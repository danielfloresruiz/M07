$('document').ready(function(){
    var lis= $("li");

    jQuery.fx.speeds.boton1 = 200;
    jQuery.fx.speeds.boton2 = 600;
    jQuery.fx.speeds.clickLi = 1000;


    $('#bot1').click(function() {
        $(lis).show('boton1');
    });

    $('#bot2').click(function() {
        $(lis).hide('boton2');
    });


    $(lis[0]).click(function() {
        $(lis[0]).toggle('clickLi');
    });

    $(lis[1]).click(function() {
        $(lis[1]).toggle('clickLi');
    });

    $(lis[2]).click(function() {
        $(lis[2]).toggle('clickLi');
    });

    $(lis[3]).click(function() {
        $(lis[3]).toggle('clickLi');
    });
});