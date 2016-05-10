<?php
/**
 * Array donde se agregaran las Rutas de archivos
 */
$require= array(
    /**
     * connection mysql
     */
    'src/mysql/ConnectionMySQL.php',
    'src/mysql/Query.php',

    'Slim-frame/Slim/Slim.php',

    /**
     * Modelos
     */
    'src/model/User.php',
    'src/model/DataUser.php',
    'src/model/Level.php',
    'src/model/Deposit.php',

    /**
     * Controladores de vista
     */
    'src/view/UserView.php',
    'src/view/DepositView.php',


    /**
     * Controladores
     */
    'src/controller/Controller/Controller.php',
    'src/controller/users/UserController.php',
    'src/controller/users/DataUserController.php',
    'src/controller/DepositController.php',
    'src/controller/LevelController.php',
    /**
     * Objeto de HTML
     */
    'src/html/Form.php',
    'src/html/Html.php',
    'PHPMailer/PHPMailerAutoload.php',

    /**
     * Util
     */
    'src/util/config.php',
    'src/util/SendEmail.php',
    'src/util/Tables.php',
    'src/util/Util.php',
);

/**
 * Recorre el array de rutas y las incluye
 */
foreach($require as $r){
    require $r;
}


?>