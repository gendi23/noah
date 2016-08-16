<?php

/**
 * Created by PhpStorm.
 * User: GDiaz.
 * Edit: WAular
 * Date: 21/04/2016
 * Time: 15:06
 */
class DepositView
{

    public static function depositPaymentForm($userId,$levelNumber,$emailParam,$subTitle=null,$patrocinatorId=null){
        $form=new Form();
        $controller= new DepositController();
        $subTitle=$subTitle!=null?$subTitle:"";
        $title='<center><h3 class="title-pay">Notifica tu pago '.$subTitle.'</h3></center><br>';

        $id= $form->Hidden(array(
            "name"=>"id",
            "value"=>""
        ));
        $user= $form->Hidden(array(
            "name"=>"user",
            "value"=>$userId
        ));
        $email= $form->Hidden(array(
            "name"=>"email",
            "value"=>$emailParam
        ));
        $status= $form->Hidden(array(
            "name"=>"status",
            "value"=>0
        ));
        $level= $form->Hidden(array(
            "name"=>"level",
            "value"=>$levelNumber
        ));
        $dateDeposit=$form->input(array(
            "type"=>"date",
            "name"=>"date_deposit",
            "label"=>"Fecha de Deposito",
            "required"=>"",
            "width1"=>"6",
            "width2"=>"6",
        ),"");

        $amount=$form->input(array(
            "type"=>"number",
            "name"=>"amount",
            "label"=>"Monto depositado",
            "required"=>"",
            "width1"=>"6",
            "width2"=>"6",
        ),"");

        $referenceNumber=$form->input(array(
            "type"=>"text",
            "name"=>"referencer_number",
            "label"=>"Número de Referencia",
            "required"=>"",
            "width1"=>"6",
            "width2"=>"6",
        ),"");
        $photo=$form->input(array(
            "type"=>"file",
            "name"=>"photo",
            "label"=>"Foto del comprobante",
            "width1"=>"6",
            "width2"=>"6",
        ),"");

        $action='new';
        $body= $title.$id.$user.$status.$level.$dateDeposit.$amount.$referenceNumber.$photo.$email;

        $valuesForm= array(
            "action"=>'/admin/deposit/'.$action,
            "method"=>"post",
            "submit"=>"Enviar",
            "multipart"=>"",
        );
        if($levelNumber!=0){
            if($patrocinatorId!=null){
                if($controller->getByLevel($patrocinatorId,$levelNumber)=="")$valuesForm["disabled"]="disabled";
            }
        }

        return $form->showForm($valuesForm,$body);
    }

    public function getStatus($status){
        $statusString="";
        switch($status){
            case 0:
                $statusString="Recibido";
                break;
            case 1:
                $statusString="Aprobado";
                break;
            case 2:
                $statusString="Negado";
                break;
        }
        return $statusString;
    }

    public function panel(){

        $html= new Html();
        $controller= new Controller();
        $userController= new UserController();
        $head=array(
            "USUARIO",
            "PATROCINADOR",
            "FECHA",
            "STATUS",
            "VER"
        );
        $body=array();
        foreach($controller->getWhere(Tables::$Deposit,'level = 0 ORDER BY status DESC') as $row){
            $deposit= new Deposit($row);
            $userD= new User($controller->get(Tables::$User,$deposit->getUser()));

            $t=array(
               $userD->getUser(),
               $userD->getPatrocinator(),
               $deposit->getDateDeposit(),
               $this->getStatus($deposit->getStatus()),
                $html->btnLink("xs","warning",$html->icon("eye-open")." Ver","#","open-deposit-".$deposit->getId()),
            );
            array_push($body,$t);
        }
        return $html->showTable($head,$body);
    }

    public function bodyPop(User $user, Deposit $deposit){
        $controller= new DataUserController();
        $dataUser= $controller->getByUser($user->getId());

        $var= array(
            "user"=>$dataUser->getFullName(),
            "deposit-date"=>$deposit->getDateDeposit(),
            "amount"=>$deposit->getAmount(),
            "reference"=>$deposit->getReferenceNumber(),
            "depositId"=>$deposit->getId(),
            "photo"=>$deposit->getPhoto(),
        );

        return Html::getHtml("admin/panelAdmin/bodyPopDeposit.php",$var);
    }
    public function bodyPop2(User $user, Deposit $deposit){
        $controller= new DataUserController();
        $dataUser= $controller->getByUser($user->getId());

        $var= array(
            "user"=>$dataUser->getFullName(),
            "deposit-date"=>$deposit->getDateDeposit(),
            "amount"=>$deposit->getAmount(),
            "reference"=>$deposit->getReferenceNumber(),
            "depositId"=>$deposit->getId(),
            "photo"=>$deposit->getPhoto(),
        );

        return '<style>
    .buttonLink{
        height: 35px;
        font-size: 16pt;
        color: #3d7fed;
        border-color: #3d7fed;
    }
    .btn-ver{
        background-color: #f0f0f0 !important;
        border: #23ffca 2px solid !important;
        margin: -5px;
        margin-left: 8%;
        font-weight: bold;

    }
</style>
<form action="#" class="form-horizontal" role="form" method="post" id="loginForm" name="form">
    <div class="form-group">
        <label class="control-label col-sm-6" for="user-login">Nombre</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="user-login" name="user" value="'.$var["user"].'"disabled>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-6" for="deposit-date">Fecha del depósito</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="deposit-date" value="'.$var["deposit-date"].'" name="deposit-date" disabled>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-6" for="amount">Monto depositado</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="amount" value="'.$var["amount"].'" name="amount" disabled>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-6" for="reference">Número de referencia</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="reference" value="'.$var["reference"].'" name="reference" disabled>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-6" for="reference">Foto del comprobante</label>
        <div class="col-sm-6">
            <a href="'.$var["photo"].'" target="_blank" class="btn btn-default btn-ver">Ver Foto</a>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-4">
            <a href="/panel/set/'.$var["depositId"].'/1" class="btn btn-default buttonLink" id="accept">Aceptar</a>
        </div>
        <div class="col-sm-offset-1 col-sm-4">
            <a href="/panel/set/'.$var["depositId"].'/2" class="btn btn-default buttonLink" id="none">Negar</a>
        </div>
    </div>
</form>';
    }
}