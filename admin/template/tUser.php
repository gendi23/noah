<?php
$userView= new UserView();
$dataUserController= new DataUserController();
?>
    <link rel="stylesheet" href="/front/css/user.css"/>
   <link rel="stylesheet" href="/front/css/matriz2.css"/>
   <div><h2 class="title-matriz">Perfil de Usuario</h2></div>

<div id="formUserDiv">
   <form action="/admin/login" class="form-horizontal" role="form" method="post" id="formUser" name="form">
   <div class= "notification-pago2">
   <div class="form-group">
   </div>
    <div class="form-group">
        <label class="control-label col-sm-6" for="pass">Contraseña:</label>
        <div class="col-sm-6">
            <input type="password" class="form-control" id="pass" placeholder="" name="pass" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-6" for="pass-confir,">Confirma contraseña</label>
        <div class="col-sm-6">
            <input type="password" class="form-control" id="pass-confir," placeholder="" name="pass-confir," required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-6" for="email">Correo GMAIL</label>
        <div class="col-sm-6">
            <input type="email" class="form-control" id="email" placeholder="" name="email" required value="<?=$user->getEmail()?>">
        </div>
    </div>
   
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            <button type="submit" class="btn btn-default buttonForm" id="button-guardar">Guardar cambios</button>
        </div>
    </div>
    </div>
    <div class= "notification-pago4">

    <center><p><h4> Publicidad</h4></p></center>
    </div>
    <div class= "notification-pago3">
<div class="form-group">
        <label class="control-label col-sm-6" for="name">Nombre:</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="name" placeholder="" name="name" required value="<?=$dataUser->getName()?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-6" for="lastname">Apellido</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="lastname" placeholder="" name="lastname" required value="<?=$dataUser->getLastName()?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-6" for="cedula">Cedula</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="cedula" placeholder="" name="cedula" required value="<?=$dataUser->getCedula()?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-6" for="country">Pais</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="country" placeholder="" name="country" required value="<?=$dataUser->getCountry()?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-6" for="city">Cuidad</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="city" placeholder="" name="city," required value="<?=$dataUser->getCity()?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-6" for="zone">Zona</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="zone" placeholder="" name="zone" required value="<?=$dataUser->getZone()?>">
        </div>
    </div>
   
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            <button type="submit" class="btn btn-default buttonForm" id="button-guardar">Guardar cambios</button>
        </div>
    </div>
    </div>
    <div class= "notification-pago4">

    <center><p><h4>Noticias Noah</h4></p></center>

    </div>


</form> 
</div>
<div id="formUserDiv2">
   <form action="/admin/login" class="Dos form-horizontal" role="form" method="post" id="formUser" name="form">
 
   <div class="form-group">
   </div>
    <div class="form-group">
        <label class="control-label col-sm-6" for="bank_name">Nombre de Banco:</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="bank_name" placeholder="" name="bank_name" required value="<?=$dataUser->getBankName()?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-6" for="account_type">Tipo de Cuenta:</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="account_type" placeholder="" name="account_type" required value="<?=$dataUser->getAccountType()?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-6" for="account_number">Numero de Cuenta:</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="account_number" placeholder="" name="account_number" required value="<?=$dataUser->getAccountNumber()?>">
        </div>
    </div>
</form> 
</div>
