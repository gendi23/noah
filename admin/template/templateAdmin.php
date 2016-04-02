<?php
$html= new Html();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NOAH Admin</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/front/js/DataTables-1.10.6/media/css/dataTables.bootstrap.css"/>
    <link rel="stylesheet" href="/front/css/style.css"/>
    <link rel="stylesheet" href="/front/css/form.css"/>
</head>
<body>
<header class="col-md-2 padding-none" >
    <img src="/front/img/superior.jpg" alt="FullScream NOAH" class=""/>
    <?=$html->nav(array(
      array('href'=>'#','label'=>$html->icon("home").' Inicio'),
      array('href'=>'/admin/user','label'=>$html->icon("user").' Perfil'),
      array('href'=>'#','label'=>$html->icon("cog").' Matriz'),
      array('href'=>'#','label'=>$html->icon("list-alt").' Contacto'),
      array('href'=>'#','label'=>$html->icon("question-sign").' Ayuda'),
      array('href'=>'/admin/logout','label'=>$html->icon("off").' Salir'),
    ))?>
    <img src="/front/img/inferior.jpg" alt="FullScream NOAH"/>
</header>

<br/>
<section class="col-md-10">
    <?php
    if (isset($body)&& $body!=''){
        require_once $body;
    }
    ?>
</section>
<script src="/front/js/jquery.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script src="/middelend/js/DataTables-1.10.6/media/js/jquery.dataTables.min.js"></script>
<script src="/middelend/js/DataTables-1.10.6/media/js/dataTables.bootstrap.js"></script>
<script src="/middelend/js/bootstrap.file-input.js"></script>
<script src="/middelend/js/Util.js"></script>
<script>
</script>
</body>
</html>