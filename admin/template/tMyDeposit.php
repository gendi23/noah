<?php
/**
 * Created by PhpStorm.
 * User: waular
 * Date: 01/06/2016
 * Time: 11:57 AM
 */

$depositView = new DepositView();
?>
<h2>Mis Depositos</h2>
<?=$depositView->showTable($user)?>
