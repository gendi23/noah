<?php

$depositController= new DepositController();

$depositMatriz= $depositController->getByLevel($USERID,0);
$deposit1= $depositController->getByLevel($USERID,1);

$publicityController= new PublicityController();

?>
<link rel="stylesheet" href="/front/css/matriz.css"/>
<link rel="stylesheet" href="/front/css/popup.css"/>
<style>
    #header-p{
        padding: 1px 5px;
        top: 0px;
        position: relative;
        border-bottom: 2px solid;
    }
    #hh1{
        margin-left: 16px;
        width: 600px;
    }
    #hh2{
        position: relative;
        top: -40px;
        left: 640px;
        margin-bottom: -26px;
        width: 180px;
    }
    #body-p{
        margin-top: 20px;
    }
    #body-p a{
        font-family: "Arial";
        color: #000;
        margin-left: 15px;
    }
    #body-p a:hover, #body-p a:focus{
        text-decoration: none;
        color: #000;
    }
    .disabled-ok{
        padding-bottom: 20px;
    }
</style>
<div><h2 class="title-matriz">Matriz Noah</h2></div>
<div class="" id="tuto-matriz">
    <?php if(!($depositController->isActiveByLevel($USERID,0))){ ?>
        <div class=" notification-pago">
            <p class="text-justify">
                <strong>Primer paso:</strong> Debes pagar 1000 Bs. por mantenimiento de la plataforma de la Matriz Noah, a partir de este momento tienes tres dias para hacerlo, de lo contrario, tu cuenta será eliminada. Luego de enviar la notificación de pago, será activada definitivamente tu plataforma.
            </p>
                <button class="button-admin" id="open-payment"><strong>Pagar Plataforma</strong></button>
        </div>
    <?php } ?>
    <?php if(!($depositController->isActiveByLevel($USERID,1))){ ?>
        <div class=" notification-pago">
            <p class="text-justify">
                <strong>Segundo paso:</strong> Debes comprarle a tu patrocinador el "nivel 1 de publicidad" el cual cuesta 800 Bs. A partir de este momento tienes tres dias para hacerlo, de lo contrario, tu cuenta será eliminada. Luego de enviar la notificación de pago, podrás entrar a tu matriz.
            </p>
            <?php if($depositController->isActiveByLevel($USERID,0)&&$depositController->getByLevel($USERID,0)->getStatus()==1){ ?>
                <button class="button-admin " id="open-patrocinator1" ><strong>Pagar a Patrocinador</strong></button>
            <?php }else{ ?>
                <button class="button-admin disabled-noah" id="open-patrocinator1" disabled><strong>Pagar a Patrocinador</strong></button>
            <?php } ?>
        </div>
    <?php } ?>
   <div class="notification-pago">
        <p class="text-justify">
            <strong>Tercer paso:</strong> Debes invitar a dos personas a formar parte de tu matriz. A partir de este momento tienes 10 dias para hacerlo, de lo contrario, tu cuenta será bloqueada..
        </p>
        <?php
        $activeMatriz=0;
        if($depositController->isActiveByLevel($USERID,1)&&$depositController->getByLevel($USERID,1)->getStatus()==1){
            $activeMatriz=1;
            if($publicityUserController->countPublicity($USERID,$level->getLevel())[0]>=20){
            ?>
         <button class="button-admin" id="matriz" onclick=" location.href='/admin/matriz'" ><strong>Matriz</strong></button>
        <?php }else{ ?>
            <button class="button-admin disabled-noah" id="matriz" onclick=" location.href='/admin/matriz'" disabled><strong>Matriz</strong></button>
        <?php }
        }else{ ?>
            <button class="button-admin disabled-noah" id="matriz" onclick=" location.href='/admin/matriz'" disabled><strong>Matriz</strong></button>
       <?php } ?>
    </div>
    <div class="box-aviso">
        <?php $view=''; if($publicityUserController->countPublicity($USERID,$level->getLevel())[0]<20)$view='style="color:red;"';?>
        <h4 <?=$view?>>
           Aviso:Ademas de comprar y vender niveles de publicidad en la matriz debes ver los anuncios que compras en cada nivel, con una frecuencia de 20 anuncios por día.
        </h4>
        <?php
        $cantAnuncios=array(100,150,200,300);
        $cantTiempo=array(10,15,15,15);
        if($activeMatriz==0){ ?>
            <button class="button-nivelt1  disabled-noah" id="matriz" disabled>
                <h3>
                    Eres nivel1:Debes ver <?=$cantAnuncios[0]?> anuncios en <?=$cantTiempo[0]?> días
                </h3>
            </button>
        <?php }else if($level->getlevel()!=1){?>
            <button class="button-nivelt1  disabled-noah disabled-ok" id="matriz" disabled>
                <h3>
                    Anuncios vistos &nbsp;&nbsp;<?=$html->icon("ok")?>
                </h3>
            </button>
        <?php }else{ ?>
            <button class="button-nivelt1" id="matriz" disabled>
                <h3>
                    Eres nivel1:Debes ver <?=$cantAnuncios[0]?> anuncios en <?=$cantTiempo[0]?> días
                </h3>
            </button>
        <?php }
        ?>
        <?php for($i=2;$i<=4;$i++){
            $disabledClass=$i!=$level->getlevel()?"disabled-noah":"";
            $disabled=$i!=$level->getLevel()?"disabled":"";
            $disabledOk= $level->getlevel()>$i?"disabled-ok":"";
            ?>
                <button class="button-nivelt<?=$i?> <?=$disabledClass?> <?=$disabledOk?>" id="matriz" <?=$disabled?>>
                    <h3>
                        <?php if($level->getlevel()>$i){?>
                            Anuncios vistos &nbsp;&nbsp;<?=$html->icon("ok")?>
                        <?php }else{ ?>
                            Eres nivel <?=$i?>:Debes ver <?=$cantAnuncios[$i-1]?> anuncios en <?=$cantTiempo[$i-1]?> dias
                        <?php } ?>
                    </h3>
                </button>
        <?php } ?>
    </div>
    <?php if($activeMatriz==1){?>
    <div class="box-aviso">
        <div id="header-p" class="level<?=$level->getLevel()?>-color-2">
           <h3 id="hh1">Anuncios de nivel <?=$level->getLevel()?></h3>
           <h3 id="hh2">Vistos <?=$publicityController->countPublicity($USERID,$level->getLevel())["count"];?> de <?=$cantAnuncios[$level->getLevel()-1]?></h3>
        </div>
        <div id="body-p">
            <?php foreach($publicityController->publicityByUser($USERID,$level->getLevel()) as $row){
                $publicity = new Publicity($row);
                ?>
            <a href="/publicity/<?=$publicity->getId()?>/<?=$USERID?>" target="_blank"><?=$publicity->getName()?></a><br/>
            <?php }?>
        </div>
    </div>
    <?php }?>
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
                <h4 class="title-payment-matriz">Banco: Bicentenario</h4>
                <h4 class="title-payment-matriz">Tipo: Corriente</h4>
                <h4 class="title-payment-matriz">Cuenta: 0175 0618 8400 7335 6732</h4>
                <h4 class="title-payment-matriz">Rif: J-404944222</h4>';

