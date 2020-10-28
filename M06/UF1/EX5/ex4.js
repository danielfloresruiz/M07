let color = localStorage.getItem("col");

document.querySelector("#blue").addEventListener("click",function(){color="blue";});
document.querySelector("#yellow").addEventListener("click",function(){color="yellow";});
document.querySelector("#pink").addEventListener("click",function(){color="pink";});
document.querySelector("#white").addEventListener("click",function(){color="white";});
document.querySelector("#sabe").addEventListener("click",function(){elegircolor(color);});


function elegircolor(color){
    localStorage.setItem("col",color);
    window.location.href = "./ex4.html";
}

