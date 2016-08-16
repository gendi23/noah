<?php
/**
 * Created by PhpStorm.
 * User: WAular
 * Date: 02/04/2016
 * Time: 19:02
 */
$userId=$USERID;
if($publicityUserController->countPublicity($USERID,$level->getLevel())[0]<0){
    echo "<script>window.location='/admin/home';</script>";
}
$userMatriz=$userController->selectOne("select * from user_matriz where user=".$userId);
if($userMatriz["id"]==""){
    $array=array("user"=>$userId,"create_date"=>"now()");
    $userController->Insert($array,"user_matriz");
}else{

    $array=array("count"=>++$userMatriz["count"],"update_date"=>"current_timestamp()");

    $userController->Update($array,"user_matriz",$userMatriz["id"]);
}

$depositController= new DepositController();
$userView=new UserView();
$pyramid= $userController->getPyramid($userId);
function textLevel($level){
    $html='<div class="vertical level'.$level.'-color">
        <p>N</p>
        <p>I</p>
        <p>V</p>
        <p>E</p>
        <p>L</p>
        <p>&nbsp;</p>
        <p>'.($level).'</p>
    </div>';
    return $html;
}
$candado= '<img src="/front/img/candado.png" alt=""/>';
?>
<link rel="stylesheet" href="/front/css/matriz.css"/>
<link rel="stylesheet" href="/front/css/popup.css"/>
<link rel="stylesheet" href="/front/css/dataPop.css"/>
<div id="container-publicity">
    <div  style="color: #0016b0" class="noticias-noah">
        <h3><center>Noticias Noah</center></h3>
                <p></p>
    </div>
    <div  style="color: #0016b0"><h3><center>Patrocinador</center></h3>
        <?php for($i=4;$i>=2;$i--){
            $j=$i-1;
            if($depositController->isActiveByLevel($USERID,$j)){
                if($depositController->getByLevel($USERID,$j)->getStatus()==1){
                    if(!$depositController->isActiveByLevel($USERID,$i)){ ?>
                        <button class="button-patrocinador level<?=$i?>-color" id="open-patrocinator<?=$i?>"><strong>Pagar Patrocinador <?=$i?></strong></button>
                    <?php }else{
                        if($depositController->getByLevel($USERID,$i)->getStatus()==0){ ?>
                            <button class="button-patrocinador level<?=$i?>-color disabled-noah" id="open-patrocinator<?=$i?>" disabled><strong>Pagado</strong></button>
                        <?php }else{ ?>
                            <button class="button-patrocinador level<?=$i?>-color" id="open-patrocinator<?=$i?>" disabled><strong>Pagado &nbsp;&nbsp;&nbsp;</strong><?=Html::icon("ok")?></button>
                        <?php }}
                }else { ?>
                    <button class="button-patrocinador level<?=$i?>-color disabled-noah" id="open-patrocinator<?=$i?>" disabled><strong>Pagar Patrocinador <?=$i?></strong></button>
                <?php }

             }else { ?>
                <button class="button-patrocinador level<?=$i?>-color disabled-noah" id="open-patrocinator<?=$i?>" disabled><strong>Pagar Patrocinador <?=$i?></strong></button>
            <?php }
            $j=0;
        }?>



        <?php if(!$depositController->isActiveByLevel($USERID,1)){ ?>
            <button class="button-patrocinador level1-color" id="open-patrocinator1"><strong>Pagar Patrocinador 1</strong></button>
        <?php }else{
            if($depositController->getByLevel($USERID,1)->getStatus()==0){ ?>
                <button class="button-patrocinador level1-color disabled-noah" id="open-patrocinator1" disabled><strong>Pagado</strong></button>
            <?php }else{ ?>
            <button class="button-patrocinador level1-color" id="open-patrocinator1" disabled><strong>Pagado &nbsp;&nbsp;&nbsp;</strong><?=Html::icon("ok")?></button>
        <?php }} ?>
    </div>
    <div  style="color: #0016b0"><h3><center>Publicidad</center></h3></div>

