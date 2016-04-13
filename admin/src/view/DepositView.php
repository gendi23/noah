<?php
/**
 * Created by PhpStorm.
 * User: waular
 * Date: 12/04/2016
 * Time: 03:05 PM
 */

class DepositView {

    public function FormRegister($userId,$value=null){
        $depositController= new DepositController();
        $form=new Form();

        $value = $value!=''&&$value!=null?$depositController->get(Tables::$User,$value):'';

        $id= $form->Hidden(array(
            "name"=>"id",
            "value"=>$value!=""?$value["id"]:$value
        ));
        $user= $form->Hidden(array(
            "name"=>"user",
            "value"=>$value!=""?$value["user"]:$userId
        ));
        $level= $form->Hidden(array(
            "name"=>"level",
            "value"=>$value!=""?$value["level"]:$userId
        ));
        $user=$form->input(array(
            "type"=>"text",
            "name"=>"user",
            "label"=>"Usuario",
            "required"=>"",
            "width1"=>"5",
            "width2"=>"7",
        ),$value!=""?$value["user"]:$value);
        $pass=$form->input(array(
            "type"=>"password",
            "name"=>"pass",
            "label"=>"Contraseña",
            "required"=>"",
            "width1"=>"5",
            "width2"=>"7",
        ),"");
        $confirm=$form->input(array(
            "type"=>"password",
            "name"=>"confirm",
            "label"=>"Confirma contraseña",
            "required"=>"",
            "width1"=>"5",
            "width2"=>"7",
        ),"");
        $email=$form->input(array(
            "type"=>"email",
            "name"=>"email",
            "label"=>"Correo GMAIL",
            "required"=>"",
            "width1"=>"5",
            "width2"=>"7",
        ),$value!=""?$value["email"]:$value);
        $phone=$form->input(array(
            "type"=>"text",
            "name"=>"phone",
            "label"=>"Telefono",
            "required"=>"",
            "width1"=>"5",
            "width2"=>"7",
        ),$value!=""?$value["phone"]:$value);
        $patrocinator=$form->input(array(
            "type"=>"text",
            "name"=>"patrocinator",
            "label"=>"Patrocinador",
            "required"=>"",
            "width1"=>"5",
            "width2"=>"7",
        ),$value!=""?$value["zone"]:$value);


        $body= $title.$id.$user.$pass.$confirm.$phone.$email.$patrocinator;
        return $form->showForm(array(
            "action"=>'/user/register',
            "method"=>"post",
            "submit"=>"Aceptar",
            "btnId"=>"btn-reg",
            "formId"=>"form-reg"
        ),$body);

    }
}

?> 