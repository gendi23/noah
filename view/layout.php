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
    <title>Corporación NOAH</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="/front/css/style.css"/>
    <link rel="stylesheet" href="/front/css/nav.css"/>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/front/css/popup.css"/>
    <link rel="stylesheet" href="/front/css/form.css"/>
</head>
<body>
    <div id="body">
        <header>
            <div class="logo">
                <img src="/front/img/noah.png" alt="Corporación NOAH."/>
            </div>
            <nav>
                <ul>
                    <li class="parent"><a href="#">Inicio</a></li>
                    <li class="parent"><a href="#">Anuncios</a></li>
                    <li class="parent"><a href="#">Servicios</a></li>
                    <li class="parent">
                        <a href="#">Matriz</a>
                        <ul >
                            <li><a href="#" id="open-reg">Registrarse</a></li>
                            <li><a href="#" id="open-session">Usuario</a></li>
                            <li><a href="#">Video Tutorial</a></li>
                            <li><a href="#">Guia Tutorial</a></li>
                        </ul>
                    </li>
                    <li class="parent"><a href="#">Sistema NOAH</a></li>
                    <li class="parent"><a href="#">Contacto</a></li>
                </ul>
            </nav>
            <div class="line" id="line-header"></div>
        </header>
        <div class="content">
            <?php
            if(isset($body)&&$body!=""){
                require_once $body;
            }else{
                require_once 'tIndex.php';
            }
            ?>
        </div>
        <footer>
            <div class="line" id="line-footer"></div>
        </footer>
    </div>
    <?=Html::Popup(
        'reg',
        '<h4><center> Lee y acepta los terminos de servicios &nbsp;<input type="checkbox" id="license"/></center></h4>',
        '<div id="control-error-reg"></div>'.$userView->FormRegister()
    )?>

    <?=Html::Popup(
        'session',
        '<h3 style="margin-left: 20%">Ingresa a tu cuenta</h3>',
        Html::getHtml('admin/template/sessionForm.php')
    )?>
    <?=Html::Popup(
        'remember',
        '<h3 style="margin-left: 20%">Recordar contraseña</h3>',
        $userView->rememberPass()
    )?>
    <?php
    if(isset($_GET["id"])){
        echo Html::Popup(
            'data',
            '<h3>Registrarse</h3>',
            $userView->FormRegisterData($_GET["id"])
        );
    }
    ?>
    <script src="/front/js/jquery.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/front/js/bootstrap.file-input.js"></script>
    <script src="/front/js/Util.js"></script>
    <script src="/front/js/popup.js"></script>
    <script src="/front/js/login.js"></script>
     <script>
        $(document).ready(function(){
            var active=<?=$active?>;

            if(active==1){
                console.log(active);
                $('#popup-data').fadeIn('slow');
                $('.popup-overlay').fadeIn('slow');
                $('.popup-overlay').height($(window).height());
            }
            $(function(){
                $('#btn-reg').attr("disabled", "disabled");
            });

            $('#license').click(function(){
                //var id=$(this).attr('id');
                if($(this).is(':checked')){
                    $('#btn-reg').removeAttr("disabled");
                }else{
                    $('#btn-reg').attr("disabled", "disabled");
                }
            });
        });
    </script>
</body>
</html>