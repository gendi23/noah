<?php
/**
 * Created by PhpStorm.
 * User: waular
 * Date: 09/06/2016
 * Time: 09:16 AM
 */
$publicityController = new PublicityController();
?>
<h3>Cargar Publicidad</h3>
<div class="col-md-8 col-md-offset-2">
    <?=$publicityController->form()?>
</div>


<div class="col-md-12">
    <h3>Ver Publicidades</h3>
    <hr/>
    <?=$publicityController->table()?>
</div>




 