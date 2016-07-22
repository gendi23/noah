<?php
$USERID="";
if(isset($_SESSION)){
if(isset($_SESSION["userId"]) && $_SESSION["userId"]!=""){
    $USERID= $_SESSION["userId"];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NOAH Admin</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/pluginsJs/DataTables/media/css/dataTables.bootstrap.css"/>
    <link rel="stylesheet" href="/front/css/form.css"/>
    <style>
        body{
            background-color: #e9e9e9;
        }
        .body-admin, header, section{
            width: 1366px;
        }
        header{
            border-bottom: solid 4px;
        }
        header>img{
            margin-left: 50px;
            margin-bottom: 10px;
            margin-top: 10px;
            width: 200px;
        }
        header>h4{
            position: relative;
            left: 40%;
            top: -90px;
            margin-bottom: -27px;
        }
        header p{
            position: relative;
            top: -50px;
            left: 35%;
            font-size: 17pt;
            margin-bottom: -30px;
        }
        header p a{
            color: black;
        }
        header p a:hover{
            color: #0066cc;
            text-decoration: none;
        }
        section{
            position: relative;
            width: 70%;
            left: 15%;
            top: 20px;
        }
    </style>
</head>
<body>
    <div class="body-admin">
        <header>
            <img src="/front/img/noah-black.png" alt=""/>
            <h4>PANEL DE CONTROL MATRIZ</h4>
            <div>
                <p><a href="/panel/matriz">Matriz</a> -
                    <a href="/panel/searchUser">Buscador de usuarios</a> -
                    <a href="#">Anuncios</a></p>
            </div>
        </header>
        <section>
            <?php
            if (isset($body)&& $body!=''){
                require_once $body;
            }
            ?>
        </section>
    </div>
    <script src="/front/js/jquery.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/front/js/bootstrap.file-input.js"></script>
    <script src="/pluginsJs/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
    <script src="/pluginsJs/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="/pluginsJs/DataTables/media/js/dataTables.bootstrap.js"></script>
    <script src="/front/js/Util.js"></script>
    <script src="/front/js/popup.js"></script>
    <script>
        $(document).ready(function(){
            $('table').dataTable();
        });
    </script>
</body>
</html>
<?php
}else{
    echo "<script>window.location='/';</script>";
}
}else{
    echo "<script>window.location='/';</script>";
}
?>