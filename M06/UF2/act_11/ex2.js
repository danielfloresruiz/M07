$('document').ready(function(){
    var tds= $("td");
    var images= $("img");

    $(tds[0]).click(function() {
        $(images[0]).toggle(2000);
    });

    $(tds[1]).click(function() {
        $(images[1]).toggle(2000);
    });

    $(tds[2]).click(function() {
        $(images[2]).toggle(2000);
    });

    $(tds[3]).click(function() {
        $(images[3]).toggle(2000);
    });
});