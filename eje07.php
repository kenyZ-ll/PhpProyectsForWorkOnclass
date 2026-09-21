<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" http-equiv="refresh" content="5">
    <title>Document</title>
</head>
<body>
    <!--
        7. Elegir tres valores entre 100 y 500 y pintar tres barras de color rojo, verde y azul del tamaño indicado.
        Pista: Utilizar  3 tablas con una fila del tamaño generado.     
    -->
    <?php 
        $red = random_int(100, 500);
        $green = random_int(100,500);
        $blue = random_int(100,500);
    ?>
    <table>
        <tr>
            <td style="width: <?php echo $red; ?>px; background-color: red; height: 30px;">
                <?php echo "Rojo: ".$red?>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="width: <?php echo $green; ?>px; background-color: green; height: 30px;">
                <?php echo "Verde: ".$red?>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="width: <?php echo $blue; ?>px; background-color: blue; height: 30px;">
                <?php echo "Azul: ".$red?>
            </td>
        </tr>
    </table>

</body>
</html>