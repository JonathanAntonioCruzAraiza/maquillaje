<html lang="es">
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $page_title ?></title>

        <link rel="stylesheet" href="../media/css/miestilo.css">
        <link rel="stylesheet" href="../media/css/bootstrap.min.css"> 
        <script src="../media/js/bootstrap.min.js"></script>
        <script src="../media/js/jquery-3.3.1.js" ></script>
        <script src="../media/js/funciones.js" ></script>
        <link href="../media/css/login.css" rel="stylesheet" type="text/css"/>
        <script src="../media/js/bootstrap.js" type="text/javascript"></script>
        <script src="../media/js/bootstrap.min_1.js" type="text/javascript"></script>
    </head>
    <div class="brand">Jovenes</div>
    <div class="address-bar">Motivacion| Consejos, Apoyo | 123.456.7890</div>


<div class="brand">Cosmeticos</div>
<div class="address-bar">Mujer Bella | Cosmeticos, Accesorios | 123.456.7890</div>
         
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="valor" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="Productos(<?php $id=5; echo $id; ?>)" href="#">id</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <input type="submit" class="btn-dark " onclick=""/>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Pedidos</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn " type="submit">Searchguygu</button>
                    </form>
                </div>
            </nav>
            <body>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-2" >
                         <?php
                            include_once 'layout_menu.php';
                         ?>
                        </div> 
                        <div class="col-10" >








