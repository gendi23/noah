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
        require_once 'view/layout.php';
    }
);

$app->get(
    '/admin/logout',
    function () {
        if(isset($_SESSION['user'])){
            unset($_SESSION["user"]);
            session_destroy();
            echo "<script>window.location='/login';</script>";
        }
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
        $class = new ReflectionClass(ucwords($model)."Controller");
        $controller= $class->newInstance();

        $method= new ReflectionMethod($model."Controller", "Delete");
        $methodTable= new ReflectionMethod($model."Controller", "getTable");
        $table= $methodTable->invoke($controller);

        $method->invokeArgs($controller,array($table,"id"=>$id));
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

        $userArray= $_POST;
        $userArray["token"]= md5($userArray['pass']);
        $user= new User($userArray);

        echo $userController->getInsertJson($user);

       // echo "<script>window.location='".$_SERVER['HTTP_REFERER']."';</script>";

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
        $pass = $_POST["pass"];
        $userController = new UserController();
        $userModel = $userController->getUsersUP($user,$pass);

        $_SESSION['userId']=$userModel->getId();
        $_SESSION['user']=$user;
        $_SESSION['token']=$userModel->getToken();

        echo "<script>window.location='/admin/user';</script>";

    }
);

/***********************************************************************************************/


/**
 * Step 4: Run the Slim application
 *
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 */
$app->run();
