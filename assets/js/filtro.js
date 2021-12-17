$("#buscar").click(function (e) { 
    var cedula = $("#cedula").val();
    var fechaInicio = $("#fechaInicio").val();
    var fechaFin = $("#fechaFin").val();
    var torre = $("#torre").val();
    var piso = $("#piso").val();
    var apartamento = $("#apartamento").val();


    $.ajax({                        
        type: "POST",                 
        url: "visitas/filtrar.php",                     
        data: JSON.stringify({ 
            "cedula": cedula,
            "fechaInicio": fechaInicio,
            "fechaFin": fechaFin,
            "torre": torre,
            "piso": piso,
            "apartamento": apartamento,
        }), 
        success: function(){
            Swal.fire({
                icon: 'success',
                title: 'Visita Registrada',
                text: 'Se ha realizado el proceso correctamente'
            });              
        },
        error: function(){
            Swal.fire({
                icon: 'error',
                title: 'Ups',
                text: 'No hemos podido completar tu operacion, intenta nuevamente'
            });
        }
    });
    
});