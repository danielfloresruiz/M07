$('document').ready(function(){
    
    $('#inputButton').click(function() {
        if ($('#inputText').val() == ""){
            eff1();
        };
    });

    var eff1 = function() {
        $("#animateDiv").effect( "shake" , 1000, eff2 );
    }

    var eff2 = function() {
        $("#animateDiv").effect( "pulsate", 1000, eff3 );
    }

    var eff3 = function() {
        $("#animateDiv").effect( "highlight", 1000 );
    }
    
});