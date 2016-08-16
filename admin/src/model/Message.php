<?php
/**
 * Created by PhpStorm.
 * User: WiljacAular
 */

class Message {

    private $id;
    private $message;
    private $color;
    private $type;
    private $size;

    function __construct($rs=null)
    {
        if($rs!=null){
            if(isset($rs["id"])){
                $this->setId($rs["id"]);
            }
            $this->setMessage($rs["message"]);
            $this->setColor($rs["color"]);
            $this->setType($rs["type"]);
            $this->setSize($rs["size"]);
        }
    }
    public function set(){

        return array(
            "message"=>"'".$this->getMessage()."'",
            "color"=>"'".$this->getColor()."'",
            "type"=>"'".$this->getType()."'",
            "size"=>$this->getSize(),
        );
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color)
    {
        $this->color = $color;
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
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


}

?> 