<?php
$userView= new UserView();
$active=0;
if(isset($_GET["active"])){
    $active=1;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta content="text/html; charset="UTF-8" http-equiv="Content-Type" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Alianza Corporativa Noah</title>
    <link rel="icon" href="/page/logo_avatar.ico" type="image/x-icon" />
    <!-- Bootstrap Core CSS -->
    <!-- Latest compiled CSS -->
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/front/css/form.css"/>
    <link rel="stylesheet" href="/front/css/icon.css"/>
    <!-- Custom theme CSS -->
    <link href="/page/css/alianza.corporativa.noha.theme.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/page/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/front/css/popup.css"/>

    <!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
    <link rel="stylesheet" type="text/css" href="/page/js/engine1/style.css" />

    <!-- End WOWSlider.com HEAD section -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top">
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#alianza_corporativa_menu_ppal">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="logo" >
                <img src="/page/img/thumbnail_logo pagina WEB.jpg" />
            </a>
        </div>
        <div class="collapse navbar-collapse" id="alianza_corporativa_menu_ppal">
            <ul class="nav navbar-nav navbar-right" style="margin-top:30px">
                <li class="hidden active">
                    <a href="#page-top"></a>
                </li>
                <li class="">
                    <a class="page-scroll" href="#inicio">Inicio</a>
                </li>
                <li role="presentation" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> Anuncios
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">Plan Básico</a>
                        </li>
                        <li>
                            <a href="#">Plan Premium</a>
                        </li>
                        <li>
                            <a href="#">Modal PopUp</a>
                        </li>
                    </ul>
                </li>
                <li role="presentation" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> Matriz
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#" id="open-reg">Registrarse</a>
                        </li>
                        <li>
                            <a href="#" id="open-session">Login Usuario</a>
                        </li>
                        <li>
                            <a href="#">Video Tutorial</a>
                        </li>
                        <li>
                            <a href="/front/tutorial_matriz_Noah.pdf">Guía Tutorial</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a class="page-scroll" href="#contacto">Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<header id="inicio" class="text-center">
    <!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
    <div id="wowslider-container1">
        <div class="ws_images">
            <ul>
                <li><img src="/page/img/thumbnail_foto2pagina WEB.jpg" alt="" title="" id="wows1_0"/></li>
                <li><a href="http://wowslider.com"><img src="/page/img/thumbnail_foto3pagina WEB.jpg" alt="wowslider.com" title="" id="wows1_1"/></a></li>
                <li><img src="/page/img/thumbnail_foto1pagina WEB.jpg" alt="" title="" id="wows1_2"/></li>
            </ul>
        </div>
    </div>
    <!-- End WOWSlider.com BODY section -->
    <!--<div class="container">
        <div class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="item active" align="center">
                    <img width="100%" data-src="img/thumbnail_foto2pagina WEB.jpg" alt="Alianza Corporativa Imagen[900x500]" src="img/thumbnail_foto2pagina WEB.jpg" data-holder-rendered="true">
                </div>
                <div class="item" align="center">
                    <img width="100%" data-src="img/thumbnail_foto1pagina WEB.jpg" alt="Alianza Corporativa Imagen2[900x500]" src="img/thumbnail_foto1pagina WEB.jpg" data-holder-rendered="true">
                </div>
                <div class="item" align="center">
                    <img width="100%" data-src="img/thumbnail_foto3pagina WEB.jpg" alt="Alianza Corporativa Imagen3[900x500]" src="img/thumbnail_foto3pagina WEB.jpg" data-holder-rendered="true">
                </div>
            </div>
        </div>
    </div>-->
</header>

<section style="background-color:black">
    <div id="about" class="container">
        <div class="text-left">
            <br/>
            <h5 class="section-heading" style="color:#0183D9"> Quienes Somos</h5>
            <p style="color:white">
                Representamos una empresa de Publicidad y Mercadeo que ha dado el mejor de los esfuerzos Humanos y Profesionales
                para publicitar marcas y empresas de servicio. logrando resultados satisfactorios a favor de nuestros clientes,
                al aumentar sus ventas, ademas de darse a conocer en el mercado Nacional e Internacional.
            </p>
            <p style="color:white">
                Para nosotros son de suma Importancia las personas y que exista la mayor amplitud e iniciativa posible,
                para consolidar un equipo donde el apoyo la solidaridad y la satisfacción sean nuestro primordial objetivo.
            </p>
            <p style="color:white">
                Nuestra página web integra contenido de Interés para los
                colegas, en la cual podrán obtener Información práctica y relevante como: publicaciones nacionales
                e internacionales de campañas publicitarias, intercambio de información, novedades,
                mercado de trabajo, Información sobre el mercado de trabajo, entre otros.
            </p>
            <br/>
        </div>
    </div>
</section>
<div id="services" style="background-color:#1d1d1d; border-top: 2px solid #0183D9;">
    <br/>
    <div class="container" style="margin-top:-20px;border-top solid 2px #1d1d1d">
        <div style="background-color:black;height:50px">
            <h5 align="center" style="color:#0183D9"><br/>Servicios</h5>
        </div>
        <div class="row show-grid text-left"  align="center" style="margin-top:10px">
            <div id="dvcolumna001" class="col-md-4" style="border-left: solid 15px #1d1d1d;border-right: solid 10px #1d1d1d;background-color:black">
                <h5 class="service-heading" style="color:#23d906">Publicidad On Line</h5>
                <p class="text-muted text-left" style="color:white">
                    La Publicidad en Internet tiene como principal herramienta
                    nuestra página web, usando un sistema llamado Matriz que
                    permite a los anunciantes dar a conocer sus marcas y productos
                    con un método 100% garantizado. Al mismo tiempo que les genera recursos
                    económicos a los negociantes dentro de la Matriz. <span style="color:#23d906;font-weight:bold">De 200 a 5000 visitas en tu Web.</span>
                </p>

            </div>
            <div id="dvcolumna002" class="col-md-4 text-left" style="border-right: solid 10px #1d1d1d;background-color:black">
                <h5 class="service-heading" style="color:#0183D9">Conferencias y Cursos</h5>
                <p class="text-muted" style="color:white">
                    Formación profesional, Innovación y conpetitividad.
                </p>
                <p class="text-muted" style="color:white">
                    Formación profesional para el desarrollo social.
                </p>
                <p class="text-muted" style="color:white">
                    Desarrollo Humano y Desarrollo Financiero.
                </p>
                <p class="text-muted" style="color:white">
                    Programación neurolinguistica y mentalidad de negocios.
                </p>
            </div>
            <div id="dvcolumna003" class="col-md-4 " style="border-right: solid 16px #1d1d1d;background-color:black">
                <h5 class="service-heading" style="color:#D7D904">Matriz Binaria</h5>
                <p class="text-muted text-left" style="color:white">
                    Plataforma de publicidad online que te permite crear tu
                    propia fuente de ingresos desde la comodidad de tu hogar
                    a cualquier hora sin horario ni jefes.
                </p>
                <p class="text-muted text-left" style="color:white">
                    En resumen tú ingresas al sistema Invirtiendo Bs 800 más
                    el alquiler de la plataforma, afiliando 2 personas y sumando
                    los ingresos por cada nivel <span style="color:#D7D904;font-weight:bold">recibes en 2 meses aproximado
							111.600 Bs.</span>
                </p>
                <p><br/></p>
            </div>
        </div>
    </div>
    <br/><br/>
</div>
<section id="contacto" style="background-color:black">
    <div id="dvcontacto" class="container">
        <br/>
        <form name="sentMessage" id="contactForm" novalidate="">
            <div class="row">
                <div class="col-md-7" style="background-color:#353535;padding-right:5px;padding-left:5px">
                    <br/>
                    <div>
                        <input type="text" class="form-control" placeholder="Nombre" id="name" required="" data-validation-required-message="Please enter your name.">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div>
                        <input type="email" class="form-control" placeholder="Email" id="email" required="" data-validation-required-message="Please enter your email address.">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Asunto" id="phone" required="" data-validation-required-message="Please enter your phone number.">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div>
                        <textarea class="form-control" placeholder="Mensaje" id="message" required="" data-validation-required-message="Please enter a message." style="height:100px"></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary btn-xs">Enviar</button>
                    </div>
                    <br/>
                </div>

                <div class="col-md-5" style="background-color:#1d1d1d;color:white">
                    <div class="form-group">
                        <h5 class="section-heading" style="color:#0183D9">Contactanos:</h5>
                        <p>
                            Dirección
                        </p>
                        <p>
                            Avenida Francisco de Miranda, Centro Perú.<br/> Torre A. Piso 1, Oficina 19.<br/>
                            Chacao - Caracas.
                        </p>
                        <p>
                            Teléfono:<br/>
                            0212-637-96-86
                        </p>
                        <p class="help-block text-danger"></p>
                    </div>

                </div>
                <div class="clearfix"></div>
            </div>
        </form>
        <br/>
    </div>
</section>

<footer style="background-color:#1d1d1d">
    <div class="container">
        <div class="">
            <ul class="list-inline social-buttons">
                <li>
                    <a href="#">
                        <i class="fa fa-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-youtube"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="">
            <span class="copyright" style="color:#0183D9">Alianza corporativa noah © Derechos Reservados, Venezuela 2016.</span>
        </div>
    </div>
</footer>
<?=Html::Popup(
    'reg',
    '<h4 style="display:  inline-block;width: 85%;"> Lee y acepta los terminos de servicios del sistema noah</h4> <input type="checkbox" id="license" />',
    '<div class="col-md-11">'.$userView->FormRegister().'</div><div class="col-md-1"><div id="icon-user"><span class="glyphicon"></span></div><div id="icon-patrocinator"><span class="glyphicon"></span></div></div>'
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
<?=Html::Popup(
    'updatePass',
    '<h3 style="margin-left: 20%">Actualizar contraseña</h3>',
    $userView->updatePassForm()
)?>
<?=Html::Popup(
    'message',
    null,
    '<h3 id="message-login">Felicitaciones, debes ingresar a tu correo electrónico GMAIL para completar tus datos.</h3>'
)?>
<?php
if(isset($_GET["id"])){
    echo Html::Popup(
        'data',
        '<center><h3>Registrarse</h3></center>',
        $userView->FormRegisterData($_GET["id"])
    );
}
?>

<!-- jQuery Core Javascript-->
<!-- Latest compiled and minified JavaScript -->
<script src="/page/js/jquery-1.10.2.js"></script>

<!-- Bootstrap Core JavaScript -->
<!-- Latest compiled and minified JavaScript -->
<script src="/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="/page/js/jquery.easing.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="/page/js/jqBootstrapValidation.js"></script>
<script src="/page/js/contact_me.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/page/js/alianza.corporativa.noha.js"></script>
<script type="text/javascript" src="/page/js/engine1/wowslider.js"></script>
<script type="text/javascript" src="/page/js/engine1/script.js"></script>
<script src="/front/js/jurlp.min.js"></script>
<script src="/front/js/Util.js"></script>
<script src="/front/js/popup.js"></script>
<script src="/front/js/login.js"></script>
<!-- End WOWSlider.com BODY section -->
<script>
    $(function(){
        var h=$("#dvcolumna003").height();
        $("#dvcolumna001").height(h);
        $("#dvcolumna002").height(h);
    });
</script>
<script>
    $(document).ready(function(){

        var pathname = $.jurlp(window.location.href);

        if(pathname.query().updatePass!=undefined){
            $('#popup-updatePass').fadeIn('slow');
            $('.popup-overlay').fadeIn('slow');
            $('.popup-overlay').height($(window).height());
        }
        var active=<?=$active?>;

        if(active==1){
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