<?php
/**
 * Created by PhpStorm.
 * User: waular
 * Date: 17/08/2016
 * Time: 02:12 PM
 */

class VUserNoah {
    private $id;
    private $user;
    private $pass;
    private $patrocinator;
    private $email;
    private $name;
    private $lastName;
    private $referes;
    private $deposit;

    function __construct($rs=null)
    {
       if($rs!=null){
           $this->setId($rs["id"]);
           $this->setUser($rs["user"]);
           $this->setPass($rs["pass"]);
           $this->setPatrocinator($rs["patrocinator"]);
           $this->setEmail($rs["email"]);
           $this->setName($rs["name"]);
           $this->setLastName($rs["last_name"]);
           $this->setReferes($rs["referes_count"]);
           $this->setDeposit($rs["deposit_count"]);
       }
    }


    /**
     * @return mixed
     */
    public function getDeposit()
    {
        return $this->deposit;
    }

    /**
     * @param mixed $deposit
     */
    public function setDeposit($deposit)
    {
        $this->deposit = $deposit;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    /**
     * @return mixed
     */
    public function getPatrocinator()
    {
        return $this->patrocinator;
    }

    /**
     * @param mixed $patrocinator
     */
    public function setPatrocinator($patrocinator)
    {
        $this->patrocinator = $patrocinator;
    }

    /**
     * @return mixed
     */
    public function getReferes()
    {
        return $this->referes;
    }

    /**
     * @param mixed $referes
     */
    public function setReferes($referes)
    {
        $this->referes = $referes;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }


}

?> 