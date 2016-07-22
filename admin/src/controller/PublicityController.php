<?php
/**
 * Created by PhpStorm.
 * User: waular
 * Date: 09/06/2016
 * Time: 08:54 AM
 */

class PublicityController extends Controller {

    public function getSet(Publicity $model){

        return array(
            "name"=>"'".$model->getName()."'",
            "url"=>"'".$model->getUrl()."'",
            "level"=>$model->getLevel(),
        );
    }
    public function getInsertJson(Publicity $model){
        return $this->Insert($this->getSet($model),Tables::$Publicity);
    }

    public function getUpdateJson(Publicity $model){
        return $this->Update($this->getSet($model),Tables::$Publicity,$model->getId());
    }

    public function getSelectJson(Publicity $model){
        return json_encode($this->Select($this->getSet($model), Tables::$Publicity,$model->getId()));
    }

    public function form($value=null){
        $form=new Form();
        $value = $value!=''&&$value!=null?$this->get(Tables::$Publicity,$value):'';

        $name=$form->input(array(
            "type"=>"text",
            "name"=>"name",
            "label"=>"Nombre del enlace",
            "required"=>"",
            "width1"=>"3",
            "width2"=>"9",
        ),$value!=""?$value["name"]:$value);
        $url=$form->input(array(
            "type"=>"text",
            "name"=>"url",
            "label"=>"Enlace URL",
            "required"=>"",
            "width1"=>"3",
            "width2"=>"9",
        ),"");
        $level=$form->Select(array(
                "name"=>"level",
                "label"=>"Nivel",
                "width1"=>"3",
                "width2"=>"9",
            ),array(
                array(1,1),
                array(2,2),
                array(3,3),
                array(4,4),
            ),
            "");
        $body= $name.$url.$level;
        return $form->showForm(array(
            "action"=>'/admin/publicity/new',
            "method"=>"post",
            "submit"=>"Guardar",
            "btnId"=>"btn-pub",
            "formId"=>"form-pub"
        ),$body);
    }

    public function getByLimit($level, $left, $right){
        $query= "select * from ".Tables::$Publicity." where level=".$level." limit ".$left.",".$right;

        return $this->select($query);
    }

    public function table(){
        $html= new Html();

        $heads= array("ID","Nombre","Nivel","Ver");
        $body=array();
        foreach($this->getAll(Tables::$Publicity) as $row){
            $publicity= new Publicity($row);
            $t=array(
                $publicity->getId(),
                $publicity->getName(),
                $publicity->getLevel(),
                $html->btnLink("xs","warning",$html->icon("eye-open")." Ver","/publicity/".$publicity->getId()),
            );
            array_push($body,$t);
        }
        return $html->showTable($heads,$body);
    }

    public function publicityByUser($userId,$level){

        $publicityArray= $this->select("select publicity.* from publicity where publicity.id not in (select publicity_user.publicity from publicity_user where publicity_user.user=".$userId." and publicity_user.level = ".$level.")  limit 9");
        return $publicityArray;

    }

    public function countPublicity($userId, $level){
        return $this->selectOne("select count(*) as count from publicity_user where user=".$userId." and level=".$level);
    }
}

?> 