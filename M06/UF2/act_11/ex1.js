$('document').ready(function(){
    images= $("img")

    showAct=true;
    fadeAct=true;
    slideAct=true;

    $('#bot1').click(function() {
        if (showAct){
            $(images[0]).show(1000);
            showAct=false;
        }else{
            $(images[0]).hide(1000);
            showAct=true;
        }
        //$(images[0]).toggle(1000);
    });

    $('#bot2').click(function() {
        if (fadeAct){
            $(images[1]).fadeIn(1000);
            fadeAct=false;
        }else{
            $(images[1]).fadeOut(1000);
            fadeAct=true;
        }
        //$(images[1]).fadeToggle(1000);
    });

    $('#bot3').click(function() {
        if (slideAct){
            $(images[2]).slideDown(1000);
            slideAct=false;
        }else{
            $(images[2]).slideUp(1000);
            slideAct=true;
        }
        //$(images[2]).slideToggle(1000);
    });

    $('#bot4').click(function() {
        $(images[3]).toggle(1000);
    });
})