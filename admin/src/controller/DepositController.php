<?php
/**
 * Created by PhpStorm.
 * User: waular
 * Date: 12/04/2016
 * Time: 02:52 PM
 */

class DepositController extends Controller {

    public function getSet(Deposit $model){

        return array(
            "user"=>$model->getUser(),
            "to_user"=>$model->getToUser(),
            "level"=>$model->getLevel(),
            "status"=>$model->getStatus(),
            "amount"=>$model->getAmount(),
            "date_deposit"=>"'".$model->getDateDeposit()."'",
            "photo"=>"'".$model->getPhoto()."'",
            "referencer_number"=>"'".$model->getReferenceNumber()."'",
        );
    }
    public function getInsertJson(Deposit $model)
    {
        return $this->Insert($this->getSet($model),Tables::$Deposit);
    }

    public function getUpdateJson(Deposit $model)
    {
        return $this->Update($this->getSet($model),Tables::$Deposit,$model->getId());
    }
    public function getSelectJson(Deposit $model)
    {
        return json_encode($this->Select($this->getSet($model), Tables::$Deposit,$model->getId()));
    }

    public function getByLevel($userId,$level){
        if($this->selectOne("select * from ".Tables::$Deposit." where user=".$userId." and level=".$level)["id"]!=""){
            return new Deposit($this->selectOne("select * from ".Tables::$Deposit." where user=".$userId." and level=".$level));
        }
        else{
            return "";
        }

    }
}

?> 