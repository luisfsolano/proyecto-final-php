$("#buscar").click(function (e) { 
    var cedula = $("#cedula").val();
    var fechaInicio = $("#fechaInicio").val();
    var fechaFin = $("#fechaFin").val();

    var infodepa = depa.split(",");

    var torre = rol==3 ? infodepa[0] : $("#torre").val();
    var piso = rol==3 ? infodepa[1] : $("#piso").val();
    var apartamento = rol==3 ? infodepa[2] : $("#apartamento").val();


    $.ajax({                        
        type: "POST",                 
        url: "visitas/filtrar.php",                     
        data: JSON.stringify({ 
            "cedula": cedula!="" ? cedula : null,
            "fechaInicio": fechaInicio,
            "fechaFin": fechaFin,
            "torre": torre!="Seleccione Torre" ? torre : null,
            "piso": piso!="Seleccione Piso" ? piso : null,
            "apartamento": apartamento!="Seleccione Apartamento" ? apartamento : null,
        }), 
        success: function(rs){
            $("#bodyReporte").html("");
            rs.message.forEach(visita => {
                $("#bodyReporte")
                .append($('<tr>')
                    .append($('<td class="align-middle">').append(visita.id))    
                    .append($('<td class="align-middle">').append(visita.fecha))
                    .append($('<td class="align-middle">').append(visita.cedula))
                    .append($('<td class="align-middle">').append(visita.nombre))
                    .append($('<td class="align-middle">').append(visita.torre))
                    .append($('<td class="align-middle">').append(visita.piso))
                    .append($('<td class="align-middle">').append(visita.apartamento))
                    .append($('<td class="align-middle">').append('<a href="fotosrecepciones/'+visita.image+'" target="_blank"><span class="fas fa-eye"></span></a>'))
                    .append($('<td class="align-middle">').append(
                        visita.estado==1? rol==3 ?
                        '<button  class="btn btn-primary" type="button" id="noReconocido-'+visita.id+'" value="'+visita.id+'"><i class="fas fa-exclamation"></i></button >': '' :'<i class="fas fa-bell text-warning"></i>'))
            );
            });

            const buttons = document.querySelectorAll('[id ^= "noReconocido-"]');
            for (const button of buttons) {
                button.addEventListener('click', function(event) {
                    $.ajax({                        
                        type: "POST",                 
                        url: "visitas/reportar.php",                     
                        data: JSON.stringify({ 
                            "id": button.value
                        }), 
                        success: function(rs){
                            Swal.fire({
                                icon: 'success',
                                title: 'Visita reportada',
                                text: 'Se les notificará a los administradores que esta visita no era tuya'
                            });
                            document.getElementById('buscar').click();
                        }
                    });
                  
                });
            }

            Swal.fire({
                icon: 'success',
                title: 'Busqueda Realizada',
                text: 'Se han aplicado los filtros de busqueda'
            });              
        },
        error: function(){
            Swal.fire({
                icon: 'error',
                title: 'Ups',
                text: 'No hemos encontrado datos'
            });
        }
    });
    
});

