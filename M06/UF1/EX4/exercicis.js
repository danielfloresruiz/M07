// --------------
// Nou lliurament
// --------------

var lliurament = new LliuramentClass("04", "Daniel Flores", false);

// --------------
// Exercicis
// --------------

lliurament.add("1", function(){
	// Aquí va el teu codi JS de l'exercici 1
	alert("Exemple de codi JS de l'exercici 1")
        divs = document.querySelectorAll("a");
        
        for (v=0; v<divs.length;v++)
        {
            divs[v].style.color="red";
        }



        for (i=0; i< divs.length; i++)
        {
            divs[i].addEventListener("mouseover", (event) => { 
                event.target.style.background="red";
                event.target.style.color="white";
                event.target.style.textTransform="uppercase";
            });

            divs[i].addEventListener("mouseout", (event) => { 
                event.target.style.background = "none";
                event.target.style.color="red";
                event.target.style.textTransform="none"; 
            });

        }
});



lliurament.add("2", function(){
	// Aquí va el teu codi JS de l'exercici 2
		colors = document.querySelectorAll("th.ex2");
        var colores = ["blue","red","green","yellow","pink","purple","orange","gray","black","brown"];
        for (i=0; i< colors.length; i++) {
            
            colors[i].addEventListener("mouseover", (event) => { 
                var randomColor = colores[Math.floor(Math.random()*colores.length)];  
                event.target.style.background=randomColor;
            });

            colors[i].addEventListener("mouseout", (event) => { 
                event.target.style.background = "none";
            });

        }


});

lliurament.add("3", function(){
	// Aquí va el teu codi JS de l'exercici 3
		var valor=0;
        function imgmas(){
            if (valor<9){
                valor++;
            }else {
                valor=0;
            }
            document.getElementById("img1").src="numeros3/"+valor+".png";
        }
        function imgmenos(){
            if (valor>0){
                valor--;
            } else {
                valor=9;
            }
			document.getElementById("img1").src="numeros3/"+valor+".png";
		}
		document.getElementById("ex3+").addEventListener("click",function(){imgmas();});
		document.getElementById("ex3-").addEventListener("click",function(){imgmenos();});
});


lliurament.add("4", function(){
		// Aquí va el teu codi JS de l'exercici 3
		//Creo las variables y listas:
        //El contador de las coincidencias
        var punts=0;
        //Una lista de los tipos de craituras
        var criatura = ["planta","zombie"];
        //Otra lista de los nueros de craituras
        var nums = [1,2,3];
        //Guardo todas las imagenes del html a la variable imgs
        imgs = document.querySelectorAll("img.ex4");
        //cuando dan al boton inicio llama a esta funcion
        function inici(){
            //creo una lista vacia
            var arr = [];
            //recorre el bucle tantas veces como imagenes en el html hay
            for (i=0; i< imgs.length; i++){
                //random a la lista criaturas (plantas / zombies)
                var randomcriatura = criatura[Math.floor(Math.random()*criatura.length)];
                //random del numero de criatura (1,2,3)
                var randomnums = nums[Math.floor(Math.random()*nums.length)];
                //las meto en la lista para luego comparar
                arr.push(randomcriatura+randomnums)
                //y las cambio del html
                imgs[i].src="plants vs zombies/"+randomcriatura+randomnums+".jpg";
            }
            //comparar las imagenes que han salido
            if (arr.length=4){
                //la lista tiene 4 cosas asi que recorre 4 veces
                for (i=0; i< arr.length; i++){
                    //compara la primera imagen con la seguna, tercera y cuarta, si es igual a alguna suma una coinicencia
                    if (i == 0){
                        if (arr[0] == arr[1]){
                            punts++;
                        }else if (arr[0] == arr[2]){
                            punts++;
                        }else if (arr[0] == arr[3]){
                            punts++;
                        }
                    //compara la sgunda con la tercera y la cuarta 
                    }else if (i == 1){
                        if (arr[1] == arr[2]){
                            punts++;
                        }else if (arr[1] == arr[3]){
                            punts++;
                        }
                    //compara la tercera con la cuarta
                    }else if (i == 2){
                        if (arr[2] == arr[3]){
                            punts++;
                        }
                    }
                }
            }
            //pone las coincidencias en el html
            if (punts > 0){
                document.getElementById("marcador").innerHTML="Hi ha "+punts+" coincidencies";
			}
			
        }
		document.getElementById("ex4zom").addEventListener("click",function(){inici();});

});




