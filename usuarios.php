<?php
require 'php/conexionbomberos.php';
require 'php/sesionesbomberos.php';
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
    <script src="assets/script/autocompleto.js"></script>
    <script type="text/javascript" src="assets/script/script.js"></script>-->

    <script type="text/javascript" src="assets/script/validation.min.js"></script>

    <!-- Autocompleto -->

</head>

<body>

    <?php include 'uliles\nabvar.php';?>


    <section class="row m-0 bg-white justify-content-center align-items-center vh-100">
        <div class="col-sm-8 bg-white">
            <h1 class="text-center">Cargar cliente</h1>
            <!--formulario-->
            <form class="container-fluid center-block bg-white " action="php/cargarcliente.php" method="GET">
                <div class="row">

                    <div class="col-12">
                        <label>Sociado</label>
                        <input type="text" class="form-control" name="id_persona" id="id_persona">
                    </div>
                    <div class="col-12">
                        <label>Tipo Usuario</label>
                        <select class="form-control" id="id_tipousuario" name="id_tipousuario">
                            <option>ELIJA UNA OPCION</option>
                            <option>SOCIO</option>
                            <option>BOMBERO</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="nombre_usuario" id="nombre_usuario">
                    </div>
                    <div class="col-12">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email_usuario" id="email_usuario">
                    </div>
                    <div class="col-12">
                        <label>Contraseña</label>
                        <input type="text" class="form-control" name="password_usuario" id="password_usuario">
                    </div>
                </div>
                <br>
                <!--botones-->
                <div class="text-center">
                    <!--button type="submit" class="btn btn-success" id="btn_buscar">
                        <img src="img\search.svg" alt="" width="20" height="20">
                    </button-->
                    <button type="submit" class="btn btn-primary" name="btn_agregar" id="btn_agregar"
                        value="Agregar">Agregar</button>

                </div>
            </form>
        </div>

    </section>
    <script src="js\jquery-3.1.1.min.js"></script>
    <script src="js\bootstrap.min.js"></script>
</body>
<?php

?>

</html>