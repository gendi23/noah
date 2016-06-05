<?php
$token="";
if(isset($_GET["token"])){
    $token=$_GET["token"];
    $userController = new UserController();
    $userController->setStatus($token);

}
?>
<div >
    <img src="/front/img/full.jpg" alt="" style="width: 100%; margin: 0; padding: 0"/>
</div>
<div  style="margin: 0 !important;">
        <article class="quienes-somos" style="width: 50%; float: left;">
            <h2>QUIENES SOMOS</h2>
            <div class="line line-quienes"></div>
            <p class="text-justify">
                Representamos una empresa de publicidad y mercadeo que ha dado el mejor de los esfuerzos Humanos y Profesionales para publicitar marcas y empresas de servicio, logrando resultdos satisfactorios a favor de nuestros clientes, al aumentar sus ventas, además de darse a conocer en el mercado Nacional e Internacional.
            </p>
            <a href="#" class="link-more">MAS INFORMACIÓN</a>
        </article>
        <img src="/front/img/medium.jpg" alt=""  style="width: 50%;"/>
</div>
