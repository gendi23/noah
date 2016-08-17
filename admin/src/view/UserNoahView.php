<?php
/**
 * Created by PhpStorm.
 * User: waular
 * Date: 17/08/2016
 * Time: 03:15 PM
 */

class UserNoahView {

    public function bodyPop(VUserNoah $userNoah){
        $html= new Html();
        $controller= new Controller();


        $head=array(
            "Id",
            "Nivel",
            "Estatus",
            "Monto",
            "Fecha",
            "Foto"
        );
        $body=array();
        foreach($controller->getWhere(Tables::$Deposit,"user = ".$userNoah->getId()." and level !=0") as $row){
            $deposit= new Deposit($row);
            $t=array(
                $deposit->getId(),
                $deposit->getLevel(),
                $deposit->getStatus(),
                $deposit->getAmount(),
                $deposit->getDateDeposit(),
                '<a href="'.$deposit->getPhoto().'" target="_blank">Ver Foto</a>'
            );

            array_push($body,$t);
        }
        return $html->showTable($head,$body);
    }

}

?> 