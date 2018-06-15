$(document).ready(function(){

    $(".formulario-contacto").bind("submit",function(){

        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success:function(respuesta){
                console.log(respuesta)
                if(respuesta == "ok"){
                    const toast = swal.mixin({
                        toast: true,
                        position: 'bottom-end',
                        showConfirmButton: false,
                        timer: 3000
                      });
                      
                      toast({
                        type: 'success',
                        title: 'Su e-mail se envió correctamente!'
                      });
                    $("#contact-form")[0].reset();
                }else{
                    const toast = swal.mixin({
                        toast: true,
                        position: 'bottom-end',
                        showConfirmButton: false,
                        timer: 3000
                      });
                      
                      toast({
                        type: 'error',
                        title: 'Su e-mail no se ha enviado!'
                      });
                }
            },
            error:function(respuesta){
                const toast = swal.mixin({
                    toast: true,
                    position: 'bottom-end',
                    showConfirmButton: false,
                    timer: 3000
                  });
                  
                  toast({
                    type: 'error',
                    title: 'Su e-mail no se ha enviado!'
                  });
            }
            
        });

        return false;

    });

});