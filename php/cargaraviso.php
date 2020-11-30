<?php
include('conexionbomberos.php');

$sql="INSERT INTO avisos ( asunto_aviso, mensaje_aviso, direccion_aviso, fechaemicion_aviso, fechaevento_aviso) 
 VALUES
( '$_GET[asunto_aviso]', '$_GET[mensaje_aviso]',  '$_GET[direccion_aviso]', now(), '$_GET[fechaevento_aviso]');";
$insertar=mysqli_query($conn,$sql);

if ($insertar) {
    echo "<script>alert('datos agregados'); location.href='../listadoaviso.php';</script>";
}else {
    echo "<script>alert('datos no agregados' );location.href='../listadoaviso.php';</script>";
    echo $sql;
}
?>