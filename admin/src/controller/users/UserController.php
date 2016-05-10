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
            "status"=>"0",
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
        $arrayUser= $this->getWhere(Tables::$User," patrocinator='".$user->getUser()."'");

        return $arrayUser;
    }

    public function getPyramid($userId){
        $pyramid=array();

        $level2=$this->getReferred($userId);
        $level3=$this->getLevel(3,$level2);
        $level4=$this->getLevel(4,$level3);
        $level5=$this->getLevel(5,$level4);

        $pyramid["level2"]=$level2;
        $pyramid["level3"]=$level3;
        $pyramid["level4"]=$level4;
        $pyramid["level5"]=$level5;

        return $pyramid;
    }

    public function getLevel($level,$arrayUsers=array()){
        $levelArray= array();
        $levelTemp=array();
        foreach($arrayUsers as $row1){
            if(count($row1)>0){
                $user1= new User($row1);
                foreach($this->getReferred($user1->getId()) as $row2){
                    array_push($levelTemp,$row2);
                }
            }else{
                array_push($levelTemp,array());
            }
        }

        return $levelTemp;
    }

    public function setStatus($token){
        $user= new User($this->selectOne("select * from user where token ='$token'"));
        $this->Update(array("status"=>"1"),Tables::$User,$user->getId());
    }

    public function validateUser ($user){
        $validate= $this->getWhere(Tables::$User, "user='$user'");
        $validatejson= array();
        if(count($validate)> 0){
            $validatejson ['status']= 1;
        }else{
            $validatejson ['status']= 0;
        }
        return json_encode($validatejson);
    }

    public function getByUser($user){
        return new User($this->selectOne("select * from user where user ='$user'"));
    }

    public function getPatrocinator($userId){

        $user = new User($this->get(Tables::$User,$userId));

        return new User($this->selectOne("select * from user where user ='".$user->getPatrocinator()."'"));
    }
}
?> 