<?php
/**
 * Created by PhpStorm.
 * User: gendi
 * Date: 23/3/2016
 * Time: 2:51 PM
 */
class DataUserController extends Controller{

    public function getSet(DataUser $model){

        return array(
            "user"=>$model->getUser(),
            "name"=>"'".$model->getName()."'",
            "last_name"=>"'".$model->getLastName()."'",
            "cedula"=>"'".$model->getCedula()."'",
            "country"=>"'".$model->getCountry()."'",
            "city"=>"'".$model->getCity()."'",
            "zone"=>"'".$model->getZone()."'",
            "photo"=>"'".$model->getPhoto()."'",
            "bank_name"=>"'".$model->getBankName()."'",
            "account_type"=>"'".$model->getAccountType()."'",
            "account_number"=>"'".$model->getAccountNumber()."'",
        );
    }
    public function getInsertJson(DataUser $model)
    {
        return $this->Insert($this->getSet($model),Tables::$DataUser);
    }

    public function getUpdateJson(DataUser $model)
    {
        return $this->Update($this->getSet($model),Tables::$DataUser,$model->getId());
    }
    public function getSelectJson(DataUser $model)
    {
        return json_encode($this->Select($this->getSet($model), Tables::$DataUser,$model->getId()));
    }

    public function getByUser($userId){
        if($this->selectOne("select * from ".Tables::$DataUser." where user=".$userId)["id"]!="")
            return new DataUser($this->selectOne("select * from ".Tables::$DataUser." where user=".$userId));
        else
           return "";
    }

    public function getPopDataUser(User $user, DataUser $dataUser, $boton=null,$level){

        $title= strtoupper($boton)!=null?'<h3>Datos del dep&oacute;sito </h3>':'';

        $selectDeposit=$this->selectOne("select * from deposit where user=".$user->getId()." and level=".($level-1));

        $deposit= new Deposit($selectDeposit);

        $top= $boton==null?'35':'-14';

        $html ='<div class="popData" id="'.$user->getUser().'-pop"><div id="background-body"></div>
                <div class="body-user">
                    '.Html::icon("remove",'close-pop-data').'
                    <div class="col-md-6">
                        <img src="/front/img/avatar-small.png" alt=""/>
                        <div class="vertical-line"></div>
                    </div>
                    <div class="col-md-6">
                        '.$title.'
                        <div class="datos-pop" style="top:'.$top.'px;">
                            <span>'.$dataUser->getFullName().'</span>
                            <ul>
                                <li>Telefono: '.$user->getPhone().'</li>
                                <li>Fecha de depósito: '.$deposit->getDateDeposit().'</li>
                                <li>Monto depositado: '.$deposit->getAmount().'Bs</li>
                                <li>Referencia: '.$deposit->getReferenceNumber().'</li>
                                <li><a href="'.$deposit->getPhoto().'" target="_blank">Ver comprobante</a></li>
                            </ul>
                        </div>';
        if($boton!=null) {
            $html .= '<div>
                            <div class="datos-boton-pop" style="top:4px;">

                                <a id="text-aceptar" href="/panel/set/' . $deposit->getId() . '/1">Aceptar</a>
                            </div>
                            <div class="datos-boton-negar" >
                                <a id="text-negar" href="/panel/set/' . $deposit->getId() . '/2">Negar</a>
                            </div>
                        </div>
                    ';

        }
        $html .='</div>
                </div></div>';

        return $html;
    }
}