<div id="control-error"></div>
<form action="/admin/login" class="form-horizontal" role="form" method="post" id="loginForm" name="form">
    <div class="form-group">
        <label class="control-label col-sm-4" for="user-login">Usuario:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="user-login" placeholder="Introduzca el Usuario" name="user" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4" for="pass-login">Contrase&ntilde;a:</label>
        <div class="col-sm-8">
            <input type="password" class="form-control" id="pass-login" placeholder="Introduzca la Contraseña" name="pass-login" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4" for="text">Escribe el codigo</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="captcha" placeholder="Introduzca el Codigo" name="captcha" required>
        </div>
        <div class="col-sm-3 margin-none">
            <input type="text" class="form-control" id="codigoCaptcha"  name="captcha" required>
        </div>
    </div>
    <div class="col-sm-offset-3 col-sm-9"><a href="">¿Olvidaste tu Contrase&ntilde;a?</a></div>
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            <button type="submit" class="btn btn-default buttonForm" id="button-login">Aceptar</button>
        </div>
    </div>
</form>