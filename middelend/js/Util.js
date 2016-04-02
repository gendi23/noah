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
