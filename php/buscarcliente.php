<?php
// El objetivo de este demo no es realizar una busqueda con php, sino mostrar lo simple
// que es programar una rutina de autocompletado con jQuery UI, por esta razon no vamos
// a realizar nada importante en este archivo.

// recuperamos el criterio de la busqueda
require 'conexionbomberos.php';
require 'sesionesbomberos.php';

$criterio = strtolower($_GET["term"]);
if (!$criterio) {
    return;
}

$date = date('Y');
?>
[<?php
$contador = 0;
// esta es una lista con algunas opciones, aunque en la practica estos datos deben salir de
// alguna tabla en una base de datos
$ff = mysqli_query($conn, "select nombre_persona,apellido_persona,id_persona,documento_persona
from personas
where documento_persona like'%$criterio%'") or die("ERROR EN SELECCION EN VENTA: " . mysql_error());

while ($productos = mysqli_fetch_array($ff)) {
    if ($contador++ > 0) {
        print ", ";
    }

    print "{ \"label\" : \"$productos[3]\",
            \"value\" : { \"nombre_cliente\" : \"$productos[0]\",
            \"apellido_cliente\" : \"$productos[1]\",
            \"documento_cliente\" : \"$productos[3]\",
            \"id_cliente\":$productos[2] } }";
}

// lo que haremos es algo extremadamente sencillo, recuerda que este no es el objetivo del demo:
// recorre el arreglo y si encuentras el texto, imprime el elemento.
// cada elemento debe tener la forma:
// { label : "lo que quieras que aparezca escrito", value: { datos del producto... } }
/*$contador = 0;
foreach ($productos as $descripcion => $valor)
{
if (strpos(strtolower($descripcion), $criterio) !== false)
{
if ($contador++ > 0) print ", "; // agregamos esta linea porque cada elemento debe estar separado por una coma
print "{ \"label\" : \"$descripcion\", \"value\" : { \"descripcion\" : \"$descripcion\", \"precio\" : $valor } }";
}
}*/// siguiente producto
?>]