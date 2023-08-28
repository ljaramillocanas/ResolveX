var tabla;

function init(){
    $("#usuario_form").on("submit",function(e){
        guardar(e);
        
    });
    $("#Editar_form").on("submit",function(e){
        update(e);
        
    });
}

function guardar(e){

    e.preventDefault();
    var formData = new FormData($("#usuario_form")[0]);
    $.ajax({
        url: "../../Controller/usuario.php?op=insert",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        sucess: function(datos){         
        }   
    });
    $('#usuario_form')[0].reset();
    $('#modalmantenimiento').modal('hide');
    $('#usuario_data').DataTable().ajax.reload();
    swal({
        title: "Resolvex:!",
        text: "El usaurio ha sido agregado con exito.",
        type: "success",
        confirmButtonClass: "btn-success"
    });
   
}

function update(e){

    e.preventDefault();
    var formData = new FormData($("#Editar_form")[0]);
    $.ajax({
        url: "../../Controller/usuario.php?op=update",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        sucess: function(datos){    
            console.log(datos);     
        }   
    });
    $('#modalEditar').modal('hide');
    $('#usuario_data').DataTable().ajax.reload();
    swal({
        title: "Resolvex:!",
        text: "El usuario ha sido actualizado con exito.",
        type: "success",
        confirmButtonClass: "btn-success"
    });
   
}

$(document).ready(function(){

        tabla=$('#usuario_data').dataTable({
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
                url:'../../Controller/usuario.php?op=listar',
                type: "post",
                dataType: "json",
                data: {usu_id : 1},
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
   






});

function editar(usu_id){

    $('#mdltitulo').html('Editar Usuario');
    $.post("../../Controller/usuario.php?op=mostrar",{usu_id : usu_id},function(data){
        data = JSON.parse(data);
        $('#usu_idE').val(data.usu_id);
        $('#usu_nomE').val(data.usu_nom);
        $('#usu_apeE').val(data.usu_ape);
        $('#usu_correoE').val(data.usu_correo);
        $('#usu_passE').val(data.usu_pass);
        $('#rol_idE').val(data.rol_id).trigger('change');
    });

    $('#modalEditar').modal('show');
}

function eliminar(usu_id){
    swal({
        title: "ResolveX:: Aviso",
        text: "Esta seguro en eliminar este usuario?",
        type: "error",
        showCancelButton: true,
        cancelButtonClass: "btn-default",
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Si, Seguro",
        cancelButtonText: "No",
        closeOnConfirm: false
    },
    function(){
        $.post("../../Controller/usuario.php?op=eliminar",{usu_id : usu_id},function(data){    
        });
        $('#usuario_data').DataTable().ajax.reload();
        swal({
            title: "Cerrado!",
            text: "El usauurio ha sido eliminado con exito.",
            type: "success",
            confirmButtonClass: "btn-success"
        });
    });
}

$(document).on("click","#btnnuevo",function(){
    $('#mdltitulo').html('Nuevo Usuario');
    $('#usuario_form')[0].reset();
    $('#modalmantenimiento').modal('show');
    

});


init();