</div>
<div class="level-container">
    <?=textLevel(1)?>
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
        <div class="level-content level2 inactive" id="level2-1">
            <?php
            if(isset($userController->getReferred($userId)[0])) {
                $piramideArray["a"]=$userController->getReferred($userId)[0];
                echo $userView->level2View($userController->getReferred($userId)[0]);
            }else{
                echo $candado;
            }
            ?>
        </div>
        <div class="level-content level2 " id="level2-2">
            <?php

            if(isset($userController->getReferred($USERID)[1])){
                $piramideArray["b"]=$userController->getReferred($userId)[1];
                echo $userView->level2View($userController->getReferred($userId)[1]);
            }else{
                echo $candado;
            }
            ?>
        </div>
    </div>
    <?php

    ?>
    <!-- Nivel 3 de la piramide -->
    <div class="level-container">
        <?=textLevel(3)?>
        <div class="level-content level3 " id="level2-1">
            <?php
            if(isset($piramideArray["a"])){
                if(isset($userController->getReferred($piramideArray["a"]["id"])[0])) {
                    $piramideArray["aa"]=$userController->getReferred($piramideArray["a"]["id"])[0];
                    echo $userView->level3View($userController->getReferred($piramideArray["a"]["id"])[0]);
                }else{

                    echo $candado;
                }
            }else{
                echo $candado;
            }
            ?>
        </div>
        <div class="level-content level3 " id="level2-2">
            <?php
            if(isset($piramideArray["a"])){
                if(isset($userController->getReferred($piramideArray["a"]["id"])[1])) {
                    $piramideArray["ab"]=$userController->getReferred($piramideArray["a"]["id"])[1];
                    echo $userView->level3View($userController->getReferred($piramideArray["a"]["id"])[1]);
                }else{
                    echo $candado;
                }
            }else{
                echo $candado;
            }
            ?>
        </div>
        <div class="level-content level3 " id="level2-3">
            <?php
            if(isset($piramideArray["b"])){
                if(isset($userController->getReferred($piramideArray["b"]["id"])[0])) {
                    $piramideArray["ba"]=$userController->getReferred($piramideArray["b"]["id"])[0];
                    echo $userView->level3View($userController->getReferred($piramideArray["b"]["id"])[0]);
                }else{
                    echo $candado;
                }
            }else{
                echo $candado;
            }
            ?>
        </div>
        <div class="level-content level3 " id="level2-4">
            <?php
            if(isset($piramideArray["b"])){
                if(isset($userController->getReferred($piramideArray["b"]["id"])[1])) {
                    $piramideArray["bb"]=$userController->getReferred($piramideArray["b"]["id"])[1];
                    echo $userView->level3View($userController->getReferred($piramideArray["b"]["id"])[1]);
                }else{
                    echo $candado;
                }
            }else{
                echo $candado;
            }
            ?>
        </div>
    </div>
    <!-- Nivel 4 de la matriz -->
    <div class="level-container">
        <?=textLevel(4)?>
        <div class="level-content level4 " id="level2-1">
            <?php
            if(isset($piramideArray["aa"])){
                if(isset($userController->getReferred($piramideArray["aa"]["id"])[0])) {
                    $piramideArray["aaa"]=$userController->getReferred($piramideArray["aa"]["id"])[0];
                    echo $userView->level4View($userController->getReferred($piramideArray["aa"]["id"])[0]);
                }else{
                    echo $candado;
                }
            }else{
                echo $candado;
            }
            ?>
        </div>
        <div class="level-content level4 " id="level2-2">
            <?php
            if(isset($piramideArray["aa"])){
                if(isset($userController->getReferred($piramideArray["aa"]["id"])[1])) {
                    $piramideArray["aab"]=$userController->getReferred($piramideArray["aa"]["id"])[1];
                    echo $userView->level4View($userController->getReferred($piramideArray["aa"]["id"])[1]);
                }else{
                    echo $candado;
                }
            }else{
                echo $candado;
            }
            ?>
        </div>
        <div class="level-content level4 " id="level2-3">
            <?php
            if(isset($piramideArray["ab"])){
                if(isset($userController->getReferred($piramideArray["ab"]["id"])[0])) {
                    $piramideArray["aba"]=$userController->getReferred($piramideArray["ab"]["id"])[0];
                    echo $userView->level4View($userController->getReferred($piramideArray["ab"]["id"])[0]);
                }else{
                    echo $candado;
                }
            }else{
                echo $candado;
            }
            ?>
        </div>
        <div class="level-content level4 " id="level2-4">
            <?php
            if(isset($piramideArray["ab"])){
                if(isset($userController->getReferred($piramideArray["ab"]["id"])[1])) {
                    $piramideArray["abb"]=$userController->getReferred($piramideArray["ab"]["id"])[1];
                    echo $userView->level4View($userController->getReferred($piramideArray["ab"]["id"])[1]);
                }else{
                    echo $candado;
                }
            }else{
                echo $candado;
            }
            ?>
        </div>
        <div class="level-content level4 " id="level2-5">
            <?php
            if(isset($piramideArray["ba"])){
                if(isset($userController->getReferred($piramideArray["ba"]["id"])[0])) {
                    $piramideArray["baa"]=$userController->getReferred($piramideArray["ba"]["id"])[0];
                    echo $userView->level4View($userController->getReferred($piramideArray["ba"]["id"])[0]);
                }else{
                    echo $candado;
                }
            }else{
                echo $candado;
            }
            ?>
        </div>
        <div class="level-content level4 " id="level2-6">
            <?php
            if(isset($piramideArray["ba"])){
                if(isset($userController->getReferred($piramideArray["ba"]["id"])[1])) {
                    $piramideArray["bab"]=$userController->getReferred($piramideArray["ba"]["id"])[1];
                    echo $userView->level4View($userController->getReferred($piramideArray["ba"]["id"])[1]);
                }else{
                    echo $candado;
                }
            }else{
                echo $candado;
            }
            ?>
        </div>
        <div class="level-content level4 " id="level2-7">
            <?php
            if(isset($piramideArray["bb"])){
                if(isset($userController->getReferred($piramideArray["bb"]["id"])[0])) {
                    $piramideArray["bba"]=$userController->getReferred($piramideArray["bb"]["id"])[0];
                    echo $userView->level4View($userController->getReferred($piramideArray["bb"]["id"])[0]);
                }else{
                    echo $candado;
                }
            }else{
                echo $candado;
            }
            ?>
        </div>
        <div class="level-content level4 " id="level2-8">
            <?php
            if(isset($piramideArray["bb"])){
                if(isset($userController->getReferred($piramideArray["bb"]["id"])[1])) {
                    $piramideArray["bbb"]=$userController->getReferred($piramideArray["bb"]["id"])[1];
                    echo $userView->level4View($userController->getReferred($piramideArray["bb"]["id"])[1]);
                }else{
                    echo $candado;
                }
            }else{
                echo $candado;
            }
            ?>
        </div>
    </div>

    <!-- Nivel 5 de la matriz -->
    <div class="level-container">
        <div class="vertical level5-color">
            <p>&nbsp;</p>
            <p>E</p>
            <p>X</p>
            <p>I</p>
            <p>T</p>
            <p>O</p>
        </div>
        <div class="level-content level5 " id="level5-1">
            <?php
            if(isset($piramideArray["aaa"])){
                if(isset($userController->getReferred($piramideArray["aaa"]["id"])[0])) {
                    echo $userView->level5View($userController->getReferred($piramideArray["aaa"]["id"])[0]);
                }else{
                    echo $candado;
                }
            }else{
                echo $candado;
            }
            ?>
        </div>
        <div class="level-content level5 " id="level5-2">
            <?php
            if(isset($piramideArray["aaa"])){
                if(isset($userController->getReferred($piramideArray["aaa"]["id"])[1])) {
                    echo $userView->level5View($userController->getReferred($piramideArray["aaa"]["id"])[1]);
                }else{
                    echo $candado;
                }
            }else{
                echo $candado;
            }
            ?>
        </div>
        <div class="level-content level5 " id="level5-3">
            <?php
            if(isset($piramideArray["aab"])){
                if(isset($userController->getReferred($piramideArray["aab"]["id"])[0])) {
                    echo $userView->level5View($userController->getReferred($piramideArray["aaa"]["id"])[0]);
                }else{
                    echo $candado;
                }
            }else{
                echo $candado;
            }
            ?>
        </div>
        <div class="level-content level5 " id="level5-4">
            <?php
            if(isset($piramideArray["aab"])){
                if(isset($userController->getReferred($piramideArray["aab"]["id"])[1])) {
                    echo $userView->level5View($userController->getReferred($piramideArray["aab"]["id"])[1]);
                }else{
                    echo $candado;
                }
            }else{
                echo $candado;
            }
            ?>
        </div>
        <div class="level-content level5 " id="level5-5">
            <?php
            if(isset($piramideArray["aba"])){
                if(isset($userController->getReferred($piramideArray["aba"]["id"])[0])) {
                    echo $userView->level5View($userController->getReferred($piramideArray["aba"]["id"])[0]);
                }else{
                    echo $candado;
                }
            }else{
                echo $candado;
            }
            ?>
        </div>
        <div class="level-content level5 " id="level5-6">
            <?php
            if(isset($piramideArray["aba"])){
                if(isset($userController->getReferred($piramideArray["aba"]["id"])[1])) {
                    echo $userView->level5View($userController->getReferred($piramideArray["aba"]["id"])[1]);
                }else{
                    echo $candado;
                }
            }else{
                echo $candado;
            }
            ?>
        </div>
        <div class="level-content level5 " id="level5-7">
            <?php
            if(isset($piramideArray["abb"])){
                if(isset($userController->getReferred($piramideArray["abb"]["id"])[0])) {
                    echo $userView->level5View($userController->getReferred($piramideArray["abb"]["id"])[0]);
                }else{
                    echo $candado;
                }
            }else{
                echo $candado;
            }
            ?>
        </div>
        <div class="level-content level5 " id="level5-8">
            <?php
            if(isset($piramideArray["abb"])){
                if(isset($userController->getReferred($piramideArray["abb"]["id"])[1])) {
                    echo $userView->level5View($userController->getReferred($piramideArray["abb"]["id"])[1]);
                }else{
                    echo $candado;
                }
            }else{
                echo $candado;
            }
            ?>
        </div>
        <div class="level-content level5 " id="level5-9">
            <?php
            if(isset($piramideArray["baa"])){
                if(isset($userController->getReferred($piramideArray["baa"]["id"])[0])) {
                    echo $userView->level5View($userController->getReferred($piramideArray["baa"]["id"])[0]);
                }else{
                    echo $candado;
                }
            }else{
                echo $candado;
            }
            ?>
        </div>
        <div class="level-content level5 " id="level5-10">
            <?php
            if(isset($piramideArray["baa"])){
                if(isset($userController->getReferred($piramideArray["baa"]["id"])[1])) {
                    echo $userView->level5View($userController->getReferred($piramideArray["baa"]["id"])[1]);
                }else{
                    echo $candado;
                }
            }else{
                echo $candado;
            }
            ?>
        </div>
        <div class="level-content level5 " id="level5-11">
            <?php
            if(isset($piramideArray["bab"])){
                if(isset($userController->getReferred($piramideArray["bab"]["id"])[0])) {
                    echo $userView->level5View($userController->getReferred($piramideArray["bab"]["id"])[0]);
                }else{
                    echo $candado;
                }
            }else{
                echo $candado;
            }
            ?>
        </div>
        <div class="level-content level5 " id="level5-12">
            <?php
            if(isset($piramideArray["bab"])){
                if(isset($userController->getReferred($piramideArray["bab"]["id"])[1])) {
                    echo $userView->level5View($userController->getReferred($piramideArray["bab"]["id"])[1]);
                }else{
                    echo $candado;
                }
            }else{
                echo $candado;
            }
            ?>
        </div>
        <div class="level-content level5 " id="level5-13">
            <?php
            if(isset($piramideArray["bba"])){
                if(isset($userController->getReferred($piramideArray["bba"]["id"])[0])) {
                    echo $userView->level5View($userController->getReferred($piramideArray["bba"]["id"])[0]);
                }else{
                    echo $candado;
                }
            }else{
                echo $candado;
            }
            ?>
        </div>
        <div class="level-content level5 " id="level5-14">
            <?php
            if(isset($piramideArray["bba"])){
                if(isset($userController->getReferred($piramideArray["bba"]["id"])[1])) {
                    echo $userView->level5View($userController->getReferred($piramideArray["bba"]["id"])[1]);
                }else{
                    echo $candado;
                }
            }else{
                echo $candado;
            }
            ?>
        </div>
        <div class="level-content level5 " id="level5-14">
            <?php
            if(isset($piramideArray["bbb"])){
                if(isset($userController->getReferred($piramideArray["bbb"]["id"])[0])) {
                    echo $userView->level5View($userController->getReferred($piramideArray["bbb"]["id"])[0]);
                }else{
                    echo $candado;
                }
            }else{
                echo $candado;
            }
            ?>
        </div>
        <div class="level-content level5 " id="level5-15">
            <?php
            if(isset($piramideArray["bbb"])){
                if(isset($userController->getReferred($piramideArray["bbb"]["id"])[1])) {
                    echo $userView->level5View($userController->getReferred($piramideArray["bbb"]["id"])[1]);
                }else{
                    echo $candado;
                }
            }else{
                echo $candado;
            }
            ?>
        </div>
    </div>
