// cargue el documento ready
$(document).ready(function(){
    //alert("Ajax");
    getRazas();
});
function getRazas(){
    //console.log("Función");
    $.ajax({
        method: "POST",
        url: "../../api/datosRazas.php",
        dataType: "json"
        //data:
    }).done(function(respuesta){
        console.log(respuesta);
        //foreach  jQuery $.each
        
        $.each(respuesta, function(index, val){
            //console.log(val.raza);
            $("#razas").append("<option value='"+val.id+"'>"+val.raza+"</option>");
        });
    }).fail(function(xhr, status, error) {
        var errorMessage = xhr.status + ': ' + xhr.statusText;
        console.log('Error al obtener datos de razas: ' + errorMessage);
        console.log(error);
    });
}
 
//enviar datos base de datos (regsitrar cita medica)
function guardarCita(){
    //alert("haz presioando el botón");
    //validar campos

    let tipoMascota = $("#tipoMascota option:selected").text();
    if(tipoMascota === ""){
        alert("Por favor, Seleccione el tipo de mascota.");
        return;
    }
    let nombreMascota = $("#nombreMascota").val();
    if(nombreMascota === ""){
        alert("Por favor, Seleccione el tipo de mascota.");
        return;
    }

    let edadMascota = $("#edadMascota").val();
    if(edadMascota === ""){
        alert("Por favor, ingrese la edad de la mascota.");
        return;
    }
    let idRaza = document.getElementById("razas").value; // Id
    if(idRaza === ""){
        alert("Por favor, seleccione una raza.");
        return;
    }
    let fechaCita = $("#fechaCita").val();
    if(fechaCita === ""){
        alert("Por favor, seleccione la fecha.");
        return;
    }
    let horaCita = document.getElementById("horaCita").value;
    if(horaCita===""){
        alert("Por favor, seleccione la hora.");
        return;
    }
    let nombreAmo = $("#nombreAmo").val();
    if(nombreAmo ===""){
        alert("Por favor, ingrese el nombre del amo.");
        return;
    }
    let apellidoAmo = $("#apellidoAmo").val();
    if(apellidoAmo ===""){
        alert("Por favor, ingrese el apellido del amo.");
        return;
    }
    let tipoIdentificacion = $("#tipoIdentificacion option:selected").text();
    if(tipoIdentificacion ===""){
        alert("Por favor, seleccione el tipo de Identificacion.");
        return;
    }
    let identificacionAmo = $("#identificacionAmo").val();
    if(identificacionAmo ===""){
        alert("Por favor, ingrese el número de identificacion del amo.");
        return;
    }
    //enviar datos
    $.ajax({
        method: "POST",
        url: "../../api/registrarCita.php",
        dataType: "json",
        data: {"tipoMascota":tipoMascota, "nombreMascota":nombreMascota, "edadMascota":edadMascota, "idRaza":idRaza, "fechaCita":fechaCita, "horaCita":horaCita, "nombreAmo":nombreAmo, "apellidoAmo":apellidoAmo, "tipoIdentificacion":tipoIdentificacion, "identificacionAmo":identificacionAmo}
    }).done(function(respuesta){
        if(respuesta == "1"){
            alert("Registro exitoso");
            let form = document.getElementById("formularioCita");
            form.reset();
        }else{
            alert("Error al registrar \nIntente mas tarde...");
        }
    }).fail(function(error){
        console.log(error);
    });
}