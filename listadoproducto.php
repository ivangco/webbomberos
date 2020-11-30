<?php 
require ('php/conexionbomberos.php');
require ('php/sesionesbomberos.php');
?>
<?php
include 'php/conexionbomberos.php';
$sql = "select * from productos;";
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

    <br><br>
    <section class="container-fluid">
        <h1 align="center">Lista productos
            <button class=" btn btn-primary" type="submit" id="cargar" name="cargar"
                onclick="location.href='productos.php'">CARGAR NUEVO</button>
        </h1>
        <table class="table table-striped bg-light">
            <thead>
                <tr>
                    <td><strong>ID</strong></td>
                    <td><strong>DESCRIPCION</strong></td>
                    <td><strong>PRECIO COMPRA</strong></td>
                    <td><strong>PRECIO VENTA</strong></td>
                    <td><strong>CODIGO</strong></td>
                    <td align="center"><strong>ACCION</strong></td>
                </tr>
            </thead>
            <?php
$ejecutar = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($ejecutar)) {

    ?>

            <tr>
                <td>
                    <strong><?php echo $row[0]; ?></strong>
                </td>
                <td>
                    <?php echo $row[1]; ?>
                </td>
                <td>
                    <?php echo $row[2]; ?>
                </td>
                <td>
                    <?php echo $row[3]; ?>
                </td>
                <td>
                    <?php echo $row[4]; ?>
                </td>
                <td align="center">

                    <button class=" btn btn-secondary" type="submit" id="editar" name="editar"
                        onclick="location.href='editarproducto.php?cod= <?php echo $row[0]; ?>'">Editar</button>
                    <button class=" btn btn-danger" type="submit" id="borrar" name="borrar"
                        onclick="location.href='eliminarproducto.php?cod= <?php echo $row[0]; ?>'">Borrar</button>
                </td>
            </tr>
            <?php }?>
        </table>
    </section>
    <script src="js\jquery-3.1.1.min.js"></script>
    <script src="js\bootstrap.min.js"></script>
</body>


</html>