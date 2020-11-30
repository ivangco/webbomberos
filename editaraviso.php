<?php 
require ('php/conexionbomberos.php');
require ('php/sesionesbomberos.php');
?>
<?php
include('php/conexionbomberos.php');

$sql="SELECT * FROM avisos WHERE id_aviso =$_GET[cod]";
$select=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($select);

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

    <script type="text/javascript" src="assets/script/validation.min.js"></script>

    <!-- Autocompleto -->

</head>

<body>

    <?php include 'uliles\nabvar.php';?>


    <section class="row m-0 bg-white justify-content-center align-items-center vh-100">
        <div class="col-sm-8 bg-white">
            <h1 class="text-center">Editar evento</h1>
            <!--formulario-->
            <form class="container-fluid center-block bg-white " action="php/modificaraviso.php" method="GET">
                <div class="row">

                    <input type="hidden" class="form-control" name="cod" id="cod"
                        value="<?php echo $row[0];?>">

                    <div class="col-12">
                        <label>Asunto</label>
                        <input type="text" class="form-control" name="asunto_aviso" id="asunto_aviso"
                            value="<?php echo $row[1];?>">
                    </div>
                    <div class="col-12">
                        <label>Mensaje</label>
                        <input type="text"  class="form-control" name="mensaje_aviso" id="mensaje_aviso"
                            value="<?php echo $row[2];?>" rows="10">
                    </div>
                    <div class="col-12">
                        <label>Direccion</label>
                        <input type="text" class="form-control" name="direccion_aviso" id="direccion_aviso"
                            value="<?php echo $row[3];?>">
                    </div>
                    <div class="col-12">
                        <label>Fecha del evento</label>
                        <input type="date" class="form-control" name="fechaevento_aviso" id="fechaevento_aviso"
                            value="<?php echo $row[5];?>">
                    </div>
                </div>
                <br>
                <!--botones-->
                <div class="text-center">
                    <!--button type="submit" class="btn btn-success" id="btn_buscar">
                        <img src="img\search.svg" alt="" width="20" height="20">
                    </button-->
                    <button type="submit" class="btn btn-primary" name="btn_agregar" id="btn_agregar"
                        value="Modificar">Agregar</button>

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