<?php

/**
 * Created by PhpStorm.
 * User: GDiaz
 * Date: 21/04/2016
 * Time: 15:06
 */
class DepositView
{

    public static function depositPaymentForm($userId,$levelNumber,$emailParam,$subTitle=null){
        $form=new Form();
        $controller= new Controller();
        $subTitle=$subTitle!=null?$subTitle:"";
        $title='<center><h3 class="title-pay">Notifica tu pago '.$subTitle.'</h3></center><br>';
        $userObject = new User($controller->get(Tables::$User,$userId));
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

        return $form->showForm(array(
            "action"=>'/admin/deposit/'.$action,
            "method"=>"post",
            "submit"=>"Enviar",
            "multipart"=>""
        ),$body);
    }
}