<?php
include 'conexionbomberos.php';
if (!empty($_POST['agregar'])) {

    $consulta = mysqli_query($conn, " SELECT * FROM aportes WHERE id_persona='$_POST[id_cliente]' and estado_aporte='ACTIVO';");

    $precio = str_replace('.', '', $_POST['importe']);

    if (mysqli_num_rows($consulta) <= 0) {
        $insertarcabezera = mysqli_query($conn, " INSERT INTO aportes ( id_persona, fechaCreacion_aporte, total_aporte, estado_aporte)
                                                VALUES ('$_POST[id_cliente]',now(),0,'ACTIVO');");

        if ($insertarcabezera) {
            $consulta2 = mysqli_query($conn, " SELECT * FROM aportes WHERE id_persona='$_POST[id_cliente]' and estado_aporte='ACTIVO';");
            $row = mysqli_fetch_array($consulta2);
            $insertardetalle = mysqli_query($conn, "INSERT INTO aportedetalle (id_aporte, importe_aporte,fecha_aporte)
             VALUES ('$row[id_aporte]','$precio',now());");
            if ($insertardetalle) {
                echo "<script>location.href='../aportes.php?cod=$row[id_aporte]';</script>";
            } else {
                echo "<script>alert('puto')</script>";
            }
        }
    } else {
        $consulta3 = mysqli_query($conn, " SELECT * FROM aportes WHERE id_persona='$_POST[id_cliente]' and estado_aporte='ACTIVO';");
        $rows = mysqli_fetch_array($consulta3);
        $insertardetalle2 = mysqli_query($conn, "INSERT INTO aportedetalle (id_aporte, importe_aporte,fecha_aporte)
             VALUES ('$rows[id_aporte]','$precio',now());");
        if ($insertardetalle2) {
            echo "<script>location.href='../aportes.php?cod=$rows[id_aporte]';</script>";
        }
    }

} else {
    echo "<script>location.href='FacturarVentas.php';</script>";
}
