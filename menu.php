<?php 
require ('php/conexionbomberos.php');
require ('php/sesionesbomberos.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MENU PRINCIPAL</title>
    
    <!-- Bootstrap core CSS 
    <link href="assets/css/bootstrap.css" rel="stylesheet">-->
    <link href="css\bootstrap.min.css" rel="stylesheet">

    <!--external css-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DataTables -->
    <link href="assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <link href="assets/css/table-responsive.css" rel="stylesheet">
    <script src="assets/js/jquery.js"></script>
    <script src="assets/script/script2.js"></script>

    <!-- Autocompleto -->
    <link rel="stylesheet" href="assets/calendario/jquery-ui.css" />

    <script src="assets/calendario/jquery-ui.js"></script>
     <!-- Autocompleto 
    <script src="assets/script/autocompleto.js"></script>-->

    <script type="text/javascript" src="assets/script/validation.min.js"></script>

    <!-- Autocompleto -->

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <a class="navbar-brand active" href="menu.php">inicio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="listadocliente.php">Socios<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listadobombero.php">Bomberos<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listadoaportes.php">Aportes</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link " href="listadoaviso.php">Avisos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listadoproducto.php">Productos</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Dropdown link
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <script src="js\jquery-3.1.1.min.js"></script>
    <script src="js\bootstrap.min.js"></script>
</body>


</html>