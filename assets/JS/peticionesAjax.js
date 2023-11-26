// cargue el documento ready
$(document).ready(function(){
    //alert("Ajax");
    getRazas();
});
function getRazas(){
    //console.log("Función");
    $.ajax({
        method: "POST",
        url: "api/datosRazas.php",
        dataType: "json"
        //data:
    }).done(function(respuesta){
        //console.log(respuesta);
        //foreach  jQuery $.each
        $.each(respuesta, function(index, val){
            //console.log(val.raza);
            $("#razas").append("<option value='"+val.id+"'>"+val.raza+"</option>");
        });
    }).fail(function(error){
        console.log(error);
    });
}
 
//enviar datos base de datos (regsitrar cita medica)
function guardarCita(){
    //alert("haz presioando el botón");
    //validar campos
    let mascota = $("#mascota").val();
    if(mascota === ""){
        alert("Por favor, ingrese el nombre de la mascota.");
        return;
    }
    let edad = $("#edad").val();
    if(edad === ""){
        alert("Por favor, ingrese la edad de la mascota.");
        return;
    }
    let idRaza = document.getElementById("razas").value; // Id
    if(idRaza === ""){
        alert("Por favor, seleccione una raza.");
        return;
    }
    let fecha = $("#fecha").val();
    if(fecha === ""){
        alert("Por favor, seleccione la fecha.");
        return;
    }
    let hora = document.getElementById("hora").value;
    if(hora===""){
        alert("Por favor, seleccione la hora.");
        return;
    }
    let amo = $("#amo").val();
    if(amo ===""){
        alert("Por favor, ingrese el nombre del amo.");
        return;
    }
    //enviar datos
    $.ajax({
        method: "POST",
        url: "api/registrarCita.php",
        dataType: "json",
        data: {"mascota":mascota, "edad":edad, "idRaza":idRaza, "fecha":fecha, "hora":hora, "amo":amo}
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