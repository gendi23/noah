<?php
/**
 * Created by PhpStorm.
 * User: soaint_2
 * Date: 01/10/2015
 * Time: 9:57
 */

class ImageController extends Controller {

    private $table='Image';

    /**
     * @return string
     */
    public function getTable()
    {
        $tables= new Tables();
        return $tables->get($this->table);
    }


    public function getSet(Image $model)
    {
        return array(
            "name"=>"'".$model->getNombre()."'"
        );
    }

    public function getInsertJson(Image $model)
    {
        return $this->Insert($this->getSet($model),$this->getTable());
    }

    public function getUpdateJson(Image $model)
    {
        return $this->Update($this->getSet($model),$this->getTable(),$model->getId());
    }

} 