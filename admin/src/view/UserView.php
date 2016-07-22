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
        ));
        $status= $form->Hidden(array(
            "name"=>"status",
            "value"=>"0"
        ));
        $user=$form->input(array(
            "type"=>"text",
            "name"=>"user",
            "label"=>"Usuario",
            "required"=>"",
            "width1"=>"6",
            "width2"=>"6",
        ),$value!=""?$value["user"]:$value);
        $pass=$form->input(array(
            "type"=>"password",
            "name"=>"pass",
            "label"=>"Contraseña",
            "required"=>"",
            "width1"=>"6",
            "width2"=>"6",
        ),"");
        $confirm=$form->input(array(
            "type"=>"password",
            "name"=>"confirm",
            "label"=>"Confirma contraseña",
            "required"=>"",
            "width1"=>"6",
            "width2"=>"6",
        ),"");
        $email=$form->input(array(
            "type"=>"email",
            "name"=>"email",
            "label"=>"Correo GMAIL",
            "required"=>"",
            "width1"=>"6",
            "width2"=>"6",
        ),$value!=""?$value["email"]:$value);
        $phone=$form->input(array(
            "type"=>"text",
            "name"=>"phone",
            "label"=>"Telefono",
            "required"=>"",
            "width1"=>"6",
            "width2"=>"6",
        ),$value!=""?$value["phone"]:$value);
        $patrocinator=$form->input(array(
            "type"=>"text",
            "name"=>"patrocinator",
            "label"=>"Patrocinador",
            "required"=>"",
            "width1"=>"6",
            "width2"=>"6",
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

    public function FormRegisterData($userId,$value=null,$width1=null,$width2=null){
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
            "width1"=>$width1!=null?$width1:"5",
            "width2"=>$width2!=null?$width2:"7",
        ),$value!=""?$value["name"]:$value);
        $lastName=$form->input(array(
            "type"=>"text",
            "name"=>"last_name",
            "label"=>"Apellido",
            "required"=>"",
            "width1"=>$width1!=null?$width1:"5",
            "width2"=>$width2!=null?$width2:"7",
        ),$value!=""?$value["last_name"]:$value);
        $cedula=$form->input(array(
            "type"=>"text",
            "name"=>"cedula",
            "label"=>"Cedula",
            "required"=>"",
            "width1"=>$width1!=null?$width1:"5",
            "width2"=>$width2!=null?$width2:"7",
        ),$value!=""?$value["cedula"]:$value);
        $country=$form->input(array(
            "type"=>"text",
            "name"=>"country",
            "label"=>"Pais",
            "required"=>"",
            "width1"=>$width1!=null?$width1:"5",
            "width2"=>$width2!=null?$width2:"7",
        ),$value!=""?$value["country"]:"Venezuela");
        $city=$form->input(array(
            "type"=>"text",
            "name"=>"city",
            "label"=>"Ciudad",
            "required"=>"",
            "width1"=>$width1!=null?$width1:"5",
            "width2"=>$width2!=null?$width2:"7",
        ),$value!=""?$value["city"]:$value);
        $zone=$form->input(array(
            "type"=>"text",
            "name"=>"zone",
            "label"=>"Zona",
            "required"=>"",
            "width1"=>$width1!=null?$width1:"5",
            "width2"=>$width2!=null?$width2:"7",
        ),$value!=""?$value["zone"]:$value);
        $photo=$form->input(array(
            "type"=>"file",
            "name"=>"photo",
            "label"=>"Foto",
            "width1"=>$width1!=null?$width1:"5",
            "width2"=>$width2!=null?$width2:"7",
        ),"");
        $bankName=$form->input(array(
            "type"=>"text",
            "name"=>"bank_name",
            "label"=>"Nombre del Banco",
            "required"=>"",
            "width1"=>$width1!=null?$width1:"5",
            "width2"=>$width2!=null?$width2:"7",
        ),$value!=""?$value["bank_name"]:$value);
        $accountType=$form->Select(array(
            "name"=>"account_type",
            "label"=>"Tipo de Cuenta",
            "width1"=>$width1!=null?$width1:"5",
            "width2"=>$width2!=null?$width2:"7",
            ),
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
            "width1"=>$width1!=null?$width1:"5",
            "width2"=>$width2!=null?$width2:"7",
        ),$value!=""?$value["account_number"]:$value);

        $action=$value!=''?'update':'insert';
        $body= $id.$user.$name.$lastName.$cedula.$country.$city.$zone.$photo.$bankName.$accountType.$accountNumber;
        return $form->showForm(array(
            "action"=>'/admin/dataUser/'.$action,
            "method"=>"post",
            "submit"=>"Guardar",
            "multipart"=>"",
            "formId"=>"form-data"
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
            "submit"=>"Actualizar",
            "btnId"=>"btnRememberPass",
            "formId"=>"form-remember-pass"
        ),$body);
    }
    public function updatePassForm(){
        $form = new Form();

        $user=$form->input(array(
            "type"=>"text",
            "name"=>"user",
            "label"=>"Usuario",
            "required"=>"",
            "width1"=>"5",
            "width2"=>"7",
        ),"");
        $pass=$form->input(array(
            "type"=>"text",
            "name"=>"pass",
            "label"=>"Contraseña Provicional",
            "required"=>"",
            "width1"=>"5",
            "width2"=>"7",
        ),"");
        $passNew=$form->input(array(
            "type"=>"password",
            "name"=>"passNew",
            "label"=>"Contraseña Nueva",
            "required"=>"",
            "width1"=>"5",
            "width2"=>"7",
        ),"");
        $passConfirm=$form->input(array(
            "type"=>"password",
            "name"=>"passRe",
            "label"=>"Confirmar contraseña",
            "required"=>"",
            "width1"=>"5",
            "width2"=>"7",
        ),"");

        $body= $user.$pass.$passNew.$passConfirm;
        return $form->showForm(array(
            "action"=>'/admin/updatePass',
            "method"=>"post",
            "submit"=>"Actualizar",
            "btnId"=>"btnUpdatePass",
            "formId"=>"form-update-pass"
        ),$body);
    }

    public function textLevel($level){
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

    public function level2View($userArray){
        $dataUserController= new DataUserController();
        $depositController= new DepositController();
        $candado= '<img src="/front/img/candado.png" alt=""/>';

        $html="";
            $user1 = new User($userArray);
            $dataUser1 = $dataUserController->getByUser($user1->getId());
            $statusColor = $user1->getStatus() == 0 ? "inactive" : "";
            $selectDeposit = $dataUserController->selectOne("select * from deposit where user=".$user1->getId()." and level=1");
            $deposit = "";
            if ($selectDeposit[0] != "") $deposit = new Deposit($selectDeposit);
            if($deposit!=""&&$deposit->getStatus()==1){
                $html='<img src="/front/img/avatar-small.png" alt="" id="'.$user1->getUser().'" class="open-data-pop"/>
                <span class="name-user  name-user-level2">
                            '.$dataUser1->getFullName().'
                        </span>
                <div class="datos datos2">
                    <h4>Datos personales</h4>
                    <span>Correo: '.$user1->getEmail().'</span><br/>
                    <span>Telefono: '.$user1->getPhone().'</span>
                </div>
                '.$dataUserController->getPopDataUser($user1,$dataUser1,null,2);
            }else{
                if($depositController->getByLevel($user1->getId(),1)){
                    $html='<a href="" id="'.$user1->getUser().'" class="open-data-pop inactive parent-red">
                        <h3>Nuevo referido, confirma el pago haciendo click aquí</h3>
                    </a>'.
                    $dataUserController->getPopDataUser($user1,$dataUser1,'Aceptar',2);
                 }else{
                    $html= $candado;
                }
            }
        return $html;
    }
    public function level3View($userArray){
        $dataUserController= new DataUserController();
        $depositController= new DepositController();
        $candado= '<img src="/front/img/candado.png" alt=""/>';

        $html="";
        $user1 = new User($userArray);
        $dataUser1 = $dataUserController->getByUser($user1->getId());
        $statusColor = $user1->getStatus() == 0 ? "inactive" : "";
        $selectDeposit = $dataUserController->selectOne("select * from deposit where user=".$user1->getId()." and level=2");
        $deposit = "";
        if ($selectDeposit[0] != "") $deposit = new Deposit($selectDeposit);

        if($deposit!=""&&$deposit->getStatus()==1){
            $html='<img src="/front/img/avatar-small.png" alt="" id="'.$user1->getUser().'" class="open-data-pop"/>
                <span class="name-user  name-user-level3 ">
                    '.$dataUser1->getFullName().'
                </span>
                '.$dataUserController->getPopDataUser($user1,$dataUser1,null,3);
        }else{
            if($depositController->getByLevel($user1->getId(),2)){
                $html='<img src="/front/img/avatar-small.png" alt="" id="'.$user1->getUser().'" class="open-data-pop"/>
                        <span class="name-user  name-user-level3 parent-red">
                        '.$dataUser1->getFullName().'
                        </span>'.
                    $dataUserController->getPopDataUser($user1,$dataUser1,'Aceptar',3);
            }else{
                $html= $candado;
            }
        }
        return $html;
    }
    public function level4View($userArray){
        $dataUserController= new DataUserController();
        $depositController= new DepositController();
        $candado= '<img src="/front/img/candado.png" alt=""/>';

        $html="";
        $user1 = new User($userArray);
        $dataUser1 = $dataUserController->getByUser($user1->getId());
        $statusColor = $user1->getStatus() == 0 ? "inactive" : "";
        $selectDeposit = $dataUserController->selectOne("select * from deposit where user=".$user1->getId()." and level=3");
        $deposit = "";
        if ($selectDeposit[0] != "") $deposit = new Deposit($selectDeposit);

        if($deposit!=""&&$deposit->getStatus()==1){
            $html='<img src="/front/img/avatar-small.png" alt="" id="'.$user1->getUser().'" class="open-data-pop"/>
                '.$dataUserController->getPopDataUser($user1,$dataUser1,null,4);
        }else{
            if($depositController->getByLevel($user1->getId(),3)){
                $html='<img src="/front/img/avatar-small.png" alt="" id="'.$user1->getUser().'" class="open-data-pop parent-red"/>
                    '.$dataUserController->getPopDataUser($user1,$dataUser1,'Aceptar',4);
            }else{
                $html= $candado;
            }
        }
        return $html;
    }
    public function level5View($userArray){
        $dataUserController= new DataUserController();
        $depositController= new DepositController();
        $candado= '<img src="/front/img/candado.png" alt=""/>';

        $html="";
        $user1 = new User($userArray);
        $dataUser1 = $dataUserController->getByUser($user1->getId());
        $statusColor = $user1->getStatus() == 0 ? "inactive" : "";
        $selectDeposit = $dataUserController->selectOne("select * from deposit where user=".$user1->getId()." and level=4");
        $deposit = "";
        if ($selectDeposit[0] != "") $deposit = new Deposit($selectDeposit);

        if($deposit!=""&&$deposit->getStatus()==1){
            $html='<img src="/front/img/avatar-small.png" alt="" id="'.$user1->getUser().'" class="open-data-pop small"/>
                '.$dataUserController->getPopDataUser($user1,$dataUser1,null,5);
        }else{
            if($depositController->getByLevel($user1->getId(),4)){
                $html='<img src="/front/img/avatar-small.png" alt="" id="'.$user1->getUser().'" class="open-data-pop small  parent-red"/>
                    '.$dataUserController->getPopDataUser($user1,$dataUser1,'Aceptar',5);
            }else{
                $html= $candado;
            }
        }
        return $html;
    }
}