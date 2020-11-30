<?php
include('conexionbomberos.php');

$sql="DELETE FROM avisos WHERE avisos.id_aviso =  $_GET[cod]";
$borrar=mysqli_query($conn,$sql);

if ($borrar) {
    echo "<script>alert('datos borrados'); location.href='../listadoaviso.php';</script>";
}else {
    echo "<script>alert('datos no borrados' );location.href='../listadoaviso.php'=;</script>";
    echo $sql;
}
?>