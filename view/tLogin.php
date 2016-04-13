<?php
    $userView= new UserView();
?>
<div class="col-md-6">
    <div class="container">
        <div class="row">
            <h2 style="">Ingresa a tu Cuenta</h2>
        </div>
    </div>
    <br/>
    <article class="col-sm-11" >

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
