var contvisit = getCookie("visita");
if (contvisit == ""){
    setCookie("visita",1,365);
} else {
    let value = parseInt(contvisit);
    value+=1;
    setCookie("visita",value,365);
}
contvisit = getCookie("visita");
console.log(contvisit);
document.querySelector("#ex1").innerHTML = contvisit;

colfons = getCookie("col");
document.querySelector("#ex3col").style.backgroundColor = colfons;

document.querySelector("#canvpag").addEventListener("click",function(){location.href="./ex3-2.html";});



function getCookie(nom) {
    var name = nom + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0){
            return c.substring(name.length,c.length);
        }
        return "";    
    }       
       
}

function setCookie(camp, valor, dies) {
    var d = new Date();
    d.setTime(d.getTime() + (dies*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = camp + "=" + valor + ";" + expires; 
}

