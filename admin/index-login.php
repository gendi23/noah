<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LRSports Digital CMS</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/middelend/css/style.css"/>
    <script src="/middelend/js/jquery.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

</head>
<body>
<header class="header">
    <div class="container text-center">
        <h1><b>LRSports Digital CMS</b></h1>
    </div>
</header>
<br/>
<section class="container-fluid border col-sm-6 col-md-offset-3">
    <div class="container">
        <div class="row">
            <h2>Inicio de sesi&oacute;n</h2>
        </div>
    </div>
    <br/>
    <article class="col-sm-11" >
        <div id="control-error"></div>
        <form action="/login" class="form-horizontal" role="form" method="post" id="loginForm" name="form">
            <div class="form-group">
                <label class="control-label col-sm-4" for="user">Usuario:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="user" placeholder="Introduzca el Usuario" name="user" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="pass">Contrase&ntilde;a:</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="pass" name="pass" required>
                </div>
            </div>
            <!-- data-key es la clave publica que ofrece reCaptcha
            <div class="g-recaptcha" data-sitekey="6LfBxwYTAAAAACh1Uk6zUwIAoOo3C9ARv_CDSktg"></div>-->
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary buttonForm">Acceder</button>
                </div>
            </div>
        </form>
    </article>
</section>
<script>
    $(document).ready(function(){
        $('button').click(function(event){
            event.preventDefault();

            var pass = $('#pass').val();
            var user= $('#user').val();

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
                        $('#pass').val("");
                        $('#user').val("");
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
</body>
</html>