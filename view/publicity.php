<?php
/**
 * Created by PhpStorm.
 * User: waular
 * Date: 09/06/2016
 * Time: 09:53 AM
 */
$publicityController= new PublicityController();
$publicity= new Publicity($publicityController->get(Tables::$Publicity,$id));

print_r($publicityController->getByLimit(1,1,3));
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Publicidad NOAH</title>
</head>
<body>
    <div id="load"></div>
    <script src="/front/js/jquery.js"></script>
    <script>
        $(document).ready(function(){
            
        });
    </script>
</body>
</html>