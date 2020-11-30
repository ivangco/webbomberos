<?php
include 'conexionbomberos.php';
if (!empty($_POST['agregar'])) {

    $consulta = mysqli_query($conn, "SELECT * FROM pedido where estado_pedido='PENDIENTE'");
    echo "<script>alert('estoy fuera');</script>";
    
    if (mysqli_num_rows($consulta) <= 0) {

        $insertarcabezera = mysqli_query($conn, "INSERT INTO pedido (fecha_pedido, id_cliente, estado_pedido) 
                                                VALUES (now(),'$_POST[id_cliente]','PENDIENTE');");
    

        if ($insertarcabezera) {echo "<script>alert('hice una consulta');</script>";
            $consulta2 = mysqli_query($conn, "SELECT * FROM pedido where estado_pedido='PENDIENTE'");
            $row = mysqli_fetch_array($consulta2);
             $insertardetalle = mysqli_query($conn, "INSERT INTO pedidosdetalle (id_pedido, id_producto, cantidad_pedido) 
             VALUES ('$row[id_pedido]','$_POST[codproducto]','$_POST[cantidad]');");
            if ($insertardetalle) {
                echo "<script>location.href='pedidos.php';</script>";
            }
        }

    } else {

        $consulta3 = mysqli_query($conn, " SELECT * FROM pedido where estado_pedido='PENDIENTE'");
        $rows = mysqli_fetch_array($consulta3);
        
        $insertardetalle = mysqli_query($conn, "INSERT INTO pedidosdetalle (id_pedido, id_producto, cantidad_pedido) 
             VALUES ('$rows[id_pedido]','$_POST[codproducto]','$_POST[cantidad]');");
        if ($insertardetalle) {
            echo "<script>location.href='pedidos.php';</script>";
        }

    }

} else {
    echo "<script>location.href='pedidos.php';</script>";
}