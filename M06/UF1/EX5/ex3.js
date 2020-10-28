let color="";

document.querySelector("#blue").addEventListener("click",function(){color="blue";});
document.querySelector("#yellow").addEventListener("click",function(){color="yellow";});
document.querySelector("#pink").addEventListener("click",function(){color="pink";});
document.querySelector("#white").addEventListener("click",function(){color="white";});
document.querySelector("#sabe").addEventListener("click",function(){setCookie("col",color,365);});



function setCookie(camp, valor, dies) {
    var d = new Date();
    d.setTime(d.getTime() + (dies*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = camp + "=" + valor + ";" + expires; 
    window.location.href = "./ex3.html";
}
