<?php
/**
 * Step 1: Require the Slim Framework
 *
 * If you are not using Composer, you need to require the
 * Slim Framework and register its PSR-0 autoloader.
 *
 * If you are using Composer, you can skip this step.
 */
session_start();
require_once 'admin/require.php';



\Slim\Slim::registerAutoloader();

/**
 * Step 2: Instantiate a Slim application
 *
 * This example instantiates a Slim application using
 * its default settings. However, you will usually configure
 * your Slim application now by passing an associative array
 * of setting names and values into the application constructor.
 */
$app = new \Slim\Slim();

/**
 * Step 3: Define the Slim application routes
 *
 * Here we define several Slim application routes that respond
 * to appropriate HTTP request methods. In this example, the second
 * argument for `Slim::get`, `Slim::post`, `Slim::put`, `Slim::patch`, and `Slim::delete`
 * is an anonymous function.
 */


// Peticiones GET
$app->get(
    '/',
    function () {
        require_once 'page/index.php';
    }
);
$app->post(
    '/contactme',
    function () {
        $sendMail= new SendEmail();
        print_r($_POST);
        $body="Mensaje nuevo de ".$_POST["name"]."<br>Correo: ".$_POST["email"]."<br>Telefono: ".$_POST["phone"]."<br><br>"."Mensaje: ".$_POST["message"];
        $sendMail->sendOne("Correo de contacto",$body,"noahcorporativa@gmail.com");
        $sendMail->sendOne("Correo de contacto",$body,"wiljacaular@gmail.com");
    }
);

$app->get(
    '/check-session',
    function () {
        echo 'Ok';
    }
);

