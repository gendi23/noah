<?php
/**
 * Created by PhpStorm.
 * User: Wilderyut
 * Date: 12/08/2015
 * Time: 20:20
 */

class Controller {

    public function getAll($table,$field=null){
        $conn= new ConnectionMySQL();
        $rs = $conn->SelectAll($table,$field)->fetchAll();
        return $rs;
    }

    public function getWhere($table,$condition){
        $conn= new ConnectionMySQL();
        $rs = $conn->SelectWhere($table,$condition)->fetchAll();
        return $rs;
    }

    public function getWhereOne($table,$condition){
        $conn= new ConnectionMySQL();
        $rs = $conn->SelectWhere($table,$condition)->fetch();
        return $rs;
    }

    public function get($table,$id,$field=null){
        $conn= new ConnectionMySQL();
        $rs = $conn->Select($table,$id,$field);
        return $rs;
    }

    public function select($sql){
        $conn= new ConnectionMySQL();
        return $conn->selectBySQL($sql);
    }
    public function selectOne($sql){
        $conn= new ConnectionMySQL();
        return $conn->selectBySQLOne($sql);
    }

    public function Insert(array $set,$table){
        $conn= new ConnectionMySQL();

        $u= $conn->Insert($table,$set);
        return json_encode($u);
    }

    public function Update(array $set,$table,$id){
        $conn= new ConnectionMySQL();

        $u= $conn->Update($table,$set,$id);
        return json_encode($u);
    }

    public function Delete($table,$id){
        $conn= new ConnectionMySQL();

        $conn->DeleteWhere($table,"id=$id");
    }

    public function lastInsert($table){
        $conn= new ConnectionMySQL();
        $sql='select max(id) as id from '.$table;
        $st= $conn->selectBySQLOne($sql);
        return $this->get($table,$st[0]);
    }

    public function count($table,$condition=null){
        $conn= new ConnectionMySQL();
        $query= "select count(id) count from ".$table;
        if($condition!=null){
            $query.=" where ".$condition;
        }
        return $this->selectOne($query)["count"];
    }
}

?> 