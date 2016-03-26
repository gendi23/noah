<?php
/**
 * Created by PhpStorm.
 * User: Yutcelinis
 * Date: 09/12/2015
 * Time: 15:00
 */

class TeamController extends Controller {

    private $table="Team";

    /**
     * @return string
     */
    public function getTable()
    {
        $tables= new Tables();
        return $tables->get($this->table);
    }

    public function getSet(Team $model)
    {
        return array(
            "name"=>"'".$model->getName()."'",
            "coach"=>"'".$model->getCoach()."'",
            "country"=>"'".$model->getCountry()."'",
            "year"=>"'".$model->getYear()."'",
            "president"=>"'".$model->getPresident()."'",
            "web"=>"'".$model->getWeb()."'",
            "league"=>$model->getLeague(),
            "flag"=>$model->getFlag()
        );
    }

    public function getInsertJson(Team $model)
    {
        return $this->Insert($this->getSet($model),$this->getTable());
    }

    public function getUpdateJson(Team $model)
    {
        return $this->Update($this->getSet($model),$this->getTable(),$model->getId());
    }

    public function getTeamNoAsocited($list,$league){
        $conn= new ConnectionMySQL();
        $rs = $conn->SelectWhere($this->getTable(),"!(id in (".$list.")) and league=".$league)->fetchAll();
        return $rs;
    }


    /*
     * Para Nueva Liga, asignar value como vacio y agregar el id del deporte
     * Para actualizar una Liga, solo pasar como parametro el id de la liga
     */
    public function Form($value=null,$leagueId=null){
        $form=new Form();
        $value = $value!=''&&$value!=null?$this->get($this->getTable(),$value):'';

        $id= $form->Hidden(array(
            "name"=>"id",
            "value"=>$value!=""?$value["id"]:$value
        ));
        $name=$form->input(array(
            "type"=>"text",
            "name"=>"name",
            "label"=>"Nombre",
            "required"=>""
        ),$value!=""?$value["name"]:$value);
        $coach=$form->input(array(
            "type"=>"text",
            "name"=>"coach",
            "label"=>"Entrenador",
        ),$value!=""?$value["coach"]:$value);
        $country=$form->input(array(
            "type"=>"text",
            "name"=>"country",
            "label"=>"Pais",
        ),$value!=""?$value["country"]:$value);
        $year=$form->input(array(
            "type"=>"text",
            "name"=>"year",
            "label"=>"Año",
        ),$value!=""?$value["year"]:$value);
        $president=$form->input(array(
            "type"=>"text",
            "name"=>"president",
            "label"=>"Presidente",
        ),$value!=""?$value["president"]:$value);
        $web=$form->input(array(
            "type"=>"text",
            "name"=>"web",
            "label"=>"Site Web",
        ),$value!=""?$value["web"]:$value);

        $league= $form->Hidden(array(
            "name"=>"league",
            "value"=>$value!=""?$value["league"]:$leagueId
        ));
        $flag= $form->Hidden(array(
            "name"=>"flag",
            "value"=>$value!=""?$value["flag"]:1
        ));

        $action=$value!=''?'update':'new';
        $body= $id.$name.$coach.$country.$year.$president.$web.$league.$flag;
        return $form->showForm(array(
            "action"=>'/admin/team/'.$action,
            "method"=>"post",
            "submit"=>"Guardar"
        ),$body);
    }


    public function showTableAll($rs){
        $html= new Html();
        $head=array(
            "",
            "id",
            "Nombre",
            ""
        );
        $body=array();
        foreach($rs as $row){
            $team = new Team($row);

            $t=array(
                '<input type="checkbox" class="checkbox" name="'.$team->getId().'" value="'.$team->getId().'"/>',
                $team->getId(),
                $team->getName(),
                $html->btnDelete("/admin/team/delete/".$team->getId())
            );
            array_push($body,$t);
        }
        return $html->showTable($head,$body);
    }

    public function Edit($id){
        $html= new Html();
        $team= new Team($this::get($this->getTable(),$id));

        $edit=$html->btnEdit($team->getId());
        $edit.=$html->showModal("edit".$team->getId(),"Editar ".$team->getName(),
            "<p><b>Agregar una Imagen</b> ".$html->loadImage("sm","primary","team/flag/".$team->getId(),$team->getId())."</p>".
            "</hr></br>".
            $this->Form($team->getId()));

        return $edit;
    }
}
?> 