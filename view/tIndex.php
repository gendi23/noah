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

<div class="row" style="margin: 0 !important;">
    <div class="col-md-6">
        <article class="quienes-somos"">
            <h2>QUIENES SOMOS</h2>
            <div class="line" style="width: 15%; margin-top: 30px; margin-bottom: 30px;"></div>
            <p class="text-justify">
                Representamos una empresa de publicidad y mercadeo que ha dado el mejor de los esfuerzos Humanos y Profesionales para publicitar marcas y empresas de servicio, logrando resultdos satisfactorios a favor de nuestros clientes, al aumentar sus ventas, además de darse a conocer en el mercado Nacional e Internacional.
            </p>
            <a href="#" class="link-more">MAS INFORMACIÓN</a>
        </article>
    </div>
    <div class="col-md-6 padding-none">
        <img src="/front/img/medium.jpg" alt=""  style="width: 100%;"/>
    </div>
</div>




