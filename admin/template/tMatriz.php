<?php
/**
 * Created by PhpStorm.
 * User: WAular
 * Date: 02/04/2016
 * Time: 19:02
 */
$userId=$USERID;

$pyramid= $userController->getPyramid($userId);
function textLevel($level){
    $html='<div class="vertical level'.$level.'-color">
        <p>N</p>
        <p>I</p>
        <p>V</p>
        <p>E</p>
        <p>L</p>
        <p>&nbsp;</p>
        <p>'.$level.'</p>
    </div>';
    return $html;
}
?>
<link rel="stylesheet" href="/front/css/matriz.css"/>
<link rel="stylesheet" href="/front/css/popup.css"/>
<div id="container-publicity">
    <div  style="color: #0016b0"><h3><center>Noticias Noah</center></h3></div>
    <div  style="color: #0016b0"><h3><center>Patrocinador</center></h3>
        <button class="button-patrocinador level1-color" id="open-patrocinator1"><strong>Pagar Patrocinador 1</strong></button>
        <button class="button-patrocinador level2-color" id="open-patrocinator2"><strong>Pagar Patrocinador 2</strong></button>
        <button class="button-patrocinador level3-color" id="open-patrocinator3"><strong>Pagar Patrocinador 3</strong></button>
        <button class="button-patrocinador level4-color" id="open-patrocinator4"><strong>Pagar Patrocinador 4</strong></button>

    </div>
    <div  style="color: #0016b0"><h3><center>Publicidad</center></h3></div>

</div>
<div class="level-container">
    <?=textLevel(1)?>
    <div class="level-content" id="level1">

        <img src="/front/img/avatar-small.png" alt=""/>
        <center>
            <span class="name-user  name-user-level1">
                <?php if($dataUser!=""){ ?>
                    <?=$dataUser->getName()." ".$dataUser->getLastName()?>
                <?php } ?>

            </span>
        </center>
        <div class="datos datos1">
            <h4>Datos personales</h4>
            <span>Correo: <?=$user->getEmail()?></span><br/>
            <span>Telefono: <?=$user->getPhone()?></span>
        </div>
    </div>
</div>
<?php
if(count($pyramid["level2"])>0){
?>
<!-- Nivel 2 de la piramide -->
<div class="level-container">
    <?=textLevel(2)?>
    <?php
    $count=1;
    foreach($pyramid["level2"] as $level1){
        if(count($level1)>0){
            $user1= new User($level1);
            $dataUser1= $dataUserController->getByUser($user1->getId());
            ?>
            <div class="level-content level2" id="level2-<?=$count?>">
                <img src="/front/img/avatar-small.png" alt=""/>
                <span class="name-user  name-user-level2">
                <?php if($dataUser1!=""){ ?>
                    <?=$dataUser1!=""?$dataUser1->getName()." ".$dataUser1->getLastName():$user1->getUser()?>
                <?php } ?>
                </span>
                <div class="datos datos2">
                    <h4>Datos personales</h4>
                    <span>Correo: <?=$user->getEmail()?></span><br/>
                    <span>Telefono: <?=$user->getPhone()?></span>
                </div>
            </div>
        <?php }else{  ?>
                <div class="level-content level2" id="level2-<?=$count?>">
                    <img src="/front/img/avatar-small.png" alt=""/>
                </div>
        <?php
        }
        $count++;
    }
    }?>
</div>
<?php
if(count($pyramid["level3"])>0){
?>
<!-- Nivel 3 de la piramide -->
<div class="level-container">
    <?=textLevel(3)?>
    <?php
    $count=1;
    foreach($pyramid["level3"] as $level1){

        if(count($level1)>0){
            $user1= new User($level1);
            $dataUser1= $dataUserController->getByUser($user1->getId());
            ?>
            <div class="level-content level3" id="level2-<?=$count?>">
                <img src="/front/img/avatar-small.png" alt=""/>
                <span class="name-user  name-user-level3">
                <?php if($dataUser1!=""){ ?>
                    <?=$dataUser1!=""?$dataUser1->getName()." ".$dataUser1->getLastName():$user1->getUser()?>
                <?php } ?>
                </span>
            </div>
        <?php
        }else{
            ?>
            <div class="level-content level3" id="level2-<?=$count?>">
                <img src="/front/img/avatar-small.png" alt=""/>
            </div>
        <?php
        }
        $count++;
    }
    }?>
</div>
<?php
if(count($pyramid["level4"])>0){
?>
<div class="level-container">
    <?=textLevel(4)?>
    <?php
    $count=1;
    foreach($pyramid["level4"] as $level1){
        if(count($level1)>0){
            $user1= new User($level1);
            $dataUser1= $dataUserController->getByUser($user1->getId());
        ?>
        <div class="level-content level4" id="level2-<?=$count?>">
            <img src="/front/img/avatar-small.png" alt=""/>
            <span class="name-user  name-user-level4">
            <?php if($dataUser1!=""){ ?>
                <?=$dataUser1!=""?$dataUser1->getName()." ".$dataUser1->getLastName():$user1->getUser()?>
            <?php } ?>
            </span>
        </div>
        <?php }else{
            ?>
            <div class="level-content level4" id="level2-<?=$count?>">
                <img src="/front/img/avatar-small.png" alt=""/>
            </div>
            <?php
        }
        $count++;
    }
}?>
</div>
    <?php


function getTitlePopUp($patrocinatorId,$num){

    $dataUserController= new DataUserController();

    $dataPatrocinator= $dataUserController->getByUser($patrocinatorId);
    $patrocinator1= new User($dataUserController->get(Tables::$User,$patrocinatorId));


    $titleP1='<center><h3><strong>Datos patrocinante '.$num.'</strong></h3></center>
    <h4 class="title-payment-matriz">Nombre: '.$dataPatrocinator->getName().' '.$dataPatrocinator->getLastName().'</h4>
    <h4 class="title-payment-matriz">Banco: '.$dataPatrocinator->getBankName().'</h4>
    <h4 class="title-payment-matriz">Cuenta: '.$dataPatrocinator->getAccountNumber().'</h4>
    <h4 class="title-payment-matriz">Cedula: '.$dataPatrocinator->getCedula().'</h4>
    <h4 class="title-payment-matriz">Telefono: '.$patrocinator1->getPhone().'</h4>';

    return $titleP1;
}
/*
$patrocinator1= $userController->getPatrocinator($userId);
$patrocinator2= $userController->getPatrocinator($patrocinator1->getId());
$patrocinator3= $userController->getPatrocinator($patrocinator2->getId());
$patrocinator4= $userController->getPatrocinator($patrocinator3->getId());

   echo Html::Popup(
        'patrocinator1',
        getTitlePopUp($patrocinator1->getId(),1),
        DepositView::depositPaymentForm($userId,1,$patrocinator1->getEmail()));

    echo Html::Popup(
        'patrocinator2',
        getTitlePopUp($patrocinator2->getId(),2),
        DepositView::depositPaymentForm($userId,2,$patrocinator2->getEmail()));
    echo Html::Popup(
        'patrocinator3',
        getTitlePopUp($patrocinator3->getId(),3),
        DepositView::depositPaymentForm($userId,3,$patrocinator3->getEmail()));
    echo Html::Popup(
        'patrocinator4',
        getTitlePopUp($patrocinator4->getId(),4),
        DepositView::depositPaymentForm($userId,4,$patrocinator4->getEmail()));
*/
?>