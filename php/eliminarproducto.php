<?php
include('conexionbomberos.php');

$sql="DELETE FROM `productos` WHERE `productos`.`id_producto` = $_GET[cod]";
$borrar=mysqli_query($conn,$sql);

if ($borrar) {
    echo "<script>alert('datos borrados'); location.href='listadoproducto.php';</script>";
}else {
    echo "<script>alert('datos no borrados' );location.href='listadoproducto.php'=;</script>";
    echo $sql;
}
?>