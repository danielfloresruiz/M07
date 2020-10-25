// --------------
// Nou lliurament
// --------------

var lliurament = new LliuramentClass("05", "Daniel Flroes", false);

// --------------
// Exercicis
// --------------

lliurament.add("1", function(){
	// Aquí va el teu codi JS de l'exercici 1
    document.cookie= "visit=0 ; expires=Thu, 25 Dec 2020 12:00:00 UTC";
    var x = document.cookie;
    console.log(x)
});

lliurament.add("2", function(){
	// Aquí va el teu codi JS de l'exercici 2
});

lliurament.add("3", function(){
	// Aquí va el teu codi JS de l'exercici 3
});

// --------------
// Finalitzar lliurament
// --------------
lliurament.render();
