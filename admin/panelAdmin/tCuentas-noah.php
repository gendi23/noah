<link rel="stylesheet" href="/front/css/form.css"/>
<link rel="stylesheet" href="/front/css/popup.css"/>
<style>
    .content-popup{
        width: 555px;
    }
    body section{
        width: 90% !important;
        left: 5% !important;;
    }
    #DataTables_Table_1 thead tr td:nth-child(2),#DataTables_Table_1 thead tr td:nth-child(6){
        width: 130px !important;
    }
    #DataTables_Table_1 thead tr td:nth-child(4),#DataTables_Table_1 thead tr td:nth-child(7),#DataTables_Table_1 thead tr td:nth-child(8){
        width: 110px !important;
    }
</style>
<?php
/**
 * Created by PhpStorm.
 * User: waular
 * Date: 17/08/2016
 * Time: 02:10 PM
 */
$html= new Html();
$controller= new Controller();
$userNoahView = new UserNoahView();

        $head=array(
            "User",
            "Contraseña",
            "Nombre",
            "Apellido",
            "Email",
            "Telefono",
            "Patrocinador",
            "Referidos",
            "Depositos",
            "Ver",
        );
        $body=array();
        foreach($controller->getAll("v_user_noah") as $row){

            $userNoah = new VUserNoah($row);
            $userLog= $controller->getWhereOne("user_log","user_id=".$userNoah->getId());

            $t=array(
                $userNoah->getUser(),
                $userNoah->getPass(),
                $userLog["name"],
                $userLog["last_name"],
                $userLog["email"],
                $userLog["user_phone"],
                $userNoah->getPatrocinator(),
                $userNoah->getReferes(),
                $userNoah->getDeposit(),
                $html->btnLink("xs","warning",$html->icon("open-eye")." Ver","#","open-usern-".$userNoah->getId()),

            );

            $bodyPop = $userNoahView->bodyPop($userNoah);
            echo $html->Popup("usern-".$userNoah->getId(),"<center><h3>Depositos de ".$userNoah->getName()." ".$userNoah->getLastName()."</h3></center>",$bodyPop);

            array_push($body,$t);
        }
        echo $html->showTable($head,$body);

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

    foreach($controller->getAll("v_user_noah") as $row){
        echo 'showPopUp("usern-'.$row["id"].'");';
    }
    ?>

</script>