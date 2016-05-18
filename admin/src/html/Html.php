<?php
/** * Created by PhpStorm.
 * User: waular
 * Date: 22/07/2015
 * Time: 07:43 AM
 */
class Html{

    public function nav($items){

       $value='<nav class="nav-style">
                <ul>';
            foreach($items as $item){
                $value.='<li><a href="'.$item['href'].'">'.$item['label'].'</a></li>';
            }
       $value.='</ul>
                </nav>';
        return $value;
    }

    public function btnDelete($action){
        return '<button onclick="Delete(\''.$action.'\')" class="btn btn-xs btn-danger delete-from" id="'.$action.'"> '.$this->icon("remove").'</button>';
    }

    public function btnLink($height,$color,$label,$action){
        return '<a href="'.$action.'" class="btn btn-'.$height.' btn-'.$color.'">'.$label.'</a>';
    }

    public function showTable($heads,$bodys){
        $table='<table class="table table-hover">
            <thead style="font-weight: bold; border-bottom: 2px solid #ddd">
                            <tr>';
        foreach($heads as $head){
            $table.='<td>'.$head.'</td>';
        }
        $table.='</tr>
            </thead>
            <tbody>';
        foreach($bodys as $body){
            $table.='<tr class="click">';
            foreach($body as $b){
                $table.='<td> '.$b.'</td>';
            }
            $table.='</tr>';
        }
        $table.='</tbody>
        </table>';
        return $table;
    }

    public function btnEdit($id){
        $html=
         '<button data-toggle="modal" data-target="#edit'.$id.'" class="btn btn-xs btn-warning">
                    '.$this->icon('pencil').'</button>';

        return $html;
    }
    public function btnEditModal($id,$body,$label,$zindex=null){
        $html= $this->btnShowModal("edit".$id,array(
            "label"=>$this->icon('pencil'),
            "height"=>"xs",
            "color"=>"warning"
        ),$body,$label,$zindex);

        return $html;
    }

    public static function icon($icon){
        return '<span class="glyphicon glyphicon-'.$icon.'"></span>';
    }

    public function btnModal($height,$color,$id,$label){
        $edit='<button data-toggle="modal" data-target="#'.$id.'" class="btn btn-'.$height.' btn-'.$color.'">'.$label.'</button>';
        return $edit;
    }

    /**
     * Recibe en btnParam: heigth, el label y el color
     * @param $id
     * @param $btnParam
     * @param $body
     * @param $label
     * @return string
     */
    public function btnShowModal($id,$btnParam,$body,$label,$zindex=null){
        $class= isset($btnParam["class"])?$btnParam["class"]:"";
        $edit='<button data-toggle="modal" data-target="#'.$id.'" class="btn btn-'.$btnParam["height"].' btn-'.$btnParam["color"].' '.$class.'">'.$btnParam["label"].'</button>';
        return $edit.$this->showModal($id,$label,$body,$zindex);
    }

    public function showModal($id,$title,$body,$zindex=null){
        $z= $zindex!=null?"zindex":"";
        ?>
        <div id="<?=$id?>" class="modal fade <?=$z?>" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><?php echo $title?></h4>
                    </div>
                    <div class="modal-body">
                        <?php echo $body?>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }

    public function loadImage($height,$color,$url,$id){
        $load=$this->btnModal($height,$color,'load-image-'.$id,$this->icon("picture").' Cargar Imagen');
        $body='
            <form enctype="multipart/form-data" action="/admin/load-image/'.$url.'" method="POST">
	            <input name="uploadedfile" type="file" title="Seleccionar Imagen..." class="btn btn-info" data-filename-placement="inside"  />
	            <button type="submit" class="btn btn-success btn-md">'.$this->icon("open").' Cargar</button>
            </form>
            ';
        $load.=$this->showModal('load-image-'.$id,'Cargar Imagen',$body,true);
        return $load;
    }

    public function twoColumn($body1,$body2){
        $div= '<div class="col-md-12">
                        <div class="col-md-6">
                            '.$body1.'
                        </div>
                        <div class="col-md-6">
                            '.$body2.'
                        </div>
                    </div>';
        return $div;
    }
    public function threeColumn($body1,$body2,$body3){
        $div= '<div class="col-md-12">
                        <div class="col-md-4">
                            '.$body1.'
                        </div>
                        <div class="col-md-4">
                            '.$body2.'
                        </div>
                        <div class="col-md-4">
                            '.$body3.'
                        </div>
                    </div>';
        return $div;
    }
    public static  function Popup ($id, $title=null, $body){
        $title= $title!=null?'<div class="line-title">'.$title.'</div>':'';
        $html='<div id="popup-'.$id.'" class="popup" style="display: none;">
                    <div class="content-popup">
                        <div class="close-pop"><a href="#" id="close-'.$id.'"><img src="/front/img/pop-exit.png" style="width:36px"/></a></div>
                        <div>
                            '.$title.'
                            <article class="row">'.$body.'</article>
                        </div>
                    </div>
                </div>';
        return $html;
    }

    public static function getHtml($include){
        ob_start();
        require_once $include;
        $html = ob_get_clean();

        return $html;
    }
}
?>