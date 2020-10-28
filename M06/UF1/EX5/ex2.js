let num = localStorage.getItem("num");
console.log(num);
if (num == null){
    localStorage.setItem("num",0);
    //console.log("Entra null");
}else {
    //console.log("Entra else");
    let val = parseInt(num);
    val+=1;
    //console.log(val);
    localStorage.setItem("num",val);
}

let valor = localStorage.getItem("num");
//console.log(valor);
document.querySelector("#ex2").innerHTML = valor;


let color = localStorage.getItem("col");
//console.log(col);
document.querySelector("#ex3bg").style.backgroundColor = color;

document.querySelector("#canvpag").addEventListener("click",function() {location.href="./ex4-2.html";});
