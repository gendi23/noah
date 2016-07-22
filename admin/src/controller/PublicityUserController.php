<?php
/**
 * Created by PhpStorm.
 * User: waular
 * Date: 09/06/2016
 * Time: 09:12 AM
 */

class PublicityUserController extends Controller {

    public function getSet(PublicityUser $model){

        return array(
            "user"=>$model->getUser(),
            "publicity"=>$model->getPublicity(),
            "status"=>$model->getStatus(),
            "level"=>$model->getLevel(),
            "date"=>'now()',
        );
    }
    public function getInsertJson(PublicityUser $model){
        return $this->Insert($this->getSet($model),Tables::$PublicityUser);
    }

    public function getUpdateJson(PublicityUser $model){
        return $this->Update($this->getSet($model),Tables::$PublicityUser,$model->getId());
    }

    public function getSelectJson(PublicityUser $model){
        return json_encode($this->Select($this->getSet($model), Tables::$PublicityUser,$model->getId()));
    }

    public function countPublicity($userId, $level){
        $today = date("Y-m-d");
        $sql= "select count(*) from publicity_user where user=$userId and level=$level AND date='$today'";

        return $this->selectOne($sql);
    }
}

?> 