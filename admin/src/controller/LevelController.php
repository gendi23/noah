<?php
/**
 * Created by PhpStorm.
 * User: waular
 * Date: 05/05/2016
 * Time: 02:17 PM
 */

class LevelController extends Controller{

    public function getSet(Level $model){

        return array(
            "user"=>$model->getUser(),
            "level"=>$model->getLevel(),
            "status"=>$model->getStatus(),
        );
    }
    public function getInsertJson(Level $model)
    {
        return $this->Insert($this->getSet($model),Tables::$Level);
    }

    public function getUpdateJson(Level $model)
    {
        return $this->Update($this->getSet($model),Tables::$Level,$model->getId());
    }
    public function getSelectJson(Level $model)
    {
        return json_encode($this->Select($this->getSet($model), Tables::$Level,$model->getId()));
    }

    public function getByUser($userId){
        return new Level($this->selectOne("select * from ".Tables::$Level." where user=".$userId));
    }
}

?> 