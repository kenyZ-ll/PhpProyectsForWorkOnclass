<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        body {
            font-family: monospace;
        }
    </style>

    <code>
        <?php
        $totalFilas = random_int(1, 20);
        for ($FilaActual = 0; $FilaActual < $totalFilas; $FilaActual++) 
        {
            // lo ma imporante 
            $CantidadEspacios = $totalFilas - $FilaActual;
            $CantidadAsteriscos = 2 * $FilaActual - 1;
            
            for ($i = 1; $i <= $CantidadEspacios; $i++) { echo "&nbsp"; }
            for ($i = 1; $i <= $CantidadAsteriscos; $i++) {echo "*";}
            for ($i = 1; $i <= $CantidadEspacios; $i++) {echo "&nbsp";}
            echo "<br>";
        }
        
        ?>
    </code>
    
</body>

</html>