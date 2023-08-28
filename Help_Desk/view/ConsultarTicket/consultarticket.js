var tabla;
var user_id = $('#user_idx').val();
var rol_id = $('#rol_idx').val();
function init(){

    $("#asig_form").on("submit",function(e){
        asignarT(e);
        $('#modalasignar').modal('hide');
        $('#ticket_data').DataTable().ajax.reload();
        swal({
            title: "Resolvex:!",
            text: "El ticket  ha sido asignado con exito.",
            type: "success",
            confirmButtonClass: "btn-success"
        });
        
    });

}

$(document).ready(function(){

    $.post("../../Controller/usuario.php?op=combo",function(data){
        $('#usu_asig').html(data);
    });


    if(rol_id==1){
        tabla=$('#ticket_data').dataTable({
            "aProcessing": true,
            "aServerSide": true,
            dom: 'Bfrtip',
            "searching": true,
            lengthChange: false,
            colReorder: true,
            buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                    ],
            "ajax":{
                url:'../../Controller/ticket.php?op=listar_x_usu',
                type: "post",
                dataType: "json",
                data: {usu_id : user_id},
                error: function(e){
                    console.log(e.responseText);
                }
    
            },
            "bDestroy": true,
            "responsive":true,
            "bInfo":true,
            "idDisplayLength": 10,
            "autoWidth": false,
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }     
        }).DataTable(); 
    }else{
        tabla=$('#ticket_data').dataTable({
            "aProcessing": true,
            "aServerSide": true,
            dom: 'Bfrtip',
            "searching": true,
            lengthChange: false,
            colReorder: true,
            buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                    ],
            "ajax":{
                url:'../../Controller/ticket.php?op=listar_ticket',
                type: "post",
                dataType: "json",
                error: function(e){
                    console.log(e.responseText);
                }
    
            },
            "bDestroy": true,
            "responsive":true,
            "bInfo":true,
            "idDisplayLength": 10,
            "autoWidth": false,
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }     
        }).DataTable(); 

    }

});

function ver(tick_id){
    console.log(tick_id)
    window.open('http://localhost/Help_Desk/view/detalleticket/?ID='+tick_id+'');
}

function asignar(tick_id){
    $.post("../../Controller/ticket.php?op=mostrar",{tick_id:tick_id},function(data){
        data=JSON.parse(data);
        $('#tick_id').val(data.tick_id);
        $('#mdlasignar').html('Asignar Soporte');
        $('#modalasignar').modal('show');
    });
    
}

function asignarT(e){

    e.preventDefault();
    var formData = new FormData($("#asig_form")[0]);
    $.ajax({
        url: "../../Controller/ticket.php?op=update_asig_tick",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        sucess: function(datos){  
            console.log(datos);       
        }   
    });
   
}

init();