lliurament.add("5", function(){
	// Aquí va el teu codi JS de l'exercici 3
	var numcartas = ["01","02","03","04","05","06","07","08","09","10","11","12","13",];
	var figcartas = ["cors","diamants","picas","trevol",];
	var imgs = document.querySelectorAll("img.cartaex5");
	function iniciar(){
		if (document.getElementById("iniex5").value  == "Iniciar" || document.getElementById("iniex5").value  == "Continua"){
			document.getElementById("iniex5").value="Parar";
			timeout();
			function timeout(){
				setTimeout(function(){
					var cartessort = [];
					for (i=0; i< imgs.length; i++){
						do {
							var randomnum = numcartas[Math.floor(Math.random()*numcartas.length)];
							var randomfig = figcartas[Math.floor(Math.random()*figcartas.length)];
							var cart = randomnum + randomfig;
						}while (cartessort.includes(cart));
						imgs[i].src="poker/"+randomnum+randomfig+".png"; 
						cartessort.push(cart);
					}
					if (document.getElementById("iniex5").value  == "Parar"){
						timeout();
					}
				}, 200);
			}
		}else {
			document.getElementById("iniex5").value="Continua";                
		}
	}
	function esborra(){
		for (i=0; i< imgs.length; i++){
			document.getElementById("iniex5").value="Iniciar";
			imgs[i].src="poker/revers.png";
		}
	}
	document.getElementById("iniex5").addEventListener("click",function(){iniciar();});
	document.getElementById("esbex5").addEventListener("click",function(){esborra();});




});

lliurament.add("6", function(){
    // Aquí va el teu codi JS de l'exercici 3
    puntsdau=[0,0,0,0,0,0];
    function tirdau(){
        var randomnumdau = Math.round(Math.random()*5);
        //console.log(randomnumdau)
        if (randomnumdau==0){
            document.getElementById("dauex6").src="numeros3/"+(randomnumdau+1)+".png";
            puntsdau[0]++;
            document.getElementById("punts1ex6").innerHTML=puntsdau[0];
        }else if (randomnumdau==1){
            document.getElementById("dauex6").src="numeros3/"+(randomnumdau+1)+".png";
            puntsdau[1]++;
            document.getElementById("punts2ex6").innerHTML=puntsdau[1];
        }else if (randomnumdau==2){
            document.getElementById("dauex6").src="numeros3/"+(randomnumdau+1)+".png";
            puntsdau[2]++;
            document.getElementById("punts3ex6").innerHTML=puntsdau[2];
        }else if (randomnumdau==3){
            document.getElementById("dauex6").src="numeros3/"+(randomnumdau+1)+".png";
            puntsdau[3]++;
            document.getElementById("punts4ex6").innerHTML=puntsdau[3];
        }else if (randomnumdau==4){
            document.getElementById("dauex6").src="numeros3/"+(randomnumdau+1)+".png";
            puntsdau[4]++;
            document.getElementById("punts5ex6").innerHTML=puntsdau[4];
        }else if (randomnumdau==5){
            document.getElementById("dauex6").src="numeros3/"+(randomnumdau+1)+".png";
            puntsdau[5]++;
            document.getElementById("punts6ex6").innerHTML=puntsdau[5];
        }
    }
    



    document.getElementById("tiradauex6").addEventListener("click",function(){tirdau();});
});


// --------------
// Finalitzar lliurament
// --------------
lliurament.render();