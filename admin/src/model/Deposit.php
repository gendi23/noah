<?php
/**
 * Created by PhpStorm.
 * User: waular
 * Date: 12/04/2016
 * Time: 02:48 PM
 */

class Deposit {

    private $id;
    private $user;
    private $level;
    private $status;
    private $amount;
    private $date_deposit;
    private $photo;

    function __construct($rs)
    {
        $this->setId($rs["id"]);
        $this->setUser($rs["user"]);
        $this->setLevel($rs["level"]);
        $this->setStatus($rs["status"]);
        $this->setAmount($rs["amount"]);
        $this->setDateDeposit($rs["date_deposit"]);
        $this->setPhoto($rs["photo"]);
    }


    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getDateDeposit()
    {
        return $this->date_deposit;
    }

    /**
     * @param mixed $date_deposit
     */
    public function setDateDeposit($date_deposit)
    {
        $this->date_deposit = $date_deposit;
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
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param mixed $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
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