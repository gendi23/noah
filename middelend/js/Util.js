/**
 * Creado por WAular el 05/04/2015.
 */

    function Delete (url){
            event.preventDefault();
            var r= confirm("Desea eliminar?");
            if (r == true) {
                window.location=url;
            }
    }
    function Edit (id, url){
        event.preventDefault();
        id= id!=''?'='+id:"";
        value=[];
        $.ajax({
            cache: false,
            dataType: "json",
            type: 'GET',
            url: url + id,
            success:function(data){
                for (var i = 0; i<data.Championship.length; i++) {
                    console.log(data.Championship[i]);
                }
            },error:function(){
                console.log("error al cargar la url");
            }
        });
    }
