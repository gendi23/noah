/**
 * Created by Yutcelinis on 10/04/2016.
 */

function getCapchat(lenght){
    return Math.random().toString(36).replace(/[^A-Za-z0-9]+/g, '').substr(1, lenght);
    }

$(document).ready(function(){
    var captcha= getCapchat(4);
    $('#codigoCaptcha').attr('value',captcha);

    $('#pass').focus(function(){
        var user=$('#user').val();
        var validate= 0;
        $.ajax({
            cache: false,
            dataType: "json",
            type: 'GET',
            url: "/validate/"+user,
            async:false,
            success: function (data) {
                validate= data.status;
            }
        });
        if(validate==1){
            $('#user').css({"border-color":"red"})
            $('#btn-reg').attr("disabled", "disabled");
            $("#icon-user span").removeClass('glyphicon-ok');
            $("#icon-user span").addClass('glyphicon-ban-circle');
            $("#icon-user span").css('color','#F43636');
            $("#user").val("");
            $("#user").focus();
        }else{
            $("#icon-user span").removeClass('glyphicon-ban-circle');
            $("#icon-user span").addClass('glyphicon-ok');
            $("#icon-user span").css('color','#214DF3');
            $('#btn-reg').removeAttr("disabled");
        }
    });

    $('#btn-reg').click(function(event) {
        event.preventDefault();

        var pass=$('#pass').val();
        var confirm=$('#confirm').val();

        var user=$('#patrocinator').val();
        var validate= 0;
        $.ajax({
            cache: false,
            dataType: "json",
            type: 'GET',
            url: "/validate/"+user,
            async:false,
            success: function (data) {
                validate= data.status;
            }
        });
        if($("#license").is(':checked')){
        if (validate==1) {
            $("#icon-patrocinator span").removeClass('glyphicon-ban-circle');
            if(pass!=''&&confirm!='') {
                if (pass == confirm) {
                    $.ajax({
                        cache: false,
                        dataType: "json",
                        type: 'POST',
                        url: "/user/register",
                        data: $('#form-reg').serialize(),
                        beforeSend: function( ) {
                            $("#control-error-reg").html("");
                            $("#control-error-reg").append('<div class="alert alert-warning">' +
                            'Por favor espere mientras se cargan los datos...' +
                            '</div>');
                        },
                        success: function (data) {
                            if (data.update == 1) {
                                $('#close-reg').click();
                                $('#popup-message').fadeIn('slow');
                                $('.popup-overlay').fadeIn('slow');
                                $('.popup-overlay').height($(window).height());
                            } else {

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
        }else {

            $("#icon-patrocinator span").addClass('glyphicon-ban-circle');
            $("#icon-patrocinator span").css('color','#F43636');
            $('#patrocinator').val("");
            $('#patrocinator').focus();
        }}
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

    $('#btnUpdatePass').click(function(e){
        e.preventDefault();

        pass= $('#pass').val();
        passNew= $('#passNew').val();
        passConfirm= $('#passRe').val();

        if(passNew==passConfirm){
            console.log($('#form-update-pass').serialize());
            $.ajax({
                cache: false,
                dataType: "json",
                type: 'POST',
                url: "/admin/updatePass",
                data: $('#form-update-pass').serialize(),
                beforeSend: function( ) {
                    $("#control-error-update").html("");
                    $("#control-error-update").append('<div class="alert alert-warning">' +
                    'Por favor espere mientras se cargan los datos...' +
                    '</div>');
                },
                success: function (data) {
                    if (data.update == 1) {
                        $("#control-error-update").html("");
                        $("#control-error-update").append('<div class="alert alert-success">' +
                        'Su contraseña ha sido cambiada con éxito' +
                        '</div>');
                        $('#user').val("");
                        $('#pass').val("");
                        $('#passNew').val("");
                        $('#passRe').val("");
                    } else {
                        $("#control-error-update").html("");
                        $("#control-error-update").append('<div class="alert alert-warning">' +
                        data.message +
                        '</div>');
                        $('#passNew').val("");
                        $('#passRe').val("");
                    }
                },
                error: function () {
                    $("#control-error-update").html("");
                    $("#control-error-update").append('<div class="alert alert-danger">' +
                    'Error al cargar el módulo.</br>Por favor consultar con el administrador del Sistema' +
                    '</div>');
                }
            });
        }else {
            $("#control-error-update").html("");
            $("#control-error-update").append('<div class="alert alert-warning">' +
            "Las contraseña no coincide con la confirmación." +
            '</div>');
            $('#passNew').val("");
            $('#passRe').val("");
        }

    });


    $('#btnRememberPass').click(function(e){
        e.preventDefault();

        user= $('#update').val();

            $.ajax({
                cache: false,
                dataType: "json",
                type: 'POST',
                url: "/admin/remember",
                data: $('#form-remember-pass').serialize(),
                beforeSend: function( ) {
                    $("#control-error-remember").html("");
                    $("#control-error-remember").append('<div class="alert alert-warning">' +
                    'Por favor espere mientras se cargan los datos...' +
                    '</div>');
                },
                success: function (data) {
                    if (data.update == 1) {
                        $("#control-error-remember").html("");
                        $("#control-error-remember").append('<div class="alert alert-success">' +
                        'Se ha reseteado su contraseña<br/>Revise su correo electrónico para ver su nueva contraseña.' +
                        '</div>');
                        $('#user').val("");
                    } else {
                        $("#control-error-remember").html("");
                        $("#control-error-remember").append('<div class="alert alert-warning">' +
                        data.message +
                        '</div>');
                        $('#user').val("");
                    }
                },
                error: function () {
                    $("#control-error-remember").html("");
                    $("#control-error-remember").append('<div class="alert alert-danger">' +
                    'Error al cargar el módulo.</br>Por favor consultar con el administrador del Sistema' +
                    '</div>');
                }
            });

    });

    });

