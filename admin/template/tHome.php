<link rel="stylesheet" href="/front/css/matriz.css"/>
<link rel="stylesheet" href="/middelend/css/popup.css"/>

<div><h2 class="title-matriz">Matriz Noah</h2></div>
<div class="" id="tuto-matriz">
    <div class=" notification-pago">
        <p class="text-justify">
            <strong>Primer paso:</strong> Debes pagar 500 Bs. por mantenimiento de l plataforma de la Matriz Noah, a partir de este momento tienes tres dias para hacerlo, de lo contrario, tu cuenta será eliminada. Luego de enviar la notificación de pago, será activada definitivamente tu plataforma.
        </p>
        <button class="button-admin" id="open-payment"><strong>Pagar Plataforma</strong></button>
    </div>
    <div class=" notification-pago">
        <p class="text-justify">
            <strong>Segundo paso:</strong> Debes comprarle a tu patrocinador el "nivel 1 de publicidad" el cual cuesta 800 Bs. A partir de este momento tienes tres dias para hacerlo, de lo contrario, tu cuenta será eliminada. Luego de enviar la notificación de pago, podrás entrar a tu matriz.
        </p>
        <button class="button-admin disabled" id="open-patrocinator1"><strong>Pagar a Patrocinador</strong></button>
    </div>
    <div class="notification-pago">
        <p class="text-justify">
            <strong>Tercer paso:</strong> Debes invitar a dos personas a formar parte de tu matriz. A partir de este momento tienes 10 dias para hacerlo, de lo contrario, tu cuenta será bloqueada..
        </p>
         <button class="button-admin" id="matriz" onclick=" location.href='http://noah.dev/admin/matriz'"><strong>Matriz</strong></button>
    </div>
</div>
<div  class="box-publicidad"">
    <div id="publicidad1"></div>
    <div id="publicidad2"></div>
</div>

<?php
$userController= new UserController();
$user= new User($userController->get(Tables::$User,$USERID));

$patrocinator1= $userController->getByUser($user->getPatrocinator());

$titlePayment='<center><h3><strong>Datos para el Deposito</strong></h3></center>
                <h4 class="title-payment-matriz">Aliaza Coorporativa Noah C.A.</h4>
                <h4 class="title-payment-matriz">Banco Bicentenario</h4>
                <h4 class="title-payment-matriz">Cuenta: 0175 0618 8400 7335 6732</h4>
                <h4 class="title-payment-matriz">Rif: J-404944222</h4>';
$titleP1='<center><h3><strong>Datos patrocinante 1</strong></h3></center>
                <h4 class="title-payment-matriz">Nombre: '.$patrocinator1->getUser().'</h4>
                <h4 class="title-payment-matriz">Banco Bicentenario</h4>
                <h4 class="title-payment-matriz">Cuenta: 0175 0618 8400 7335 6732</h4>
                <h4 class="title-payment-matriz">Cedula: XXXXX</h4>
                <h4 class="title-payment-matriz">Telefono: XXXXX</h4>';
?>
<?=Html::Popup(
    'payment',
    $titlePayment,
    DepositView::depositPaymentForm($USERID,0));
?>
<?=Html::Popup(
    'patrocinator1',
    $titleP1,
    DepositView::depositPaymentForm($USERID,1));
?>
