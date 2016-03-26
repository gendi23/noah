<?php
/**
 * Created by PhpStorm.
 * User: gendi
 * Date: 23/3/2016
 * Time: 2:45 PM
 */

class RoleUser extends Controller{

    public function getSet (RoleUser $model){

        return array(
            "role"=>"'".$model->getRole()."'",
            "user"=>"'".$model->getUser()."'",
        );
    }
    public function getInsertJson(RoleUser $model)
    {
        return $this->Insert($this->getSet($model),Tables::$RoleUser);
    }

    public function getUpdateJson(RoleUser $model)
    {
        return $this->Update($this->getSet($model),Tables::$RoleUser,$model->getId());
    }
    public function getSelectJson(RoleUser $model)
    {
        return json_encode($this->Select($this->getSet($model), Tables::$RoleUser,$model->getId()));
    }
}