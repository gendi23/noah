<?php
/**
 * Created by PhpStorm.
 * User: Wilderyut
 * Date: 26/07/2015
 * Time: 11:03
 */

class ConnectionMySQL {
    /*
        private $host="localhost";
        private $database="nnoahcom_noahadmin";
        private $user="nnoahcom_admin";
        private $pa="Adm1n2016";
    */
        private $host="localhost";
        private $database="noah";
        private $user="root";
        private $pass="root";

    private function connection(){
        $pdo="";
        try{
            $pdo = new PDO(
                'mysql:'.$this->host.'=hostname;dbname='.$this->database,
                $this->user,
                $this->pass,
                array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                )
            );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e){
             echo "ERROR: " . $e->getMessage();
        }
        return $pdo;
    }

    public function Select($obj,$id){

        $sql= new Query();
        $st= $this::connection()->query($sql->SelectById($obj,$id));
        $rs= $st->fetch();
        return $rs;
    }

    public function SelectAll($table){
        $sql= new Query();
        return $this::connection()->query($sql->Select($table));
    }

    public function SelectWhere($table,$condition){
        $sql= new Query();
        return $this::connection()->query($sql->Select($table)." where ".$condition);
    }

    public function Update($table,$array,$id){
        $sql= new Query();
        $st= $this::connection()->prepare($sql->Update($table,$array,$id));
        $st->execute();
        if($this::connection()->errorCode()){
            return array("update"=>"1","message"=>"Actualización completada");
        }else{
            return array("update"=>"0","message"=>"Error al actualizar el registro, chequee con el administrador del sistema");
        }
    }

    public function Insert($table,$array){
        $sql= new Query();
        $st= $this::connection()->prepare($sql->InsertInto($table,$array));
        $st->execute();
        if($this::connection()->errorCode()){
            return array("update"=>"1","message"=>"Se insertó correctamente");
        }else{
            return array("update"=>"0","message"=>"Error al insertar el registro, chequee con el administrador del sistema");
        }
    }

    public function DeleteWhere($table,$condition){
        $sql= new Query();
        $st= $this::connection()->prepare($sql->DeleteWhere($table,$condition));
        $st->execute();
        if($this::connection()->errorCode()){
            return array("update"=>"1","message"=>"Se eliminó correctamente");
        }else{
            return array("update"=>"0","message"=>"Error al eliminar el registro, chequee con el administrador del sistema");
        }
    }

    public function selectBySQL($sql){
        $st= $this::connection()->query($sql);
        return $st->fetchAll();
    }
    public function selectBySQLOne($sql){
        $st= $this::connection()->query($sql);
        return $st->fetch();
    }

    public function lastId($table){
        return $this::connection()->lastInsertId($table);
    }
}


?> 