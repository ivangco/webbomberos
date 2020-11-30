<?php 
session_start();

$id=$_SESSION['usuario'];

if (empty($_SESSION['email'])) {
   echo "<script>alert('no tiene acceso'); location.href= 'index.php'</script>";
}
?>

