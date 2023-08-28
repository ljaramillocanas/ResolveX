function init(){
}

$(document).ready(function(){
    var tick_id = getUrlParameter('ID');
    console.log(tick_id);
    
    listardetalle(tick_id);

    
    
});

    $('#tickd_descripcion').summernote({
        height: 300,
        lang: "es-ES",
        callbacks: {
            onImageUpload: function(image) {
                console.log("Image detect...");
                myimagetreat(image[0]);
            },
            onPaste: function (e) {
                console.log("Text detect...");
            }
        }
    });


    $('#tickd_descripcionDet').summernote({
        height: 100,
        lang: "es-ES",
        
    });

    $('#tickd_descripcionDet').summernote('disable');

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

$(document).on("click","#btnenviar",function(){
    console.log("test");
    var tick_id = getUrlParameter('ID');
    var usu_id = $('#user_idx').val();
    var tickd_descripcion = $('#tickd_descripcion').val();
    if($('#tickd_descripcion').summernote('isEmpty')){
        swal("Error", "No se ingreso comentario","warning");
    }else{ 
    $.post("../../Controller/ticket.php?op=insertdetalle",{tick_id:tick_id,usu_id:usu_id,tickd_descripcion:tickd_descripcion},function(data){
        console.log("Enviado");
        
        listardetalle(tick_id);
        $('#tickd_descripcion').summernote("reset");
        swal("Correcto", "Registrado Exitosamente","success");
    });
}

});

$(document).on("click","#btncerrar",function(){
    swal({
        title: "ResolveX:: Aviso",
        text: "Esta seguro en cerrar este ticket ?",
        type: "warning",
        showCancelButton: true,
        cancelButtonClass: "btn-default",
        confirmButtonClass: "btn-warning",
        confirmButtonText: "Si, Seguro",
        cancelButtonText: "No",
        closeOnConfirm: false
    },
    function(){
        var tick_id = getUrlParameter('ID');
        var usu_id = $('#user_idx').val();
        $.post("../../Controller/ticket.php?op=update_est_tick",{tick_id : tick_id,usu_id : usu_id},function(data){    
        });
        listardetalle(tick_id);
        swal({
            title: "Cerrado!",
            text: "El ticket ha sido cerrado con exito.",
            type: "success",
            confirmButtonClass: "btn-success"
        });
    });

});

function listardetalle(tick_id){
    $.post("../../Controller/ticket.php?op=listardetalle",{tick_id : tick_id},function(data){
        $('#lbldetalle').html(data);
    });

    $.post("../../Controller/ticket.php?op=mostrar",{tick_id : tick_id},function(data){
        data = JSON.parse(data);
        $('#lblestado').html(data.tick_estado);
        $('#lblfechcrea').html(data.usu_nom+' '+data.usu_ape);
        $('#lblnomusuario').html(data.fech_crea);
        $('#lblidticket').html("ID.Ticket # " + data.tick_id);
        $('#cat_nom').val(data.cat_nom);
        $('#tick_titulo').val(data.tick_titulo);
        $('#tickd_descripcionDet').summernote('code',data.ticket_descripcion);
        if(data.tick_estado_txt=="Cerrado"){
        $('#pnldetalle').hide();
        }
        
    });
}

init();