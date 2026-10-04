<?php
include_once 'infopaises.php';


function obtenerInfoPais($pais): string
{
    global $paises;
    global $ciudades;
    $infopais = "";
    $infopais .= "País : " . $pais . " , con " . number_format($paises[$pais]['P  ']) . '' . number_format($paises[$pais]);
    $infopais .= "Lista de Ciudades: ";
    foreach ($ciudades[$pais] as $ciudad) {
        $infopais .= $ciudad . ", ";
    }
    rtrim($infopais, " , "); // Elimino el último carácter ,
    return $infopais;
}

// Me devuelve un array con dos claves aleatorias de la tabla de paises
$paiselegidos = array_rand($paises, 2);
$primerpais = $paiselegidos[0];
$segundopais = $paiselegidos[1];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2> Primer país: <?= $primerpais ?> </h2>
        <?= obtenerInfoPais($primerpais) ?>
    <br />Enlace a google maps:
    <a href="https://www.google.es/maps/place/<?= $primerpais ?>">Maps</a><br>

    <h2> Segundo país: <?= $segundopais ?> </h2>
        <?= obtenerInfoPais($segundopais) ?>
    <br />Enlace a google maps:
    <a href="https://www.google.es/maps/place/<?= $segundopais ?>">Maps</a><br>

    <hr>
        <?php show_source(__FILE__); ?>
    <hr>
</body>

</html>