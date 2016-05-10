<?php
/**
 * Created by PhpStorm.
 * User: Yutcelinis
 * Date: 22/03/2016
 * Time: 20:38
 */
$userView= new UserView();

?>
    <link rel="stylesheet" href="/front/css/user.css"/>
<h2 align="center">Perfil de Usuario</h2></br>
<div id="user-perfil">
    <center><h4>Datos del perfil</h4></center>
    <div class="list-group">
        <a href="#" class="list-group-item"><span class="label label-info label-user">Usuario</span> <?=$user->getUser()?></a>
        <a href="#" class="list-group-item"><span class="label label-info label-user">Email</span> <?=$user->getEmail()?></a>
        <a href="#" class="list-group-item"><span class="label label-info label-user">Teléfono</span> <?=$user->getPhone()?></a>
        <a href="#" class="list-group-item"><span class="label label-info label-user">Patrocinador</span> <?=$user->getPatrocinator()?></a>
    </div>
    <center><h4>Datos Personales</h4></center>
    <div class="list-group">
        <a href="#" class="list-group-item"><span class="label label-primary label-user">Cedula</span> <?=$dataUser->getCedula()?></a>
        <a href="#" class="list-group-item"><span class="label label-primary label-user">Nombre</span> <?=$dataUser->getName()?></a>
        <a href="#" class="list-group-item"><span class="label label-primary label-user">Apellido</span> <?=$dataUser->getLastName()?></a>
        <a href="#" class="list-group-item"><span class="label label-primary label-user">País</span> <?=$dataUser->getCountry()?></a>
        <a href="#" class="list-group-item"><span class="label label-primary label-user">Ciudad</span> <?=$dataUser->getCity()?></a>
        <a href="#" class="list-group-item"><span class="label label-primary label-user">Zona</span> <?=$dataUser->getZone()?></a>
    </div>
    <center><h4>Datos de la Cuenta</h4></center>
    <div class="list-group">
        <a href="#" class="list-group-item"><span class="label label-success label-user">Banco</span> <?=$dataUser->getBankName()?></a>
        <a href="#" class="list-group-item"><span class="label label-success label-user">Tipo</span> <?=$dataUser->getAccountType()?></a>
        <a href="#" class="list-group-item"><span class="label label-success label-user">Número</span> <?=$dataUser->getAccountNumber()?></a>
    </div>
</div>
<div id="user-edit"><?=$userView->FormRegisterData($USERID,$dataUser->getId(),4,7)?></div>
