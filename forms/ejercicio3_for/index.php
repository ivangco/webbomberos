<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO 3 for</title>
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
            <a class="nav-link" href="..\ejercicio2\index.php">EJERCICIO 2</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php">EJERCICIO 3 for</a>
        </li>
    </ul>

    <h4>Bucles anidados: Muestra los numeroos de piso y puerta de un bloque. Por ejemplo:
        piso 1 - puerta 1
        piso 1 - puerta 2
        Asi hasta llegar al piso 5 - puerta 4.</h4>
    <?php
    $n = 5;
    for ($i = 1; $i <= $n; $i++) {
        echo 'piso 1 - puerta ' . $i . '<br>';
    }

    ?>

    <h4>muestra todos los nuumeros del 20 hasta llegar al 0, sin incluir.
    </h4>
    <?php
    $n2 = 0;
    for ($i = 20; $i > $n2; $i--) {
        echo $i . '  ';
    }
    ?>

    <h4>Almacena en un pares los 10 primeros numeros pares. Imprimelos cada uno en una linea</h4>
    <?php
    for ($i = 0; $i < 10; $i++) {
        $v[$i] = $i * 2;
    }

    for ($i = 0; $i < 10; $i++) {
        echo $v[$i] . ' ';
    }
    ?>
    <h4>Crea un array asociativo para introducir datos de una persona</h4>
    <?php
    $asociativo = array(
        "nom" => "Ivan",
        "dir" => "Capiata",
        "tel" => "1234567890"
    );
    echo    "Nombre: ".$asociativo["nom"]."<br>".
            "Direccion: ".$asociativo["dir"]."<br>".
            "Telefono: ".$asociativo["tel"];
    ?>  
</body>

</html>