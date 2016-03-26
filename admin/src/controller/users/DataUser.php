<?php
/**
 * Created by PhpStorm.
 * User: gendi
 * Date: 23/3/2016
 * Time: 2:51 PM
 */
class DataUser extends Controller{

    public function getSet(DataUser $model){

        return array(
            "user"=>"'".$model->getUser()."'",
            "name"=>"'".$model->getName()."'",
            "last_name"=>"'".$model->getLastName()."'",
            "cedula"=>"'".$model->getCedula()."'",
            "country"=>"'".$model->getCountry()."'",
            "city"=>"'".$model->getCity()."'",
            "zone"=>"'".$model->getZone()."'",
            "photo"=>"'".$model->getPhoto()."'",
            "bank_name"=>"'".$model->getBankName()."'",
            "account_type"=>"'".$model->getAccountType()."'",
            "account_number"=>"'".$model->getAccountNumber()."'",
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