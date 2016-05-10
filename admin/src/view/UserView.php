<?php
/**
 * Created by PhpStorm.
 * User: gendi
 * Date: 24/3/2016
 * Time: 7:18 AM
 */
class UserView{

    public function FormRegister($value=null){
        $userController= new UserController();
        $form=new Form();
        $value = $value!=''&&$value!=null?$userController->get(Tables::$User,$value):'';
        $title='<h3 style="left: 30%; position:relative;">Registrarse</h3><br>';
        $id= $form->Hidden(array(
            "name"=>"id",
            "value"=>$value!=""?$value["id"]:$value
        ));$status= $form->Hidden(array(
            "name"=>"status",
            "value"=>"0"
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


        $body= $title.$id.$user.$pass.$confirm.$phone.$email.$patrocinator.$status;
        return $form->showForm(array(
            "action"=>'/user/register',
            "method"=>"post",
            "submit"=>"Aceptar",
            "btnId"=>"btn-reg",
            "formId"=>"form-reg"
        ),$body);

    }

    public function FormRegisterData($userId,$value=null){
        $userController= new UserController();
        $form=new Form();
        $value = $value!=''&&$value!=null?$userController->get(Tables::$DataUser,$value):'';

        $id= $form->Hidden(array(
            "name"=>"id",
            "value"=>$value!=""?$value["id"]:$value
        ));
        $user= $form->Hidden(array(
            "name"=>"user",
            "value"=>$userId
        ));
        $name=$form->input(array(
            "type"=>"text",
            "name"=>"name",
            "label"=>"Nombre",
            "required"=>"",
            "width1"=>"5",
            "width2"=>"7",
        ),$value!=""?$value["name"]:$value);
        $lastName=$form->input(array(
            "type"=>"text",
            "name"=>"last_name",
            "label"=>"Apellido",
            "required"=>"",
            "width1"=>"5",
            "width2"=>"7",
        ),$value!=""?$value["last_name"]:$value);
        $cedula=$form->input(array(
            "type"=>"text",
            "name"=>"cedula",
            "label"=>"Cedula",
            "required"=>"",
            "width1"=>"5",
            "width2"=>"7",
        ),$value!=""?$value["cedula"]:$value);
        $country=$form->input(array(
            "type"=>"text",
            "name"=>"country",
            "label"=>"Pais",
            "required"=>"",
            "width1"=>"5",
            "width2"=>"7",
        ),$value!=""?$value["country"]:$value);
        $city=$form->input(array(
            "type"=>"text",
            "name"=>"city",
            "label"=>"Ciudad",
            "required"=>"",
            "width1"=>"5",
            "width2"=>"7",
        ),$value!=""?$value["city"]:$value);
        $zone=$form->input(array(
            "type"=>"text",
            "name"=>"zone",
            "label"=>"Zona",
            "required"=>"",
            "width1"=>"5",
            "width2"=>"7",
        ),$value!=""?$value["zone"]:$value);
        $photo=$form->input(array(
            "type"=>"file",
            "name"=>"photo",
            "label"=>"Foto",
            "width1"=>"5",
            "width2"=>"7",
        ),"");
        $bankName=$form->input(array(
            "type"=>"text",
            "name"=>"bank_name",
            "label"=>"Nombre del Banco",
            "required"=>"",
            "width1"=>"5",
            "width2"=>"7",
        ),$value!=""?$value["bank_name"]:$value);
        $accountType=$form->Select(array(
            "name"=>"account_type",
            "label"=>"Tipo de Cuenta",
                "width1"=>"5",
                "width2"=>"7",),
            array(
                array(
                    "Corriente",
                    "Corriente"
                ),
                array(
                    "Ahorro",
                    "Ahorro"
                )

            ),$value!=""?$value["account_type"]:$value);
        $accountNumber=$form->input(array(
            "type"=>"text",
            "name"=>"account_number",
            "label"=>"Numero de Cuenta",
            "required"=>"",
            "maxlength"=>"20",
            "width1"=>"5",
            "width2"=>"7",
        ),$value!=""?$value["account_number"]:$value);

        $action=$value!=''?'update':'new';
        $body= $id.$user.$name.$lastName.$cedula.$country.$city.$zone.$photo.$bankName.$accountType.$accountNumber;
        return $form->showForm(array(
            "action"=>'/admin/dataUser/insert',
            "method"=>"post",
            "submit"=>"Guardar",
            "multipart"=>""
        ),$body);

    }

    public function rememberPass(){
        $form = new Form();

        $user=$form->input(array(
            "type"=>"text",
            "name"=>"user",
            "label"=>"Usuario",
            "required"=>"",
            "width1"=>"4",
            "width2"=>"7",
        ),"");

        $body= $user;
        return $form->showForm(array(
            "action"=>'/admin/remember',
            "method"=>"post",
            "submit"=>"Actualizar"
        ),$body);
    }
}