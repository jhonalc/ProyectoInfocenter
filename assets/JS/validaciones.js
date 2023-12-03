function validarHora(input){
    let regex = /^([01]\d|2[0-3]):([0-5]\d)$/;
    let valor = input.value;
    //validar el formato
    if(regex.test(valor)){
        //separar horas y minutos
        let partes = valor.split(':');
        let horas = parseInt(partes[0]);
        let minutos = parseInt(partes[1]);
        //verificar si los minutos estan en intervalos
        if(minutos % 30 === 0){
            console.log("hora valida");
        }else{
            console.log("hora no valida");
            input.value = "";
            alert("Por favor seleccione una hora en\nintervalos de 30 minutos");
        }
    }else{
        input.value = "";
        alert("Formato de hora no valido. Use HH:MM");
    }
}