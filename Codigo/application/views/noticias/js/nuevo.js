$(document).ready(function(){
    $('#frmNoticias').validate({
        rules:{
            titulo:{
                required: true
            },
            tipo:{
                required: true
            },
            contenido:{
                required: true
            }
        },
        messages:{
            titulo: {
                required: "Debe introducir el titulo de La Noticia"
            },
            contenido:{
                required: "Debe introducir el contenido De la Noticia"
            }
        }
    });
});