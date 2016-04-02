<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>NOAH Corporation</title>
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="/middelend/css/style.css"/>
        <link rel="stylesheet" href="/front/css/form.css"/>
    </head>
    <body>
        <header>
            <div class="col-md-4">
                <h1 style="color: #fff">NOAH</h1>
            </div>
            <div class="col-md-8">
                <nav class="nav-noah">
                    <ul>
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Anuncios</a></li>
                        <li><a href="#">Servicios</a></li>
                        <li><a href="#">Matriz</a></li>
                        <li><a href="#">Sistema NOAH</a></li>
                        <li><a href="#">Contacto</a></li>
                    </ul>
                </nav>
            </div>
            <div class="line"></div>
        </header>
        <div class="container-fluid">
            <?php
                require_once $body;
            ?>
        </div>
        <footer>
            <div class="line"></div>
        </footer>
        <script src="/middelend/js/jquery.js"></script>
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        <script src="/middelend/js/bootstrap.file-input.js"></script>
        <script src="/middelend/js/Util.js"></script>
    </body>
</html>