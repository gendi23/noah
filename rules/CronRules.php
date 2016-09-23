 <?php
/**
 * Created by PhpStorm.
 * User: waular
 * Date: 18/08/2016
 * Time: 08:18 AM
 */


$app->get(
    '/test/send',
    function () {
        $controller= new Controller();
        $sendMail= new SendEmail();

        $users=array();
        $userModels=array();
        foreach($controller->select(
            "select * from user where status=0
              and HOUR( TIMEDIFF( NOW( ) , DATE ) ) >=1")
                as $row){
            $user= new User($row);
            $dataUserController= new DataUserController();
            $dataUser= $dataUserController->getByUser($user->getId());
            if($dataUser=="") {
                array_push($userModels, $user);
                array_push($users, $user->getEmail());
                $controller->Delete(Tables::$User, $user->getId());
            }
        }
        $body2="Estos son los usuarios eliminados\n";

        foreach($userModels as $userM){
            $body2.=$userM->getId()." ".$userM->getEmail()." ".$userM->getPhone()." ".$userM->getPatrocinator()."\n\n";
        }
        echo $body2;

        $body="Estimado Usuario,<br/><br/>Su cuenta ha sido eliminada por no activarla a tiempo.";
        $sendMail->sendAll("Perdida de cuenta NOAH",$body,$users);
    }
);

$app->get('/cron/no-pay',function(){
    $controller= new Controller();

    $query="select * from user u
          where (select count(d.id) from deposit d where d.user = u.id and d.level=1)=0
            and DATEDIFF( NOW( ) , u.DATE ) >=7
			AND u.date > '2016-08-26 00:00:00'
            AND id NOT IN ( 23, 24, 25, 26,48,85,86,98,108,109,112)";
    $action = "delete";
    $description="Se elimina por no pagar el patrocinador 1";

    $userModels = getUserLog($query,$action,$description);
    $i=0;
    foreach($userModels as $userLog){
        $userId=$userLog["user_id"];
        $deposit =new Deposit( $controller->getWhereOne(Tables::$Deposit,"user = ".$userId." and level=0"));
        if($deposit->getId()!=""){

            $userLog["deposit_id"]=$deposit->getId();
            $userLog["deposit_level"]=$deposit->getLevel();
            $userLog["deposit_status"]=$deposit->getStatus();
            $userLog["deposit_amount"]=$deposit->getAmount();
            $userLog["deposit_date"]="'".$deposit->getDateDeposit()."'";
            $userLog["deposit_photo"]="'".$deposit->getPhoto()."'";
            $userLog["deposit_referencer"]="'".$deposit->getReferenceNumber()."'";

        }

        $controller->Insert($userLog,"user_log");
        sendEmailPatrocinator($userLog);
        deleteUser($userId);
        $i++;
    }
    echo "se han eliminado ".$i." usuarios.";

});

$app->get('/cron/no-referes',function(){
    $controller= new Controller();
    $query="SELECT u.* FROM user u
              INNER join deposit d on d.user=u.id and d.level=1
            WHERE (SELECT COUNT( u2.id ) FROM user u2 WHERE u2.patrocinator = u.user ) <2
				  AND d.date_deposit >'2016-08-25 00:00:00'
				  AND u.date > '2016-08-25 00:00:00'
                  AND DATEDIFF( NOW( ) , d.date_deposit ) >=10
                  AND u.set_user!=1
                  AND u.id NOT IN
          ( 23, 24, 25, 26,51,50,49,59,63,65,66,67,68,75,76,83,87,97,82,107,110)";
    $action = "update";
    $description="Se cambian los datos del usuario por los de la plataforma.";

    $userModels = getUserLog($query,$action,$description);
    $userLogs=array();
    $i=0;
    foreach($userModels as $userLog){
        $userId=$userLog["user_id"];
        $deposits = $controller->getWhere(Tables::$Deposit,"user = ".$userId);
        foreach($deposits as $d){
            $deposit = new Deposit($d);
            if($deposit->getId()!=""){

                $userLog["deposit_id"]=$deposit->getId();
                $userLog["deposit_level"]=$deposit->getLevel();
                $userLog["deposit_status"]=$deposit->getStatus();
                $userLog["deposit_amount"]=$deposit->getAmount();
                $userLog["deposit_date"]="'".$deposit->getDateDeposit()."'";
                $userLog["deposit_photo"]="'".$deposit->getPhoto()."'";
                $userLog["deposit_referencer"]="'".$deposit->getReferenceNumber()."'";

            }
        }
        $controller->Insert($userLog,"user_log");

        $newPass= updateUser($userLog);
        $userLog["provisional"]=$newPass;
        array_push($userLogs,$userLog);
    }
    if(count($userLogs)!=0){
        sendEmailMatriz($userLogs);
    }
    echo "se han bloqueado ".$i." usuarios.";
});

/***** Funciones ****/

function deleteUser($userId){
    $controller= new Controller();

    $deposits= $controller->getWhere(Tables::$Deposit, "user =".$userId);
    if(!empty($deposits)){
        foreach ($deposits as $deposit) {
          $controller->Delete(Tables::$Deposit,$deposit["id"]);
        }

    }
    $level= $controller->getWhereOne(Tables::$Level,"user=".$userId);
    if(!empty($level)){
        $controller->Delete(Tables::$Level,$level["id"]);
    }
    $dataUsers=$controller->getWhere(Tables::$DataUser,"user=".$userId);
    if(!empty($dataUsers)){
        foreach($dataUsers as $dataUser){
            if(!empty($dataUser)){
                $controller->Delete(Tables::$DataUser,$dataUser["id"]);
            }
        }
    }

    $controller->Delete(Tables::$User,$userId);

}

function updateUser($userLog){
    $controller= new Controller();
    $dataUserController= new DataUserController();
    $dataUser= new DataUser($controller->getWhereOne(Tables::$DataUser,"user=".$userLog["user_id"]));
    $user= new User($controller->get(Tables::$User,$userLog["user_id"]));

    $controller->Update(array("set_user"=>1,"noah"=>1),Tables::$User,$userLog["user_id"]);

    $setDataUser= $dataUser;

        $setDataUser->setName("Alianza Corporativa noah C.A.");
        $setDataUser->setLastName(" ");
        $setDataUser->setCedula("J-404944222");
        $setDataUser->setCity("Caracas");
        $setDataUser->setPhoto("");
        $setDataUser->setBankName("Bicentenario");
        $setDataUser->setAccountNumber("01750618840073356732");
        $setDataUser->setAccountType("Corriente");

    $dataUserController->getUpdateJson($setDataUser);
    $newPass= Util::generateRandomString(8);
    $setUser= $user;

        $setUser->setPass($newPass);
        $setUser->setEmail("noahcorporativa@gmail.com");
        $setUser->setStatus(1);
        $setUser->setPhone("(0212) 637-9686");
    $userController= new UserController();
    $userController->getUpdateJson($setUser);

    return $newPass;
}

function sendEmailPatrocinator($userLog){

    $sendMail = new SendEmail();
    $userController = new UserController();

    $patrocinator = $userController->getPatrocinator($userLog["user_id"]);

    $body=" Estimado usuario,\n\nSe ha eliminado la cuenta de su referido ".strtoupper(str_replace("'","",$userLog["name"])." ".str_replace("'","",$userLog["last_name"]))." por incumplir los lapsos de tiempo para realizar el pago de patrocinador 1.\n\nA partir de este momento tienes 5 días adicionales para referir a otra persona.";
    $subject= "Matriz NOAH - Eliminacion de referido.";

    $sendMail->sendOne($subject,$body,$patrocinator->getEmail());
}

function sendEmailMatriz($userLogs){

    $sendMail = new SendEmail();
    $controller= new Controller();
    $subject= "Usuarios transpasados.";
    $body="Estos son los usuarios bloqueados.<br><br>";

    foreach($userLogs as $userLog){
        $count_user = $controller->count("user","patrocinator=".$userLog["user"]);
        $count_deposit = $controller->count("deposit","user=".$userLog["user_id"]);
        $referes_diff= 2-$count_user;
        $body.="Usuario: ".str_replace("'","",$userLog["user"])."<br>";
        $body.="Nombre: ".str_replace("'","",$userLog["name"]." ".$userLog["last_name"])."<br>";
        $body.="Contrase&ntilde;a Provisional: ".$userLog["provisional"]."<br>";
        $body.="Correo: ".str_replace("'","",$userLog["email"])."<br>";
        $body.="Patrocinador: ".str_replace("'","",$userLog["patrocinator"])."<br>";
        $body.="Cantidad de Referidos: ".$count_user."<br>";
        $body.="Referidos restantes: ".$referes_diff."<br>";
        $body.="Cantidad de depositos: ".$count_deposit."<br>";
        $body.="<br>";

    }
    $body.="<br>Desde este momento, estas cuentas serán asumidas por la compañia.";
    echo $body;
    $sendMail->sendOne($subject,$body,"noahcorporativa@gmail.com");
}

function getUserLog($query, $action, $description){
    $controller= new Controller();

    $userModels=array();
    foreach($controller->select($query) as $row){
        $user= new User($row);
        $dataUserController= new DataUserController();

        $userLog= array(
            "user_id"=>$user->getId(),
            "user"=>"'".$user->getUser()."'",
            "user_password"=>"'".$user->getPass()."'",
            "user_phone"=>"'".$user->getPhone()."'",
            "email"=>"'".$user->getEmail()."'",
            "patrocinator"=>"'".$user->getPatrocinator()."'",
            "action"=>"'".$action."'",
            "description"=>"'".$description."'"
        );
        $dataUser= $dataUserController->getByUser($user->getId());
        if($dataUser!=""){
            $userLog["name"]="'".$dataUser->getName()."'";
            $userLog["last_name"]="'".$dataUser->getLastName()."'";
            $userLog["cedula"]="'".$dataUser->getCedula()."'";
            $userLog["number_acount"]="'".$dataUser->getAccountNumber()."'";
            $userLog["type_acount"]="'".$dataUser->getAccountType()."'";
            $userLog["bank_name"]="'".$dataUser->getBankName()."'";
            $userLog["cedula"]="'".$dataUser->getCedula()."'";
        }

        array_push($userModels, $userLog);
    }
    return $userModels;

}

?>
 