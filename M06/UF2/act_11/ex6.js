$('document').ready(function(){
    
    var col = function() {
        $("#animateText").animate({
            color: "#ff0000"
        });
    }

    $("#animateText").animate({
        left: '+=200px',
        //opacity: '20%',
        borderWidth: '+=5px',
        borderColor: 'lime',
        width: '-=25%',
        fontSize: '25px',

        backgroundColor: "#ffc800",
    },1000, col);
    
});