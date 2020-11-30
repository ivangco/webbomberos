<?php
include('conexionbomberos.php');

$sql="INSERT INTO `personas` 
(`id_tipopersona`, `nombre_persona`, `apellido_persona`, `documento_persona`, `direccion_persona`, `telefono_persona`)
    VALUES
( '2','$_GET[nombre_bombero]',    '$_GET[apellido_bombero]',  '$_GET[documento_bombero]', '$_GET[direccion_bombero]', '$_GET[telefono_bombero]'   );";
$insertar=mysqli_query($conn,$sql);

if ($insertar) {
    echo "<script>alert('datos agregados'); location.href='../listadobombero.php';</script>";
}else {
    echo "<script>alert('datos no agregados' );location.href='../listadobombero.php';</script>";
    echo $sql;
}
?>