<?php
$depositView = new DepositView();
$controller= new Controller();
$html = new Html();
?>
<link rel="stylesheet" href="/front/css/popup.css"/>
<?php
echo $depositView->panel();
$array=$controller->getWhere(Tables::$Deposit,'level = 0 ORDER BY id desc');
foreach($array as $row){
    $deposit= new Deposit($row);
    $userD= new User($controller->get(Tables::$User,$deposit->getUser()));
    $body2=$depositView->bodyPop2($userD,$deposit);
    echo $html->Popup("deposit-".$deposit->getId(),"<center><h3>Pago de Usuario: ".$userD->getUser()."</h3></center>",$body2);

}

?>

<script src="/front/js/jquery.js"></script>
<script src="/front/js/popup.js"></script>
<script>
    function showPopUp(id){
        $('#open-'+id).click(function(){
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