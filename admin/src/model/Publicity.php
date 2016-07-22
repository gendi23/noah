<?php
/**
 * Created by PhpStorm.
 * User: waular
 * Date: 09/06/2016
 * Time: 08:49 AM
 */

class Publicity {

    private $id;
    private $name;
    private $url;
    private $level;

    function __construct($rs)
    {
       if(isset($rs["id"])){
           $this->setId($rs["id"]);
       }
        $this->setUrl($rs["url"]);
        $this->setName($rs["name"]);
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
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }




}

?> 