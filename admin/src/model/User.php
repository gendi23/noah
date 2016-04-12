<?php
/**
 * Created by PhpStorm.
 * User: Wiljac Aular
 * Date: 04/08/2015
 * Time: 01:08 PM
 */

class User {
    private $id;
    private $user;
    private $pass;
    private $token;
    private $email;
    private $phone;
    private $patrocinator;
    private $status;

    function __construct($rs)
    {
        $this->setId($rs["id"]);
        $this->setUser($rs["user"]);
        $this->setPass($rs["pass"]);
        $this->setToken($rs["token"]);
        $this->setEmail($rs["email"]);
        $this->setPhone($rs["phone"]);
        $this->setPatrocinator($rs["patrocinator"]);

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
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
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

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }



}

?> 