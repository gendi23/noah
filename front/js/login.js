/**
 * Created by Yutcelinis on 10/04/2016.
 */

function getCapchat(lenght){
    return Math.random().toString(36).replace(/[^A-Za-z0-9]+/g, '').substr(1, lenght);
    }

$(document).ready(function(){
    var captcha= getCapchat(4);
    $('#codigoCaptcha').attr('value',captcha);

    $('#btn-reg').click(function(event) {
        event.preventDefault();

        var pass=$('#pass').val();
        var confirm=$('#confirm').val();

        //if ($('#license').val($(this).val(":checked"))) {

            if(pass!=''&&confirm!='') {
                if (pass == confirm) {
                    $.ajax({
                        cache: false,
                        dataType: "json",
                        type: 'POST',
                        url: "/user/register",
                        data: $('#form-reg').serialize(),
                        success: function (data) {
                            if (data.update == 1) {
                                $("#control-error-reg").html("");
                                $("#control-error-reg").append('<div class="alert alert-success">' +
                                'Felicitaciones!<br/> Debes ingresar a tu correo electrònico para validar tus datos.' +
                                '</div>');
                                $('#form-reg').val();
                            } else {
                                $("#control-error-reg").html("");
                                $("#control-error-reg").append('<div class="alert alert-warning">' +
                                'Por favor verifica los datos ingresados' +
                                '</div>');
                                $('#pass').val("");
                                $('#user').val("");
                            }
                        },
                        error: function () {
                            $("#control-error-reg").html("");
                            $("#control-error-reg").append('<div class="alert alert-danger">' +
                            'Error al cargar el módulo.</br>Por favor consultar con el administrador del Sistema' +
                            '</div>');
                        }
                    });
                } else {
                    $("#control-error-reg").html("");
                    $("#control-error-reg").append('<div class="alert alert-warning">' +
                    'La contraseña y la confirmaciòn deben coincidir.' +
                    '</div>');
                }
            }
       /* }else {
            console.log("no checked");
            $("#control-error-reg").html("");
            $("#control-error-reg").append('<div class="alert alert-warning">' +
            'Debe aceptar los terminos de servicios' +
            '</div>');
        }*/
});

    $('#button-login').click(function(event){
        event.preventDefault();

        var pass = $('#pass-login').val();
        var user= $('#user-login').val();

        if($('#captcha').val()==captcha){
            $.ajax({
                cache:false,
                dataType: "json",
                type : 'GET',
                url: "/login/"+user+"/"+pass,
                success: function(data) {
                    if(data.value==1){
                        $('#loginForm').submit();
                    }else{
                        $("#control-error").html("");
                        $("#control-error").append('<div class="alert alert-warning">' +
                            'Usuario o Contraseña no existe o no coinciden</br>Por favor verificar lo ingresado.' +
                            '</div>');
                        $('#pass-login').val("");
                        $('#user-login').val("");
                    }
                },
                error:function(){
                    $("#control-error").html("");
                    $("#control-error").append('<div class="alert alert-danger">' +
                        'Error al cargar el módulo.</br>Por favor consultar con el administrador del Sistema' +
                        '</div>')
                }
            });
        }else{
            $("#control-error").html("");
            $("#control-error").append('<div class="alert alert-warning">' +
                'Error en el código captcha.'+
                '</div>');

            location.reload();
        }
    });

    });

