$('document').ready(function(){

    function cleanSelect(select,blank){
        select.empty();;
        if(blank){
            $(select).append("<option></option>");
        }
    }

    var provincia = $("#provinciaSelect");
    var poblacio = $("#poblacionSelect");
    var codiPostal = $("#codiPostalSelect");

    fetch("https://exemple2021-c42ba-default-rtdb.europe-west1.firebasedatabase.app/Provincies.json")
    .then(response => response.json())
    .then(data => {
        let provs = data;
        provs.map((vari) => {
            $(provincia).append("<option value='"+vari.codi+"'>"+vari.provincia+"</option>");
        }) 
    });


    provincia.change(function(){
        if($(this).val() != "null"){
            cleanSelect(poblacio,true);
            cleanSelect(codiPostal,true);
            valor= $(this).val()
            $.get("https://exemple2021-c42ba-default-rtdb.europe-west1.firebasedatabase.app/Poblacions.json", (response)=>{
                response.forEach((vari)=>{
                    if(vari.cod_prov == valor){
                        poblacio.append('<option value="'+vari.codi+'">'+vari.poblacio+'</option>')
                    }
                })
            })
        } else {
            cleanSelect(poblacio);
            cleanSelect(codiPostal);
        }
    });


    poblacio.change(function(){
        if($(this).val() != "null"){
            cleanSelect(codiPostal,true);
            valor= $(this).val()
            $.get("https://exemple2021-c42ba-default-rtdb.europe-west1.firebasedatabase.app/Codis_Postals.json", (response)=>{
                response.forEach((vari)=>{
                    if(parseInt(vari.codi_poble) == parseInt(valor)){
                        codiPostal.append('<option value="'+vari.codi_poble+'">'+vari.codi_poble+'</option>')
                    }
                })
            })
        } else {
            cleanSelect(poblacio);
            cleanSelect(codiPostal);
        }
    });
})