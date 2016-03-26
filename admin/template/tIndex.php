<?php

    $userController= new UserController();
    $user= new User($userController->get(Tables::$User,1));

    echo $user->getName()." ".$user->getLastName();
?>