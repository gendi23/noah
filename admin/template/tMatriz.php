<?php
/**
 * Created by PhpStorm.
 * User: WAular
 * Date: 02/04/2016
 * Time: 19:02
 */
$userId=$USERID;
 $userController= new UserController();
$user= new User($userController->get(Tables::$User,$userId));
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
<link rel="stylesheet" href="/middelend/css/popup.css"/>
<div id="container-publicity">
    <div  style="color: #0016b0"><h3><center>Noticias Noah</center></h3></div>
    <div  style="color: #0016b0"><h3><center>Patrocinador</center></h3>
        <button class="button-patrocinador level1-color" id="open-patrocinator1"><strong>Pagar Patrocinador 1</strong></button>
        <button class="button-patrocinador level2-color" id="open-patrocinator2"><strong>Pagar Patrocinador 2</strong></button>
        <button class="button-patrocinador level3-color" id="open-patrocinator3"><strong>Pagar Patrocinador 3</strong></button>
        <button class="button-patrocinador level4-color" id="open-patrocinator4"><strong>Pagar Patrocinador 4</strong></button>
        <button class="button-patrocinador level5-color" id="open-patrocinator5"><strong>Pagar Patrocinador 5</strong></button>
    </div>
    <div  style="color: #0016b0"><h3><center>Publicidad</center></h3></div>

</div>
<div class="level-container">
    <?=textLevel(1)?>
    <div class="level-content" id="level1">
        <img src="/front/img/avatar.png" alt=""/>
        <?=$user->getUser()?>
    </div>
</div>
<?php
if(count($pyramid["level3"])>0){
?>
<!-- Nivel 2 de la piramide -->
<div class="level-container">
    <?=textLevel(2)?>
    <?php
    $count=1;
    foreach($pyramid["level2"] as $level1){
        if(count($level1)>0){
            $user1= new User($level1);
            ?>
            <div class="level-content level2" id="level2-<?=$count?>">
                <p><?=$user1->getUser()?></p>
                <p><?=$user1->getEmail()?></p>
            </div>
        <?php }else{  ?>
                <div class="level-content level2" id="level2-<?=$count?>"></div>
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
            ?>
            <div class="level-content level3" id="level2-<?=$count?>">
                <p><?=$user1->getUser()?></p>
            </div>
        <?php
        }else{
            ?>
            <div class="level-content level3" id="level2-<?=$count?>">
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
        ?>
        <div class="level-content level4" id="level2-<?=$count?>">
            <p><?=$user1->getUser()?></p>
        </div>
        <?php }else{
            ?>
            <div class="level-content level4" id="level2-<?=$count?>">
            </div>
            <?php
        }
        $count++;
    }
}?>
</div>
    <!--
<?php
    if(count($pyramid["level5"])>0){
?>
<div class="level-container">
    <?= textLevel(5) ?>
    <div id="content-level5">
        <?php
        $count = 1;
        foreach ($pyramid["level5"] as $level1) {
            if(count($level1)>0){
                $user1 = new User($level1);
                ?>
                <div class="level-content level5">
                    <p><?= $user1->getUser() ?></p>
                </div>
                <?php
            }else{
                    ?>
                    <div class="level-content level5">
                    </div>
                    <?php
            }
            $count++;
        }
    }?>
    </div>

</div>
->
<?php
for($i=1;$i<=5;$i++){
   echo Html::Popup(
        'patrocinator'.$i,
        '',
        DepositView::depositPaymentForm($userId,$i));
}

?>