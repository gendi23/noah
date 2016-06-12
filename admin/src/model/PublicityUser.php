<?php
/**
 * Created by PhpStorm.
 * User: waular
 * Date: 09/06/2016
 * Time: 08:52 AM
 */

class PublicityUser {

    private $id;
    private $user;
    private $publicity;
    private $status;

    function __construct($rs)
    {
        if(isset($rs["id"])){
            $this->setId($rs["id"]);
        }
        $this->setUser($rs["user"]);
        $this->setPublicity($rs["publicity"]);
        $this->setStatus($rs["status"]);
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
    public function getPublicity()
    {
        return $this->publicity;
    }

    /**
     * @param mixed $publicity
     */
    public function setPublicity($publicity)
    {
        $this->publicity = $publicity;
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