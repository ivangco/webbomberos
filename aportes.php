<?php
require 'php/conexionbomberos.php';
require 'php/sesionesbomberos.php';
include 'php/conexionbomberos.php';

if ( empty($_GET['cod'])) {
    $nuevoidregistro=mysqli_query($conn, " SELECT MAX(id_aporte)+1 ultimoid FROM aportes");

}else {
    $consulta = mysqli_query($conn, "   SELECT * 
                                    FROM aportes A
                                    LEFT JOIN personas P ON P.id_persona =A.id_persona
                                    WHERE
                                    A.estado_aporte='ACTIVO' AND A.id_aporte= '$_GET[cod]';");

if (mysqli_num_rows($consulta) > 0) {
    $row = mysqli_fetch_array($consulta);
    $ultimoid = $row['id_aporte'];
}
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <title></title>
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

    <script src="js\bootstrap.min.js"></script>
    <!-- Autocompleto -->
    <link rel="stylesheet" href="assets/calendario/jquery-ui.css" />

    <script src="assets/calendario/jquery-ui.js"></script>
    <script src="assets/script/autocompleto.js"></script>

    <script type="text/javascript" src="assets/script/validation.min.js"></script>
    <script type="text/javascript" src="assets/script/script.js"></script>


    <!-- Autocompleto -->

    <script>
    function puntitos(donde, caracter) {
        pat = /[\*,\+,\(,\),\?,\,$,\[,\],\^]/
        valor = donde.value
        largo = valor.length
        crtr = true
        if (isNaN(caracter) || pat.test(caracter) == true) {
            if (pat.test(caracter) == true) {
                caracter = "'\'" + caracter
            }
            carcter = new RegExp(caracter, "g")
            valor = valor.replace(carcter, "")
            donde.value = valor
            crtr = false
        } else {
            var nums = new Array()
            cont = 0
            for (m = 0; m < largo; m++) {
                if (valor.charAt(m) == "." || valor.charAt(m) == " ") {
                    continue;
                } else {
                    nums[cont] = valor.charAt(m)
                    cont++
                }
            }
        }
        var cad1 = "",
            cad2 = "",
            tres = 0
        if (largo > 3 && crtr == true) {
            for (k = nums.length - 1; k >= 0; k--) {
                cad1 = nums[k]
                cad2 = cad1 + cad2
                tres++
                if ((tres % 3) == 0) {
                    if (k != 0) {
                        cad2 = "." + cad2
                    }
                }
            }
            donde.value = cad2
        }
    }
    //PARA LA BUSQUEDA DEL cliente
    $(function() {
        // configuramos el control para realizar la busqueda de los cliente
        $("#txtCliente").autocomplete({

            source: "php/buscarcliente.php",
            /* este es el formulario que realiza la busqueda */
            minLength: 2,
            /*le decimos que espere hasta que haya 2 caracteres escritos*/
            select: productoSeleccionado,
            /* esta es la rutina que extrae la informacion del registro seleccionado*/
            focus: productoMarcado
        });
    });

    // tras seleccionar un producto, calculamos el importe correspondiente
    function productoMarcado(event, ui) {
        var producto = ui.item.value;

        // no quiero que jquery maneje el texto del control porque no puede manejar objetos,
        // asi que escribimos los datos nosotros y cancelamos el evento
        // (intenta comentando este codigo para ver a que me refiero)
        //dato = producto.nombre_cliente + " " + producto.apellido_cliente;
        dato = producto.documento_cliente;
        $("#txtCliente").val(dato);
        event.preventDefault();
    }

    // tras seleccionar un cliente, calculamos el importe correspondiente
    function productoSeleccionado(event, ui) {
        var producto = ui.item.value;

        var cod = producto.nombre_cliente + " " + producto.apellido_cliente;

        var id = producto.id_cliente;



        $("#txtNombreCliente").val(cod);
        $("#id_cliente").val(id);

        event.preventDefault();
    }
    /////////////////////////////////////////////////////////////////
    //PARA LA BUSQUEDA DE LA Modalidad

    ////////////////////////////////////////////////////////////////*/
    </script>

</head>

<body onLoad="getTime()">

    <?php include 'uliles\nabvar.php';?>


    <div class="container-fluid">

        <div>
            <form action="php/cargaraporte.php" enctype="multipart/form-data" method="POST" role="form"
                class="form-horizontal form-groups-bordered">

                <h3><i class=""></i>Aportes</h3><br>


                <div class="row">
                    <div class="col-lg-3 ds">
                        <!--COMPLETED ACTIONS DONUTS CHART-->
                        <h3 class="label bg-info">DATOS DEL CLIENTE

                        </h3>

                        <!-- First Action -->


                        <!-- First Action -->


                        <!-- First Action -->


                        <!-- Second Action -->

                        <div class="form-group">
                            <label for="field-12" class="control-label">Nombre:</label>
                            <input class="form-control" type="hidden" name="id_cliente" id="id_cliente"
                                value="<?php if (!empty($row)) {echo $row['id_persona'];} ?>"
                                onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off">
                            <input class="form-control" type="text" value="<?php if (!empty($row)) {
                                                echo $row['nombre_persona'] . ' ' . $row['apellido_persona'];}?>"
                                name="txtNombreCliente" id="txtNombreCliente"
                                onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Cliente"
                                required><small><span class="symbol required"></span> </small>
                        </div>

                        <div class="form-group">
                            <label for="field-12" class="control-label">Cedula:</label>

                            <input class="form-control" type="text"
                                value="<?php if (!empty($row)) {echo $row['documento_persona'];} ?>" name="txtCliente"
                                id="txtCliente" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off"
                                placeholder="Cedula" required><small><span class="symbol required"></span> </small>
                        </div>




                        <!-- Second Action -->


                        <!-- Second Action -->


                        <!-- Third Action -->


                        <!-- four Action -->
                        <div class="form-group">
                            <label for="field-12" class="control-label">Fecha de Vta:</label>
                            <input class="form-control" type="text" name="fecharegistro" id="fecharegistro"
                                onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off"
                                placeholder="Ingrese Fecha Inscripcion" readonly>

                        </div>

                        <hr>
                        <br>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-3" class="control-label">importe <span
                                        class="symbol required"></span></label>
                                <input class="form-control" type="number" min="0" name="importe" id="importe"
                                    autocomplete="off" placeholder="precio" required
                                    onkeyup="puntitos(this,this.value.charAt(this.value.length-1))">
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Confirmar Pago<span
                                        class="symbol required"></span></label>
                                <button class="form-control btn btn-primary " type="submit" name="agregar"
                                    value="agregar" id="AgregaProductoVentas" onclick=""><span
                                        class="fa fa-shopping"></span>
                                    Aceptar</button>
                            </div>
                        </div>
                    </div><!-- /col-lg-3 -->

                    <div class="col-lg-9">

                        <div class="row">
                            <!-- TWITTER PANEL -->

                            <div class="col-lg-12">
                                <div class="panel panel-border panel-warning widget-s-1">
                                    <div class="panel-heading">
                                        <h4 class="mb"><i class="fa fa-archive"></i> <strong>Detalle Aporte</strong>
                                        </h4>
                                    </div>
                                    <div class="panel-body">

                                        <div id="error">
                                            <!-- error will be shown here ! -->
                                        </div>





                                        <hr>



                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive bg-light">
                                                    <table
                                                        class="table table-striped table-bordered dt-responsive nowrap"
                                                        id="carrito">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <div align="center">IMPORTE</div>
                                                                </th>
                                                                <th>
                                                                    <div align="center">FECHA IMPORTE</div>
                                                                </th>

                                                                <th>
                                                                    <div align="center">Acción</div>
                                                                </th>
                                                            </tr>
                                                        </thead>

                                                        <tbody id="resultados">

                                                            <?php
if (!empty($row)) {
    $consultadetalle = mysqli_query($conn, "SELECT *
                                            FROM aportedetalle AS AD 
                                            LEFT JOIN aportes AS A ON A.id_aporte = AD.id_aporte
                                            WHERE AD.id_aporte= '$row[id_aporte]'
                                            ORDER BY fecha_aporte DESC;");


$sumar = 0;
while ($rows = mysqli_fetch_array($consultadetalle)) {

    ?>
                                                            <tr>

                                                                <td>
                                                                    <div align="center">
                                                                        <?php echo $rows['importe_aporte']; ?></div>
                                                                </td>
                                                                <td>
                                                                    <div align="center">
                                                                        <?php echo $rows['fecha_aporte']; ?>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div align="center"><a class="btn btn-danger"
                                                                            id="btn_borrar" name="btn_borrar"
                                                                            href="?btn_borrar=<?php echo $rows['id_ventadetalle']; ?>"><i
                                                                                class="entypo-trash"></i>Borrar</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php
$sumar = $sumar+$rows['importe_aporte'];}?>
                                                        </tbody>

                                                    </table>
                                                    <table width="302" id="carritototal">

                                                        <tr>
                                                            <td><span class="Estilo9"><label>Total:</label></span></td>
                                                            <td>
                                                                <div align="right" class="Estilo9">
                                                                    <label id="lbltotal" name="lbltotal">
                                                                        <?php echo number_format($sumar, '0', ',', '.'); ?>
                                                                    </label>

                                                                    <input type="hidden" name="txtTotal" id="txtTotal"
                                                                        value="<?php echo $sumar; ?>" />
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-danger" type="reset"
                                                onclick="location.href='?cancelar=cancelar&idven= <?php echo $ultimoid; ?>'"><span
                                                    class="fa fa-times"></span> Salir</button>
                                            <button type="button" name="btn-submit" id="btn-submit"
                                                class="btn btn-primary"
                                                onclick="location.href='?registrar=registrar&idven= <?php echo $ultimoid; ?>&total=<?php echo $sumar; ?>'"><span
                                                    class="fa fa-save"></span>
                                                Reporte</button>
                                        </div><?php  }?>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /row -->
                    </div><!-- /col-lg-9 END SECTION MIDDLE -->
                    <!-- **********************************************************************************************************************************************************
                                                        RIGHT SIDEBAR CONTENT
*********************************************************************************************************************************************************** -->
            </form>
        </div>
</body>

</html>
<?php
if (!empty($_GET['btn_borrar'])) {
    $borrariten = mysqli_query($conn, "DELETE FROM ventadetalle WHERE ventadetalle.id_ventadetalle = '$_GET[btn_borrar]'");
    echo "<script>location.href='listadoaportes.php?';</script>";
}
if (!empty($_GET['cancelar'])) {
    $borrariten = mysqli_query($conn, "UPDATE venta SET estado_venta = 'CANCELADO' WHERE venta.id_venta = '$_GET[idven]'");
    echo "<script>location.href='listadoaportes.php?';</script>";
}
if (!empty($_GET['registrar'])) {
    $borrariten = mysqli_query($conn, "UPDATE venta SET total_venta = '$_GET[total]', estado_venta = 'FINALIZADO' WHERE venta.id_venta = '$_GET[idven]'");
    echo "<script>location.href='repoteaporte.php?cod=$_GET[idven]';</script>";
}
?>