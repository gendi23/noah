<?php
$depositController= new DepositController();

$depositMatriz= $depositController->getByLevel($USERID,0);
$deposit1= $depositController->getByLevel($USERID,1);

?>
<link rel="stylesheet" href="/front/css/matriz.css"/>
<link rel="stylesheet" href="/front/css/popup.css"/>
<div><h2 class="title-matriz">Matriz Noah</h2></div>
<div class="" id="tuto-matriz">
    <div class=" notification-pago">
        <p class="text-justify">
            <strong>Primer paso:</strong> Debes pagar 500 Bs. por mantenimiento de l plataforma de la Matriz Noah, a partir de este momento tienes tres dias para hacerlo, de lo contrario, tu cuenta será eliminada. Luego de enviar la notificación de pago, será activada definitivamente tu plataforma.
        </p>
        <?php if($depositMatriz==""||$depositMatriz->getStatus()==""){ ?>
            <button class="button-admin" id="open-payment"><strong>Pagar Plataforma</strong></button>
        <?php } else{?>
            <button class="button-admin" id="open-payment" disabled><strong>Pagar Plataforma</strong></button>
        <?php } ?>
    </div>
    <div class=" notification-pago">
        <p class="text-justify">
            <strong>Segundo paso:</strong> Debes comprarle a tu patrocinador el "nivel 1 de publicidad" el cual cuesta 800 Bs. A partir de este momento tienes tres dias para hacerlo, de lo contrario, tu cuenta será eliminada. Luego de enviar la notificación de pago, podrás entrar a tu matriz.
        </p>
        <?php if($deposit1==""||$deposit1->getStatus()==""){ ?>
        <button class="button-admin" id="open-patrocinator1" ><strong>Pagar a Patrocinador</strong></button>
        <?php } else if($depositMatriz!=""&&$depositMatriz->getStatus()==0){?>
        <button class="button-admin" id="open-patrocinator1" disabled><strong>Pagar a Patrocinador</strong></button>
        <?php } else{ ?>
            <button class="button-admin" id="open-patrocinator1" disabled><strong>Pagar a Patrocinador</strong></button>
        <?php }?>
    </div>
    <div class="notification-pago">
        <p class="text-justify">
            <strong>Tercer paso:</strong> Debes invitar a dos personas a formar parte de tu matriz. A partir de este momento tienes 10 dias para hacerlo, de lo contrario, tu cuenta será bloqueada..
        </p>
        <?php if($dataUser!=""){?>
         <button class="button-admin" id="matriz" onclick=" location.href='/admin/matriz'"><strong>Matriz</strong></button>
        <?php } ?>
    </div>
</div>
<div class="box-aviso">
    <div id="publicidad1"></div>
    <p class="text-justify">
    <h4>Aviso:Ademas de comprar y vender niveles de publicidad en la matriz
        debes ver los anuncios que compras en cada nivel.</h4>
    </p>
    <button class="button-nivelt1" id="matriz" onclick=""><h3>Eres nivel 1:Debes ver 30 anuncios en 10 dias</h3></button>
    <button class="button-nivelt2" id="matriz" onclick=""><h3>Eres nivel 2:Debes ver 40 anuncios en 15 dias</h3></button>
    <button class="button-nivelt3" id="matriz" onclick=""><h3>Eres nivel 3:Debes ver 50 anuncios en 15 dias</h3></button>
    <button class="button-nivelt4" id="matriz" onclick=""><h3>Eres nivel 4:Debes ver 60 anuncios en 15 dias</h3></button>
</div>
<div  class="box-publicidad"">
    <div id="publicidad1"></div>
    <div id="publicidad2"></div>
</div>

<?php
$userController= new UserController();

$patrocinator1= $userController->getByUser($user->getPatrocinator());
$dataPatrocinator= $dataUserController->getByUser($patrocinator1->getId());

$titlePayment='<center><h3><strong>Datos para el Deposito</strong></h3></center>
                <h4 class="title-payment-matriz">Aliaza Coorporativa Noah C.A.</h4>
                <h4 class="title-payment-matriz">Banco Bicentenario</h4>
                <h4 class="title-payment-matriz">Cuenta: 0175 0618 8400 7335 6732</h4>
                <h4 class="title-payment-matriz">Rif: J-404944222</h4>';

$titleP1=$dataPatrocinator!=""?'<center><h3><strong>Datos patrocinante 1</strong></h3></center>
                <h4 class="title-payment-matriz">Nombre: '.$dataPatrocinator->getName().' '.$dataPatrocinator->getLastName().'</h4>
                <h4 class="title-payment-matriz">'.$dataPatrocinator->getBankName().'</h4>
                <h4 class="title-payment-matriz">Cuenta: '.$dataPatrocinator->getAccountNumber().'</h4>
                <h4 class="title-payment-matriz">Cedula: '.$dataPatrocinator->getCedula().'</h4>
                <h4 class="title-payment-matriz">Telefono: '.$patrocinator1->getPhone().'</h4>':"";
?>

<?=Html::Popup(
    'payment',
    $titlePayment,
    DepositView::depositPaymentForm($USERID,0,"wiljacaular@gmail.com",null," (500bs)"));
?>
<?=Html::Popup(
    'patrocinator1',
    $titleP1,
    DepositView::depositPaymentForm($USERID,1,$patrocinator1->getEmail(),null," (800bs)"));
?>
<script>

</script>