/**
 * Created by waular on 27/05/2015.
 */
$(document).ready(function() {
    <!--      Activamos la validación sobre el formulario -->
    $("#form-sign").validate({
        errorContainer: "#errores",
        errorLabelContainer: "#errores ul",
        wrapper: "li",
        errorElement: "em",
        rules: {
            name:   {required: true},
            passSign:    {required: true, minlength: 4},
            passSign2:   {required: true, minlength: 4, equalTo: "#passSign"},
            emailSign:   {required: true,  email: true},
            emailSign2:   {required: true,  email: true, equalTo: "#emailSign"}
        },
        messages: {

        }
    });

});
