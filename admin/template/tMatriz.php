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
        <p>'.($level+1).'</p>
    </div>';
    return $html;
}
?>
<link rel="stylesheet" href="/front/css/matriz.css"/>
<link rel="stylesheet" href="/front/css/popup.css"/>
    <link rel="stylesheet" href="/front/css/dataPop.css"/>
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
    <div class="vertical level1-color">
        <p>I</p>
        <p>N</p>
        <p>I</p>
        <p>C</p>
        <p>I</p>
        <p>O</p>
    </div>
    <div class="level-content" id="level1">
        <img src="/front/img/avatar-small.png"/>
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

<!-- Nivel 2 de la piramide -->
<div class="level-container">
    <?=textLevel(2)?>
    <?php
    $count=1;
    if(count($pyramid["level2"])>0){
        foreach($pyramid["level2"] as $level1){
            if(count($level1)>0){
                $user1= new User($level1);
                $dataUser1= $dataUserController->getByUser($user1->getId());
                $statusColor=$user1->getStatus()==0?"inactive":"";
                ?>
                <div class="level-content level2 <?=$statusColor?>" id="level2-<?=$count?>">
                    <?php if($user1->getStatus()!=0){ ?>
                    <img src="/front/img/avatar-small.png" alt="" id="<?=$user1->getUser()?>" class="open-data-pop"/>
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
                        <?=$dataUserController->getPopDataUser($user1,$dataUser1,'Contactar');?>
                    <?php }else{ ?>
                        <a href="" id="<?=$user1->getUser()?>" class="open-data-pop">
                            <h3>Nuevo referido, confirma el pago haciendo click aquí</h3>
                        </a>
                        <?php if($dataUser1!=''){
                           echo $dataUserController->getPopDataUser($user1,$dataUser1,'Aceptar');
                        } ?>
                    <?php } ?>
                </div>
            <?php }else{
                ?>
                    <div class="level-content level2" id="level2-<?=$count?>">
                        <img src="/front/img/avatar-small.png" alt=""/>
                    </div>
            <?php
            }
            $count++;
        }
        --$count;
        if($count==1){
            ?>
            <div class="level-content level2" id="level2-2">
                <img src="/front/img/candado.png" alt=""/>
            </div>
        <?php
        }
    }else{
       $count=0;
        for($i=1;$i<=2;$i++){

            ?>
            <div class="level-content level2" id="level2-<?=$i?>">
                <img src="/front/img/candado.png" alt=""/>
            </div>
        <?php
        }
    }?>
</div>
<?php

?>
<!-- Nivel 3 de la piramide -->
<div class="level-container">
    <?=textLevel(3)?>
    <?php
    $count=1;
    if(count($pyramid["level3"])>0){
        foreach($pyramid["level3"] as $level1){

            if(count($level1)>0){
                $user1= new User($level1);
                $dataUser1= $dataUserController->getByUser($user1->getId());
                $statusColor=$user1->getStatus()==0?"inactive":"";
                ?>
                <div class="level-content level3 <?=$statusColor?>" id="level2-<?=$count?>">
                    <img src="/front/img/avatar-small.png" alt="" id="<?=$user1->getUser()?>" class="open-data-pop"/>
                    <span class="name-user  name-user-level3">
                    <?php if($dataUser1!=""){ ?>
                        <?=$dataUser1!=""?$dataUser1->getName()." ".$dataUser1->getLastName():$user1->getUser()?>
                    <?php } ?>
                    </span>
                    <?php if($dataUser1!=''){
                        echo $dataUserController->getPopDataUser($user1,$dataUser1,'Contactar');
                    } ?>
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
        --$count;

        if($count<4){
            for($i=1;$i<=4-$count;$i++){
            ?>
                <div class="level-content level3" id="level2-<?=$count+$i?>">
                    <img src="/front/img/candado.png" alt=""/>
                </div>
            <?php
            }
        }
    }else{
        $count=0;
        for($i=1;$i<=4;$i++){
            ?>
            <div class="level-content level3" id="level2-<?=$i?>">
                <img src="/front/img/candado.png" alt=""/>
            </div>
        <?php
        }
    }?>
</div>
<?php

?>
<div class="level-container">
    <?=textLevel(4)?>
    <?php
    $count=1;
    if(count($pyramid["level4"])>0){
        foreach($pyramid["level4"] as $level1){
            if(count($level1)>0){
                $user1= new User($level1);
                $dataUser1= $dataUserController->getByUser($user1->getId());
                $statusColor=$user1->getStatus()==0?"inactive":"";
            ?>
            <div class="level-content level4 <?=$statusColor?>" id="level2-<?=$count?>">
                <img src="/front/img/avatar-small.png" alt="" id="<?=$user1->getUser()?>" class="open-data-pop"/>
                <span class="name-user  name-user-level4">
                <?php if($dataUser1!=""){ ?>
                    <?=$dataUser1!=""?$dataUser1->getName()." ".$dataUser1->getLastName():$user1->getUser()?>
                <?php } ?>
                </span>
                <?=$dataUserController->getPopDataUser($user1,$dataUser1,'Contactar');?>
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
        --$count;

        if($count<8){
            for($i=1;$i<=8-$count;$i++){
                ?>
                <div class="level-content level4" id="level2-<?=$count+$i?>">
                    <img src="/front/img/candado.png" alt=""/>
                </div>
            <?php
            }
        }
    }else{
            $count=0;
            for($i=1;$i<=8;$i++){
                ?>
                <div class="level-content level4" id="level2-<?=$i?>">
                    <img src="/front/img/candado.png" alt=""/>
                </div>
            <?php
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
echo $dataUserController->getPopDataUser($user,$dataUser,'a','Aceptar');

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

?>
<script src="/front/js/jquery.js"></script>
<script>
    $(document).ready(function(){
        $('.open-data-pop').click(function(e){
            e.preventDefault();
            id = $(this).attr('id');
            console.log($(id+'-pop'));

            $('#'+id+'-pop').css('display','block');
        });
        $('.close-pop-data').click(function(){
            $('.popData').css('display','none');

        });
    });
</script>