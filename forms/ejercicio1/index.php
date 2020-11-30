<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO 1</title>
</head>

<body>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="../../index.php">MENU PRINCIPAL</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php">EJERCICIO 1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="..\ejercicio2\index.php">EJERCICIO 2</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="..\ejercicio3_for\index.php">EJERCICIO 3 for</a>
        </li>
    </ul>
    <!--Ejercicio 1
Crear cuatro variables con los siguientes datos: 25, 25, 100, 2, sumar las dos primeras
variables, el resultado de la suma multiplicar por la tercera variable y el resultado de la
multiplicacion dividir con la cuarta variable.
Imprimir los resultados de cada proceso. Ejemplo

El valor de la multiplicacion es: 100
El valor de la division es 2
-->
    <?php
$var1=25;
$var2=25;
$var3=100;
$var4=2;

$suma = $var1+$var2;

$mul = $suma*$var3;

$div = $mul/$var4;

echo '<br>El valor de la suma es: '. $suma.
'<br>El valor de la multiplicacion es: '. $mul.
'<br>El valor de la division es: '. $div;

?>


</body>

</html>