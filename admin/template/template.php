<?php

if(isset($_SESSION["user"])){

    $user= $_SESSION["user"];
    $rol= $_SESSION["rol"];

    $html= new Html();
    ?>
    <!DOCTYPE html>
    <html>
    <head lang="en">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sports CMS</title>
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="/middelend/js/DataTables-1.10.6/media/css/dataTables.bootstrap.css"/>
        <link rel="stylesheet" href="/middelend/css/style.css"/>
        <!--<link rel="stylesheet" href="web/plugin/loadImage/loadImage.css"/>-->
    </head>
    <body>
    <header class="header">
        <div class="container">
            <h1><b>LRSports Digital CMS</b></h1>
        </div>
        <div class="container-fluid">

        </div>
    </header>

    <div class="container-fluid">
        <div class="col-sm-12" id="content" >
            <?php
            if(isset($body)&&$body!=""){
                require_once $body;
            }
            ?>
        </div>
    </div>
    <script src="/middelend/js/jquery.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/middelend/js/DataTables-1.10.6/media/js/jquery.dataTables.min.js"></script>
    <script src="/middelend/js/DataTables-1.10.6/media/js/dataTables.bootstrap.js"></script>
    <script src="/middelend/js/bootstrap.file-input.js"></script>
    <script src="/middelend/js/Util.js"></script>
    <script>
        $(document).ready(function() {
            $('table').dataTable();
        });
    </script>
    </body>
    </html>
<?php
}else{
    echo "<script>window.location='/admin/home';</script>";
}
?>