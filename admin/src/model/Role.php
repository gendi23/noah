<?php
/**
 * Created by PhpStorm.
 * User: gendi
 * Date: 23/3/2016
 * Time: 10:14 AM
 */
class Role {

    private $id;
    private $role;
    private $parent;
    private $level;

    function __construct($rs){

        $this->setId($rs["id"]);
        $this->setRole($rs["role"]);
        $this->setParent($rs["parent"]);
        $this->setLevel($rs["level"]);
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
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param mixed $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

}