<?php
    function getTitlePopUp($patrocinatorId,$num){

        $dataUserController= new DataUserController();
        $depositController = new DepositController();

        $dataPatrocinator= $dataUserController->getByUser($patrocinatorId);
        $patrocinator1= new User($dataUserController->get(Tables::$User,$patrocinatorId));



        $titleP1='<center><h3><strong>Datos patrocinante '.$num.'</strong></h3></center>
        <h4 class="title-payment-matriz">Nombre: '.$dataPatrocinator->getName().' '.$dataPatrocinator->getLastName().'</h4>
        <h4 class="title-payment-matriz">Banco: '.$dataPatrocinator->getBankName().'</h4>
        <h4 class="title-payment-matriz">Tipo: '.$dataPatrocinator->getAccountType().'</h4>
        <h4 class="title-payment-matriz">Cuenta: '.$dataPatrocinator->getAccountNumber().'</h4>
        <h4 class="title-payment-matriz">Cedula: '.$dataPatrocinator->getCedula().'</h4>
        <h4 class="title-payment-matriz">Telefono: '.$patrocinator1->getPhone().'</h4>';

        if($depositController->getByLevel($patrocinator1->getId(),$num)==""){
            $titleP1.='<p class="extra-title">Este negociante no ha pagado a su patrocinador, contáctalo.</p>';
        }
        return $titleP1;
    }

