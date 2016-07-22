<style>
    .buttonLink{
        height: 35px;
        font-size: 16pt;
        color: #3d7fed;
        border-color: #3d7fed;
    }
    .btn-ver{
        background-color: #f0f0f0 !important;
        border: #23ffca 2px solid !important;
        margin: -5px;
        margin-left: 8%;
        font-weight: bold;

    }
</style>
<form action="#" class="form-horizontal" role="form" method="post" id="loginForm" name="form">
    <div class="form-group">
        <label class="control-label col-sm-6" for="user-login">Usuario</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="user-login" name="user" value="<?=$var["user"]?>"disabled>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-6" for="deposit-date">Fecha del depósito</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="deposit-date" value="<?=$var["deposit-date"]?>" name="deposit-date" disabled>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-6" for="amount">Monto depositado</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="amount" value="<?=$var["amount"]?>" name="amount" disabled>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-6" for="reference">Número de referencia</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="reference" value="<?=$var["reference"]?>" name="reference" disabled>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-6" for="reference">Foto del comprobante</label>
        <div class="col-sm-6">
            <a href="<?=$var["photo"]?>" target="_blank" class="btn btn-default btn-ver">Ver Foto</a>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-4">
            <a href="/panel/set/<?=$var["depositId"]?>/1" class="btn btn-default buttonLink" id="accept">Aceptar</a>
        </div>
        <div class="col-sm-offset-1 col-sm-4">
            <a href="/panel/set/<?=$var["depositId"]?>/2" class="btn btn-default buttonLink" id="none">Negar</a>
        </div>
    </div>
</form>