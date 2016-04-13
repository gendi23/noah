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
            "level"=>$model->getLevel(),
            "status"=>$model->getStatus(),
            "amount"=>$model->getAmount(),
            "date_deposit"=>"'".$model->getDateDeposit()."'",
            "photo"=>"'".$model->getPhoto()."'",
        );
    }
    public function getInsertJson(DataUser $model)
    {
        return $this->Insert($this->getSet($model),Tables::$DataUser);
    }

    public function getUpdateJson(DataUser $model)
    {
        return $this->Update($this->getSet($model),Tables::$DataUser,$model->getId());
    }
    public function getSelectJson(DataUser $model)
    {
        return json_encode($this->Select($this->getSet($model), Tables::$DataUser,$model->getId()));
    }


}

?> 