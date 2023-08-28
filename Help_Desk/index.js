function init(){  
}

$(document).ready(function() {

    });

$(document).on("click","#btnsoporte",function(){
    if($('#rol_id').val()=='1'){
        $('#lbltitulo').html("Acceso Soporte");
        $('#btnsoporte').html("Acceso Usuario");
        $('#rol_id').val(2);
        $('#imgUser').attr("src","Docs/2.jpg");
        
    }else if($('#rol_id').val()=='2'){
        $('#lbltitulo').html("Acceso Usuario");
        $('#btnsoporte').html("Acceso Soporte");
        $('#rol_id').val(1);
        $('#imgUser').attr("src","Docs/1.jpg");
        
    }
    
});



init();