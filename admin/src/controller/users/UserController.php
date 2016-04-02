<?php
/**
 * Created by PhpStorm.
 * User: waular
 * Date: 11/08/2015
 * Time: 08:45 AM
 */

class UserController extends Controller {

    public function getSet(User $model)
    {
        return array(
            "user"=>"'".$model->getUser()."'",
            "pass"=>"'".$model->getPass()."'",
            "token"=>"'".$model->getToken()."'",
            "email"=>"'".$model->getEmail()."'",
            "phone"=>"'".$model->getPhone()."'",
            "patrocinator"=>"'".$model->getPatrocinator()."'",
            "code"=>"'".$model->getCode()."'"
        );
    }

    public function getInsertJson(User $model)
    {
        return $this->Insert($this->getSet($model),Tables::$User);
    }

    public function getUpdateJson(User $model)
    {
        return $this->Update($this->getSet($model),Tables::$User,$model->getId());
    }

    public function getUsersUP($user,$pass){
        $rs = new User($this::selectOne("select * from ".Tables::$User." where user='".$user."' and pass='".$pass."'"));
        return $rs;
    }

    public function login($array){
        $user = $this::getUsersUP($array["user"],$array["pass"]);
        $swich=0;
        if($user->getId()!=null){
            $swich=1;
        }
        return json_encode(array("value"=>$swich,"userId"=>$user->getId()));
    }
}

?> 