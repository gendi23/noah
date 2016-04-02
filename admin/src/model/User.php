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
    private $code;

    function __construct($rs)
    {
        $this->setId($rs["id"]);
        $this->setUser($rs["user"]);
        $this->setPass($rs["pass"]);
        $this->setToken($rs["token"]);
        $this->setEmail($rs["email"]);
        $this->setPhone($rs["phone"]);
        $this->setPatrocinator($rs["patrocinator"]);
        $this->setCode($rs["code"]);
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
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


}

?> 