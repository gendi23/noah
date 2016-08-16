<?php
/**
 * Created by PhpStorm.
 * User: WiljacAular
 */

class MessageView {
    public function bodyPop(Message $message){

        return '<style>
                .buttonLink{
                    height: 35px;
                    font-size: 16pt;
                    color: #3d7fed;
                    border-color: #3d7fed;
                }
                .btn-ver{
                    background-color: #f0f0f0 !important;
                    border: #23ffca 2px solid !important;
                    margin: -5px;
                    margin-left: 8%;
                    font-weight: bold;

                }
                </style>
                <form action="/panel/message/'.$message->getId().'" class="form-horizontal" role="form" method="post" id="loginForm" name="form">
                    <div class="form-group">
                        <label class="control-label col-sm-6" for="user-login">Mensage</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="message" name="message" value="'.$message->getMessage().'">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-6" for="color">Color</label>
                        <div class="col-sm-6">
                            <input type="color" class="form-control" id="color" value="'.$message->getColor().'" name="color" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-6" for="size">Tamaño</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="size" value="'.$message->getSize().'" name="size" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-6" for="type">Tipografía</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="type" value="'.$message->getType().'" name="type" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <button type="submit" class="btn btn-primary" >Editar</button>
                        </div>
                    </div>
                </form>';
    }
}

?> 