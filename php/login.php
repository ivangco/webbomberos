<?php
require 'conexionbomberos.php';
//require 'navegador.php';

$user = $_POST['user'];
$pass = $_POST['pass'];



$consulta = mysqli_query($conn, "SELECT * FROM usuarios WHERE  nombre_usuario = '$user' AND estado_usuario = 'ACTIVO' AND password_usuario = '$pass';");

if (mysqli_num_rows($consulta) > 0) {
    $dato = mysqli_fetch_array($consulta);

    session_start();
    $_SESSION['email'] = $dato['email_usuario'];
    $_SESSION['user'] = $dato['nombre_usuario'];
    $_SESSION['tipo'] = $dato['id_tipousuario'];
    $_SESSION['estado'] = $dato['estado_usuario'];
    $_SESSION['usuario'] = $dato['id_usuario'];
    $_SESSION['id_persona'] = $dato['id_usuario'];

    //echo "<script>;
    //</script>";
    echo "<script>location.href= '../menu.php'</script>";


}
else{
echo "<script>alert('$pass');location.href= '../index.php'</script>";

}