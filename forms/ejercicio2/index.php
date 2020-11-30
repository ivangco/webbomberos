<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO 2</title>
</head>

<body>

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="../../index.php">MENU PRINCIPAL</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="..\ejercicio1\index.php">EJERCICIO 1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php">EJERCICIO 2</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="..\ejercicio3_for\index.php">EJERCICIO 3 for</a>
        </li>
    </ul>
    <?php
echo '<form method="post" action="calculadora.php">

        <input type="text" name="num1" />
        <input type="text" name="num2" />

        <input type="submit" name="suma" value="SUMAR" />
        <input type="submit" name="resta" value=" RESTAR " />
        <input type="submit" name="multi" value=" MULTIPLICAR " />
        <input type="submit" name="divi" value=" DIVIDIR " />
    </form>';
?>



</body>

</html>