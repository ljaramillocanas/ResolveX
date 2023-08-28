function init(){
   
    $("#ticket_forms").on("submit",function(e){
        guardaryeditar(e);

    });
    
}
    $(document).ready(function() {

    $('#ticket_descripcion').summernote({
        height: 150,
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

    //Ingreso de datos por medio de BD a Lista de Categoria.
    $.post("../../Controller/categoria.php?op=combo",function(data,status){
            $('#cat_id').html(data);
        });

    });

    function guardaryeditar(e){
        e.preventDefault();
        var formData = new FormData($("#ticket_forms")[0]);

        
            $.ajax({
                url: "../../controller/ticket.php?op=insert",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                sucess: function(data){
                    data = JSON.parse(data);
                }
            });
            $('#tick_titulo').val("");
            $('#ticket_descripcion').summernote("reset");
            swal("Correcto", "Nuestro equipo de soporte estará encantado de ayudarlo a resolver su problema lo más rápido posible","success");
        
        }
    


init();