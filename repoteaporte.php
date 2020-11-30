<?php 
require ('php/conexionbomberos.php');
require ('php/sesionesbomberos.php');
?>
<?php
include 'php/conexionbomberos.php';

$consulta = mysqli_query($conn, " SELECT *
FROM venta,clientes
where venta.id_venta='$_GET[cod]' AND venta.id_cliente=clientes.id_cliente;");

$row = mysqli_fetch_array($consulta);

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
    
<button onclick="window.print()">Imprimir</button>
    <br><br>
    <section class="container-fluid">

        <table border="1" width="100%" 
            <tr>
                <td colspan="3">Comprovante Interno</td>
            </tr>
            
            <tr>
                <td colspan="1">Cliente</td>
                <td colspan="2"><?php echo $row['nombre_cliente'] . ' ' . $row['apellido_cliente']; ?></td>
            </tr>
            <tr>
                <td colspan="1">Fecha</td>
                <td colspan="2"><?php echo $row['fecha_pedido']; ?></td>
            </tr>
            <tr>
                <td colspan="3">Detalle</td>
            </tr>
            <tr>
                <td>Codigo</td>
                <td>Descripcion</td>
                <td>Cantidad</td>
            </tr>

            <?php
if (!empty($row)) {
    $consultadetalle = mysqli_query($conn, "SELECT *
    FROM pedidosdetalle,productos
    where productos.id_producto=pedidosdetalle.id_producto and pedidosdetalle.id_pedido='$row[id_pedido]");

    while ($rows = mysqli_fetch_array($consultadetalle)) {
        ?>
            <tr>

                <td>
                    <?php echo $rows['cod_producto']; ?>
                </td>
                <td>
                    <?php echo $rows['descripcion_producto']; ?>
                </td>
                <td>
                    <?php echo $rows['cantidad_pedido']; ?>
                </td>
            </tr>
            <?php
}}?>
        </table>
    </section>
    <script src="js\jquery-3.1.1.min.js"></script>
    <script src="js\bootstrap.min.js"></script>
</body>


</html>