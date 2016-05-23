<?php
/**
 * Created by PhpStorm.
 * User: waular
 * Date: 18/05/2016
 * Time: 04:49 PM
 */
?>
<style>
   .body-user{
       background-color: #2a8b9c;
       width: 600px;
       height: 200px;
   }
    .body-user img{
        height: 90%;
        margin: 10px 5px 10px 30px;
        float: left;
    }
    .vertical{
        height: 90%;
        margin-top: 10px;
        width: 3px;
        background-color: #ffffff;
        float: left;
    }
   .body-user ul{
       margin-left: 10px;
   }
   .body-user ul li{
       list-style: none;
   }
</style>
<div class="body-user">
    <div class="col-md-6">
        <img src="/front/img/avatar-small.png" alt=""/>
        <div class="vertical"></div>
    </div>
    <div class="col-md-6">
        <h3>Datos del dep&oacute;sito</h3>
        <span>Juan Zalazar</span>
        <ul>
            <li><?=Html::icon("record")?> Telefono:</li>
            <li>Usuario:</li>
            <li>Patrocinador:</li>
            <li>Email:</li>
        </ul>
    </div>
</div>
