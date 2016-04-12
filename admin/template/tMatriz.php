<?php
/**
 * Created by PhpStorm.
 * User: WAular
 * Date: 02/04/2016
 * Time: 19:02
 */
 $userController= new UserController();
$user= new User($userController->get(Tables::$User,1));
?>
<div class="container">
    <div class="row" id="level0">
        <div class="col-md-12">
            <?=$user->getUser()?>
        </div>
    </div>
    <div class="row" id="level1">
            <?php foreach($userController->getPyramid(1)["level1"] as $level1){
                $user1= new User($level1);
                ?>
            <div class="col-md-6">
                <?=$user1->getUser()?>
            </div>
            <?php } ?>
    </div>
    <div class="row" id="level2">
        <?php foreach($userController->getPyramid(1)["level2"] as $level2){
            foreach($level2 as $level){
                $user2= new User($level);
                ?>
                <div class="col-md-3">
                    <?php echo $user2->getUser()?>
                </div>
                <?php }?>
        <?php } ?>
    </div>
</div>