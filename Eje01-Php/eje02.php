<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio2</title>
</head>
<body>
    
    <?php 
    // Hacer que lo que sea mayor que i sea 
    // una funcion de numero random entre 1 y 9 
    $al = random_int(1, 9);
    // Este para lo vertical 
    for( $i = 1; $i <= $al; $i++ )
    {
        // este para lo horizontal
        for ( $j = 1; $j <= $i; $j++ ) {echo $i;}
        echo "<br>";
    }
    ?>
</body>
</html>