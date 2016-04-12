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
            "patrocinator"=>"'".$model->getPatrocinator()."'"
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


    public function getReferred($userId){
        $user= new User($this->get(Tables::$User,$userId));
        return $this->getWhere(Tables::$User," patrocinator='".$user->getUser()."'");
    }

    public function getPyramid($userId){
        $pyramid=array();

        $level1=$this->getReferred($userId);
        $level2=$this->getLevel(2,$level1);
       // $level3=$this->getLevel(3,$level2);

        $pyramid["level1"]=$level1;
        $pyramid["level2"]=$level2;
        //$pyramid["level3"]=$level3;

        return $pyramid;
    }

    public function getLevel($level,$arrayUsers=array()){
        $levelArray= array();
        $levelTemp=array();
        foreach($arrayUsers as $row1){
            $user1= new User($row1);
            foreach($this->getReferred($user1->getId()) as $row2){
                array_push($levelTemp,$row2);
            }
        }
        $levelArray["level".$level]=$levelTemp;
        return $levelArray;
    }

    public function setStatus($token){
        $user= new User($this->selectOne("select * from user where token ='$token'"));
        $this->Update(array("status"=>"1"),Tables::$User,$user->getId());
    }

}
?> 