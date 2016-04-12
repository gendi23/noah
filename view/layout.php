<?php
    $userView= new UserView();
    $active=0;
    if(isset($_GET["active"])){
        $active=1;
    }
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>NOAH Corporation</title>
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="/middelend/css/style.css"/>
        <link rel="stylesheet" href="/middelend/css/nav.css"/>
        <link rel="stylesheet" href="/middelend/css/popup.css"/>
        <link rel="stylesheet" href="/front/css/form.css"/>
    </head>
    <body>
        <header>
            <div class="col-md-4">
                <h1 style="color: #fff">NOAH</h1>
            </div>
            <div class="col-md-8">
                <nav class="nav-noah">
                    <ul>
                        <li class="parent"><a href="#">Inicio</a></li>
                        <li class="parent"><a href="#">Anuncios</a></li>
                        <li class="parent"><a href="#">Servicios</a></li>
                        <li class="parent">
                            <a href="#">Matriz</a>
                            <ul >
                                <li><a href="#" id="open-reg">Registrarse</a></li>
                                <li><a href="#" id="open-sesion">Usuario</a></li>
                                <li><a href="#">Video Tutorial</a></li>
                                <li><a href="#">Guia Tutorial</a></li>
                            </ul>
                        </li>
                        <li class="parent"><a href="#">Sistema NOAH</a></li>
                        <li class="parent"><a href="#">Contacto</a></li>
                    </ul>
                </nav>
            </div>
            <div class="line"></div>
        </header>
        <div class="row body">
            <?php
                if(isset($body)&&$body!=""){
                    require_once $body;
                }else{
                    require_once 'tIndex.php';
                }
            ?>
        </div>
        <?=Html::Popup(
            'popup-reg',
            'close-reg',
            '<h4>Lee y acepta los terminos de servicios &nbsp;<input type="checkbox" id="license"/></h4>',
            '<div id="control-error-reg"></div>'.$userView->FormRegister()
        )?>

        <?=Html::Popup(
            'popup-sesion',
            'close-session',
            '<h3>Ingresa a tu cuenta</h3>',
            Html::getHtml('admin/template/sessionForm.php')
        )?>
        <?php
        if(isset($_GET["id"])){
            echo Html::Popup(
                'popup-data',
                'close-data',
                '<h3>Registrarse</h3>',
                $userView->FormRegisterData($_GET["id"])
            );
        }
        ?>

        <footer>
            <div class="line"></div>
        </footer>
        <script src="/middelend/js/jquery.js"></script>
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        <script src="/middelend/js/bootstrap.file-input.js"></script>
        <script src="/middelend/js/Util.js"></script>
        <script src="/middelend/js/popup.js"></script>
        <script src="/middelend/js/login.js"></script>
        <script>
           $(document).ready(function(){
                var active=<?=$active?>;

                    if(active==1){
                        console.log(active);
                        $('#popup-data').fadeIn('slow');
                        $('.popup-overlay').fadeIn('slow');
                        $('.popup-overlay').height($(window).height());
                    }
           });
        </script>
    </body>
</html>