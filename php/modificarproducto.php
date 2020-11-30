<?php
include('conexionbomberos.php');

$sql="UPDATE `productos` 
SET 
`descripcion_producto` = '$_GET[descripcion_producto]', 
`preciocompra_producto` = '$_GET[preciocompra_producto]', 
`precioventa_producto` = '$_GET[precioventa_producto]' 
 WHERE `productos`.`id_producto` = $_GET[cod]";
$insertar=mysqli_query($conn,$sql);

if ($insertar) {
    echo "<script>alert('datos modificados'); location.href='listadoproducto.php';</script>";
}else {
    echo "<script>alert('datos no modificados' );location.href='listadoproducto.php'=;</script>";
    echo $sql;
}