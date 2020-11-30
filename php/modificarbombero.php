<?php
include('conexionbomberos.php');

$sql="UPDATE `personas` 
SET 
`nombre_persona` = '$_GET[nombre_bombero]', 
`apellido_persona` = '$_GET[apellido_bombero]', 
`documento_persona` = '$_GET[documento_bombero]', 
`direccion_persona` = '$_GET[direccion_bombero]', 
`telefono_persona` = '$_GET[telefono_bombero]' 
WHERE `personas`.`id_persona` = $_GET[cod]";
$insertar=mysqli_query($conn,$sql);

if ($insertar) {
    echo "<script>alert('datos modificados'); location.href='../listadobombero.php';</script>";
}else {
    echo "<script>alert('datos no modificados' );location.href='../listadobombero.php'=;</script>";
    echo $sql;
}