$patrocinator1= $userController->getPatrocinator($userId);
$patrocinator2= $userController->getPatrocinator($patrocinator1->getId());
$patrocinator3= $userController->getPatrocinator($patrocinator2->getId());
$patrocinator4= $userController->getPatrocinator($patrocinator3->getId());
//print_r($patrocinator2);die();

   echo Html::Popup(
        'patrocinator1',
        getTitlePopUp($patrocinator1->getId(),1),
        DepositView::depositPaymentForm($userId,1,$patrocinator1->getEmail()," (800bs)",$patrocinator1->getId()));

    echo Html::Popup(
        'patrocinator2',
        getTitlePopUp($patrocinator2->getId(),2),
        DepositView::depositPaymentForm($userId,2,$patrocinator2->getEmail(), " (1500bs)",$patrocinator2->getId()));

    echo Html::Popup(
        'patrocinator3',
        getTitlePopUp($patrocinator3->getId(),3),
        DepositView::depositPaymentForm($userId,3,$patrocinator3->getEmail(), " (3000bs)",$patrocinator3->getId()));
    echo Html::Popup(
        'patrocinator4',
        getTitlePopUp($patrocinator4->getId(),4),
        DepositView::depositPaymentForm($userId,4,$patrocinator4->getEmail(), " (5000bs)",$patrocinator4->getId()));

?>
<script src="/front/js/jquery.js"></script>
<script>
    $(document).ready(function(){
        $(".parent-red").parents('.level-content').css({'border':'solid','border-color':'red'});

        $('.open-data-pop').click(function(e){
            e.preventDefault();
            id = $(this).attr('id');
            //console.log($(id+'-pop'));

            $('#'+id+'-pop').css('display','block');
        });
        $('.close-pop-data').click(function(){
            $('.popData').css('display','none');
        });

        $.ajax({
            cache: false,
            dataType: "json",
            type: 'GET',
            url: "/message/all",
            async:false,
            success: function (data) {
                var num = 0;
                setInterval(function() {
                    if(num==data.length)num=0;

                    $(".noticias-noah p").html("");
                    $('.noticias-noah p').append(data[num].message);
                    $(".noticias-noah p").css({
                        'color':data[num].color,
                        'font-size': data[num].size+"px",
                        'font-family': data[num].type
                    });
                    num += 1;
                }, 10000);

            }
        });

    });
</script>