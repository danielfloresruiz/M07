//A
$("div.module").css("text-align","center").css("font-size","40px")

//B
$("a:odd").attr({
    "href":"https://informatica.iesjoaquimmir.cat"
})

//C forma 1
$("a:last").text("Pàgina canviada")
//C forma 2
$("a.last").text("Pàgina canviada")

//D forma 1
$("a:first").css("color","red")
//D forma 2
$("a.first").css("color","red")

//E
$('ul li').filter('.current').css('color','yellow');

//F
//Esta comentat per fer el exercici seguent (funciona)
//$("div").addClass("complet").css("background-color","pink").css("font-size","20px")

//G
$("div:not('[class]')").addClass("complet").css("color","darkred").css("background-color","pink").css("font-size","20px")

//H
for (var i=0;i<($("ul.ex8 li").length);i++){
    $("ul.ex8 li").eq(i).text("Element: "+i)
}

//I
for (var i=0;i<($("ul.ex9 li").length);i++){
    $("ul.ex9 li").eq(i).text("Element: "+(Math.floor(Math.random() * 101)+1))
}

//J
alert("Exercici J: Hia ha "+($("li").length)+" <li>")

//K
cel1 = (Math.floor(Math.random() * 9));
do {
    cel2 = (Math.floor(Math.random() * 9))
} while (cel1==cel2);
$("table.exK td").eq(cel1).css("background-color","red")
$("table.exK td").eq(cel2).css("background-color","blue")

//L
var cont=0;
for (var i=0;i<($("img[alt]").length);i++){
    cont++;    
}
$("p.exL").text("Número d’imatges amb l’atribut alt: "+cont)

//M
$("img").css("width","300px")

//N
var cont="";
for (var i=0;i<($("img[alt]").length);i++){
    cont += " Img "+ i + ": " + $("img[alt]").eq(i).attr("alt");
}
$("p.exN").text("(forma 1) Valor de alt: "+cont)

//N 2
var cont="";
for (var i=0;i<($("img").length);i++){
    if (($("img[alt]").eq(i).attr("alt"))!=null){
        cont += " Img "+ i + ": " + $("img[alt]").eq(i).attr("alt");
    }
}
$("p.exN2").text("(forma 2) Valor de alt: "+cont)