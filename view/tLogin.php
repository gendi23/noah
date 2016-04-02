<?php
    $userView= new UserView();
?>
<div class="col-md-6">
    <div class="container">
        <div class="row">
            <h2>Ingresa a tu Cuenta</h2>
        </div>
    </div>
    <br/>
    <article class="col-sm-11" >
        <div id="control-error"></div>
        <form action="/admin/login" class="form-horizontal" role="form" method="post" id="loginForm" name="form">
            <div class="form-group">
                <label class="control-label col-sm-3" for="user-login">Usuario:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="user-login" placeholder="Introduzca el Usuario" name="user" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="pass-login">Contrase&ntilde;a:</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="pass-login" placeholder="Introduzca la Contraseña" name="pass-login" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="text">Escribe el codigo</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="captcha" placeholder="Introduzca el Codigo" name="captcha" required>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="codigoCaptcha"  name="captcha" required>
                </div>
            </div>
            <div><a href="">¿Olvido de Contrase&ntilde;a?</a></div>
            <!-- data-key es la clave publica que ofrece reCaptcha
            <div class="g-recaptcha" data-sitekey="6LfBxwYTAAAAACh1Uk6zUwIAoOo3C9ARv_CDSktg"></div>-->
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default buttonForm" id="button-login">Aceptar</button>
                </div>
            </div>
        </form>
    </article>
</div>
<div class="col-md-6">
    <h2>Registrarse</h2>
    <br/>
    <article class="col-sm-11" >
        <div id="control-error-reg"></div>
        <?=$userView->FormRegister()?>
    </article>
</div>
<script src="/middelend/js/jquery.js"></script>
<script>
    $(document).ready(function(){
        $('#btn-reg').click(function(event) {
            event.preventDefault();
            var pass=$('#pass').val();
            var confirm=$('#confirm').val();

            if(pass==confirm){
                $.ajax({
                    cache:false,
                    dataType: "json",
                    type : 'POST',
                    url: "/user/register",
                    data: $('#form-reg').serialize(),
                    success: function(data) {
                        if(data.update==1){
                            $("#control-error-reg").html("");
                            $("#control-error-reg").append('<div class="alert alert-success">' +
                            'Felicitaciones!<br/> Debes ingresar a tu correo electrònico para validar tus datos.' +
                            '</div>');
                            $('#form-reg').clean();
                        }else{
                            $("#control-error-reg").html("");
                            $("#control-error-reg").append('<div class="alert alert-warning">' +
                            'Por favor verifica los datos ingresados' +
                            '</div>');
                            $('#pass').val("");
                            $('#user').val("");
                        }
                    },
                    error:function(){
                        $("#control-error-reg").html("");
                        $("#control-error-reg").append('<div class="alert alert-danger">' +
                        'Error al cargar el módulo.</br>Por favor consultar con el administrador del Sistema' +
                        '</div>')
                    }
                });
            }else{
                $("#control-error-reg").html("");
                $("#control-error-reg").append('<div class="alert alert-warning">' +
                'La contraseña y la confirmaciòn deben coincidir.'+
                '</div>');
            }

        });

        $('#button-login').click(function(event){
            event.preventDefault();

            var pass = $('#pass-login').val();
            var user= $('#user-login').val();

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
        });
    });
</script>