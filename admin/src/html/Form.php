<?php  

/**
 * Created by PhpStorm.
 * User: Wilderyut
 * Date: 26/07/2015
 * Time: 14:36
 */

class Form {

    public function input($values,$value){
        $required='';
        $width1=isset($values["width1"])?$values["width1"]:3;
        $width2=isset($values["width2"])?$values["width2"]:9;
        if(isset($values["required"]))$required='required';

        $r=$required!=''?' ':$required;
        $input= '
        <div class="form-group">
            <label class="control-label col-sm-'.$width1.'" for="'.$values["name"].'">'.$r.$values["label"].'</label>
            <div class="col-sm-'.$width2.'">
                <input type="'.$values["type"].'" class="form-control" id="'.$values["name"].'" name="'.$values["name"].'" value="'.$value.'" '.$required.'>
            </div>
        </div>';
        return $input;
    }
    public function text($values,$value){
        $required='';
        if(isset($values["required"]))$required='required';
        $r=$required!=''?' ':$required;
        $input= '
        <div class="form-group">
            <label class="control-label col-sm-3" for="'.$values["name"].'">'.$r.$values["label"].':</label>
            <div class="col-sm-9">
                <textarea name="'.$values["name"].'" rows="6" class="form-control" id="'.$values["name"].'" '.$required.'>'.$value.'</textarea>
            </div>
        </div>';
        return $input;
    }

    public function showForm($values,$body){
        $btn='';
        $formId='';
        $multi='';
        if(isset($values["btnId"]))$btn=$values["btnId"];
        if(isset($values["formId"]))$formId=' id="'.$values["formId"].'" ';
        if(isset($values["multipart"]))$multi='enctype="multipart/form-data"';

        $form='
        <form action="'.$values["action"].'" class="form-horizontal" role="form" '.$formId.' method="'.$values["method"].'" '.$multi.'>
            '.$body.'
            <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
                <button type="submit" class="btn btn-primary" id="'.$btn.'">'.$values["submit"].'</button>
            </div>
            </div>
        </form>
        ';
        return $form;
     }

    public function Hidden($values){
        $hidden='
        <input type="hidden" name="'.$values["name"].'" value="'.$values["value"].'">
        ';
        return $hidden;
    }
    public function SelectShow($data,$option,$value,$body){
        $html = new Html();
        $selected= $value!=""?$value:"";
        $select='
        <div class="form-group">
                <label class="control-label col-sm-3" for="tipo">'.$data["label"].'</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <select name="'.$data["name"].'" id="'.$data["name"].'" class="form-control" aria-describedby="basic-addon">
                        <option selected>Seleccione...</option>';
                        foreach ($option as $row) {
                            $s=$row[0]==$selected?"selected":"";
                            $select .= '<option value="' . $row[0] . '" ' .$s. '>' . $row[1] . '</option>';
                        }
              $select.='</select>
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-info" id="basic-addon" data-toggle="modal" data-target="#'.$data["name"].'">+</button>
                    </div>
                </div>
            </div>
        </div>';
        $select.=$html->showModal($data["name"],"Nuevo ".$data["label"],$body,true);
        return $select;
    }

    /**
     *
     * @param $config (name, label, width1, width2)
     * @param $array (Donde la $key debe ser el value y $value sera el label del option )
     * @return string
     */
    public function Select($config,$option,$value){
        $selected= $value!=""?$value:"";

        $width1=isset($config["width1"])?$config["width1"]:3;
        $width2=isset($config["width2"])?$config["width2"]:9;
        $select='
        <div class="form-group">
                <label class="control-label col-sm-'.$width1.'" for="'.$config["name"].'">'.$config["label"].':</label>
                <div class="col-sm-'.$width2.'">
                        <select name="'.$config["name"].'" id="'.$config["name"].'" class="form-control" >
                        <option selected>Seleccione...</option>';
                        foreach ($option as $row) {
                            $s=$row[0]==$selected?"selected":"";
                            $select .= '<option value="' . $row[0] . '" ' .$s. '>' . $row[1] . '</option>';
                        }
              $select.='</select>
                </div>
        </div>';
        return $select;
    }
}

?> 