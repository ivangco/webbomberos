<?php 
require ('php/conexionbomberos.php');
require ('php/sesionesbomberos.php');
?>
<?php
include 'php/conexionbomberos.php';

$consulta = mysqli_query($conn, " SELECT *
FROM pedido,clientes
where pedido.estado_pedido='PENDIENTE' AND pedido.id_cliente=clientes.id_cliente;");

if (mysqli_num_rows($consulta) > 0) {
    $row = mysqli_fetch_array($consulta);
    $ultimoid = $row['id_pedido'];
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

    <!-- Autocompleto -->
    <link rel="stylesheet" href="assets/calendario/jquery-ui.css" />

    <script src="assets/calendario/jquery-ui.js"></script>
     <!-- Autocompleto 
    <script src="assets/script/autocompleto.js"></script>-->

    <script type="text/javascript" src="assets/script/validation.min.js"></script>

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
        $("#txtNombreCliente").autocomplete({

            source: "buscarcliente.php",
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
        dato = producto.nombre_cliente + " " + producto.apellido_cliente;
        $("#txtNombreCliente").val(dato);
        event.preventDefault();
    }

    // tras seleccionar un cliente, calculamos el importe correspondiente
    function productoSeleccionado(event, ui) {
        var producto = ui.item.value;

        var cod = producto.documento_cliente;
        var id = producto.id_cliente;



        $("#txtCliente").val(cod);
        $("#id_cliente").val(id);

        event.preventDefault();
    }
    /////////////////////////////////////////////////////////////////
    //PARA LA BUSQUEDA DE LA Modalidad
    $(function() {
        // configuramos el control para realizar la busqueda de los productos
        $("#productoventas").autocomplete({

            source: "buscararticuloventa.php",
            /* este es el formulario que realiza la busqueda */
            minLength: 2,
            /* le decimos que espere hasta que haya 2 caracteres escritos */
            select: productoSeleccionados,
            /* esta es la rutina que extrae la informacion del registro seleccionado */
            focus: productoMarcados
        });
    });

    // tras seleccionar un producto, calculamos el importe correspondiente
    function productoMarcados(event, ui) {
        var producto = ui.item.value;

        // no quiero que jquery maneje el texto del control porque no puede manejar objetos,
        // asi que escribimos los datos nosotros y cancelamos el evento
        // (intenta comentando este codigo para ver a que me refiero)
        $("#productoventas").val(producto.descripcion_producto);
        //$("#precio2").val(producto.precioventa_producto);
        // $("#codproducto").val(producto.id_producto);
        event.preventDefault();
    }

    // tras seleccionar un producto, calculamos el importe correspondiente
    function productoSeleccionados(event, ui) {
        var producto = ui.item.value;

        //var costo = producto.precioventa_producto;
        var codigo = producto.id_producto;


        //$("#precio2").val(costo);
        $("#codproducto").val(codigo);

        event.preventDefault();
    }
    /////////////////////////////////////////////////////////////////
    </script>

</head>

<body onLoad="getTime()">

    <?php include 'uliles\nabvar.php';?>

    <div class="container-fluid">

        <div>
            <form action="cargarpedido.php" enctype="multipart/form-data" method="POST" role="form"
                class="form-horizontal form-groups-bordered" >

                <h3><i class=""></i>Pedidos</h3><br>


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
                                onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off">
                            <input class="form-control" type="text" value="<?php if (!empty($row)) {
                                                echo $row['nombre_cliente'] . ' ' . $row['apellido_cliente'];}?>"
                                name="txtNombreCliente" id="txtNombreCliente"
                                onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Cliente"
                                required><small><span class="symbol required"></span> </small>
                        </div>

                        <div class="form-group">
                            <label for="field-12" class="control-label">Cedula:</label>

                            <input class="form-control" type="text"
                                value="<?php if (!empty($row)) {echo $row['documento_cliente'];} ?>" name="txtCliente"
                                id="txtCliente" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off"
                                placeholder="Cedula" required><small><span class="symbol required"></span> </small>
                        </div>




                        <!-- Second Action -->


                        <!-- Second Action -->


                        <!-- Third Action -->


                        <!-- four Action -->
                        <div class="form-group">
                            <label for="field-12" class="control-label">Fecha de pedido:</label>
                            <input class="form-control" type="text" name="fecharegistro" id="fecharegistro"
                                onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off"
                                placeholder="Ingrese Fecha Inscripcion" readonly>

                        </div>

                        <hr>
                        <br>

                    </div><!-- /col-lg-3 -->

                    <div class="col-lg-9">

                        <div class="row">
                            <!-- TWITTER PANEL -->

                            <div class="col-lg-12">
                                <div class="panel panel-border panel-warning widget-s-1">
                                    <div class="panel-heading">
                                        <h4 class="mb"><i class="fa fa-archive"></i> <strong>Detalle De pedidos</strong>
                                        </h4>
                                    </div>
                                    <div class="panel-body">

                                        <div id="error">
                                            <!-- error will be shown here ! -->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="field-2" class="control-label">Código Articulo: <span
                                                            class="symbol required"></span></label>

                                                    <input class="form-control" type="text" name="codproducto"
                                                        id="codproducto" onKeyUp="this.value=this.value.toUpperCase();"
                                                        autocomplete="off" placeholder="Codigo" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="field-5" class="control-label">Búsqueda de Articulo:
                                                        <span class="symbol required"></span></label>
                                                    <input class="form-control" type="text" name="productoventas"
                                                        id="productoventas"
                                                        onKeyUp="this.value=this.value.toUpperCase();"
                                                        autocomplete="off" placeholder="Ingrese la Descripcion"
                                                        required><small><span class="symbol required"></span> Realice la
                                                        búsqueda por Descripción del Articulo</small>
                                                </div>
                                            </div>

                                            <!--div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">Precio Vta: <span
                                                            class="symbol required"></span></label>
                                                    <input class="form-control" type="text" name="precio2" id="precio2"
                                                        autocomplete="off" placeholder="precio" required
                                                        onkeyup="puntitos(this,this.value.charAt(this.value.length-1))">
                                                </div>
                                            </div-->


                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="field-2" class="control-label">Cantidad: <span
                                                            class="symbol required"></span></label>
                                                    <input class="form-control number" value="1" type="text"
                                                        name="cantidad" id="cantidad"
                                                        onKeyUp="this.value=this.value.toUpperCase();"
                                                        autocomplete="off" placeholder="Cantidad">
                                                </div>
                                            </div>

                                        </div>



                                        <div align="right"><button type="submit" name="agregar" value="agregar"
                                                id="AgregaProductoVentas" class="btn btn-primary" onclick=""><span
                                                    class="fa fa-shopping"></span> Agregar</button>

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
                                                                    <div align="center">Codigo</div>
                                                                </th>
                                                                <th>
                                                                    <div align="center">Articulo</div>
                                                                </th>

                                                                <th>
                                                                    <div align="center">Cantidad</div>
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
FROM pedidosdetalle,productos
where productos.id_producto=pedidosdetalle.id_producto and pedidosdetalle.id_pedido='$row[id_pedido]';");


$sumar = 0;
while ($rows = mysqli_fetch_array($consultadetalle)) {

    ?>
                                                            <tr>

                                                                <td>
                                                                    <div align="center">
                                                                        <?php echo $rows['cod_producto']; ?></div>
                                                                </td>
                                                                <td>
                                                                    <div align="center">
                                                                        <?php echo $rows['descripcion_producto']; ?>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div align="center">
                                                                        <?php echo $rows['cantidad_pedido']; ?></div>
                                                                </td>

                                                                <td>
                                                                    <div align="center"><a class="btn btn-danger"
                                                                            id="btn_borrar" name="btn_borrar"
                                                                            href="?btn_borrar=<?php echo $rows['id_pedidodetalle']; ?>"><i
                                                                                class="entypo-trash"></i>Borrar</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php
}?>
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
                                                    class="fa fa-times"></span> Cancelar</button>
                                            <button type="button" name="btn-submit" id="btn-submit"
                                                class="btn btn-primary"
                                                onclick="location.href='?registrar=registrar&idven= <?php echo $ultimoid; ?>&total=<?php echo $sumar; ?>'"><span
                                                    class="fa fa-save"></span>
                                                Registrar</button>
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
    $borrariten = mysqli_query($conn, "DELETE FROM pedidosdetalle WHERE pedidosdetalle.id_pedidodetalle = '$_GET[btn_borrar]'");
    echo "<script>location.href='pedidos.php?';</script>";
}
if (!empty($_GET['cancelar'])) {
    $borrariten = mysqli_query($conn, "UPDATE pedido SET estado_pedido = 'CANCELADO' WHERE pedido.id_pedido = '$_GET[idven]'");
    echo "<script>location.href='pedidos.php?';</script>";
}
if (!empty($_GET['registrar'])) {
    $borrariten = mysqli_query($conn, "UPDATE pedido SET  estado_pedido = 'FINALIZADO' WHERE pedido.id_pedido = '$_GET[idven]'");
    echo "<script>location.href='repotepedido.php?cod=$_GET[idven]';</script>";
}
?>