$app->get(
    '/test/send',
    function () {
        $controller= new Controller();
        $sendMail= new SendEmail();

        $users=array();
        $userModels=array();
        foreach($controller->select(
            "select * from user where status=0
              and ((hour(now())*60+minute(now()))-(hour(date)*60+minute(date))>=60
              OR DAY(NOW())-DAY(DATE)>0)")
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

$app->post('/admin/change/user',function(){

    $userController= new UserController();
    $user= new User($userController->get(Tables::$User,$_POST["userId"]));
    $dataUserController= new DataUserController();
    $dataUser= $dataUserController->getByUser($_POST["userId"]);

    if($_POST["pass"]!=""){
        if($_POST["pass"]==$_POST["pass-confir"]){
            $user->setPass($_POST["pass"]);
        }
    }


    $user->setEmail($_POST["email"]);
    $user->setPhone($_POST["phone"]);

    $userController->getUpdateJson($user);

    if($_FILES["photo"]["size"]!=0){

        $fileNameArray=explode(".",$_FILES["photo"]["name"]);
        $ext= $fileNameArray[1];

        $file= "photo-".$user->getId().".".$ext;
        $rute= "front/img/user/".$user->getId()."/";

        if(!(file_exists ($rute) )){
            mkdir ($rute);
        }

        if(move_uploaded_file ($_FILES['photo']['tmp_name'], $rute.$file)){

            $dataUser->setPhoto("/".$rute.$file);
            $dataUserController->getUpdateJson($dataUser);

        }
    }

    echo "<script>window.location='".$_SERVER['HTTP_REFERER']."';</script>";

});

$app->post('/admin/change/dataUser',function(){
    $dataUserController= new DataUserController();
    $dataUser = $dataUserController->getByUser($_POST["user"]);
    $arrayData= $_POST;
    $arrayData["id"]= $dataUser->getId();
    $arrayData["photo"]= $dataUser->getPhoto();

    $dataUserController->getUpdateJson(new DataUser($arrayData));

    echo "<script>window.location='".$_SERVER['HTTP_REFERER']."';</script>";
});

$app->get('/admin/logout',function () {
        if(isset($_SESSION['user'])){
            unset($_SESSION["user"]);
            unset($_SESSION["userId"]);
            unset($_SESSION["token"]);
            session_destroy();
            echo "<script>window.location='/';</script>";
        }
    }
);

$app->get("/test/email",function(){

    $sendMail= new SendEmail();
    $users=array('waular@eluniversal.com','wiljacaular@gmail.com');
    foreach($users as $user){
        $sendMail->sendOne("test","prueba de correo",$user);
    }

});

$app->get('/validate/:user',function ($user) {
        $userController= new UserController();
        echo $userController->validateUser($user);
    }
);

$app->get('/validate/patrocinator/:user',function ($user) {
        $userController= new UserController();
        $array= get_object_vars(json_decode($userController->validateUser($user)));

        $userModel= $userController->getByUser($user);

        $dataUserController= new DataUserController();

        $dataUser = $dataUserController->getByUser($userModel->getId());

        if($dataUser==""){
            $array['status']=0;
        }

        if($array['status']!=0){
            if(count($userController->getReferred($userModel->getId()))>=2 ){
                $array['status']=0;
            }
        }
        echo json_encode($array);
    }
);

$app->get(
    '/:model',
    function ($model) {
        $body="t".ucwords($model).".php";
        require_once 'view/layout.php';
    }
);


$app->get(
    '/admin/:model',
    function ($model) {
        $body='t'.ucwords($model).'.php';
        require_once 'admin/template/templateAdmin.php';
    }
);

$app->get(
    '/admin/:model/:id',
    function ($model,$id) {
        $body="t".ucwords($model).".php";
        include 'admin/template/template.php';
    }
);


$app->get(
    '/login/:user/:pass',
    function ($user,$pass) {
        $userController = new UserController();
        $response = $userController->login(array("user" => $user, "pass" => $pass));
        echo $response;
    }
);


/**
 * Realiza un delete de la base de datos pasandole el modelo al que se quiere insertar y valores por POST
 */
$app->get(
    '/admin/:model/delete/:id',
    function ($model,$id) {
        $controller= new Controller();

        $controller->Delete($model,$id);
        echo "<script>window.location='".$_SERVER['HTTP_REFERER']."';</script>";
    }
);


/**
 * Realiza un insert de la base de datos pasandole el modelo al que se quiere insertar y valores por POST
 */


$app->post(
    '/user/register',
    function () {
        $userController= new UserController();
        $levelController= new LevelController();

        $userArray= $_POST;
        $userArray["token"]= md5($userArray['user']);
        $user= new User($userArray);


        echo $userController->getInsertJson($user);

        $user->setId($userController->lastInsert(Tables::$User)["id"]);

        $levelArray= array("id"=>"","user"=>$user->getId(),"level"=>"1","status"=>"0");
        $levelController->getInsertJson(new Level($levelArray));

        ob_start();
        require_once "view/bodyEmail.php";
        $html = ob_get_clean();

        $sendEmail= new SendEmail();
        $sendEmail->sendOne("Activa tu cuenta",$html,$user->getEmail());
       // echo "<script>window.location='".$_SERVER['HTTP_REFERER']."';</script>";

    }
);
$app->post(
    '/admin/deposit/new',
    function () {
        $depositController= new DepositController();

        $fileNameArray=explode(".",$_FILES["photo"]["name"]);
        $ext= $fileNameArray[1];

        $file= $_POST["referencer_number"].".".$ext;
        $rute= "front/img/deposit/".$_POST["user"]."/";

        if(!(file_exists ($rute) )){
            mkdir ($rute);
        }

        if(move_uploaded_file ($_FILES['photo']['tmp_name'], $rute.$file)){
            $deposit= $_POST;
            $deposit["photo"]= "/".$rute.$file;

            $depositController->getInsertJson(new Deposit($deposit));

            $last= new Deposit($depositController->lastInsert(Tables::$Deposit));
            $userDeposit= new User($depositController->get(Tables::$User,$last->getUser()));
            $dataUserDeposit = new DataUser($depositController->selectOne("select * from ".Tables::$DataUser." where user=".$userDeposit->getId()));

            $message= "Estimado Usuario,\n".$dataUserDeposit->getFullName()." ha realizado un deposito en su cuenta.";


            $sendMail= new SendEmail();

            $sendMail->sendOne("Deposito Realizado",$message,$deposit["email"],$rute.$file);
        }

        echo "<script>window.location='".$_SERVER['HTTP_REFERER']."';</script>";

    }
);


$app->post(
    "/admin/remember",
    function(){

        $userController= new UserController();
        $user= $userController->getByUser($_POST["user"]);

        $passProvitional= Util::generateRandomString(8);
        $user->setPass($passProvitional);
        $json = $userController->getUpdateJson($user);

        $sendMail= new SendEmail();

        $sendMail->sendOne(
            "Reseteo de contraseña",
            "Se ha realizado el cambio de contraseña.<br>La contraseña provicional es : $passProvitional<br>Ingrese al enlace para realizar el cambio de contraseña.<br> <a href='".$_SERVER["HTTP_HOST"]."/?updatePass=1'>Resetear Contraseña.</a>",
            $user->getEmail()
        );

        echo $json;
});

$app->post(
    '/admin/updatePass',
    function(){

        $userController= new UserController();
        $user= $userController->getByUser($_POST["user"]);

        $user->setPass($_POST["passNew"]);
        $json = $userController->getUpdateJson($user);

        echo $json;

});
$app->post(
    '/admin/confirmPass',
    function(){

        $userController= new UserController();
        $user= $userController->getByUser($_POST["user"]);
        $response=array();
        if($_POST["pass"]==$user->getPass()){
           $response["status"]=1;
        }else{
            $response["status"]=1;
            $response["message"]="La contraseña no es correcta";
        }
        echo json_encode($response);
});

$app->post(
    '/admin/dataUser/insert',
    function(){
        $controller= new DataUserController();
        if($_FILES["photo"]["name"]!=""){
            //print_r($_FILES);die();
            $fileNameArray=explode(".",$_FILES["photo"]["name"]);
            $ext= $fileNameArray[1];

            $file= "photo-".$_POST["user"].".".$ext;
            $rute= "front/img/user/".$_POST["user"]."/";

            if(!(file_exists ($rute) )){
                mkdir ($rute,0755, true);
            }

            if(move_uploaded_file ($_FILES['photo']['tmp_name'], $rute.$file)){
                $data= $_POST;
                $data["photo"]= "/".$rute.$file;

                $controller->getInsertJson(new DataUser($data));
            }
        }else{
            $data= $_POST;
            $data["photo"]= "";
            $controller->getInsertJson(new DataUser($data));
        }

        echo "<script>window.location='/';</script>";
    }
);
$app->post(
    '/admin/:model/new',
    function ($model) {
        $class = new ReflectionClass(ucwords($model)."Controller");
        $controller= $class->newInstance();

        $modelIns = new ReflectionClass(ucwords($model));
        $instancia = $modelIns->newInstanceArgs(array('rs'=>$_POST));
        $method= new ReflectionMethod($model."Controller", "getInsertJson");
        $method->invokeArgs($controller,array($model=>$instancia));

        echo "<script>window.location='".$_SERVER['HTTP_REFERER']."';</script>";

    }
);

/**
 * Realiza un Update de la base de datos pasandole el modelo al que se quiere insertar y valores por POST
 */
$app->post(
    '/admin/:model/update',
    function ($model) {
        $class = new ReflectionClass(ucwords($model)."Controller");
        $controller= $class->newInstance();

        $modelIns = new ReflectionClass(ucwords($model));
        $instancia = $modelIns->newInstanceArgs(array('rs'=>$_POST));

        $method= new ReflectionMethod($model."Controller", "getUpdateJson");
        $method->invokeArgs($controller,array($model=>$instancia));
        echo "<script>window.location='".$_SERVER['HTTP_REFERER']."';</script>";
    }
);

/**
 * Peticiones POST
 */
$app->post(
    '/admin/login',
    function () {
        $user = $_POST["user"];
        $pass = $_POST["pass-login"];
        $userController = new UserController();
        $userModel = $userController->getUsersUP($user,$pass);

        $_SESSION['userId']=$userModel->getId();
        $_SESSION['user']=$user;
        $_SESSION['token']=$userModel->getToken();


         echo $userModel->getRole();

        if($userModel->getRole()=='admin'){

            echo "<script>window.location='/panel/matriz';</script>";
        }else{
            echo "<script>window.location='/admin/home';</script>";
        }
    }
);


require_once 'rules/PanelRules.php';
require_once 'rules/PublicityRule.php';
require_once 'rules/mdlf.php';

/***********************************************************************************************/


/**
 * Step 4: Run the Slim application
 *
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 */
$app->run();
