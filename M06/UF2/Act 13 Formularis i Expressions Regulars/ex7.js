$('document').ready(function(){
    var expr = /^(El\s|La\s|L')\w+\sés\s\w+/

    var mensage = "";
    var list = ["El Joan és simpàtic", "L’ Adria no és bo", "Adriano deixa de ser tonto", "Adriano ya es guapo", "El No es ahora", "L’Ahora es no", "La Adriana es guapa"]

   

        list.forEach(function(elemento, indice, array) {
            mensage += indice + ") " + (elemento) + ": ";
            if (!expr.test(elemento)){
                mensage += "no pasa\n";
            }else{
                mensage += "pasa\n";
            }
        })
        
        $("#textArea").val(mensage);
    
});