<?php
/**
 * Created by PhpStorm.
 * User: waular
 * Date: 07/07/2016
 * Time: 09:23 AM
 */

$depositController= new DepositController();
$depositView= new DepositView();
$userController = new UserController();
$html= new Html();
$controller= new Controller();

$piramide=$userController->getPyramid($USERID);
$referesId= array();
?>
<link rel="stylesheet" href="/front/css/popup.css"/>
<?php

    foreach($piramide["level2"] as $row){
        array_push($referesId,$row["id"]);
    }
    foreach($piramide["level3"] as $row){
        array_push($referesId,$row["id"]);
    }
    foreach($piramide["level4"] as $row){
        array_push($referesId,$row["id"]);
    }
    $references='';
    for($i=0;$i<count($referesId);$i++){
        if($i==0){
            $references.=$referesId[$i];
        }else{
            $references.=','.$referesId[$i];
        }
    }

    $sql='select * from deposit where user in ('.$references.')';
    $array=$controller->select($sql);
    $head=array(
        "USUARIO",
        "FECHA",
        "LEVEL",
        "STATUS",
        "VER"
    );
    $body=array();
    foreach($controller->select($sql) as $row){
        $deposit= new Deposit($row);
        $userD= new User($controller->get(Tables::$User,$deposit->getUser()));
        $t=array(
            $userD->getUser(),
            $deposit->getDateDeposit(),
            $deposit->getLevel(),
            $depositView->getStatus($deposit->getStatus()),
            $html->btnLink("xs","warning",$html->icon("eye-open")." Ver","#","open-deposit-".$deposit->getId()),
        );
        array_push($body,$t);
    }
    echo $html->showTable($head,$body);

foreach($array as $row){
    $deposit= new Deposit($row);
    $userD= new User($controller->get(Tables::$User,$deposit->getUser()));
    $body2=$depositView->bodyPop2($userD,$deposit);
    echo $html->Popup("deposit-".$deposit->getId(),"<center><h3>Notificacion de pago: ".$userD->getUser()."</h3></center>",$body2);

}
?>

<script src="/front/js/jquery.js"></script>
<script src="/front/js/popup.js"></script>
<script>
    function showPopUp(id){
        $('#open-'+id).click(function(){
            console.log(id);
            $('#popup-'+id).fadeIn('slow');
            $('.popup-overlay').fadeIn('slow');
            $('.popup-overlay').height($(window).height());
            return false;
        });

        $('#close-'+id).click(function(){
            $('#popup-'+id).fadeOut('slow');
            $('.popup-overlay').fadeOut('slow');
            return false;
        });
    }
    <?php

    foreach($array as $row){
        echo 'showPopUp("deposit-'.$row["id"].'");';
    }
    ?>

</script>
 