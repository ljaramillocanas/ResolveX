function init(){
}


$(document).ready(function(){
    var usu_id = $('#user_idx').val();
    var rol_id = $('#rol_idx').val();

    if(rol_id==1){
    
        $.post("../../Controller/usuario.php?op=Total",{usu_id : usu_id},function(data){  
            data = JSON.parse(data);
            $('#lbltotal').html(data.Total);
            
        });

        $.post("../../Controller/usuario.php?op=TotalA",{usu_id : usu_id},function(data){  
            data = JSON.parse(data);
            $('#lablabiertos').html(data.Total);
            
        });

        $.post("../../Controller/usuario.php?op=TotalC",{usu_id : usu_id},function(data){  
            data = JSON.parse(data);
            $('#lblcerrados').html(data.Total);

        });

        $.post("../../Controller/usuario.php?op=grafico",{usu_id : usu_id},function(data){  
            data = JSON.parse(data);
              
            new Morris.Bar({
                   element: 'divgrafico',
                   data: data,
                   xkey: 'nom',
                   ykeys: ['total'],
                   labels: ['Value'],
                   barColors: ['#F1C40F']
           });
               
       });

    }else if(rol_id==2){
        $.post("../../Controller/ticket.php?op=TotalT",function(data){  
            data = JSON.parse(data);
            $('#lbltotal').html(data.Total);
            
        });

        $.post("../../Controller/ticket.php?op=TotalTA",function(data){  
            data = JSON.parse(data);
            $('#lablabiertos').html(data.Total);
            
        });

        $.post("../../Controller/ticket.php?op=TotalTC",function(data){  
            data = JSON.parse(data);
            $('#lblcerrados').html(data.Total);
            
        });

        $.post("../../Controller/ticket.php?op=grafico",function(data){  
            data = JSON.parse(data);
           
            new Morris.Bar({
                element: 'divgrafico',
                data: data,
                xkey: 'nom',
                ykeys: ['total'],
                labels: ['Value'],
                barColors: ['#0EB623']
            });
            
        });


        
    }
    

});



init();