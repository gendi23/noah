<?php
/**
 * Created by PhpStorm.
 * User: waular
 * Date: 16/06/2016
 * Time: 09:36 AM
 */

$app->get('/panel/piramide/:id',function($id){
    $userController= new UserController();
    $piramide=$userController->getPyramid($id);
    $referesId= array();


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
    echo $references;
});
$app->get(
    '/panel/:model',
    function ($model) {
        $body='t'.ucwords($model).'.php';
        require_once 'admin/panelAdmin/template.php';
    }
);

$app->get(
    '/panel/json/:user',
    function($userCode){
        $userController= new UserController();
        echo json_encode($userController->SelectOne("select * from ".Tables::$User." where user='$userCode'"));
    }
);


$app->post(
    '/panel/user/update',
    function(){
        $userController= new UserController();
        $user= new User($userController->get(Tables::$User,$_POST["userId"]));

        $user->setPass($_POST["passReset"]);
        $user->setEmail($_POST["emailReset"]);
        $user->setPhone($_POST["celReset"]);

        $userController->getUpdateJson($user);

        echo "<script>window.location='".$_SERVER['HTTP_REFERER']."';</script>";

    }
);
$app->get('/panel/set/:depositId/:status',function($depositId,$status){
    $depositController= new DepositController();
    $userController= new UserController();
    $deposit= new Deposit($depositController->get(Tables::$Deposit,$depositId));

    if($status==2){
        $user = new User($userController->get(Tables::$User,$deposit->getUser()));

        $depositController->Delete(Tables::$Deposit,$depositId);

        $sendMail= new SendEmail();

        $sendMail->sendOne(
            "Notificacion de pago negado",
            "<b>Matriz NOAH</b><br/><br/>Estimado Usuario, se ha rechazado su pago. debe ingresar a su cuenta y volver a realizar el mismo.<br/><br/>Para mayor información puede comunicarse a nuestras oficinas.",
            $user->getEmail()
        );
    }else{
        $deposit->setStatus($status);

        $depositController->getUpdateJson($deposit);
        if($deposit->getLevel()==1){

            $user = new User($userController->get(Tables::$User,$deposit->getUser()));

            $user->setStatus(1);

            $userController->getUpdateJson($user);
        }
    }


    echo "<script>window.location='".$_SERVER['HTTP_REFERER']."';</script>";
});


?>
