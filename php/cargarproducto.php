<?php
include('conexionbomberos.php');

$sql="INSERT INTO `productos` ( `descripcion_producto`, `preciocompra_producto`, `precioventa_producto`, `cod_producto`) 
VALUES ( '$_GET[descripcion_producto]', '$_GET[preciocompra_producto]', '$_GET[precioventa_producto]', '$_GET[cod_producto]')";
$insertar=mysqli_query($conn,$sql);

if ($insertar) {
    echo "<script>alert('datos agregados'); location.href='listadoproducto.php';</script>";
}else {
    echo "<script>alert('datos no agregados' );location.href='listadoproducto.php'=;</script>";
    echo $sql;
}
?>