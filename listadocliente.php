<?php 
require ('php/conexionbomberos.php');
require ('php/sesionesbomberos.php');
?>
<?php
include 'php/conexionbomberos.php';
$sql = "SELECT * FROM personas WHERE id_tipopersona = '1'";
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

    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <a class="navbar-brand" href="menu.php">inicio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="listadocliente.php">Socios<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listadoproducto.php">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="FacturarVentas.php">Factura</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link " href="pedidos.php">Pedidos</a>
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

    <br><br>
    <section class="container-fluid">
        <h1 align="center">Lista socios
            <button class=" btn btn-primary" type="submit" id="cargar" name="cargar"
                onclick="location.href='cliente.php'">CARGAR NUEVO</button>
        </h1>
        <table class="table table-striped bg-light">
            <thead>
                <tr>
                    <td><strong></strong>ID</td>
                    <td><strong></strong>NOMBRE</td>
                    <td><strong></strong>APELLIDO</td>
                    <td><strong></strong>DOCUMENTO</td>
                    <td><strong></strong>DIRECCION</td>
                    <td><strong></strong>TELEFONO</td>
                    <td align="center"><strong></strong>ACCION</td>
                </tr>
            </thead>
            <tbody>
            <?php
$ejecutar = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($ejecutar)) {

    ?>

            <tr>
                <td>
                <strong><?php echo $row[0]; ?></strong>
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
                <td>
                    <?php echo $row[5]; ?>
                </td>
                <td>
                    <?php echo $row[6]; ?>
                </td>
                <td align="center">
                    
                    <button class=" btn btn-secondary" type="submit" id="editar" name="editar"
                        onclick="location.href='editarcliente.php?cod= <?php echo $row[0]; ?>'">Editar</button>
                    <button class=" btn btn-danger" type="submit" id="borrar" name="borrar"
                        onclick="location.href='php/eliminarcliente.php?cod= <?php echo $row[0]; ?>'">Borrar</button>
                </td>
            </tr>
            <?php }?>
        </tbody>
        </table>
    </section>
    <script src="js\jquery-3.1.1.min.js"></script>
    <script src="js\bootstrap.min.js"></script>
</body>


</html>