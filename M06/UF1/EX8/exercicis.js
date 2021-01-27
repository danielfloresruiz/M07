// --------------
// Nou lliurament
// --------------

var lliurament = new LliuramentClass("04", "Daniel Flores", false);

// --------------
// Exercicis
// --------------

lliurament.add("1", function(){
    // Aquí va el teu codi JS de l'exercici 1
    var arr = [];
    var arrrep = [];
    for (var i=0;i<10;i++){
        arr.push(Math.floor(Math.random()*(1, 11)));
    }
    //console.log(arr)
    for (var o=0;o<10;o++) {
        var num = arr.pop();
        for (var i=0;i<arr.length;i++) {
            if (num == arr[i]){
                arrrep.push(num);
            }
        }
    }
    if (arrrep.length > 0) {
        document.getElementById("ex1").innerHTML="Has repetit els seguents numeros: "+arrrep;
    }
    else {
        document.getElementById("ex1").innerHTML="No hi ha cap numero repetit";
    }
});

lliurament.add("2", function(){
    // Aquí va el teu codi JS de l'exercici 2
    var ex2arr = [];
    document.getElementById("ex2AfFin").addEventListener("click",function(){ex2arr.push(Math.floor(Math.random()*(1, 11)));document.getElementById("ex2").innerHTML=ex2arr;});
    document.getElementById("ex2ElFin").addEventListener("click",function(){ex2arr.pop();document.getElementById("ex2").innerHTML=ex2arr;});
    document.getElementById("ex2AfPrin").addEventListener("click",function(){ex2arr.unshift(Math.floor(Math.random()*(1, 11)));document.getElementById("ex2").innerHTML=ex2arr;});
    document.getElementById("ex2ElPrin").addEventListener("click",function(){ex2arr.shift();document.getElementById("ex2").innerHTML=ex2arr;});
});

lliurament.add("3", function(){
	// Aquí va el teu codi JS de l'exercici 3
    var ex3arr1 = [];
    var ex3arr2 = [];
    var ex3arr3 = [];

    for (var i=0;i<10;i++){
        ex3arr1.push(Math.floor(Math.random()*(1, 11)));
        ex3arr2.push(Math.floor(Math.random()*(1, 11)));
    }
    ex3arr1.forEach(element => {
        ex3arr2.forEach(element2 => {
            if (element == element2) {
                if (ex3arr3.indexOf(element)<=0 && ex3arr3.indexOf(element)==-1){
                    ex3arr3.push(element);
                }
            }
        })    
    });
    document.getElementById("ex3").innerHTML="El numero repetits son: "+ex3arr3;
});


lliurament.add("4", function(){
    // Aquí va el teu codi JS de l'exercici 4
    console.log("Exercici 4");
    var ex4arrSuit = ["ors","copes","espases","bastos"];
    var ex4arrNum = ["1","2","3","4","5","6","7","8","9","10","11","12"];
    var ex4arrDeck = [];
    for (var x=0; x<ex4arrSuit.length;x++){
        for (var i=0; i<ex4arrNum.length;i++){
            ex4arrDeck.push(ex4arrNum[i]+ex4arrSuit[x]);
        }
    }
    ex4arrDeck.sort(function(a,b){return 0.5 - Math.random()});
    var ex4arrCards = ex4arrDeck.slice(0,5);
    ex4arrCards.forEach(function(i){console.log(i)})
    console.log("////////////////");
});


lliurament.add("5", function(){
    // Aquí va el teu codi JS de l'exercici 5
    var ex5arr1 = [];
    for (var x=0; x<30;x++){
        ex5arr1.push(Math.floor(Math.random()*(1, 101)));
    }
    ex5arr2 = ex5arr1.filter(number => number%2 == 0);
    document.getElementById("ex5").innerHTML="El numero pars son: "+ex5arr2;
});


lliurament.add("6", function(){
    // Aquí va el teu codi JS de l'exercici 6
    var ex6arr1 = [];
    for (var x=0; x<10;x++){
        ex6arr1.push(Math.floor(Math.random()*(1, 101)));
    }
    var ex6arr2 = ex6arr1.map(function(x) {
        x = x + Math.floor(Math.random()*(1, 101));
        if (x%2==0){
            x=x/2;
        }
        return x;
    });
    document.getElementById("ex6").innerHTML=ex6arr2;
});


lliurament.add("7", function(){
    // Aquí va el teu codi JS de l'exercici 7
    var ex7Valor;
    var ex7NumPar;
    var ex7Par;
    var ex7Inbersa = [];
    var ex7OrdAZ = [];
    var ex7OrdZA = [];
    function ex7fun(){
        ex7Valor = document.getElementById("ex7text").value;
        ex7NumPar = ex7Valor.length;
        ex7Par = ex7Valor.split(" ");
        for (var i=ex7Par.length-1;i>=0;i--){
            ex7Inbersa.push(ex7Par[i]);
            ex7OrdAZ.push(ex7Par[i]);
        }

        ex7OrdAZ.sort();
        for (var i=ex7OrdAZ.length-1;i>=0;i--){
            ex7OrdZA.push(ex7OrdAZ[i]);
        }

        document.getElementById("ex7").innerHTML=
                                                "Nombre de paraules: "+ex7NumPar+
                                                "<br>Primera paraula: "+ex7Par[0]+
                                                "<br>Darrera paraula: "+ex7Par[ex7Par.length-1]+
                                                "<br>A la inversa: "+ex7Inbersa+
                                                "<br>Ordenades de la A a la Z: "+ex7OrdAZ+
                                                "<br>Ordenades de la Z a la A: "+ex7OrdZA;
    }
    
    document.getElementById("ex7Button").addEventListener("click",function(){ex7fun()});
    
});


lliurament.add("8", function(){
    // Aquí va el teu codi JS de l'exercici 8
    
});


// --------------
// Finalitzar lliurament
// --------------
lliurament.render();