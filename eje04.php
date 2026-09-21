<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!--
        Han salido tres 6 seguidos tras genera 1343 números en 1.002 milisegundos
        Para obtener los segundos utilizamos la función microtime(true)  para obtener la fecha actual en segundos. 

    -->
    <?php
    /*
    $randomizer = random_int(1,10);
    $contadorTiempo = microtime(true);
    */
    // Iniciar Variables
    $tiempoInicio = microtime(true);
    $contadorDemon = 0;
    $contadorNumeros = 0;
    // bucle con condicion para salir
    do {
        // Crear numeros random e ir contandolos
        $numeros = random_int(1, 10);
        $contadorNumeros++;
        // Hacer que sean consecutivos
        // Si es 6 se suma, pero si es 62356 no 
        if ($numeros == 6) {
            $contadorDemon += 1;
        } else {
            $contadorDemon == 0;
        }
        // Como el do-while solo continua si es  true 
        // busca que sea mas pequeño que lo que buscas
        // osea menor que 666 y si es mayor (false)
        // sale 
    } while ($contadorDemon < 3);

    // Cuentas el tiempo del principio y del final, 
    // los restas y te sale el tiempo total 
    $tiempoFinal = microtime(true);
    $tiempoTotal = $tiempoFinal - $tiempoInicio;
    // comentario de salida.
    echo "Han salido tres 6 seguidos tras generar " . $contadorNumeros . " números en " . $tiempoTotal . " milisegundos";
    ?>
</body>

</html>