$titleP1=$dataPatrocinator!=""?'<center><h3><strong>Datos patrocinante 1</strong></h3></center>
                <h4 class="title-payment-matriz">Nombre: '.$dataPatrocinator->getName().' '.$dataPatrocinator->getLastName().'</h4>
                <h4 class="title-payment-matriz">Banco: '.$dataPatrocinator->getBankName().'</h4>
                <h4 class="title-payment-matriz">Tipo: '.$dataPatrocinator->getAccountType().'</h4>
                <h4 class="title-payment-matriz">Cuenta: '.$dataPatrocinator->getAccountNumber().'</h4>
                <h4 class="title-payment-matriz">Cedula: '.$dataPatrocinator->getCedula().'</h4>
                <h4 class="title-payment-matriz">Telefono: '.$patrocinator1->getPhone().'</h4>':"";
                if($depositController->getByLevel($patrocinator1->getId(),1)==""){
                    $titleP1.='<p class="extra-title">Este negociante no ha pagado a su patrocinador, contáctalo.</p>';
                }
?>

<?=Html::Popup(
    'payment',
    $titlePayment,
    DepositView::depositPaymentForm($USERID,0,"noahcorporativa@gmail.com"," (1000bs)"));
?>
<?=Html::Popup(
    'patrocinator1',
    $titleP1,
    DepositView::depositPaymentForm($USERID,1,$patrocinator1->getEmail()," (1500bs)",$patrocinator1->getId()));
?>
<script>


</script>