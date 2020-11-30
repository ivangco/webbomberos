<?php
include('conexionbomberos.php');

$sql="UPDATE `personas` 
SET 
`nombre_persona` = '$_GET[nombre_cliente]', 
`apellido_persona` = '$_GET[apellido_cliente]', 
`documento_persona` = '$_GET[documento_cliente]', 
`direccion_persona` = '$_GET[direccion_cliente]', 
`telefono_persona` = '$_GET[telefono_cliente]' 
WHERE `personas`.`id_persona` = $_GET[cod]";
$insertar=mysqli_query($conn,$sql);

if ($insertar) {
    echo "<script>alert('datos modificados'); location.href='../listadocliente.php';</script>";
}else {
    echo "<script>alert('datos no modificados' );location.href='../listadocliente.php'=;</script>";
    echo $sql;
}