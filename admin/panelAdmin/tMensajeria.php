<?php
$html= new Html();
$controller= new Controller();
$messageView = new MessageView();
?>
<link rel="stylesheet" href="/front/css/form.css"/>
<link rel="stylesheet" href="/front/css/popup.css"/>
<style>
    .form-mensaje .setting div{
        margin-bottom: 15px;
    }
    .tab-content{
        padding-top: 10px;
    }
</style>

        <form action="/panel/message/insert" class="form-horizontal form-mensaje" role="form" method="post" id="loginForm" name="form">
            <?php for($i=1;$i<=1;$i++){?>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="message<?=$i?>">Mensaje <?=$i?>: </label>
                    <div class="col-sm-4">
                        <textarea name="message<?=$i?>" id="message<?=$i?>" rows="4" class="form-control"></textarea>
                    </div>
                    <div class="col-sm-6 setting">
                        <label class="control-label col-sm-2" for="color<?=$i?>">color: </label>
                        <div class="col-sm-3">
                            <input class="form-control" type="color" name="color<?=$i?>" id="color<?=$i?>" />
                        </div>
                        <label class="control-label col-sm-3" for="size<?=$i?>">Tamaño: </label>
                        <div class="col-sm-4">
                            <input class="form-control" type="number" name="size<?=$i?>" id = "size<?=$i?>" value="14" />
                        </div>

                        <label class="control-label col-sm-3" for="type<?=$i?>">Tipografía: </label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="type<?=$i?>" id="type<?=$i?>" />
                        </div>
                    </div>
                </div>
                <hr/>
            <?php }?>
            <div class="col-sm-offset-4 col-sm-8">
                <button type="submit" class="btn btn-primary" >Aceptar</button>
            </div>
        </form>

        <?php
        $head=array(
            "id",
            "Mensaje",
            "Color",
            "Tamaño",
            "Tipografía",
            "Editar",
            "Eliminar"
        );
        $body=array();
        foreach($controller->getAll("message") as $row){
            $message = new Message($row);
            $t=array(
                $message->getId(),
                $message->getMessage(),
                $message->getColor(),
                $message->getSize(),
                $message->getType(),
                $html->btnLink("xs","warning",$html->icon("pencil")." Editar","#","open-message-".$message->getId()),
                $html->btnDelete("/admin/message/delete/".$message->getId()),
            );

            $bodyPop = $messageView->bodyPop($message);
            echo $html->Popup("message-".$message->getId(),"<center><h3>Editar mensaje</h3></center>",$bodyPop);

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

    foreach($controller->getAll("message") as $row){
        echo 'showPopUp("message-'.$row["id"].'");';
    }
    ?>

</script>