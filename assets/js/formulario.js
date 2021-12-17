$("#guardar").click(function (e) { 
    var nombre = $("#nombre").val();
    var cedula = $("#cedula").val();
    var torre = $("#torre").val();
    var piso = $("#piso").val();
    var apartamento = $("#apartamento").val();
    var imagen = $("#image").val();

    if(!nombre||!cedula||!imagen||torre=="Seleccione"||piso=="Seleccione"||apartamento=="Seleccione"){
        Swal.fire({
            icon: 'error',
            title: 'Datos Vacíos',
            text: 'Procura llenar todos los campos y la foto antes de ingresar el registro'
        });
    }else{
        $.ajax({                        
            type: "POST",                 
            url: "visitas/guardar.php",                     
            data: JSON.stringify({ 
                "nombre": nombre,
                "cedula": cedula,
                "torre": torre,
                "piso": piso,
                "apartamento": apartamento,
                "image": imagen,
            }), 
            success: function(rs){

                $("#nombre").val("");
                $("#cedula").val("");
                $("#torre").val("Seleccione");
                $("#piso").val("Seleccione");
                $("#apartamento").val("Seleccione");
                $("#image").val("");
                $("#photopre").attr("src","");

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
    }
});