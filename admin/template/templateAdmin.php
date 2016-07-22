<?php
date_default_timezone_set('America/Caracas');
$USERID="";
if(isset($_SESSION)){
    if(isset($_SESSION["userId"]) && $_SESSION["userId"]!=""){
        $USERID= $_SESSION["userId"];

        $userController= new UserController();
        $dataUserController= new DataUserController();
        $levelController= new LevelController();
        $publicityUserController= new PublicityUserController();

        $user= new User($userController->get(Tables::$User,$USERID));
        $dataUser= $dataUserController->getByUser($USERID);
        $level= $levelController->getByUser($USERID)!=""?$levelController->getByUser($USERID):1;
        $photoPerfil="";
        $nameUser="nombre del usuario";
        if($dataUser!=""){
            $photoPerfil = $dataUser->getPhoto()!=""?$dataUser->getPhoto():$photoPerfil;
            $nameUser=$dataUser->getName()." ".$dataUser->getLastName();
        }

        if($dataUser==""){
            $bodyEmail= 'Estimad@ '.$user->getUser().',
            est&aacute; intentando ingresar a la administraci&oacute;n Matriz Noah sin completar los datos del registro.
            <br/><br/>Por favor complete sus datos a traves de este enlace.<br/><br/>
            <a href="'.$_SERVER["HTTP_HOST"].'/?active=1&token='.$user->getToken().'&id='.$user->getId().'">
            Activa tu cuenta aqu&iacute;.</a>';

            $sendEmail= new SendEmail();
            $sendEmail->sendOne("Activa tu cuenta",$bodyEmail,$user->getEmail());

            echo "<script>window.location='/admin/logout';</script>";
        }

        $html= new Html();
        ?>
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>NOAH Admin</title>
            <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
            <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css"/>
            <link rel="stylesheet" href="/front/css/style-admin.css"/>
            <link rel="stylesheet" href="/front/css/form.css"/>
        </head>
        <body>
        <div class="body-admin">
            <header>
                <div class="perfil">
                    <div class="perfil-image" id="photo-perfil" style="background-image: url('<?=$photoPerfil?>')">
                        <!--<a href="#" id="update-photo" class="label label-success">Cambiar foto.</a>-->
                    </div>
                    <span id="user-name"><center><?=strtoupper($nameUser)?></center></span>
                    <span id="user-level"><center><?=strtoupper("nivel ".$level->getLevel())?></center></span>
                </div>
                <?php $matrizHref=''; $matrizValue=''; if($publicityUserController->countPublicity($USERID,$level->getLevel())[0]>=20){
                    $matrizHref='/admin/matriz';$matrizValue=$html->icon("cog").' Matriz';
                } ?>
                <?=$html->nav(array(
                    array('href'=>'/admin/home','label'=>$html->icon("home").' Inicio'),
                    array('href'=>'/admin/user','label'=>$html->icon("user").' Perfil'),
                    array('href'=>$matrizHref,'label'=>$matrizValue),
                    array('href'=>'#','label'=>$html->icon("list-alt").' Contacto'),
                    array('href'=>'/admin/logout','label'=>$html->icon("off").' Salir'),
                ))?>

                <img src="/front/img/inferior.jpg" alt="FullScream NOAH"/>
            </header>
            <section class="body-template">
                <?php
                if (isset($body)&& $body!=''){
                    require_once $body;
                }
                ?>
            </section>
        </div>
        <script src="/front/js/jquery.js"></script>
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        <script src="/front/js/bootstrap.file-input.js"></script>
        <script src="/front/js/Util.js"></script>
        <script src="/front/js/popup.js"></script>
        <script>
        </script>
        </body>
        </html>
        <?php
    }else{
        echo "<script>window.location='/';</script>";
    }
}else{
    echo "<script>window.location='/';</script>";
}
?>