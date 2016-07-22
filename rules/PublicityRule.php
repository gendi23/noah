<?php
/**
 * Created by PhpStorm.
 * User: waular
 * Date: 22/06/2016
 * Time: 11:03 AM
 */

$app->get(
    '/publicity/:id',
    function ($id) {
        require_once 'view/publicity.php';
    }
);

$app->get(
    '/publicity/:id/:user',
    function ($id,$user) {
        require_once 'view/publicity.php';
    }
);

$app->get('/admin/viewPublicity/:userId/:publicityId',function($userId,$publicityId){
    $publicityUserController= new PublicityUserController();
    $levelController= new LevelController();

    $level= $levelController->getByUser($userId);

    $pArray=array("id"=>"","user"=>$userId,"publicity"=>$publicityId,"status"=>1,"level"=>$level->getLevel(),"date"=>"now()");

    echo $publicityUserController->getInsertJson(new PublicityUser($pArray));
});
?>
