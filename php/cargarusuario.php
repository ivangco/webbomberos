<?php
include('conexionbomberos.php');

$sql="INSERT INTO `personas` 
(`id_tipopersona`, `nombre_persona`, `apellido_persona`, `documento_persona`, `direccion_persona`, `telefono_persona`)
    VALUES
( '1','$_GET[nombre_cliente]',    '$_GET[apellido_cliente]',  '$_GET[documento_cliente]', '$_GET[direccion_cliente]', '$_GET[telefono_cliente]'   );";
$insertar=mysqli_query($conn,$sql);

if ($insertar) {
    echo "<script>alert('datos agregados'); location.href='../listadocliente.php';</script>";
}else {
    echo "<script>alert('datos no agregados' );location.href='../listadocliente.php';</script>";
    echo $sql;
}
?>