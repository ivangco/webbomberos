<?php
include('conexionbomberos.php');

$sql="UPDATE avisos 
SET 
asunto_aviso = '$_GET[asunto_aviso]', 
mensaje_aviso = '$_GET[mensaje_aviso]', 
direccion_aviso = '$_GET[direccion_aviso]', 
fechaevento_aviso = '$_GET[fechaevento_aviso]'
WHERE avisos.id_aviso = $_GET[cod]";
$insertar=mysqli_query($conn,$sql);

if ($insertar) {
    echo "<script>alert('datos modificados'); location.href='../listadoaviso.php';</script>";
}else {
    echo "<script>alert('datos no modificados' );location.href='../listadoaviso.php'=;</script>";
    echo $sql;
}
