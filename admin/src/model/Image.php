<?php
/**
 * Created by PhpStorm.
 * User: Wiljac Aular
 * Date: 01/10/2015
 * Time: 9:55
 */

class Image {

    private $id;
    private $nombre;


    function __construct($rs)
    {
        $this->setId($rs["id"]);
        $this->setNombre($rs["name"]);
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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }




} 