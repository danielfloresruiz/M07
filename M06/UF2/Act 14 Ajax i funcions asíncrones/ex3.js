$('document').ready(function(){

    function cleanSelect(select,blank){
        select.innerHTML = "";
        if(blank){
            let newOption = document.createElement("option");
            newOption.text = "";
            newOption.value = "blank";
            select.append(newOption);
        }
    }

    var provincia = document.getElementById("provinciaSelect");
    var poblacio = document.getElementById("poblacionSelect");
    var codiPostal = document.getElementById("codiPostalSelect");

    fetch("https://exemple2021-c42ba-default-rtdb.europe-west1.firebasedatabase.app/Provincies.json")
    .then(response => response.json())
    .then(data => {
        let provs = data;
        provs.map((vari) => {
            let addProvincia = document.createElement("option");
            addProvincia.text = vari.provincia;
            addProvincia.value = vari.codi;
            provincia.append(addProvincia);
        }) 
    });


    provincia.addEventListener('change', function(){
        if($(this).val() != "null"){
            cleanSelect(poblacio,true);
            cleanSelect(codiPostal,true);
            fetch("https://exemple2021-c42ba-default-rtdb.europe-west1.firebasedatabase.app/Poblacions.json")
            .then(response => response.json())
            .then(data => {
                ciut = data;
                valor= $(this).val()
                ciut.map((vari) => {
                    if(vari.cod_prov == valor){
                        let addCiutat = document.createElement("option");
                        addCiutat.text = vari.poblacio;
                        addCiutat.value = vari.codi;
                        poblacio.append(addCiutat)
                    }
                }) 
            });
        } else {
            cleanSelect(poblacio);
            cleanSelect(codiPostal);
        }
    });

    poblacio.addEventListener('change', function(){
        if($(this).val() != "null"){
            cleanSelect(codiPostal,true);
            fetch("https://exemple2021-c42ba-default-rtdb.europe-west1.firebasedatabase.app/Codis_Postals.json")
            .then(response => response.json())
            .then(data => {
                cp = data;
                valor= $(this).val()
                cp.map((vari) => {
                    if(parseInt(vari.codi_poble) == parseInt(this.value)){
                        //console.log("hola")
                        let addCP = document.createElement("option");
                        addCP.text = vari.codi_poble;
                        addCP.value = vari.codi_poble;
                        codiPostal.append(addCP)
                    }
                }) 
            });
        } else {
            cleanSelect(poblacio);
            cleanSelect(codiPostal);
        }
    });
})