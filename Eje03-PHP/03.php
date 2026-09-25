<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Periodicos</title>
</head>

<?php
$medios = [
    "El Pais" => "https://www.elpais.com",
    "El Mundo" => "https://www.elmundo.es",
    "The Economist" => "https://www.economist.com/",
    "La Razon" => "https://www.larazon.es/",
    "Marca" => "https://www.marca.com/"
];

$Noticiero = array_rand($medios);
?>

<body>
    <h1>El Medio recomendado es:
        <a href="<?php echo $medios[$Noticiero]; ?>"><?php echo $Noticiero ?></a>
    </h1>
</body>