<?php
/**
 * Created by PhpStorm.
 * User: gendi
 * Date: 23/3/2016
 * Time: 2:28 PM
 */

class RoleController extends Controller{

    public function getSet(Role $model){

        return array(
            "role"=>"'".$model->getRole()."'",
            "parent"=>"'".$model->getParent()."'",
            "level"=>"'".$model->getLevel()."'",
        );
    }
    public function getInsertJson(Role $model)
    {
        return $this->Insert($this->getSet($model),Tables::$Role);
    }

    public function getUpdateJson(Role $model)
    {
        return $this->Update($this->getSet($model),Tables::$Role,$model->getId());
    }
    public function getSelectJson(Role $model)
    {
        return json_encode($this->Select($this->getSet($model), Tables::$Role,$model->getId()));
    }
}