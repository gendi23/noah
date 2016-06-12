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
}

?> 