<?php
/**
 * Created by PhpStorm.
 * User: Yutcelinis
 * Date: 22/03/2016
 * Time: 20:38
 */
$userView= new UserView();
if(isset($_GET["token"])){
    ?>
    <div class="alert alert-success">Felicitaciones, Gracias por registrarse en Matriz Noah, Por favor completa tu registro.</div>
    <?php
}
?>
<h2 align="center">Perfil de Usuario</h2></br>
<div class="col-md-2">

</div>
<div class="col-md-10">
    <?=$userView->FormRegisterData(1)?>
</div>